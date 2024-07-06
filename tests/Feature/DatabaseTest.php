<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Worker;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_worker_database()
    {
        // Worker::factory()->count(3)->create();
        // $this->assertDatabaseCount('workers', 3);
    }
}
