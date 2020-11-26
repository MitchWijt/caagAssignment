<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;

class StudentService {
  public function getStudentJsonData($studentId) {

    //add filePath already to some kind of object/array since they are the same for all endpoints
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    //seperate module to handle errors and send them.
    if (!file_exists($filePath)) {
      http_response_code(404);
      return json_encode(["error" => "Not found"]);
    }

    //creage a file manager to handle writing to a file 
    $json = json_encode(file_get_contents($filePath, true));
    return json_decode($json);
  }
}