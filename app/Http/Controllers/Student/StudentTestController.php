<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\submittedTest;
use App\givenans;
use Auth;
class StudentTestController extends Controller
{
    //
    public function index($id){
        $data=\DB::table('sections')->where('test_id',$id)->orderby('id')->get();
        $module=\DB::table('test_modules')->select('module_type')->where('test_id',$id)->first();
        if($module->module_type=="Writing")
        {
            return view('student.paper.index',['data'=>$data,'test_id'=>$id]);
        }
        else if($module->module_type=="Speaking")
        {
            return view('student.paper.speak',['data'=>$data,'test_id'=>$id]);
        }
    }
    public function submitWritingTest(Request $req)
    {
        $s_test=new submittedTest;
        $s_test->module_id=$req->mod;
        $s_test->test_id= $req->test_id;
        $s_test->stud_id= Auth::guard('user')->user()->id;
        $s_test->asign_to="2";
        $s_test->save();
        $c=count($req->que);
        for($i=0;$i<$c;$i++)
        {
            $gans=new givenans;
            $gans->answer=$req->answer[$i];
            $gans->stud_id=Auth::guard('user')->user()->id;
            $gans->que_id=$req->que[$i];
            $gans->module_id=$req->mod;
            $gans->submitted_test_id=$s_test->id;
            $gans->save();
        }
        return redirect()->route('student.index')->with('success','writing Test submitted Succussfully');
    }

    public function speaking(Request $request){
       
        return view('student.paper.speak');
    }
}
