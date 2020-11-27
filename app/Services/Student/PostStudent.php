<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class PostStudent {
  public function addNewStudent($request) {
    $this->validateFormData($request);

    $studentId = uniqid(); //generates a unique ID for student file name
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    $jsonInputData = json_encode(['name' => $request->input('name'), 'age' => $request->input('age')]);
    Filemanager::writeToFile($filePath, $jsonInputData);

    mail(env('TEMP_EMAIL'), 'Student has been created', $jsonInputData);

    return $jsonInputData;
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }
}