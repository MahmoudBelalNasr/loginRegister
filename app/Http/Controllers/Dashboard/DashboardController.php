<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function postLogin(Request $request)
    {
        if (!Auth::guard('admins')->attempt(['email'=>$request->input('email') , 'password' =>$request->input('password')])){
            return redirect()->back()->with('error', 'Invalid Credentials !');
        }
        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
