<?php

namespace App\Http\Controllers\Admin\test;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\user;
use App\Test;
use Validator;
use Session;
class StudentsubmitController extends Controller
{
  public function submittest(Request $request)
  {
      // dd($request->all());
    $user = Auth::guard('user')->user()->id;
    $test_id=$request->package_id;
    //$teacher_id=Test::select('teacher_id')->where('id','=',$test_id)->first();

    $data['student_id']=$user;
   // $data['teacher_id']=$teacher_id->teacher_id;
     $data['teacher_id']=$request->teacher_id;
    $data['test_id']=$test_id;



        $video=$request->file('video');
       // dd($video);
        if ($video) {
          //  $filename = Str::random(40)
           // $image_name= str_random(5);
         $video_name= Str::random(40);
         $ext=strtolower($video->getClientOriginalExtension());
         $video_full_name=$video_name.'.'.$ext;
         $upload_path='public/test/';
         $video_url=$upload_path.$video_full_name;
         $success=$video->move($upload_path,$video_full_name);
         if ($success) {
          $data['video']=$video_url;
          $studenttest=DB::table('submittests')
          ->insert($data);
          Session::flash('success', 'Test submitted successfully!');
          return "success";

        }else{
          Session::flash('warning', 'oOps Error!');
          return Redirect()->back();
        }

       }
      }
      public function answer()
      {
      //   $data=DB::table('submitted_test')
      //   ->join('users','submitted_test.stud_id','users.id')
      //   ->join('submitted_test','submitted_test.id','tests.id')
      //   ->select('submittests.*','users.name','tests.title')
      //   ->get();
      // // return response()->json($data);

      // dd($data);
      $data=\DB::table('submitted_test')
      ->join('questions','questions.module_id','submitted_test.module_id')
      ->join('tests','tests.id','submitted_test.test_id')
      ->join('test_modules','test_modules.test_id','tests.id')
      ->join('questions_type','questions_type.id','questions.que_type_id')
      ->where('asign_to', Auth::guard('user')->user()->id)
      ->where('test_modules.module_type','speaking')
      ->select('questions.id','questions.question','questions_type.type_name')
      ->get();

      foreach($data as $que)
      {
        echo "\n";
        echo ($que->question);
        $answer=\DB::table('givenans')->where('que_id',$que->id)->first();
        echo "\n";
        echo ($answer->answer);
      }
    return response()->json($data);
        return view('teacher.test.answer'); 
      
      
      }


      public function marksupload(Request $request)
      {

         $validatedData = $request->validate([
        'test_id' => 'required|unique:marks|max:5',
        ]);

        $data=array();
        $data['student_id']=$request->student_id; 
        $data['teacher_id']=$request->teacher_id;
        $data['test_id']=$request->test_id;
        $data['marks']=$request->marks;
        DB::table('marks')->insert($data);
        Session::flash('success', 'Marks Submitted successfully!');
          return "success";

        //dd($data);
      }
       public function writingtest(Request $request)
      {
       // dd($request->all());
         $user = Auth::guard('user')->user()->id;
         $data=array();
        $data['student_id']=$user;
        $data['teacher_id']=$request->teacher_id;
        $data['test_id']=$request->test_id;
        $data['answer']=$request->answer;
        //dd($data);
        DB::table('writings')->insert($data);
         Session::flash('success', 'Test Submitted successfully!');
          return "success";
      }
      public function writinganswer()
      {
        //   $data=\DB::table('submitted_test')
        //   ->join('questions','questions.module_id','submitted_test.module_id')
        //   ->join('tests','tests.id','submitted_test.test_id')
        //   ->join('test_modules','test_modules.test_id','tests.id')
        //   ->join('questions_type','questions_type.id','questions.que_type_id')
        //   ->where('asign_to', Auth::guard('user')->user()->id)
        //   ->where('test_modules.module_type','writing')
        //   ->select('questions.id','questions.question','questions_type.type_name')
        //   ->get();

        //   foreach($data as $que)
        //   {
        //     echo "\n";
        //     echo ($que->question);
        //     $answer=\DB::table('givenans')->where('que_id',$que->id)->first();
        //     echo "\n";
        //     echo ($answer->answer);
        //   }
        // return response()->json($data);

      // dd($data);
        return view('teacher.test.writinganswer'); 
      }

       public function writingmarksupload(Request $request)
      {

         $validatedData = $request->validate([
        'test_id' => 'required|unique:marks|max:5',
        ]);

        $data=array();
        $data['student_id']=$request->student_id; 
        $data['teacher_id']=$request->teacher_id;
        $data['test_id']=$request->test_id;
        $data['marks']=$request->marks;
        DB::table('writingmarks')->insert($data);

         Session::flash('success', 'Test Submitted successfully!');
          return "success";

        //dd($data);
      }

      public function writingcheck(){

        return view('teacher.test.writing_check');
      }
    }
