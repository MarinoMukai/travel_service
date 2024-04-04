<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('hello', function () {
    return 'welcome';
});

Route::get('sample', function() {
    return 'indexもつけろ';
});
Route::get('sample/index', [SampleController::class, 'index']);
Route::post('/submitForm', [SampleController::class, 'store'])->name('submit.form');
Route::post('/apiSubmitForm', [SampleController::class, 'api'])->name('apiSubmit.form');
