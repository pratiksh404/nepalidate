# Laravel Nepali Date Converter

![Laravel Nepali Date Converter](https://github.com/pratiksh404/nepalidate/blob/main/screenshots/banner.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pratiksh/nepalidate.svg?style=flat-square)](https://packagist.org/packages/pratiksh/nepalidate)[![Stars](https://img.shields.io/github/stars/pratiksh404/nepalidate)](https://github.com/pratiksh404/nepalidate/stargazers) [![Downloads](https://img.shields.io/packagist/dt/pratiksh/nepalidate.svg?style=flat-square)](https://packagist.org/packages/pratiksh/nepalidate) [![StyleCI](https://github.styleci.io/repos/372560942/shield?branch=main)](https://github.styleci.io/repos/372560942?branch=main) [![Build Status](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/badges/build.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/build-status/main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/?branch=main) [![CodeFactor](https://www.codefactor.io/repository/github/pratiksh404/nepalidate/badge)](https://www.codefactor.io/repository/github/pratiksh404/nepalidate) [![License](https://img.shields.io/github/license/pratiksh404/nepalidate)](//packagist.org/packages/pratiksh/adminetic)

Laravel package to convert AD to BS that can work with carbon.

## Installation

You can install the package via composer:

```bash
composer require pratiksh/nepalidate
```

## Usages

By Using Facade.

```php
use Pratiksh\Nepalidate\Facades\NepaliDate;

NepaliDate::create(\Carbon\Carbon::now())->toBS(); // 2078-4-21
NepaliDate::create(\Carbon\Carbon::now())->toFormattedBSDate(); // 21 Shrawan 2078, Thurday
NepaliDate::create(\Carbon\Carbon::now())->toFormattedNepaliDate(); // २१ साउन २०७८, बिहिवार
```

By Using Helper Function.

```php
use Pratiksh\Nepalidate\Facades\NepaliDate;

toBS(\Carbon\Carbon::now()); // 2078-4-21
toFormattedBSDate(\Carbon\Carbon::now()); // 21 Shrawan 2078, Thurday
toFormattedNepaliDate(\Carbon\Carbon::now()); // २१ साउन २०७८, बिहिवार
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email pratikdai404@gmail.com instead of using the issue tracker.

## Credits

- [Pratik Shrestha](https://github.com/pratiksh)
- [Krishna Bhandari](https://github.com/krishnahimself)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
