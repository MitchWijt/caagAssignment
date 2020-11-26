<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function studentRequestHandler(Request $request, $id) {
        echo $id;
    }
}
