<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class TeacherController extends Controller
{

    //
    public function index(){

        return view('teacher.dashboard');
    }
}
