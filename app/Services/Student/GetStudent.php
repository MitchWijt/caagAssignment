<?php
namespace App\Services\Student;

use App\Services\Errors as Errors;
use App\Student;

class GetStudent {
  public function getStudent($request, $studentId) {
    if(!$studentId) Errors::throw404Error();

    $student = Student::findOneById($studentId);

    if(!$student) return redirect('/')->withErrors('Could not find students with this ID');
    return $student;
  }
}