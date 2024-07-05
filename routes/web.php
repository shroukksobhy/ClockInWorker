<?php

use Illuminate\Support\Facades\Route;
use App\Models\Worker;
use App\Models\Attendance;

// Route::get('/', function () {

//     // Example: Creating a new attendance record for a worker
//     $worker = Worker::find(1);
//     $attendance = new Attendance([
//         'clock_in' => now(),
//         'clock_out' => null,
//     ]);
//     $worker->attendance()->save($attendance);
// });