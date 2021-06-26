<?php declare(strict_types=1);

namespace App\Domains\Check\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['user.auth', 'user.enabled']], static function () {
    Route::get('/check', Index::class)->name('check.index');
});
