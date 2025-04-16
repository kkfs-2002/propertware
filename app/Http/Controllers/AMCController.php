<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AMCModel;
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
        $data['getrecord'] = AMCModel::find($id);
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
    
        $amc = AMCModel::find($id);
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
}
      ?>