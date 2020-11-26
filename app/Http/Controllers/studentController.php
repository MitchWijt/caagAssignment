<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Student\StudentService as StudentService;

class studentController extends Controller
{
    public function studentRequestHandler(Request $request, StudentService $studentService, $studentId) {
        $requestMethod = $request->method();

        switch($requestMethod) {
            case "GET" : return $studentService->getStudentJsonData($studentId);
        }
    }
}
