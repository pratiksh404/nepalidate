# Laravel Nepali Date Converter

![Laravel Nepali Date Converter](https://github.com/pratiksh404/nepalidate/blob/main/screenshots/banner.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pratiksh/nepalidate.svg?style=flat-square)](https://packagist.org/packages/pratiksh/nepalidate)[![Stars](https://img.shields.io/github/stars/pratiksh404/nepalidate)](https://github.com/pratiksh404/nepalidate/stargazers) [![Downloads](https://img.shields.io/packagist/dt/pratiksh/nepalidate.svg?style=flat-square)](https://packagist.org/packages/pratiksh/nepalidate) [![StyleCI](https://github.styleci.io/repos/392884287/shield?branch=main)](https://github.styleci.io/repos/392884287?branch=main) [![Build Status](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/badges/build.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/build-status/main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/nepalidate/?branch=main) [![CodeFactor](https://www.codefactor.io/repository/github/pratiksh404/nepalidate/badge)](https://www.codefactor.io/repository/github/pratiksh404/nepalidate) [![License](https://img.shields.io/github/license/pratiksh404/nepalidate)](//packagist.org/packages/pratiksh/adminetic)

Laravel package to convert AD to BS that can work with carbon.

## Installation

You can install the package via composer:

```bash
composer require pratiksh/nepalidate
```

## Usages

By Using Converter Classes.

### AD to BS

```php
use Pratiksh\Nepalidate\Services\NepaliDate;

NepaliDate::create(\Carbon\Carbon::now())->toBS(); // 2082-02-04
NepaliDate::create(\Carbon\Carbon::now())->toFormattedEnglishBSDate(); // 4 Jestha 2082, Sunday
NepaliDate::create(\Carbon\Carbon::now())->toFormattedNepaliBSDate(); // ४ जेठ २०८२, आइतवार
```

By Using Helper Function.

```php

toBS(\Carbon\Carbon::now()); // 2082-02-04
toFormattedEnglishBSDate(\Carbon\Carbon::now()); // 4 Jestha 2082, Sunday
toFormattedNepaliBSDate(\Carbon\Carbon::now()); // ४ जेठ २०८२, आइतवार
toDetailBS(\Carbon\Carbon::now()); // {
    "year": 2082,
    "month": "02",
    "day": "04",
    "dayOfWeek": 1,
  }

```

### BS to AD
```php
use Pratiksh\Nepalidate\Services\EnglishDate;
EnglishDate::create("2082-02-04")->toAD(); //2025-05-18
EnglishDate::create("2082-02-04")->toAD('Y-m-d g:i A'); // 2025-05-18 12:00 AM
EnglishDate::create("2082-02-04")->toCarbon(); // To Carbon instance
EnglishDate::create("2082-02-04")->date; // Carbon instance
```
By Using Helper Functions
```php
toAD("2082-02-04"); // Carbon instance
```

### Upgrade Guide
This new version include major updates that could break the code.
 - `toFormattedBSDate(Carbon $date)` changed to `toFormattedEnglishBSDate(Carbon $date)`
 - `toFormattedNepaliDate(Carbon $date)` changed to `toFormattedNepaliBSDate(Carbon $date)`
 - Facades are removed.

### Testing

```bash
./vendor/bin/pest
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
