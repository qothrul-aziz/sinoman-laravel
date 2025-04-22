<?php
Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/Pengaturan', function () {
    return view('Pengaturan');
});

Route::get('/setting', function () {
    return view('setting');
});

Route::get('/datarumah', function () {
    return view('datarumah');
});

Route::get('/download', function () {
    return view('download');
});