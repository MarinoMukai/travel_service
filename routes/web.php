<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\TravelController;

Route::get('hello', function () {
    return 'welcome';
});

Route::get('sample', function() {
    return 'indexもつけろ';
});

// we can delete them at any time because they are sample.
Route::get('sample/index', [SampleController::class, 'index']);
Route::get('travel/index', [TravelController::class, 'index']);
Route::post('/submitForm', [SampleController::class, 'store'])->name('submit.form');
Route::post('/loginsubmitForm', [TravelController::class, 'store'])->name('loginsubmit.form');
Route::post('/apiSubmitForm', [SampleController::class, 'api'])->name('apiSubmit.form');

// 旅行プラン自動生成の入力画面
Route::get('travel/index', [TravelController::class, 'index']);
