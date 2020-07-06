<?php

namespace App\Http\Controllers\Admin\test;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudentsubmitController extends Controller
{
    public function submittest(Request $request)
    {
    	$data=array();

    	// $input->title = $request->title;
        //$input->description = $request->description;
        //$input->type = $request->type;
    	$data['student_id']=$request->student_id;
    	$data['teacher_id']=$request->teacher_id;
    	$data['test_id']=$request->test_id;
    	//$data['description']=$request->description;
        $image=$request->file('photo');
        if ($image) {
          //	$filename = Str::random(40)
           // $image_name= str_random(5);
             $image_name= Str::random(40);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/test/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $studenttest=DB::table('submittests')
                         ->insert($data);
              if ($studenttest) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
                 'alert-type'=>'success'
                  );

                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
        DB::table('submittests')->insert($data);
      //  dd($data);
        //dd($request->all());
    	/*DB::table('submittests')->insert($data);
    	Session::flash('success', 'Test added successfully!');
        return "success";*/
    	/* Session::flash('success', 'Test updated successfully!');
        return "success";*/
    }
    public function answer()
    {
    	 $data['packages']=DB::table('submittests')->get();
            return view('teacher.test.answer',$data);                    //->paginate(4); 
            // dd($data);
    }
}
