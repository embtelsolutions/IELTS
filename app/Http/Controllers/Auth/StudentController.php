<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class StudentController extends Controller
{
    //
    public function index(){

        return view('student.dashboard');
    }
}
