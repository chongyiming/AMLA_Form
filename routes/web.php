<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageController2;
use App\Http\Controllers\PageController3;
use App\Http\Controllers\PageController4;


Route::get('locale/{lang}', [LanguageController::class, 'setLocale']);
Route::get('/lang/{locale}.json', function ($locale) {
    return response()->file(resource_path("lang/{$locale}.json"));
});
Route::get('/', [PageController::class, 'show']);
Route::post('/create', [PageController::class, 'store']);
Route::get('/success', function () {
    return view('success');
});
