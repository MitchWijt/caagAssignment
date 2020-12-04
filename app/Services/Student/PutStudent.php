<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

use App\Student;

class PutStudent {
  private $filePath;

  public function updateStudentJsonData($request, $studentId) {
    $this->validateFormData($request);
    
    if(!$studentId) Errors::throw404Error();

    $student = Student::findOneById($studentId);
    $student->name = $request->input('name');
    $student->age = $request->input('age');
    $student->save();

    mail(env('TEMP_EMAIL'), 'Student has been updated', $student);

    return $student;
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }
}