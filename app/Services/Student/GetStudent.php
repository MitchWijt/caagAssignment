<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class GetStudent {
  public function getStudentJsonData($request) {

    $studentId = $request->id;
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($filePath)) {
      Errors::throw404Error();
    }
 
    $json = json_encode(file_get_contents($filePath, true));

    return json_decode($json);
  }
}