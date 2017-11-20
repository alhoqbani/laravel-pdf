# Laravel wrapper for mPDF 7.0

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alhoqbani/laravel-pdf.svg?style=flat-square)](https://packagist.org/packages/alhoqbani/laravel-pdf)
[![Build Status](https://img.shields.io/travis/alhoqbani/laravel-pdf/master.svg?style=flat-square)](https://travis-ci.org/alhoqbani/laravel-pdf)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/xxxxxxxxx.svg?style=flat-square)](https://insight.sensiolabs.com/projects/xxxxxxxxx)
[![Quality Score](https://img.shields.io/scrutinizer/g/alhoqbani/laravel-pdf.svg?style=flat-square)](https://scrutinizer-ci.com/g/alhoqbani/laravel-pdf)
[![Total Downloads](https://img.shields.io/packagist/dt/alhoqbani/laravel-pdf.svg?style=flat-square)](https://packagist.org/packages/alhoqbani/laravel-pdf)

Laravel wrapper for mPDF 7.0

> # UNDER DEVELOPMENT. Do NOT use for production

## Installation

You can install the package via composer:

```bash
composer require 'alhoqbani/laravel-pdf:@dev'
```

## Usage

``` php

Start by publishing the config file:


```bash
php artisan vendor:publish --provider "Alhoqbani\PDF\PDFServiceProvider"
```

Edit the config file. You can add any extra configuration to be passed to the `Mpdf` constructor.

To us the Mpdf library directly, you can get a pre-configured instance of `Mpdf`

```php
<?php

        $mpdf = \PDF::getMpdf();

        $mpdf->writeHTML('<h1>Hello World</h1>');

        return $mpdf->output();

```
// TODO

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email h.alhoqbani@gmail.com instead of using the issue tracker.

## Credits

- [Hamoud Alhoqbani](https://github.com/alhoqbani)

[Built using Spatie.be skeleton](https://github.com/spatie/skeleton-php)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
