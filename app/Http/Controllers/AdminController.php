<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminLogin() {
        return view('admin.login');
    }

    public function adminLoginFunctionality(Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
