<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');return response()->json(['message' => 'Your response data']);

});
