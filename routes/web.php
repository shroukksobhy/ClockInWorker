<?php

use Illuminate\Support\Facades\Route;
use App\Models\Worker;
use App\Models\Attendance;

Route::get('/', function () {
    return view('welcome');
});