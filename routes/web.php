<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GearController;
use App\Http\Controllers\GearRequestController;
use App\Http\Controllers\IssuedGearController;
use App\Http\Controllers\MessageController;

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

//...............................Admin Dashboard and Landing Page Routes.....................//

Route::get('/', [DashboardController::class, 'homePage'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


//...............................Spatie Roles and Permissions Routes.....................//
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

//...............................Gears Routes.....................//
Route::group(['prefix'=>'gear', 'middleware' => ['auth']], function() {
    Route::get('/index', [GearController::class, 'index'])->name('gear.index');
    Route::get('/create', [GearController::class, 'create'])->name('gear.create');
    Route::get('/media', [GearController::class, 'storeMedia'])->name('gear.media');
    Route::post('/store', [GearController::class, 'store'])->name('gear.store');
    Route::get('/{slug}', [GearController::class, 'show'])->name('gear.show');
    Route::get('/edit/{slug}', [GearController::class, 'edit'])->name('gear.edit');
    Route::put('/edit/{id}', [GearController::class, 'update'])->name('gear.update');
    Route::delete('/{id}', [GearController::class, 'destroy'])->name('gear.destroy');

});

//...............................Gear Request Routes.....................//
Route::group(['prefix'=>'request', 'middleware' => ['auth']], function() {
    // Admin only routes
    Route::get('/manager', [GearRequestController::class, 'adminIndex'])->name('request.adminIndex');
    Route::get('/showStatus', [GearRequestController::class, 'getReport'])->name('request.getReport');
    Route::post('/change-status', [GearRequestController::class, 'changeStatus'])->name('request.changeStatus');

    Route::post('/store', [GearRequestController::class, 'store'])->name('request.store');
    Route::get('/index', [GearRequestController::class, 'index'])->name('request.index');
    Route::get('/Gear', [GearRequestController::class, 'gearListing'])->name('request.create');
    Route::get('/{slug}', [GearRequestController::class, 'show'])->name('request.show');
    Route::get('/edit/{id}', [GearRequestController::class, 'edit'])->name('request.edit');
    Route::delete('/{id}', [GearRequestController::class, 'destroy'])->name('request.destroy');

    // Search
    Route::post('/search', [GearRequestController::class, 'search'])->name('request.search');
});

//...............................Gear Issue  Routes.....................//
Route::group(['prefix'=>'issue', 'middleware' => ['auth']], function() {
    Route::get('/index', [IssuedGearController::class, 'index'])->name('issue.index');
    Route::post('/store', [IssuedGearController::class, 'store'])->name('issue.store');
    Route::put('/changeStatus{id}', [IssuedGearController::class, 'update'])->name('issue.update');
    Route::delete('/{id}', [IssuedGearController::class, 'destroy'])->name('issue.destroy');
});

//...............................Clients Routes.....................//
Route::group(['prefix'=>'clients', 'middleware' => ['auth']], function() {
    Route::get('/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/edit{id}', [ClientController::class, 'update'])->name('client.update');
    Route::put('/update{id}', [ClientController::class, 'updateUser'])->name('clientUser.update');

    Route::get('/show', [ClientController::class, 'show'])->name('clients.show');
    Route::post('/status', [ClientController::class, 'updateStatus'])->name('clientUser.updateStatus');
});

//...............................Chat Module Routes.....................//
Route::group(['prefix'=>'chat', 'middleware' => ['auth']], function() {
    Route::get('/index', [ChatController::class, 'index'])->name('chat');
    Route::get('/{id}', [MessageController::class, 'index'])->name('chat.messages');
    Route::post('/message', [MessageController::class, 'sendMessage'])->name('chat.send');

    Route::get('/edit', [MessageController::class, 'edit'])->name('chat.edit');
    Route::put('/edit{id}', [MessageController::class, 'update'])->name('chat.update');
    Route::put('/update{id}', [MessageController::class, 'updateUser'])->name('chatUser.update');
});

require __DIR__.'/auth.php';
