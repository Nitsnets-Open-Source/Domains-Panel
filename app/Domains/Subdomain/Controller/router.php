<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['user.auth', 'user.enabled']], static function () {
    Route::get('/subdomain', Index::class)->name('subdomain.index');
    Route::post('/subdomain/{id}/boolean/{column}', UpdateBoolean::class)->name('subdomain.update.boolean');
    Route::post('/subdomain/{id}/delete', Delete::class)->name('subdomain.delete');
});
