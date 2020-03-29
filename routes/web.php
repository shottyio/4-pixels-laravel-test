<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController');

    Route::resource('sections', 'SectionController');
});

