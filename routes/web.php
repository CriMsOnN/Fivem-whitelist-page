<?php

use App\Http\Controllers\WhiteList;
use App\Http\Controllers\WhiteListAppController;
use App\Http\Controllers\WhiteListsControllerPage;
use App\Models\Whitelists;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminControllerPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('admin')->prefix('admin')->group(function () {
   Route::get('/', [AdminControllerPage::class, 'show'])->name('admin');
   Route::get('/whitelists', [WhiteListsControllerPage::class, 'show'])->name('whitelists');
   Route::post('/whitelist', [WhiteListsControllerPage::class, 'delete'])->name('whitelist');
   Route::post('/updatewhitelist', [WhiteListsControllerPage::class, 'update'])->name('updatewhitelist');
   Route::get('/whitelists/{id}', [WhiteListsControllerPage::class, 'getId'])->name('whitelists/{id}');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/apply', function() {
    return Inertia::render('Whitelist/Apply');
})->name('apply');

Route::middleware(['auth:sanctum', 'verified'])->post('/application', [WhiteListAppController::class, 'index'])->name('application');





//Route::middleware('App\Http\Middleware\Admin')->get('/whitelists', 'App\Http\Controllers\Whitelist@index')->name('whitelists');
//Route::middleware('admin')->get('/admin', [AdminControllerPage::class, 'show'])->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
