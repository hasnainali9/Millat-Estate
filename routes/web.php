<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [ApplicationController::class, 'index'])->name('home');
Route::get('/about', [ApplicationController::class, 'about'])->name('about');
Route::get('/contact', [ApplicationController::class, 'contact'])->name('contact');
Route::get('/category/{cat}', [ApplicationController::class, 'ShowCategory'])->name('category.show');

Route::post('property/search', [ApplicationController::class, 'search'])->name('property.search');
Route::get('property/search/{slug}', [ApplicationController::class, 'search_by_city'])->name('property.search_by_city');
Route::get('/property/{slug}', [ApplicationController::class, 'property'])->name('property');
Route::get('/detail/property/{slug}', [ApplicationController::class, 'property_detail'])->name('property.detail');
Route::get('/invest', [ApplicationController::class, 'invest'])->name('invest');
Route::get('/detail/invest/{slug}', [ApplicationController::class, 'invest_detail'])->name('invest.detail');
Route::get('/blog', [ApplicationController::class, 'blog'])->name('blog');
Route::get('/post/{slug}', [ApplicationController::class, 'post'])->name('post');
Route::get('/page/{slug}', [ApplicationController::class, 'page'])->name('page');

Route::post('/newsletter', [ApplicationController::class, 'newsletter'])->name('newsletter.store');
Route::post('/contact/store', [ApplicationController::class, 'contact_store'])->name('contact.store');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return back();
});
