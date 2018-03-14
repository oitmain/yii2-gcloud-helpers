# yii2-gcloud-helpers

[![Build Status][ico-build]][link-build]
[![Coverage Status][ico-coverage]][link-coverage]
[![Quality Score][ico-code-quality]][link-code-quality]
[![StyleCI][ico-style]][link-style]

DELETE - FROM HERE

## How to use skeleton (Remove this section)

### 1) Download project

```
PROJECT_NAME=new-project-name
git clone --depth=1 --branch=master https://github.com/oitmain/template-php-composer-skeleton $PROJECT_NAME
cd $PROJECT_NAME
rm -rf .git
```

### 2) Update values

You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

Or replace ```Oitmain, Inc``` ```oitmain``` ```http://oitmain.com``` ```support@oitmain.com``` ```oitmain``` ```yii2-gcloud-helpers``` `````` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line. 

### 3) Init a git repository

```
git init .
git add -A
git commit -m 'Initial commit'
```

### 4) Create git repository

```
API_TOKEN=github_token
REPO_NAME=some_repo
curl -H "Authorization: token $API_TOKEN" https://api.github.com/orgs/oitmain/repos -d '{"private":true,"name":"'"$REPO_NAME"'"}'
```

### 5) Push your commits to Github

```
REPO_NAME=some_repo
git remote add origin https://github.com/oitmain/$REPO_NAME
git push -u origin master
```

### 6) Travis CI and Coveralls

Activate your repo on [Travis CI](https://travis-ci.org/) and [Coveralls](https://coveralls.io/).

### 7) ~~Packagist~~ Do not upload to Packagist. This is a private software.

~~Register your repo on [Packagist](https://packagist.org/). You can generate a badge on [Badge Poser](https://poser.pugx.org/).~~

### 8) Service Hooks

Don't forget to activate service hooks.

---
DELETE - TO HERE

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/oitmain/yii2-gcloud-helpers"
        }
    ],
    "require": {
        "oitmain/yii2-gcloud-helpers": "dev-master"
    }
}
```

## Usage

``` php
$skeleton = new Oitmain\Yii2\Google();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing and debugging

### Install development components

``` bash
$ composer update -dev
```

### Test

``` bash
$ composer test
$ composer test-verbose
```

## Code styling

``` bash
$ composer check-style
$ composer fix-style
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email support@oitmain.com instead of using the issue tracker.

## Credits

- [Oitmain, Inc][link-author]
- [All Contributors][link-contributors]

## License

Please see [License File](LICENSE.md) for more information.

[ico-build]: https://scrutinizer-ci.com/g/oitmain/yii2-gcloud-helpers/badges/build.png?b=master
[ico-coverage]: https://scrutinizer-ci.com/g/oitmain/yii2-gcloud-helpers.svg?style=flat-square
[ico-code-quality]: https://scrutinizer-ci.com/g/oitmain/yii2-gcloud-helpers.svg?style=flat-square
[ico-style]: https://styleci.io/repos/

[link-build]: https://travis-ci.com/oitmain/yii2-gcloud-helpers
[link-coverage]: https://scrutinizer-ci.com/g/oitmain/yii2-gcloud-helpers/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/oitmain/yii2-gcloud-helpers
[link-author]: https://github.com/oitmain
[link-contributors]: ../../contributors
[link-style]: https://styleci.io/repos/
