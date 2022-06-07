<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('dashboard.admin.login');
    }
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }

    public function home(){
        $companies= Company::query()->count();
        $seekers= Company::query()->count();
        $jobs= Company::query()->count();
        $aya = [100, 50, 57, 56, 61, 58, 0];
        return view('dashboard.admin.home',compact('companies','seekers','jobs','aya'));
    }
}
