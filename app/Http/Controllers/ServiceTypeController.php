<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceTypeModel;


class ServiceTypeController extends Controller
{

public function service_type_list(Request $request)
{
  $data['getrecord'] = ServiceTypeModel::get_record($request);
  return view('admin.service_type.list', $data);
}

public function service_type_add(Request $request)
{
    return view('admin.service_type.add');
}

public function service_type_add_post(Request $request)
{
  $validated = $request->validate([
    'name' => 'required|unique:service_types',
    
]);

    $save = new ServiceTypeModel;
    $save->name = trim($request->name);
    $save->save();

    return redirect('admin/service_type/list')->with('success', 'Record successfully Create.');
}

public function service_type_edit(Request $request, $id)
{
  $data['getrecord'] = ServiceTypeModel::get_single($id);
  return view('admin.service_type.edit', $data);
}

public function service_type_edit_update($id, Request $request)
{
    
    \Log::info("Requested ID: " . $id);

   
    $validated = $request->validate([
        'name' => 'required|unique:service_types,name,' . $id, 
    ]);


    $save = ServiceTypeModel::find($id); 

   
    \Log::info("Found record: " . json_encode($save)); 

  
    if (!$save) {
        return redirect('admin/service_type/list')->with('error', 'Service Type not found!');
    }


    $name = $request->name;
    if (!empty($name)) {
        $save->name = trim($name); 
        return redirect()->back()->with('error', 'Service type name cannot be empty.');
    }

   
    $save->save(); 

   
    return redirect('admin/service_type/list')->with('success', 'Record successfully updated.');
}
public function service_type_delete($id, Request $request)
{
  $delete = ServiceTypeModel::get_single($id);
  $delete->is_delete = 1;
  $delete->save();

  return redirect('admin/service_type/list')->with('success', 'Record successfully delete.');
}

}