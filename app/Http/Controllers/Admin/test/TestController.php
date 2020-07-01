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

class TestController extends Controller
{
    //
    public function index(){
        
        // dd(Auth::guard('user')->user()->id);
        $data['packages'] = Test::orderBy('id', 'DESC')->paginate(10);
        return view('teacher.test.index',$data);

    }
    public function store(Request $request)
    {

    //     $inname = make_input_name($request->label);
    //     $inputs = PackageInput::where('language_id', $request->language_id)->get();

        // $messages = [
        //     'options.*.required_if' => 'Options are required if field type is select dropdown/checkbox',
        //     'placeholder.required_unless' => 'The placeholder field is required unless field type is Checkbox'
        // ];

        // $rules = [
        //     'label' => [
        //         'required',
        //         function ($attribute, $value, $fail) use ($inname, $inputs) {
        //             foreach ($inputs as $key => $input) {
        //                 if ($input->name == $inname) {
        //                     $fail("Input field already exists.");
        //                 }
        //             }
        //         },
        //     ],
        //     'placeholder' => 'required_unless:type,3',
        //     'type' => 'required',
        //     'options.*' => 'required_if:type,2,3'
        // ];

    //     $validator = Validator::make($request->all(), $rules, $messages);
    //     if ($validator->fails()) {
    //         $errmsgs = $validator->getMessageBag()->add('error', 'true');
    //         return response()->json($validator->errors());
    //     }
        // dd($request->all());
        $input = new Test;
        $input->title = $request->title;
        $input->description = $request->description;
        $input->type = $request->type;
        $input->teacher_id = Auth::guard('user')->user()->id;
        // $input->label = $request->label;
        // $input->name = $inname;
        // $input->placeholder = $request->placeholder;
        // $input->required = $request->required;
        $input->save();

    //     if ($request->type == 2 || $request->type == 3) {
    //         $options = $request->options;
    //         foreach ($options as $key => $option) {
    //             $op = new PackageInputOption;
    //             $op->package_input_id = $input->id;
    //             $op->name = $option;
    //             $op->save();
    //         }
    //     }

        Session::flash('success', 'Test added successfully!');
        return "success";
    }

    public function Delete(Request $request)
    {
        Test::where('id',$request->input_id)->delete();
        // $input->package_input_options()->delete();
        // $input->delete();
        Session::flash('success', 'Test deleted successfully!');
        return back();
    }
    public function update(Request $request){

        $package = Test::findOrFail($request->package_id);
        
        $package->title = $request->title;
        $package->description = $request->description;
        $package->type = $request->type;
        $package->save();

        Session::flash('success', 'Test updated successfully!');
        return "success";
        
    }

    public function assign(Request $request){


        $data['packages'] = Test::orderBy('id', 'DESC')->paginate(10);
        $data['students'] = user::where('role','Student')->get();
        // dd($data['packages']);

        // foreach($data['packages'] as $package){
        //     $test_id = $package->id;
        //     $user_id = TestUser::where('test_id',$test_id)
        //                                         ->first();                                
        //     $assigned = user::where('id',$user_id)->get();

        // }
        // dd($assigned);
        
        
        // dd($data['students']);
        return view('teacher.test.Assign',$data);
    }


    public function assignTo(Request $request){


        
        $input = TestUser::firstOrNew(array('test_id' => Input::get('package_id')));
 
        $input->user_id = implode(',',$request->students);
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
                                ->join('test_users','tests.id','test_users.test_id')
                                ->paginate(15);
            // dd($data);           
            return view('student.test.index',$data);
        }
}
