<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\KeysController;


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
    return view('user.welcome');
})->name('welcome');

Route::get('keys', [KeysController::class, 'index'])->name('keys.index');


// require __DIR__ . '/auth.php';
