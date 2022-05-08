Random user agent generator in PHP
=============================

[![Build Status](https://travis-ci.org/trgino/random-user-agent.png?branch=master)](https://travis-ci.org/trgino/random-user-agent)
[![GitHub tag](https://img.shields.io/github/tag/trgino/random-user-agent.svg?label=latest)](https://packagist.org/packages/trgino/random-user-agent) 
[![Packagist](https://img.shields.io/packagist/dt/trgino/random-user-agent.svg)](https://packagist.org/packages/trgino/random-user-agent)
[![Coverage Status](https://coveralls.io/repos/trgino/random-user-agent/badge.svg?branch=master)](https://coveralls.io/r/trgino/random-user-agent?branch=master)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/trgino/random-user-agent.svg)](https://packagist.org/packages/trgino/random-user-agent)


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
