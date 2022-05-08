Random user agent generator in PHP
=============================

[![GitHub tag](https://img.shields.io/github/tag/trgino/random-user-agent.svg?label=latest)](https://packagist.org/packages/trgino/random-user-agent) 
[![Packagist](https://img.shields.io/packagist/dt/trgino/random-user-agent.svg)](https://packagist.org/packages/trgino/random-user-agent)
[![Coverage Status](https://coveralls.io/repos/github/trgino/random-ua/badge.svg?branch=main)](https://coveralls.io/github/trgino/random-ua?branch=main)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)


Installation
-----

To install `Random_UA` you can either clone this repository or you can use composer

```bash
composer require trgino/random-user-agent
```

Usage
-----
```php
namespace RandomAgent;
require_once __DIR__.'/vendor/autoload.php';

$rand_ua = Random_UA::random();

/* or */

$rand_ua = Random_UA::random([
	'deviceCategory' => 'desktop',
]);

/* or */

$rand_ua = Random_UA::random([
	'deviceCategory' => ['desktop','tablet'],
]);

/* or */

$rand_ua = Random_UA::random([
	'deviceCategory' => ['desktop','mobile'],
	'platform' => 'Win32',
]);

```

Available Device Categories
-----
```php
namespace RandomAgent;
require_once __DIR__.'/vendor/autoload.php';

print_r(Random_UA::getCategories());
/*
Array
(
    [0] => desktop
    [1] => mobile
    [2] => tablet
)
*/
```

Available Platforms
-----
```php
namespace RandomAgent;
require_once __DIR__.'/vendor/autoload.php';

print_r(Random_UA::getPlatforms());

/*
Array
(
    [0] => Win32
    [1] => MacIntel
    [2] => Linux x86_64
    [3] => iPhone
    [4] => Linux armv8l
    [5] => Linux aarch64
    [6] => Linux armv7l
    [7] => Linux armv81
    [8] => Pike v8.0 release 610
    [9] => iPad
)
*/
```
