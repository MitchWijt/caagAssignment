<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\FileManager as FileManager;

class StudentEndpointTest extends TestCase
{
    const STUDENT_ID = "5fc0691f22467";
    const STUDENT_DATA_PATH = __DIR__ . '/../../public/data/';
  
    public function testStudentGetRequestReturnsCorrectData() {
        $response = $this->get('/api/student/5fc0691f22467');

        $response->assertStatus(200);
        $this->assertSame($response->getContent(), '{"name":"wesley","age":"18","id":"5fc0691f22467"}');
    }

    public function testStudentGetRequestReturnsNotFound() {
        $response = $this->get('/api/student/123');

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/student/123');

        $response->assertStatus(404);
        $this->assertSame($response->getContent(), '{"error":"Not Found"}');
    }

    public function testStudentPostRequestReturnsCorrectData() {
        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ])->json('POST', '/api/student' , ['name' => 'foo', 'age' => '5']);

        $response->assertStatus(200);
        $jsonResponse = json_decode($response->getContent());
        $expectedJson = json_encode(['id' => $jsonResponse->id, 'name' => 'foo', 'age' => '5']);
        
        $this->assertSame($response->getContent(), $expectedJson);
    }


    public function testStudentPutRequestReturnsCorrectData() {
        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ])->json('PUT', '/api/student/' . static::STUDENT_ID , ['name' => 'bar', 'age' => '10']);

        $response->assertStatus(200);
        $this->assertSame($response->getContent(), '{"name":"bar","age":"10","id":"5fc0691f22467"}');

        $response = $this->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ])->json('PUT', '/api/student/' . static::STUDENT_ID , ['name' => 'wesley', 'age' => '18']);
    }

    static function tearDownAfterClass() : void {
        self::cleanupCreatedFiles();
    }

    private static function cleanupCreatedFiles() {
        $allStudentFiles = scandir(static::STUDENT_DATA_PATH);
        $splicedArray = array_splice($allStudentFiles, 2, count($allStudentFiles));

        foreach($splicedArray as $studentFileName) {
            if($studentFileName !== static::STUDENT_ID . '.json') {
                $filePath = static::STUDENT_DATA_PATH . $studentFileName;
                unlink($filePath);
            }
        }
    }
}
