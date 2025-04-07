<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Auth;

class AuthController extends Controller
{

public function login(){
   
 return view('auth.login');
}

public function login_post(Request $request)
{
    //dd($request->all());

    $remember = !empty($request->remember) ? true : false;

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
     {
        if(Auth::user()->is_admin == 0)
        {
            return redirect('user/dashboard');
        }
        else if(Auth::user()->is_admin == 1)
        {
            return redirect('admin/dashboard');
        }
        else if(Auth::user()->is_admin == 2)
        {
            return redirect('vendor/dashboard');
        }
     }else{
        return redirect()->back()->with('error', 'please enter correct email and password');
     }
}

public function register(){
   
    return view('auth.register');
}
public function register_post(Request $request)
    {
      
       //dd($request->all());

       $user = request()->validate([

        'name' => 'required',
        'email' =>'required|unique:users',
        'password' => 'required|min:8',
        'confirm_password' => 'required_with:password|same:password|min:8'
       ]);
         
       
 
     try {
     $user= new User;
     $user->name = trim($request->name);
     $user->last_name = trim($request->last_name);
     $user->email = trim($request->email);
     $user->mobile = trim($request->mobile);
     $user->address = trim($request->address);
     $user-> password = Hash::make($request->password);
     $user->remember_token= Str::random(50);
     $user->status = 0;
     $user->is_admin = 0;
     $user->save();

    
     return redirect('/')->with('success','Register successfully.');
 }
 catch (\Exception $e) {
     // Handle any errors that occur during save
     return redirect()->back()->with('error', 'Something went wrong. Please try again.');
 }

}
      
public function logout()
{
    Auth::logout();
    return redirect(url(''));
}
       }

?>