<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\user;
use App\Test;
class StudentController extends Controller
{
    //
    public function index(){

        $submited_test = DB::table('submitted_test')
        ->where('stud_id', Auth::guard('user')->user()->id)
        ->get();

       $user = Auth::guard('user')->user()->id;
    
        // $mytest  = Test::whereHas( 'test_users',function ($q) use ($user) {
        //                             $q->where('user_id', $user);
        //                             $q->groupBy('user_id');
        //                         })
        //                     ->join('test_users','tests.id','test_users.test_id')
        //                     ->get();
        return view('student.dashboard',compact('submited_test'));
    }
    public function history()
    {
        $submited_test = DB::table('submitted_test')
        ->join('tests','tests.id','submitted_test.test_id')
        
        ->join('users','users.id','submitted_test.asign_to')
        ->where('stud_id', Auth::guard('user')->user()->id)
        ->select('users.*','tests.*','tests.id as testid','submitted_test.*','submitted_test.id as sid')
        ->get();
            return view('student.history',['data'=>$submited_test]);
        
    }
    public function modules($testid,$sid)    
    {
        $module=\DB::table('test_modules')->where('test_id',$testid)->get();
        // dd($module);
        if(count($module)>0)
        {
            return view('student.TestModule',['data'=>$module,'sid'=>$sid]);
        }
    }
    public function sections($Modid,$sid)
    {
        $section =\DB::table('sections')->where('test_id',$Modid)->get();
        if(count($section)>0)
        {
            return view('student.sectionWise',['data'=>$section,'sid'=>$sid]);
        }
        
    }
}
