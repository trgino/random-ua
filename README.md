Random user agent generator in PHP
=============================

[![Packagist](https://img.shields.io/packagist/dt/trgino/random-user-agent.svg)](https://packagist.org/packages/trgino/random-user-agent)
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
	'category' => 'desktop',
]);

/* or */

$rand_ua = Random_UA::random([
	'category' => ['desktop'],
]);

/* or */

$rand_ua = Random_UA::random([
	'category' => ['desktop'],
	'platform' => ['windows','mac'],
]);

```

/* or */

$rand_ua = Random_UA::random([
	'category' => ['desktop'],
	'platform' => ['windows','mac'],
	'vendor' => ['chrome'],
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
    [0] => Windows
    [1] => Mac
)
*/
```
