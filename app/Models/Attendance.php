<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Worker;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable  = ['clock_in','clock_out'];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}