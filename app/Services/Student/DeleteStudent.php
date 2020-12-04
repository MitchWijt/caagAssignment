<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

use App\Student;

class DeleteStudent {
  private $filePath;

  public function deleteStudent($request, $studentId) {
    $student = Student::findOneById($studentId);
    $student->delete();

    return json_encode(['success' => 'student was successfully deleted']);
  }
}