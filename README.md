# Inline Font Awesome for Yii

> **inline**  
> ***/ˈɪnlʌɪn/***  
> *adjective*
>
> included as part of the main text on a page, rather than in a separate section

This extension provides simple functions for [Yii framework 3.0](http://www.yiiframework.com/) applications to add
[Font Awesome](https://fontawesome.com/) [Icons](https://fontawesome.com/icons) inline.

[![Packagist Version](https://img.shields.io/packagist/v/yiirocks/svg-inline-fontawesome.svg)](https://packagist.org/packages/yiirocks/svg-inline-fontawesome)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/yiirocks/svg-inline-fontawesome.svg)](https://php.net/)
[![Packagist](https://img.shields.io/packagist/dt/yiirocks/svg-inline-fontawesome.svg)](https://packagist.org/packages/yiirocks/svg-inline-fontawesome)
[![GitHub](https://img.shields.io/github/license/yiirocks/svg-inline-fontawesome.svg)](https://github.com/yiirocks/svg-inline-fontawesome/blob/master/LICENSE)

## Installation

The package could be installed via composer:

```bash
composer require yiirocks/svg-inline-fontawesome
```

## Usage

The default configuration will enable `$svg` in any view.

```php
echo $svg->fai('cookie');
```

Available options can be found in the [documentation](https://www.yii.rocks/svg-inline/fontawesome/).

## Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```bash
./vendor/bin/phpunit
```

[![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/YiiRocks/svg-inline-fontawesome.svg)](https://codeclimate.com/github/YiiRocks/svg-inline-fontawesome/maintainability)
[![Codacy branch grade](https://img.shields.io/codacy/grade/41c0fc9e1e244d1292f7ba51b6ed1065/master.svg)](https://app.codacy.com/gh/YiiRocks/svg-inline-fontawesome)
[![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/yiirocks/svg-inline-fontawesome/master.svg)](https://scrutinizer-ci.com/g/yiirocks/svg-inline-fontawesome/?branch=master)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/yiirocks/svg-inline-fontawesome/analysis)
