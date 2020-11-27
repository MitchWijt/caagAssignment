<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentEndpointTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/student/5fc0691f22467');
      
        $response->assetStatus(200)->assertJson(['name' => 'wesley', 'age' => 18]);
    }
}
