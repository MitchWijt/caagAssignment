<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

class PutStudent {
  private $filePath;

  public function updateStudentJsonData($request, $studentId) {
    $this->validateFormData($request);
    
    if(!$studentId) Errors::throw404Error();

    $this->filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($this->filePath)) {
      Errors::throw404Error();
    }

    $decodedJsonObject = json_decode(file_get_contents($this->filePath, true));
    $decodedJsonObject->name = $request->input('name');
    $decodedJsonObject->age = $request->input('age');

    $json = json_encode($decodedJsonObject);
    
    Filemanager::writeToFile($this->filePath, $json);

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