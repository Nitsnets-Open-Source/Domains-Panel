<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['user.auth', 'user.enabled']], static function () {
    Route::get('/domain', Index::class)->name('domain.index');
    Route::any('/domain/create', Create::class)->name('domain.create');
    Route::any('/domain/{id}', UpdateData::class)->name('domain.update.data');
    Route::get('/domain/{id}/subdomain', UpdateSubdomain::class)->name('domain.update.subdomain');
    Route::any('/domain/{id}/subdomain/create', UpdateSubdomainCreate::class)->name('domain.update.subdomain.create');
    Route::any('/domain/{id}/subdomain/{subdomain_id}', UpdateSubdomainUpdate::class)->name('domain.update.subdomain.update');
    Route::get('/domain/{id}/check', UpdateCheck::class)->name('domain.update.check');
    Route::post('/domain/{id}/boolean/{column}', UpdateBoolean::class)->name('domain.update.boolean');
    Route::post('/domain/{id}/check', Check::class)->name('domain.check');
    Route::post('/domain/{id}/delete', Delete::class)->name('domain.delete');

    Route::get('/domain/{id}/url', UpdateUrl::class)->name('domain.update.url');
    Route::any('/domain/{id}/url/create', UpdateUrlCreate::class)->name('domain.update.url.create');
    Route::any('/domain/{id}/url/{url_id}', UpdateUrlUpdate::class)->name('domain.update.url.update');
});
