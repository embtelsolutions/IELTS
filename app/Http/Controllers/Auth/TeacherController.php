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
        $tid=Auth::guard('user')->user()->id;
        $pendding=\DB::table('submitted_test')->where([['asign_to',$tid],['isChecked',0]])->count();
        // dd($pendding);
        $assign=\DB::table('test_users')->where('teacher_id',$tid)->count();
        return view('teacher.dashboard',['pendding'=>$pendding,'assign'=>$assign]);
    }
}
