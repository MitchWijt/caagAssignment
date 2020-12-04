<?php
namespace App\Services\Student;

use App\Services\Errors as Errors;

use App\Student;

class PutStudent {
  private $name;
  private $age;

  public function updateStudent($request, $studentId) {
    $this->validateFormData($request);
    $this->name = $request->input('name');
    $this->age = $request->input('age');
    
    if(!$studentId) Errors::throw404Error();

    $student = $this->updateStudentinDB($studentId);

    mail(env('TEMP_EMAIL'), 'Student has been updated', $student);

    return redirect('/')->with('success', 'Student has successfully been updated');
  }

  private function validateFormData($request) {
    $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);
  }

  private function updateStudentinDB($id){
    $student = Student::findOneById($id);
    $student->name = $this->name;
    $student->age = $this->age;
    $student->save();

    return $student;
  }
}