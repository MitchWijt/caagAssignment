<?php
namespace App\Services\Student;

use App\Services\Errors as Errors;

use App\Student;

class DeleteStudent {
  public function deleteStudent($request, $studentId) {
    $student = Student::findOneById($studentId);
    if(!$student) return redirect('/')->withErrors('Could not find students with this ID');

    $student->delete();
    return redirect('/')->with('success', 'Student has successfully been deleted');
  }
}