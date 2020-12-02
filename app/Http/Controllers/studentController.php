<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Student\GetStudent as GetStudent;
use App\Services\Student\PutStudent as PutStudent;
use App\Services\Student\PostStudent as PostStudent;
use App\Services\Student\DeleteStudent as DeleteStudent;

class StudentController extends Controller {
    
    public function show(Request $request, GetStudent $getStudent, $id) {
        return $getStudent->getStudentJsonData($request, $id);
    }

    public function store(Request $request, PostStudent $postStudent){
        return $postStudent->addNewStudent($request);
    }

    public function update(Request $request, PutStudent $putStudent, $id){
        return $putStudent->updateStudentJsonData($request, $id);
    }

    public function destroy(Request $request, DeleteStudent $deleteStudent, $id){
        return $deleteStudent->deleteStudent($request, $id);
    }
}
