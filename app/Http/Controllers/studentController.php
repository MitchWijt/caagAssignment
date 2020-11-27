<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Student\GetStudent as GetStudent;
use App\Services\Student\PutStudent as PutStudent;
use App\Services\Student\PostStudent as PostStudent;
use App\Services\Student\DeleteStudent as DeleteStudent;





class studentController extends Controller
{
    public function studentRequestHandler(
        Request $request, 
        GetStudent $getStudent, 
        PutStudent $putStudent,
        PostStudent $postStudent,
        DeleteStudent $deleteStudent
        ) {
        $requestMethod = $request->method();
        switch($requestMethod) {
            case "GET" : return $getStudent->getStudentJsonData($request);
            case "PUT" : return $putStudent->updateStudentJsonData($request);
            case "POST" : return $postStudent->addNewStudent($request);
            case "DELETE" : return $deleteStudent->deleteStudent($request);
        }
    }
}
