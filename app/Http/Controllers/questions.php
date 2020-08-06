<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class questions extends Controller
{
    //
    public static function sectionQuestion($secid)
    {
        return \DB::table('questions')->where('section_id',$secid)->get();
    }
    public static function QueAns($qid,$sid)
    {
       return \DB::table('questions')
       ->join('givenans','givenans.que_id','questions.id')
       ->select('questions.*','givenans.*')
       ->where('questions.id',$qid)
       ->where('givenans.submitted_test_id',$sid)
       ->where('givenans.stud_id',Auth::guard('user')->user()->id)
       ->first();
    }
    public static function studSectionQuestion($secid)
    {
        return \DB::table('questions')->where('section_id',$secid)->get();
    }
    public static function studQueAns($qid,$sid,$stud)
    {
       return \DB::table('questions')
       ->join('givenans','givenans.que_id','questions.id')
       ->select('questions.*','givenans.*')
       ->where('questions.id',$qid)
       ->where('givenans.submitted_test_id',$sid)
       ->where('givenans.stud_id',$stud)
       ->first();
    }
}
