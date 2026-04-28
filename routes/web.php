<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('resources/views/index');
})->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/contact', 'pages.contact')->name('contact');
