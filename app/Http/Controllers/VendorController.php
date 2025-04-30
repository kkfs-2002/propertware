<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VendorTypeModel;
use App\Models\CategoryModel;
use App\Models\User;
use Str;
use Auth;

class VendorController extends Controller
{
 public function vendor_list(Request $request)
 {
    
   return view('admin.vendor.list');
 }

 public function vendor_add(Request $request)
 {
    $data['getVendorType'] = VendorTypeModel::get_record($request);
    $data['getCategory'] = CategoryModel::get_record($request);
    return view('admin.vendor.add', $data);
 }

 public function vendor_store(Request $request)
 {
     //dd($request->all());
      
         $validatedData = $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:users',
             'status' => 'required',
             'category_id' => 'required',
             'vendor_type_id' => 'required'
         ]);
     
         
         $user = new User;
         $user->name            = trim($request->name);
         $user->last_name       = trim($request->last_name ?? '');
         $user->email           = trim($request->email);
         $user->category_id     = trim($request->category_id);
         $user->vendor_type_id  = trim($request->vendor_type_id); 
         $user->company_name    = trim($request->company_name ?? '');
         $user->employee_id     = trim($request->employee_id ?? '');
         $user->mobile          = trim($request->mobile  ?? '');

         try {
          if ($request->hasFile('Profile')) {
              $file = $request->file('Profile');
              $randomStr = Str::random(30);
              $filename = $randomStr . '.' . $file->getClientOriginalExtension();
              $file->move(public_path('upload/Profile'), $filename);
              $user->Profile = $filename;
          }
      } catch (\Exception $e) {
          dd("Upload failed: " . $e->getMessage());
      }


         $user->status          = trim($request->status);
         $user->always_assign   = trim($request->always_assign ?? 0);
         $user->is_admin        = 2;
         $user->user_type       = 'vendor';
         $user->remember_token  = Str::random(50); 
         $user->forgot_token    = Str::random(50);
         $user->password        = bcrypt('password'); 
         $user->save();
     
         return redirect('admin/vendor/list')->with('success', 'Record successfully created.');
     }

}