<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', 'UserController');

Route::resource('sections', 'SectionController');
