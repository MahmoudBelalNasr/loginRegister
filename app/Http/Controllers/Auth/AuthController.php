<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.registration');
    }

    public function postLogin(Request $request)
    {
        if (! Auth::attempt(['email'=>$request->input('email') , 'password' =>$request->input('password')])){
            return redirect()->back()->with('error', 'Invalid Credentials !');
        }
        return redirect()->route('home');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
        $error_messages =[
            'name.required' => 'Insert Your Name',
            'name.min' => 'Name Must Contain 4 digit at least',
            'email.required' => 'Insert Your Email',
            'email.email' => 'Insert Right Email',
            'email.unique' => 'Email Already Used',
            'password.required' => 'Insert Your Password',
            'password.min' => 'Password Must Contain 6 digit at least',
            'password.confirmed' => 'Password Do not match, Confirm Your Password',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
        //user login  مفيش هنا اوث يوزر عشان كدا راح على لوجن
        auth()->loginUsingId($user->id);  // بالامر ده خليته اوث وبالتالى كد هيدخل على الهوم بيدج
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
