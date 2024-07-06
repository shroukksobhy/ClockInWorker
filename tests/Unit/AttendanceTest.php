<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Worker;
use Validator;
use Illuminate\Http\Request;

class AttendanceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
        //Worker::factory()->count(10)->create();
    }
    public function test_get_attendance_list()
    {
        $response = $this->get('/api/worker/clock-ins/worker_id=1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                '*' => ['id', 'worker_id', 'clock_in', 'clock_out']
        ]);
    }
    public function test_post_clockIn()
    {
        $request = '/api/worker/clock-in';

        $body = [
            'worker_id'  => "1",
            'latitude' => '30.049326954219122',
            'longitude'      => '31.24030256551094'
        ];
        $response = $this->post($request, $body);
        $response->assertStatus(200);

    }
}
