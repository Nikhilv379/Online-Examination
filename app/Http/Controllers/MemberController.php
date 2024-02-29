<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    //
    function show()
    {
        $data= User::all();
        return view('list',['users'=>$data]);
    }
}
