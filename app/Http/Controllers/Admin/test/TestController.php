<?php

namespace App\Http\Controllers\Admin\test;

use Illuminate\Http\Request;
use App\Test;
use App\TestUser;
use App\user;
use App\BasicSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Package;
use App\PackageOrder;
use App\Language;
use App\Mail\ContactMail;
use App\PackageInput;
use App\PackageInputOption;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Validator;
use Session;
use Auth;

use DB;
class TestController extends Controller
{
    //
    public function index(){
  
         //dd(Auth::guard('user')->user()->id);
        $data['packages'] = Test::orderBy('id', 'DESC')->paginate(10);

        return view('teacher.test.index',$data);
        //return response('success');

    }
    public function store(Request $request)
    {

    
        $input = new Test;
        $input->title = $request->title;
        $input->description = $request->description;
        $input->type = $request->type;
        $input->teacher_id = Auth::guard('user')->user()->id;
        if($input->type == 'writing')
        {
           $input->timer = $request->timer;
           $input->save();
           Session::flash('success', 'Test added successfully!');
           return "success";
          // dd($input);
        }else{
        
        $input->save();

        Session::flash('success', 'Test added successfully!');
        return "success";
        }

    }

    public function Delete(Request $request)
    {
        // dd($request->all());
        Test::where('id',$request->package_id)->delete();
        // $input->package_input_options()->delete();
        // $input->delete();
        Session::flash('success', 'Test deleted successfully!');
        return back();
    }
    public function update(Request $request){
        // dd($request->all());
        $package = Test::findOrFail($request->package_id);
        
        $package->title = $request->title;
        $package->description = $request->description;
        $package->type = $request->type;
        // $package->type = $request->time;
        if($package->type == 'writing'){
           $package->timer = $request->time;
        //    dd($request->time);
           Session::flash('success', 'Test added successfully!');
           return "success";
        }
        $package->save();
        Session::flash('success', 'Test updated successfully!');
        return "success";
        

        
    }

    public function assign(Request $request){


        $data['packages'] = Test::orderBy('id', 'DESC')->paginate(10);
        $data['students'] = user::where('role','Student')->get();
        
        return view('teacher.test.Assign',$data);
    }


    public function assignTo(Request $request)
    {

        $input = TestUser::firstOrNew(array('test_id' => Input::get('package_id')));
        $array = $request->students;
        $input->user_id = json_encode($array);
        $input->teacher_id = Auth::guard('user')->user()->id;
        $input->save();
         
        Session::flash('success', 'Test Assigned successfully!');
        return "success";

    }

        public function mytest(Request $request){

            $user = Auth::guard('user')->user()->id;
            // $data['packages'] = TestUser::whereIn('user_id',[$user])
            //                     ->join('tests','test_users.test_id','tests.id')
            //                     ->get();
            $data['packages'] = Test::whereHas( 'test_users',function ($q) use ($user) {
                                        $q->where('user_id', $user);
                                        $q->groupBy('user_id');
                                    })
                               // ->where('type','=','speaking')
                                ->join('test_users','tests.id','test_users.test_id')

                                ->paginate(15);
            // dd($data);   
           // return response()->json($data);        
            return view('student.test.index',$data);
        }


public function speaking(Request $request)
{
    $user = Auth::guard('user')->user()->id;
    // $datas = TestUser::select('user_id')->get()->toArray();
    // foreach ($datas as $data){
    //     $data;
    // }
    
            $data['packages'] = Test::whereHas( 'test_users',function ($q) use ($user) {
                                        $q->where('user_id', $user);
                                        $q->groupBy('user_id');
                                    })
                                ->join('test_users','tests.id','test_users.test_id')
                                ->where('type','=','speaking')
                               // ->join('submittests','tests.id','submittests.test_id')
                                ->paginate(15);
            // dd($data);           
            return view('student.test.speaking',$data);
}
public function reading(Request $request)
{
     $user = Auth::guard('user')->user()->id;
          
            $data['packages'] = Test::whereHas( 'test_users',function ($q) use ($user) {
                                        $q->where('user_id', $user);
                                        $q->groupBy('user_id');
                                    })
                                ->where('type','=','reading')
                                ->join('test_users','tests.id','test_users.test_id')
                                ->paginate(15);
            return view('student.test.reading',$data);
}

public function writing(Request $request)
{
     $user = Auth::guard('user')->user()->id;

    $data['packages'] = Test::whereHas( 'test_users',function ($q) use ($user) {
                                        $q->where('user_id', $user);
                                        $q->groupBy('user_id');
                                    })
                                ->where('type','=','writing')
                                ->join('test_users','tests.id','test_users.test_id')
                                ->paginate(15);
            // dd($data['packages']);           
            return view('student.test.writing',$data);
}

public function listening(Request $request)
{
     $user = Auth::guard('user')->user()->id;
            // $data['packages'] = TestUser::whereIn('user_id',[$user])
            //                     ->join('tests','test_users.test_id','tests.id')
            //                     ->get();
            $data['packages'] = Test::whereHas( 'test_users',function ($q) use ($user) {
                                        $q->where('user_id', $user);
                                        $q->groupBy('user_id');
                                    })
                                ->where('type','=','listening')
                                ->join('test_users','tests.id','test_users.test_id')

                               // ->join('submittests','tests.id','submittests.test_id')
                                ->paginate(15);
                               
            // dd($data);           
            return view('student.test.listening',$data);
}





    public function alltest(Request $request)
    {
        $user = Auth::guard('user')->user()->id;
        $data= DB::table('submittests')
                ->join('users','submittests.student_id','users.id')
                ->join('tests','submittests.test_id','tests.id')
                ->select('submittests.*','users.name','tests.title')
                ->where('student_id','=',$user)
                ->get();

        return view('student.test.exam',compact('data'));
                            
    }
}
