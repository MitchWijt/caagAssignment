<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class DeleteStudent {
  public function deleteStudent($request) {
    $studentId = $request->id;
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($filePath)) {
      Errors::throw404Error();
    }

    unlink($filePath);

    return json_encode(['success' => 'student was successfully deleted']);
  }
}