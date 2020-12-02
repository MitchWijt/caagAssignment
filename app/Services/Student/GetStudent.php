<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class GetStudent {
  private $filePath;

  public function getStudentJsonData($request, $studentId) {
    if(!$studentId) Errors::throw404Error();

    $this->filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($this->filePath)) {
      Errors::throw404Error();
    }
 
    $json = json_encode(file_get_contents($this->filePath, true));

    return json_decode($json);
  }
}