#!/usr/bin/php
<?php
require_once 'vendor/autoload.php';
$path = __DIR__ . '/Units';
$files = new RegexIterator(
    new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path)
    ),
    '/^.+Test.php$/'
);
foreach ($files as $file) {
    $fileName = $file->getFileName();
    $pathName = $file->getPathName();
    $test = str_replace('.php', '', $fileName);
    $test_class = "Tests\\Units\\$test";
    require_once $pathName;
    if (!class_exists($test_class, false)) {
        continue;
    }
    echo str_repeat('=', 64) . PHP_EOL;
    $test_class = new $test_class; // Instantiate the command
    echo $test_class::class . PHP_EOL;
    $methods = get_class_methods($test_class);
    foreach ($methods as $method) {
        if (!str_starts_with($method, 'test')) {
            continue;
        }
        $test_class->$method();
    }
}
echo str_repeat('=', 64) . PHP_EOL;
echo 'Done.' . PHP_EOL;
