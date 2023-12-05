#!/usr/bin/php
<?php
require_once 'vendor/autoload.php';
$path = __DIR__ . '/Units/';
$files = glob($path . '*Test.php');
foreach ($files as $fileName) {
    $fileName = basename($fileName, '.php');
    $test_class = "Tests\\Units\\$fileName";
    echo str_repeat('-', 64) . PHP_EOL;
    $test_class = new $test_class; // Instantiate the command
    echo $test_class::class . PHP_EOL;
    $methods = get_class_methods($test_class);
    foreach ($methods as $method) {
        if (!str_starts_with($method, 'test')) {
            continue;
        }
        $test_class->$method();
    }
    echo str_repeat('-', 64) . PHP_EOL;
}
echo str_repeat('=', 64) . PHP_EOL;
echo 'Done.' . PHP_EOL;
