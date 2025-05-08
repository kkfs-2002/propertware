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

public function book_service_store(Request $request)
{
    //dd($request->all());

    $insert_r                          = new BookServiceModel;
    $insert_r->user_id                 = Auth::user()->id;
    $insert_r->service_type_id         = trim($request->service_type_id);
    $insert_r->category_id             = trim($request->category_id);
    $insert_r->sub_category_id         = trim($request->sub_category_id);
    $insert_r->amc_free_service_id     = trim($request->amc_free_service_id);
    $insert_r->description             = trim($request->description);
    $insert_r->special_instructions    = trim($request->special_instructions);
    $insert_r->pet                     = trim($request->pet);
    $insert_r->available_date          = trim($request->available_date);
    $insert_r->save();

    if(!empty($request->option)){
        foreach($request->option as $value) {
            if(!empty($value['attachment_image'])){
                $option_ind = new BookServiceImageModel;
                $option_ind->book_service_id =  $insert_r->id;
                $file      = $value['attachment_image'];
                $randomStr   = Str::random(30);
                $filename    = $randomStr . '.' .$file->
                       getClientOriginalExtension();
                $file->move('upload/service/', $filename);
                $option_ind->attachment_image = $filename;
                $option_ind->save();
            }
        }
    }
     return redirect('user/book_service/add')->with('success', 'Record Successfully create');
}
}