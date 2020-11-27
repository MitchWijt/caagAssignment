<?php

namespace App\Services;

class Errors {
  public static function throw404Error() {
    abort(404);
  }
}