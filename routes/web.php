<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\TopController;

Route::get('hello', function () {
    return 'welcome';
});

Route::get('sample', function () {
    return 'indexもつけろ';
});

// we can delete them at any time because they are sample.
Route::get('sample/index', [SampleController::class, 'index']);
Route::post('/submitForm', [SampleController::class, 'store'])->name('submit.form');
Route::post('/apiSubmitForm', [SampleController::class, 'api'])->name('apiSubmit.form');

Route::get('top/index', [TopController::class, 'index']);

// 旅行プラン自動生成の入力画面
Route::get('travel/freeinputindex', [TravelController::class, 'freeinputindex'])->name('freeInput.page');
Route::post('/freeinputform', [TravelController::class, 'freeinputstore'])->name('freeInput.form');
Route::get('travel/choiceinputindex', [TravelController::class, 'choiceinputindex'])->name('choiceInput.page');
Route::post('/choiceinputform', [TravelController::class, 'choiceinputstore'])->name('choiceInput.form');
Route::get('travel/chatinputindex', [TravelController::class, 'chatinputindex'])->name('chatInput.page');
Route::post('/chatinputform', [TravelController::class, 'chatinputstore'])->name('chatInput.form');
