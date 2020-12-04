<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'students';

    public static function findOneById($id) {
        return Student::select("*")->where('id', $id)->first();
    }

    public static function findOneByName($name) {
        return Student::select("*")->where('name', $name)->first();
    }
}
