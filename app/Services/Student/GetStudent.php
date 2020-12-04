<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;
use App\Student;

class GetStudent {
  private $filePath;

  public function getStudent($request, $studentId) {
    if(!$studentId) Errors::throw404Error();

    $student = Student::findOneById($studentId);
    return $student;
  }
}