<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;
use App\Services\Errors as Errors;

use App\Student;

class PostStudent {
  private $filePath;

  public function addNewStudent($request) {
    $this->validateFormData($request);

    $newStudent = new Student();
    $newStudent->name = $request->input('name');
    $newStudent->age = $request->input('age');
    $newStudent->save();

    $student = Student::findOneById($newStudent->id);

    mail(env('TEMP_EMAIL'), 'Student has been created', $student);

    return $student;
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }
}