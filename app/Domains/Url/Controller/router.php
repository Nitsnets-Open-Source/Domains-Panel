<?php declare(strict_types=1);

namespace App\Domains\Url\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['user.auth', 'user.enabled']], static function () {
    Route::get('/url', Index::class)->name('url.index');
    Route::post('/url/{id}/boolean/{column}', UpdateBoolean::class)->name('url.update.boolean');
    Route::post('/url/{id}/delete', Delete::class)->name('url.delete');
});
