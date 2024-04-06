<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// 既存のルート定義の下に追加
Route::get('/products', [ProductController::class, 'index']);
