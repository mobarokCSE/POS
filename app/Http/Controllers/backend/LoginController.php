<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin(){
        return view('backend.auth.login');
    }
    public function loginprocess(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $datacheak=$request->only('email','password');
        
        if (auth()->attempt($datacheak)){
            if(auth()->user()->status==1){
                $notification = array(
                    'message'=>'Login Successfull',
                    'alert-type'=>'success',
                );
                return redirect()->route('dashboard')->with($notification);
            }else{
                return redirect()->route('/');
            }
        }else{
            // session()->flash('error','Username Or Password Does Not Match');
            $notification = array(
                'message'=>'Username Or Password Does Not Match',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);
        } 
    }
    
    // logout
    public function logout(){
        Auth::logout();
        $notification = array(
            'message'=>'Logout Successful',
            'alert-type'=>'success',
        );
        return redirect()->route('/')->with($notification);
    }
    
}