<?php

use App\Http\Controllers\PumpController;
use App\Livewire\Pamp\UpdatePamp;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('report', 'report.testReport')
    ->middleware(['auth', 'verified'])
    ->name('report');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/pump', 'pump')
    ->middleware(['auth', 'verified'])
    ->name('pump');

Route::view('/pump/create', 'newpamp')
    ->middleware(['auth', 'verified'])
    ->name('newpamp');

Route::get('/pump/update/{pump}', [PumpController::class, 'getData'])
    ->middleware(['auth', 'verified'])
    ->name('updatePump');

Route::get('/pump/test/history/add/{pump}', [PumpController::class, 'addTestHistory'])
    ->middleware(['auth', 'verified'])
    ->name('addTestHistory');

Route::view('/test', 'test')
    ->middleware(['auth', 'verified'])
    ->name('test');

Route::view('/test/all', 'allTest')
    ->middleware(['auth', 'verified'])
    ->name('allTest');

Route::view('/test/update', 'updateTest')
    ->middleware(['auth', 'verified'])
    ->name('testUpdate');

Route::view('/user', 'user')
    ->middleware(['auth', 'verified'])
    ->name('user');

Route::view('/create/user', 'newUser')
    ->middleware(['auth', 'verified'])
    ->name('newUser');

Route::view('/profile/update', 'updateProfile')
    ->middleware(['auth', 'verified'])
    ->name('updateProfile');

Route::view('/password/change', 'changePassword')
    ->middleware(['auth', 'verified'])
    ->name('changePassword');

Route::view('/account/disable', 'disableAccount')
    ->middleware(['auth', 'verified'])
    ->name('disableAccount');

Route::view('/settings', 'settings')
    ->middleware(['auth', 'verified'])
    ->name('settings');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
