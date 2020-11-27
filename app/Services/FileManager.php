<?php

namespace App\Services;

class FileManager {
  public static function getStudentFilePathFromStudentId($studentId) {
    return public_path() . "/data/$studentId.json";
  }

  public static function getStudentFilePathFromStudentFileName($fileName) {
    return public_path() . "/data/$fileName";
  }

  public static function getPublicPath() {
    return public_path();
  }

  public static function writeToFile($path, $content) {
    $file = fopen($path, 'w');
    fwrite($file, $content);
    fclose($file);
  }
}