<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// $worker = Worker::find(1);
// $attendance = new Attendance([
//     'clock_in' => now(),
//     'clock_out' => null,
// ]);
// $worker->attendance()->save($attendance);
///30.04963440420605, 31.240231498152287

// $isInArea = \KMLaravel\GeographicalCalculator\Facade\GeoFacade::setMainPoint([22, 37])
// // diameter in kilo meter
//  ->setDiameter(1000)
// // point to check, do not insert more than one point here.
//  ->setPoint([33, 40])
//  ->isInArea();
//  // the result is true or false
// return $result;
Route::prefix('worker')->group(function () {
    Route::post('/clock-in', [AttendanceController::class,'ClockIn']);
    Route::get('/clock-ins/worker_id={id}', [AttendanceController::class,'WorkerClockIns']);

});
