<?php

namespace App;
use App\user;
use App\Test;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    protected $fillable =  ['id','test_id','user_id','teacher_id'];
    //
}