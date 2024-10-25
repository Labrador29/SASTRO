<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Log errors to a file
$logFile = __DIR__ . '/../storage/logs/error.log';
file_put_contents($logFile, "Request: " . print_r($_SERVER, true) . "\n", FILE_APPEND);

// Check If The Application Is Under Maintenance
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register The Auto Loader
require __DIR__ . '/../vendor/autoload.php';

// Run The Application
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
