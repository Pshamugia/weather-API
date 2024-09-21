<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/clear-cache', function () {
   // Artisan::call('config:clear');
    //Artisan::call('cache:clear');
    //Artisan::call('view:clear');
    //Artisan::call('route:clear');

   // return 'Cache cleared successfully!';
//});

// Default route for the home page
Route::get('/', [WeatherController::class, 'show'])->defaults('city', 'tbilisi')->name('home');

// Route to display weather for a specific city
Route::get('/weather/{city?}', [WeatherController::class, 'show'])->name('weather.show');

// Route for search functionality
Route::get('/search', [WeatherController::class, 'search'])->name('search');
