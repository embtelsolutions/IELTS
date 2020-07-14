<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Test;
use App\user;
use DB;
class TeacherController extends Controller
{

    //
    public function index(){

        $user = Auth::guard('user')->user()->id;
        $alltest = Test::where('teacher_id','=',$user)->get();
        $submitedtest =DB::table('submittests')  
        ->where('teacher_id','=',$user)
        ->get();
        return view('teacher.dashboard',compact('alltest','submitedtest'));
    }
}
