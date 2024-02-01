<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function staffLogin() {
        return view('staff.login');
    }

    public function staffLoginFunctionality(Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function dashboard() {
        return view('staff.dashboard');
    }

    public function logout() {
        Auth::guard('staff')->logout();
        return redirect()->route('staff.login');
    }
}
