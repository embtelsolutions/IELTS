<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logfile extends Controller
{
    public function create(Request $req)
    {
        $file = $req->file('file');
        return response()->json(array('msg'=>$file),200);
    }
}
