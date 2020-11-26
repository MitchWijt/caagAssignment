<?php

namespace App\Services;

class FileManager {
  public static function getStudentFilePathFromStudentId($studentId) {
    return public_path() . "/data/$studentId.json";
  }
}