<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['name' => 'Ahmet']);
});

Route::get('/zzz', function () {
    return 'hello world';
})->name('hello');

Route::get('/hallo' , function () {
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function ($name) {
    return 'hello ' . $name;
});

Route::fallback(function () {
    return 'still got somewhere!';
});
