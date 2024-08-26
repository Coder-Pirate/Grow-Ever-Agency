<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function ManagerDashboard(){

        return view('manager.index');

    } //=====End Method ===

    public function ManagerLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/manager/login');
    } // ======== End Method =======

    public function ManagerLogin(){

        return view('manager.manager_login');

    } // =====End Method=======
}
