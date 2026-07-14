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
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/yiirocks/svg-inline-fontawesome/build.yml?branch=master)](https://github.com/yiirocks/svg-inline-fontawesome/actions)

Stats for Nerds

[![Coverage](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fsvg-inline-fontawesome%2Fbadges%2Fcoverage.json)](https://github.com/yiirocks/svg-inline-fontawesome/tree/badges)
[![MSI](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fsvg-inline-fontawesome%2Fbadges%2Fmsi.json)](https://github.com/yiirocks/svg-inline-fontawesome/tree/badges)
[![Tests](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fsvg-inline-fontawesome%2Fbadges%2Ftests.json)](https://github.com/yiirocks/svg-inline-fontawesome/tree/badges)
[![Assertions](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fyiirocks%2Fsvg-inline-fontawesome%2Fbadges%2Fassertions.json)](https://github.com/yiirocks/svg-inline-fontawesome/tree/badges)

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

The package is tested with [Psalm](https://psalm.dev/), [PHPUnit](https://phpunit.de/), and
[Infection](https://infection.github.io/) for mutation testing. To run tests:

```bash
composer psalm
composer phpunit
composer infection
```
