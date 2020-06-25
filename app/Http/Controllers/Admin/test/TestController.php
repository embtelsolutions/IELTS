<?php

namespace App\Http\Controllers\Admin\test;

use Illuminate\Http\Request;
use App\Test;
use App\BasicSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Package;
use App\PackageOrder;
use App\Language;
use App\Mail\ContactMail;
use App\PackageInput;
use App\PackageInputOption;
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
}
