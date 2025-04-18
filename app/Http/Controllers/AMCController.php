<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AMCModel;
use App\Models\AmcAddOnsModel;
use Hash;
use Str;
use Auth;

class AMCController extends Controller
{

public function amc_list(Request $request)
{
  $data['getrecord'] = AMCModel::get_record($request);
return view('admin.amc.list', $data);

}

public function amc_add(Request $request)
{
    return view('admin.amc.add');
}

public function amc_insert(Request $request)
    {
      
       //dd($request->all());
      
           $validated = $request->validate([
               'name' => 'required|unique:amc_models,name',
               'amount' => 'required|numeric',
               'series' => 'required',
               'business_category' => 'nullable|in:0,1'
           ]);
       
           $amc = new AMCModel;
           $amc->name = trim($validated['name']);
           $amc->amount = trim($validated['amount']);
           $amc->business_category = $request->business_category ?? null;
           $amc->series = trim($validated['series']);
           try {
            $amc->save();
        } catch (\Exception $e) {
            dd("DB Error: " . $e->getMessage()); 
        }
       
           return redirect('admin/amc/list')->with('success', 'AMC has been successfully added.');
       }

       public function amc_edit($id, Request $request)
       {
        $data['getrecord'] = AMCModel::get_single($id);
        return view('admin.amc.edit', $data);
       }

       public function amc_update($id, Request $request)
       {
        $validated = $request->validate([
            'name' => 'required|unique:amc_models,name,'.$id,
            'amount' => 'required|numeric',
            'series' => 'required',
            'business_category' => 'nullable|in:0,1'
        ]);
    
        $amc = AMCModel::get_single($id);
        $amc->name = trim($validated['name']);
        $amc->amount = trim($validated['amount']);
        $amc->business_category = $request->business_category ?? null;
        $amc->series = trim($validated['series']);
        try {
         $amc->save();
     } catch (\Exception $e) {
         dd("DB Error: " . $e->getMessage()); 
     }
    
        return redirect('admin/amc/list')->with('success', 'AMC has been successfully Update.');
    
       }

       public function amc_delete($id, Request $request)
       {
        $delete_record = AMCModel::get_single($id);
        $delete_record->is_delete = 1;
        $delete_record->save();
        return redirect()->back()->with('error','Record successfully Deleted!');
       }


       public function amc_add_ons_list($id, Request $request)
       {
        $data['getrecord'] = AMCModel:: get_single($id);
        $data['get_add_ons'] = AmcAddOnsModel::get_add_ons($id);
        return view('admin.amc.add_ons_list', $data);
       }

       public function amc_add_add_ons($id, Request $request)
       {
        $data['getrecord'] = AMCModel:: get_single($id);
        return view('admin.amc.add_ons_add', $data);
       }

       public function show_add_ons_form($id) {
        $getrecord = AmcModel::findOrFail($id);
        return view('admin.amc.add_ons_add', compact('getrecord'));
    }

      public function amc_store_add_ons(Request $request)
      {
        //dd($request->all());
        $request->validate([
            'amc_id' => 'required',
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);
    
        // Save to database
        $addon = new AmcAddOnsModel();
        $addon->amc_id = trim($request->amc_id);
        $addon->name = trim($request->name);
        $addon->price = $request->price ?? 0;
        $addon->save();
    
        return redirect('admin/amc/add_ons/'.$request->amc_id)->with('success', 'Record Successfully Created');
    }

    public function amc_edit_add_ons($id, Request $request)
    {
        return view('admin.amc.add_ons_edit');
    }
}
      ?>