<?php
namespace RandomAgent;
require_once __DIR__.'/vendor/autoload.php';

print_r(Random_UA::getCategories());
print_r(Random_UA::getPlatforms());
print_r(Random_UA::getVendors());

$rand = Random_UA::random([
	'category' => 'desktop',
]);
echo 'category: desktop - '.$rand.PHP_EOL;


$rand = Random_UA::random([
	'category' => ['desktop'],
	'platform' => ['Windows','Mac'],
]);
echo 'category: desktop  & platform: Window & Mac - '.$rand.PHP_EOL;

$rand = Random_UA::random([
	'category' => ['desktop'],
	'platform' => ['Windows','Mac'],
	'vendor' => ['Chrome'],
]);
echo 'category: desktop  & platform: Window & Mac - '.$rand.PHP_EOL;

