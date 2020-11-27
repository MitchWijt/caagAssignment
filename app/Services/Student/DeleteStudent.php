<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class DeleteStudent {
  private $filePath;

  public function deleteStudent($request) {
    $studentId = $request->id;
    $this->filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($this->filePath)) {
      Errors::throw404Error();
    }

    unlink($this->filePath);

    return json_encode(['success' => 'student was successfully deleted']);
  }
}