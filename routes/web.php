<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// Route::get('/{id?}', function (string $id = null) {
//     return "Your Given Value is $id";
    
// })->where('id', '[0-9a-zA-Z]+');

Route::get('/main/primary', function () {
    return view('primary');
})->name('primary');

Route::get('/main/secondary', function () {
    return view('secondary');
});

Route::get('/main/medium', function () {
    return view('medium');
});

Route::Fallback(function () {
    return "<h1 style='text-align:center'>This is a fallback route.
    Please check the URL and try again.</h1>";
});


Route::get('/practice', function () {
    return view('practice');
});


Route::get('/task', function () {
    return view('task');
});

Route::get('/common', function () {
    return view('common');
});



Route::get('/cartpage', function () {
    return view('cartpage');
});

Route::get('/price', function () {
    return view('price');
});
