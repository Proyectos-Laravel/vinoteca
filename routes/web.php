<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    ray('hola desde web.php');
    return view('welcome');
});
