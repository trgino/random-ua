<?php
namespace RandomAgent;
require_once __DIR__.'/vendor/autoload.php';

print_r(Random_UA::getCategories());
print_r(Random_UA::getPlatforms());

$rand = Random_UA::random([
	'deviceCategory' => 'desktop',
]);
echo 'deviceCategory: desktop - '.$rand.PHP_EOL;


$rand = Random_UA::random([
	'deviceCategory' => ['desktop','tablet'],
]);
echo 'deviceCategory: desktop,tablet - '.$rand.PHP_EOL;


$rand = Random_UA::random([
	'deviceCategory' => ['desktop','tablet'],
	'platform' => 'Win32',
]);
echo 'deviceCategory: desktop,tablet & platform: Win32 - '.$rand.PHP_EOL;

