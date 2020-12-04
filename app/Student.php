<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'students';

    public static function findOneById($id) {
        return Student::select("*")->where('id', $id)->first();
    }
}
