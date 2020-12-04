<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Student\GetStudent as GetStudent;
use App\Services\Student\PutStudent as PutStudent;
use App\Services\Student\PostStudent as PostStudent;
use App\Services\Student\DeleteStudent as DeleteStudent;

class StudentController extends Controller {
    
    public function getStudent(Request $request, GetStudent $getStudent, $id) {
        return $getStudent->getStudent($request, $id);
    }

    public function addStudent(Request $request, PostStudent $postStudent){
        return $postStudent->addNewStudent($request);
    }

    public function updateStudent(Request $request, PutStudent $putStudent, $id){
        return $putStudent->updateStudent($request, $id);
    }

    public function deleteStudent(Request $request, DeleteStudent $deleteStudent, $id){
        return $deleteStudent->deleteStudent($request, $id);
    }
}
