<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //

    public function listen(){
        // dd(';hello');
        return view('admin.Test.create');
    }
    public function write(){
        // dd(';hello');
        return view('admin.Test.create-writing');
    }
    public function speak(){
        // dd(';hello');
        return view('admin.Test.create-speaking');
    }
}
