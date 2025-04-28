<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VendorTypeModel;
use App\Models\CategoryModel;

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
}