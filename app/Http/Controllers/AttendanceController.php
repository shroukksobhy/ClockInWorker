<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Worker;
use Validator;
use  GeoFence;
// use KMLaravel\GeographicalCalculator\Facade\GeoFacade;
use Geocoder\Laravel\Facades\Geocoder;
use Geocoder\Model\Address;
use KMLaravel\GeographicalCalculator\Facades\GeoFacade;

class AttendanceController extends Controller
{
    public function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {

        $theta = $lng1 - $lng2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        $distance = ($miles * 1.609344);
        return $distance;
    }
    public function ClockIn(Request $request)
    {
        // $worker = Worker::find(1);
        // $attendance = new Attendance([
        //     'clock_in' => now(),
        //     'clock_out' => null,
        // ]);
        // $worker->attendance()->save($attendance);
        // $this->calculateDistance();
        // OFFICE LAT & LNG =30.04963440420605, 31.240231498152287
        $lat1 = $request['latitude'];
        $lng1 = $request['longitude'];

        $officeLat = '30.04963440420605';
        $officeLng = '31.240231498152287';

        $distance = $this->calculateDistance($lat1, $lng1, $officeLat, $officeLng);
        $validator = Validator::make($request->all(), [
            'worker_id' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:0,99.99',
            'longitude' => 'required|numeric|between:0,99.99'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $inArea = $distance < 2.0 ? true : false;
        if($inArea === false) {
            return response()->json(["error" => "Not in the area"], 422);
        }
        $worker = Worker::find($request['worker_id']);
        $attendance = new Attendance([
            'worker_id' => $request['worker_id'],
            'clock_in' => now(),
            'clock_out' => null,
        ]);

        $worker->attendance()->save($attendance);
        return "Clock in is Recorded";
    }


    public function WorkerClockIns($id)
    {
        $worker = Worker::findOrFail($id);
        $worker_attendance = $worker->attendance()->get();
        return response()->json($worker_attendance);

    }

}