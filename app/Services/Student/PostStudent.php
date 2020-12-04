<?php
namespace App\Services\Student;

use App\Services\Errors as Errors;

use App\Student;

class PostStudent {
  private $name;
  private $age;

  public function addNewStudent($request) {
    $this->validateFormData($request);
    $this->name = $request->input('name');
    $this->age = $request->input('age');

    $existingStudent = Student::findOneByName($this->name);
    if($existingStudent) return redirect('/')->withErrors('Student with this name already exists');

    $newStudent = $this->createNewStudent();
    $student = Student::findOneById($newStudent->id);

    mail(env('TEMP_EMAIL'), 'Student has been created', $student);

    return redirect('/')->with('success', 'Student has successfully been created');
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }

  private function createNewStudent(){
    $newStudent = new Student();
    $newStudent->name = $this->name;
    $newStudent->age = $this->age;
    $newStudent->save();

    return $newStudent;
  }
}

