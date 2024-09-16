<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/',[PublicController::class, 'welcome'])->name('welcome');
Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class,'show'])->name('article.show');
Route::get('/category/{category}',[ArticleController::class,'byCategory'])->name('article.byCategory');