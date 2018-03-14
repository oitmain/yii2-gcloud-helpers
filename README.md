# yii2-gcloud-helpers

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
