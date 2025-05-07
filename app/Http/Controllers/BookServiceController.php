<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceTypeModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BookServiceModel;
use App\Models\BookServiceImageModel;
use App\Models\AMCModel;
use Auth;
use Str;
use File;


class BookServiceController extends Controller
{

public function book_service_add(Request $request)
{
    $data['getServiceType'] =  ServiceTypeModel::get_record_delete();
    $data['getcategory'] = CategoryModel::get_record_delete();
    $data['getAMC'] = AMCModel::where('id', '=', Auth::user()->amc_id)->first();
    return view('user.book_service.add',  $data);
}

public function sub_category_dropdown(Request $request)
{
    $data['get_sub_category'] = SubCategoryModel::where('category_id',  $request->cat_id)->get(["name", "id"]);
    //dd($data['get_sub_category']);
    return response()->json($data);
}
}