<?php  

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';



// Create a request instance
$request = Request::capture();

// Handle the request through the application's HTTP kernel
$kernel = $app->make(Kernel::class);
$response = $kernel->handle($request);

// Send the response to the browser
$response->send();

// Terminate the application
$kernel->terminate($request, $response);

