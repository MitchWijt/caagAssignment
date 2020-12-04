<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

use App\Services\FileManager as FileManager;

class StudentEndpointTest extends TestCase
{
    public function testAddingStudentToDatabase() {
        $student = factory(\App\Student::class)->create();
        $this->assertDatabaseHas('students', [
            'name' => $student->name
        ]);
    }
}
