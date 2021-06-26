<?php declare(strict_types=1);

namespace App\Domains\User\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'user.auth.redirect'], static function () {
    Route::any('/user/auth', AuthCredentials::class)->name('user.auth.credentials');
});

Route::group(['middleware' => ['user.auth', 'user.enabled']], static function () {
    Route::any('/user', Update::class)->name('user.update');
    Route::get('/user/logout', Logout::class)->name('user.logout');
});

Route::group(['middleware' => ['user.auth']], static function () {
    Route::any('/user/disabled', Disabled::class)->name('user.disabled');
});
