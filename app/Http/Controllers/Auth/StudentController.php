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

        $submited_test = DB::table('submittests')
        ->join('users','submittests.student_id','users.id')
        ->join('tests','submittests.test_id','tests.id')
        ->select('submittests.*','users.name','tests.title')
        ->get();

       $user = Auth::guard('user')->user()->id;
    //    $whereData = array(array('name','test') , array('id' ,'!=','5')); 
    //     dd($whereData);

        $mytest  = Test::whereHas( 'test_users',function ($q) use ($user) {
                                    $q->where('user_id', $user);
                                    $q->groupBy('user_id');
                                })
                            ->join('test_users','tests.id','test_users.test_id')
                            ->get();
        return view('student.dashboard',compact('submited_test','mytest'));
    }
}
