<?php
namespace App\Services\Student;

use App\Services\FileManager as FileManager;

class StudentService {
  public function getStudentJsonData($request) {

    $studentId = $request->id;
    //add filePath already to some kind of object/array since they are the same for all endpoints
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    //seperate module to handle errors and send them.
    if (!file_exists($filePath)) {
      http_response_code(404);
      return json_encode(["error" => "Not found"]);
    }

    //creage a file manager to handle writing to a file 
    $json = json_encode(file_get_contents($filePath, true));
    return json_decode($json);
  }

  public function addNewStudent($request) {
    $validatedData = $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);

    $studentId = uniqid();
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    $newStudentFile = fopen($filePath, 'w');
    $json = json_encode(['name' => $request->input('name'), 'age' => $request->input('age')]);
    fwrite($newStudentFile, $json);
    fclose($newStudentFile);

    mail('nenoli6112@58as.com', 'Student has been created', $json);
    return $json;
  }

  public function updateStudentJsonData($request) {
    $validatedData = $request->validate([
      'name' => 'required|min:2',
      'age' => 'required|numeric',
    ]);

    $studentId = $request->id;
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    //seperate module to handle errors and send them.
    if (!file_exists($filePath)) {
      http_response_code(404);
      return json_encode(["error" => "Not found"]);
    }

    $jsonData = json_decode($this->getStudentJsonData($request));
    $jsonData->name = $request->input('name');
    $jsonData->age = $request->input('age');
    
    $studentFile = fopen($filePath, 'w');
    $json = json_encode($jsonData);
    fwrite($studentFile, $json);
    fclose($studentFile);

    mail('nenoli6112@58as.com', 'Student has been updated', $json);
    return $json;
  }

  public function deleteStudent($request) {
    $studentId = $request->id;
    $filePath = FileManager::getStudentFilePathFromStudentId($studentId);

    if (!file_exists($filePath)) {
      http_response_code(404);
      return json_encode(["error" => "Not found"]);
    }

    unlink($filePath);
    return json_encode(['success' => 'student was successfully deleted']);
  }
}