<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class PutStudent {
  public function updateStudentJsonData($request) {
    $this->validateFormData($request);
    
    $studentId = $request->id;
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($filePath)) {
      Errors::throw404Error();
    }

    $json = json_encode(file_get_contents($filePath, true));
    $jsonData->name = $request->input('name');
    $jsonData->age = $request->input('age');
    
    Filemanager::writeToFile($filePath, json_encode($jsonData));

    mail(env('TEMP_EMAIL'), 'Student has been updated', $json);

    return $json;
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }
}