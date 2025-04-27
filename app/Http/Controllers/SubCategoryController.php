<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;

class SubCategoryController extends Controller
{

public function sub_category_list(Request $request)
{
   return view('admin.sub_category.list');
}
public function sub_category_add(Request $request)
{
   $data['getCategory'] = CategoryModel::get_record($request);
  return view('admin.sub_category.add', $data);
}

public function sub_category_store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name'        => 'required|string|max:255',
        ]);

        $store = new SubCategoryModel;
        $store->category_id = trim($request->category_id);
        $store->name = trim($request->name);
        $store->save();

        return redirect('admin/sub_category/list')->with('success', 'Sub Category successfully created.');
    }

}