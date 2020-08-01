<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test; 
use App\module;
use App\test_section;
use Validator;
use App\question;
use App\options;
use App\answer;

class TestController extends Controller
{
    public function listen(){
        // dd(';hello');
        return view('admin.Test.create');
    }
    public function write(){
        // dd(';hello');
        return view('admin.Test.create-writing');

    }
    public function newtest(Request $req)
    {   
        $validatedData = $req->validate([
            'title'=>'required',
            'test_time'=>'required',
            'inst_test'=>'required',
            'module_type'=>'required',
            'sec1audiofile'=>'required|mimes:mpga',
            'sec2audiofile'=>'required|mimes:mpga',
            'sec3audiofile'=>'required|mimes:mpga,wav',
            'sec4audiofile'=>'required|mimes:mpga',
            'sec1time'=>'required|date_format:H:i:s',
            'sec2time'=>'required|date_format:H:i:s',
            'sec3time'=>'required|date_format:H:i:s',
            'sec4time'=>'required|date_format:H:i:s',
            'sec1_que.*'=>'required',
            'sec2_que.*'=>'required',
            'sec3_que.*'=>'required',
            'sec4_que.*'=>'required',
            'sec1_ans.*'=>'required',
            'sec2_ans.*'=>'required',
            'sec3_ans.*'=>'required',
            'sec4_ans.*'=>'required',
            'sec1_mcq.*'=>'required',
            'sec2_mcq.*'=>'required',
            'sec3_mcq.*'=>'required',
            'sec4_mcq.*'=>'required',
        ]);
        $test=new Test;
        $test->title=$req->title;
        $test->test_type='Practice';
        $test->time_limit=$req->test_time;
        $test->instruction=$req->inst_test;
        $test->ins_id=1;
        $test->save();

        $test_id=$test->id; 
        $module = new module;
        $module->test_id=$test_id;
        $module->module_type=$req->module_type;
        $module->save();
        $module_id=$module->id;
        

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section A";
        $section->instruction=$req->instr_sec1;
        $section->module_id=$module_id;
        $section->time=$req->sec1time;
        if($file = $req->file('sec1audiofile')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_topic=$name;
            }
        }
        $section->save();
        $sec1id=$section->id;
        $c=count($req->sec1_que);
        for($i=0;$i<$c;$i++)
        {
            $question=new question;
            $question->section_id=$sec1id;
            $question->que_type=$req->sec1_qtype[$i];
            $question->question=$req->sec1_que[$i];
            $question->module_id=$module_id;    
            $question->save();
            $qid=$question->id;
            if($req->sec1_qtype[$i]=='MCQ')
            {
                $option = new options;
                $option->question_id=$qid;
                $option->option_value=$req->sec1_mcq[$i];
                $option->save();
            }
            $ans=new answer;
            $ans->question_id=$qid;
            $ans->answer=$req->sec1_ans[$i];
            $ans->save();

        }

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section B";
        $section->instruction=$req->instr_sec2;
        $section->module_id=$module_id;
        $section->time=$req->sec2time;
        if($file = $req->file('sec2audiofile')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_topic=$name;
            }
        }
        $section->save();
        $sec2id=$section->id;
        $c=count($req->sec2_que);
        for($i=0;$i<$c;$i++)
        {
            $question=new question;
            $question->section_id=$sec2id;
            $question->que_type=$req->sec2_qtype[$i];
            $question->question=$req->sec2_que[$i];
            $question->module_id=$module_id;    
            $question->save();
            $qid=$question->id;
            if($req->sec2_qtype[$i]=='MCQ')
            {
                $option = new options;
                $option->question_id=$qid;
                $option->option_value=$req->sec2_mcq[$i];
                $option->save();
            }
            $ans=new answer;
            $ans->question_id=$qid;
            $ans->answer=$req->sec2_ans[$i];
            $ans->save();

        }
        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section C";
        $section->instruction=$req->instr_sec3;
        $section->module_id=$module_id;
        $section->time=$req->sec3time;
        if($file = $req->file('sec3audiofile')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_topic=$name;
            }
        }
        $section->save();
        $sec3id=$section->id;
        $c=count($req->sec3_que);
        for($i=0;$i<$c;$i++)
        {
            $question=new question;
            $question->section_id=$sec3id;
            $question->que_type=$req->sec3_qtype[$i];
            $question->question=$req->sec3_que[$i];
            $question->module_id=$module_id;    
            $question->save();
            $qid=$question->id;
            if($req->sec3_qtype[$i]=='MCQ')
            {
                $option = new options;
                $option->question_id=$qid;
                $option->option_value=$req->sec3_mcq[$i];
                $option->save();
            }
            $ans=new answer;
            $ans->question_id=$qid;
            $ans->answer=$req->sec3_ans[$i];
            $ans->save();

        }

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section D";
        $section->instruction=$req->instr_sec4;
        $section->module_id=$module_id;
        $section->time=$req->sec4time;
        if($file = $req->file('sec4audiofile')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_topic=$name;
            }
        }
        $section->save();
        $sec4id=$section->id;
        $c=count($req->sec4_que);
        for($i=0;$i<$c;$i++)
        {
            $question=new question;
            $question->section_id=$sec4id;
            $question->que_type=$req->sec4_qtype[$i];
            $question->question=$req->sec4_que[$i];
            $question->module_id=$module_id;    
            $question->save();
            $qid=$question->id;
            if($req->sec4_qtype[$i]=='MCQ')
            {
                $option = new options;
                $option->question_id=$qid;
                $option->option_value=$req->sec4_mcq[$i];
                $option->save();
            }
            $ans=new answer;
            $ans->question_id=$qid;
            $ans->answer=$req->sec4_ans[$i];
            $ans->save();

        }


        
        return redirect()->route('admin.dashboard')->with('success','Listening Test Created Succussfully');


    }

    public function speak(){
        // dd(';hello');
        return view('admin.Test.create-speaking');

        // return back()->with('success','Listening Test Created Succussfully');
    }
    public function writing(Request $req)
    {
        $validatedData = $req->validate([
            'title'=>'required',
            'test_time'=>'required|date_format:H:i:s',
            'inst_test'=>'required',
            'module_type'=>'required',
            
            'sec1_time'=>'required|date_format:H:i:s',
            'sec2_time'=>'required|date_format:H:i:s',
            'sec1_que'=>'required|min:5',
            'sec2_que'=>'required|min:5',
            'sec1_topic'=>'required|min:5',
            'sec2_topic'=>'required|min:5',
            'sec1_instr'=>'required|min:5',
            'sec2_instr'=>'required|min:5',

        ],[
            'title.required'=>'Please enter test title',
            'test_time.required'=>'Please enter Test time limit',
            'test_time.date_format'=>'Time limit should be in (hh:mm:ss) formate',
            'sec1_time.*'=>'Please Enter time limit in given formate',
            'sec2_time.*'=>'Please Enter time limit in given formate',
            'inst_test.*'=>'Please Enter Test instructions',
            'sec1_que.required'=>'Please Enter question',
            'sec2_que.required'=>'Please Enter question',
            'sec1_topic.required'=>'Please Enter Topic',
            'sec2_topic.required'=>'Please Enter Topic',
            'sec1_instr.required'=>'Please Enter Instructions for this section',
            'sec2_instr.required'=>'Please Enter Instructions for this section',
            
        ]);
        $test=new Test;
        $test->title=$req->title;
        $test->test_type='Practice';
        $test->time_limit=$req->test_time;
        $test->instruction=$req->inst_test;
        $test->ins_id=1;
        $test->save();

        $test_id=$test->id; 
        $module = new module;
        $module->test_id=$test_id;
        $module->module_type=$req->module_type;
        $module->save();
        $module_id=$module->id;
        

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section A";
        $section->instruction=$req->sec1_instr;
        $section->module_id=$module_id;
        $section->time=$req->sec1_time;
        $section->sec_topic=$req->sec1_topic;
        if($file = $req->file('sec1_img')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_file=$name;
            }
        }
        $section->save();
        $sec1id=$section->id;

        $question=new question;
        $question->section_id=$sec1id;
        $question->question=$req->sec1_que;
        $question->module_id=$module_id;    
        $question->save();

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section B";
        $section->instruction=$req->sec2_instr;
        $section->module_id=$module_id;
        $section->time=$req->sec2_time;
        $section->sec_topic=$req->sec2_topic;
        if($file = $req->file('sec2_img')) {

            $name = time().$file->getClientOriginalname();
            
            $target_path = public_path('/public/test');
            
            if($file->move($target_path, $name)) {
                $section->sec_file=$name;
            }
        }
        $section->save();
        $sec2id=$section->id;
        $question=new question;
        $question->section_id=$sec2id;
        $question->question=$req->sec2_que;
        $question->module_id=$module_id;    
        $question->save();
        return redirect()->route('admin.dashboard')->with('success','writing Test Created Succussfully');
    }
    public function newSpeaking(Request $req)
    {
        $validatedData = $req->validate([
            'title'=>'required',
            'test_time'=>'required|date_format:H:i:s',
            'inst_test'=>'required',
            'module_type'=>'required',
            
            'sec1_time'=>'required|date_format:H:i:s',
            'sec2_time'=>'required|date_format:H:i:s',
            'sec3_time'=>'required|date_format:H:i:s',

            'sec1_dis_topic'=>'required|min:5',
            'sec2_dis_topic'=>'required|min:5',
            'sec3_dis_topic'=>'required|min:5',
            
            'sec1_inst'=>'required|min:5',
            'sec2_inst'=>'required|min:5',
            'sec3_inst'=>'required|min:5',

        ],[
            'title.required'=>'Please enter test title',
            'test_time.required'=>'Please enter Test time limit',
            'test_time.date_format'=>'Time limit should be in (hh:mm:ss) formate',
            'inst_test.*'=>'Please Enter Test instructions',
            'sec1_time.*'=>'Please Enter time limit in given formate',
            'sec2_time.*'=>'Please Enter time limit in given formate',
            'sec3_time.*'=>'Please Enter time limit in given formate',
            'sec1_dis_topic.required'=>'Please Enter Discussion Topic',
            'sec2_dis_topic.required'=>'Please Enter Discussion Topic',
            'sec3_dis_topic.required'=>'Please Enter Discussion Topic',
            'sec1_inst.required'=>'Please Enter Instructions for this section',
            'sec2_inst.required'=>'Please Enter Instructions for this section',
            'sec3_inst.required'=>'Please Enter Instructions for this section',
        ]);
        $test=new Test;
        $test->title=$req->title;
        $test->test_type='Practice';
        $test->time_limit=$req->test_time;
        $test->instruction=$req->inst_test;
        $test->ins_id=1;
        $test->save();

        $test_id=$test->id; 
        $module = new module;
        $module->test_id=$test_id;
        $module->module_type=$req->module_type;
        $module->save();
        $module_id=$module->id;
        

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section A";
        $section->instruction=$req->sec1_inst;
        $section->module_id=$module_id;
        $section->time=$req->sec1_time;
        
        $section->save();
        $sec1id=$section->id;

        $question=new question;
        $question->section_id=$sec1id;
        $question->question=$req->sec1_dis_topic;
        $question->module_id=$module_id;    
        $question->save();

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section B";
        $section->instruction=$req->sec2_inst;
        $section->module_id=$module_id;
        $section->time=$req->sec2_time;
        
        $section->save();
        $sec2id=$section->id;

        $question=new question;
        $question->section_id=$sec2id;
        $question->question=$req->sec2_dis_topic;
        $question->module_id=$module_id;    
        $question->save();

        $section=new test_section;
        $section->test_id=$test_id;
        $section->name="Section C";
        $section->instruction=$req->sec3_inst;
        $section->module_id=$module_id;
        $section->time=$req->sec3_time;
        
        $section->save();
        $sec3id=$section->id;

        $question=new question;
        $question->section_id=$sec3id;
        $question->question=$req->sec3_dis_topic;
        $question->module_id=$module_id;    
        $question->save();
        
        return redirect()->route('admin.dashboard')->with('success','Speaking Test Created Succussfully');
    }
}
