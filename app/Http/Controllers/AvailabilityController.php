<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Availability;
use Auth;

class AvailabilityController extends Controller
{
    public function availability_list()
{
  $data['getrecord'] = Availability::where('user_id', Auth::id())
                   ->orderBy('available_date', 'asc')
                   ->get();

    return view('vendor.availability.list', $data);
}
    public function availability_add()
    {
        return view('vendor.availability.add');
    }
public function availability_store(Request $request)
{
    $request->validate([
        'available_date' => 'required|date',
        'start_time'     => 'required',
        'end_time'       => 'required|after:start_time',
        'day'            => 'required',
    ]);

    Availability::create([
        'user_id'        => Auth::id(),
        'available_date' => $request->available_date,
        'start_time'     => $request->start_time,
        'end_time'       => $request->end_time,
        'day'            => $request->day,
        'status'         => $request->status ?? 1,
    ]);

    return redirect()->route('vendor/availability/list')->with('success', 'Availability added successfully.');
}


    public function availability_edit($id)
    {
        $availability = Availability::where('user_id', Auth::id())->findOrFail($id);
        return view('vendor.availability.edit', compact('availability'));
    }

    public function availability_update(Request $request, $id)
    {
        $request->validate([
            'available_date' => 'required|date',
            'start_time'     => 'required',
            'end_time'       => 'required|after:start_time',
        ]);

        $availability = Availability::where('user_id', Auth::id())->findOrFail($id);
        $availability->update($request->only(['available_date', 'start_time', 'end_time']));

        return redirect()->route('vendor/availability/list')->with('success', 'Availability updated successfully.');
    }

    public function availability_delete($id)
    {
        $availability = Availability::where('user_id', Auth::id())->findOrFail($id);
        $availability->delete();

        return redirect()->route('vendor/availability/list')->with('success', 'Availability deleted successfully.');
    }
}
