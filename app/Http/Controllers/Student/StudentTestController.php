<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentTestController extends Controller
{
    //
    public function index(){
        return view('student.paper.index');
    }
}
