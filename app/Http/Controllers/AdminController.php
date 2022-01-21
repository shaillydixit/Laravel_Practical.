<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogin(){
        return view('admin.login_form');
    }

    public function Login(Request $request){
        // dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successfull');
        }else{
            return back()->with('error', 'Invalid email and password');
        }
    }

    public function AdminDashboard(){
        $userdata = User::all();
        return view('admin.index', compact('userdata'));
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login.form')->with('error', 'Admin Logout Successfully');
    }

    public function AdminRegister(){
        return view('admin.register');
    }

    public function RegisterCreate(Request $request){
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('login.form')->with('success', 'Admin Added Successfully');
    }

    public function Approve($id){
        User::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'User Approved Successfully');
    }

    public function Delete($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

}
