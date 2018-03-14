<?php

namespace Oitmain\Yii2\Google;

use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Storage\StorageObject;
use yii\base\InvalidArgumentException;
use yii\caching\CacheInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\AssetManager;

/**
 * Class GoogleStorageAssetManager
 *
 * echo '[{"origin": ["*"],"responseHeader": ["Content-Type"],"method": ["GET", "HEAD"],"maxAgeSeconds": 3600}]' > cors-config.json
 * gsutil cors set cors-config.json gs://<your-bucket-name>
 *
 * @package app\models
 */
class GoogleStorageAssetManager extends AssetManager
{

    public $enableCache = true;

    public $cacheDuration = 3600;

    public $cache = 'cache';

    public $googleStorageBucket = null;

    // Redeploy files if this is true
    public $forceDeployQuery = "DEPLOY_ASSET";

    /**
     * @var CacheInterface
     */
    protected $cacheObject = null;

    /**
     * @var StorageClient
     */
    protected $storageClient = null;

    protected function getCache()
    {
        if (!$this->cacheObject) {
            $this->cacheObject = is_string($this->cache) ? \Yii::$app->get($this->cache, false) : $this->cache;
        }
        return $this->enableCache ? $this->cacheObject : null;
    }

    /**
     * Returns the cache key for the specified table name.
     * @param array $name the table name.
     * @return mixed the cache key.
     */
    protected function getCacheKey($name)
    {
        return [
            __CLASS__,
            $name,
        ];
    }

    /**
     * @return StorageClient
     */
    protected function getStorageClient()
    {
        if (!$this->storageClient) {
            $this->storageClient = new StorageClient();
            $this->storageClient->registerStreamWrapper();
        }
        return $this->storageClient;
    }

    protected function publishDirectory($src, $options)
    {
        $result = parent::publishDirectory($src, $options);

        $forceDeploy = @$_GET[$this->forceDeployQuery] || !empty($options['forceCopy']) || ($this->forceCopy && !isset($options['forceCopy']));
        $files = static::getFiles($src, $options);

        // Remove path from files
        $baseDir = FileHelper::normalizePath($src);
        $baseDirLen = strlen($baseDir) + 1;
        foreach ($files as &$file) {
            $file = substr($file, $baseDirLen);
        }

        $dir = $this->hash($src);
        $cache = $this->getCache();

        $remoteFiles = [];

        if (!$forceDeploy) {
            // Get files on Google Storage
            if ($cache) {
                $remoteFiles = $cache->get($this->getCacheKey(['remote_files', $dir]));
            }

            if (!$remoteFiles) {
                $remoteFiles = [];
                $bucket = $this->getStorageClient()->bucket($this->googleStorageBucket);
                $objects = $bucket->objects([
                    'projection' => 'noAcl',
                    'prefix' => $dir,
                    'fields' => 'items/name'
                ]);

                /** @var StorageObject $object */
                foreach ($objects as $object) {
                    $remoteFiles[$object->name()] = $object->name();
                }

                if ($cache && $remoteFiles) {
                    $cache->set($this->getCacheKey(['remote_files', $dir]), $remoteFiles, $this->cacheDuration);
                }
            }
        }

        foreach ($files as $file) {
            $from = $src . DIRECTORY_SEPARATOR . $file;
            $to = FileHelper::normalizePath($dir . DIRECTORY_SEPARATOR . $file, '/');
            if (!isset($remoteFiles[$to])) {
                $gsTo = "gs://" . $this->googleStorageBucket . '/' . $to;
                copy($from, $gsTo);
            }
        }

        return $result;
    }

    public static function getFiles($src, $options)
    {
        $files = [];
        $src = FileHelper::normalizePath($src);

        $handle = opendir($src);
        if ($handle === false) {
            throw new InvalidArgumentException("Unable to open directory: $src");
        }

        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $from = $src . DIRECTORY_SEPARATOR . $file;
            if (FileHelper::filterPath($from, $options)) {
                if (!is_file($from)) {
                    // recursive copy, defaults to true
                    if (!isset($options['recursive']) || $options['recursive']) {
                        $files = ArrayHelper::merge($files, static::getFiles($from, $options));
                    }
                } else {
                    $files[] = $from;
                }
            }
        }
        closedir($handle);
        return $files;
    }

}
