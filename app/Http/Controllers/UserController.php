<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index(){

        $hoemdata = Home::all();
        return view('frontend.index');


    }// =======End Method======

    // public function UserLogin()
    // {


    //     return view('user.manager_login');
    // } // =====End Method=======
}
