<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Wavey\Sweetalert\Sweetalert;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin/auth/login');
    }

    public function register()
    {
        return view('admin/auth/regist');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password1' => 'required|string|min:6',
            'password2' => 'required|string|same:password1',            
        ],[
            'fullname.required' => 'The fullname field is required.',
            'username.required' => 'The username field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken. Please use another email address.',
            'password1.required' => 'The password field is required.',
            'password1.min' => 'The password must be at least 6 characters.',
            'password2.required' => 'The password confirmation field is required.',
            'password2.same' => 'The password confirmation does not match.'
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'is_admin' => false,
            'password' => bcrypt($request->password1),
        ]);

        if($user){
            return redirect()->route('login')->with('success', 'User created successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    public function signIn(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid username or password');
        }

        
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
