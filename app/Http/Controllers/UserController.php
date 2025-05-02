<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AMCModel;
use App\Models\User;
use Mail;
use App\Mail\UserRegisterMail;
use Str;
use File;

class UserController extends Controller
{
 public function user_list(Request $request)
 {
     $data['getrecode'] = User::get_record_user($request);
    return view('admin.user.list', $data);
 }

 public function user_add (Request $request)
 {
    $data['getAMC'] = AMCModel::get_record_delete();
    return view('admin.user.add',$data);
 }

 public function user_store(Request $request)
 {
    //dd($request->all());
    $user = request()->validate([
       'name' => 'required',
       'email' => 'required|unique:users',
       'amc_id' => 'required',
       'mobile' => 'required',

    ]);

     $DataAmc = AMCModel::where('id', '=', $request->amc_id)->first();

     $UserDesc = User::orderBy('id', 'DESC')->where('amc_id', '=', $request->amc_id)->first();


    $user = new User;
    $user->name        = trim($request->name);
    $user->last_name   = trim($request->last_name);
    $user->email       = trim($request->email);
    $user->mobile      = trim($request->mobile);
    $user->address     = trim($request->address );
    $user->amc_business_category_name = trim($request->amc_business_category_name);

    if(!empty($request->file('profile')))
    {
        $file      =$request->file('profile');
        $randomStr =Str::random(30);
        $filename  =$randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/profile/', $filename);
        $user->profile = $filename;

    }
      
    if(!empty($UserDesc))
    {
        $user->account_number = (int)$UserDesc->account_number + 1;
    }else{
        $user->account_number = trim( $DataAmc->series);
    }

    $user->amc_id = trim($request->amc_id);
    $user->is_admin = 0;
    $user->user_type = 'user';
    $user->remember_token = Str::random(50);
    $user->forgot_token = Str::random(50);
    $user->save();

    $this->send_user_verification_mail($user);

    return redirect('admin/user/list')->with('success', 'User successfully register.');
 }

 public function send_user_verification_mail($user)
 {
    Mail::to( $user->email)->send(new UserRegisterMail($user));
 }
}