<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Student\StudentService as StudentService;

class studentController extends Controller
{
    public function studentRequestHandler(Request $request, StudentService $studentService) {
        $requestMethod = $request->method();
        switch($requestMethod) {
            case "GET" : return $studentService->getStudentJsonData($request);
            case "PUT" : return $studentService->updateStudentJsonData($request);
            case "POST" : return $studentService->addNewStudent($request);
            case "DELETE" : return $studentService->deleteStudent($request);
        }
    }
}
