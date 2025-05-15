<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;

class TimeSlotController extends Controller
{
    public function time_slots_list()
    {
        $vendor_id = Auth::id();
        $timeSlots = TimeSlot::where('vendor_id', $vendor_id)
                           ->with('service')
                           ->orderBy('day_of_week')
                           ->orderBy('start_time')
                           ->get();
        
        // Group by day for better display if needed
        $groupedSlots = $timeSlots->groupBy('day_of_week');
        
        return view('vendor.time_slots.list', compact('timeSlots', 'groupedSlots'));
    }

    public function time_slots_create()
    {
        $vendor_id = Auth::id();
        $services = Service::where('vendor_id', $vendor_id)->get();
        return view('vendor.time_slots.create', compact('services'));
    }

    public function time_slots_store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Check for overlapping slots
        $overlappingSlot = TimeSlot::where('vendor_id', Auth::id())
            ->where('day_of_week', $request->day_of_week)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                      ->orWhere(function($q) use ($request) {
                          $q->where('start_time', '<=', $request->start_time)
                            ->where('end_time', '>=', $request->end_time);
                      });
            })
            ->exists();

        if ($overlappingSlot) {
            return back()->withErrors(['time' => 'This time slot overlaps with an existing slot.'])->withInput();
        }

        TimeSlot::create([
            'vendor_id' => Auth::id(),
            'service_id' => $request->service_id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'active' // if you have status field
        ]);

        return redirect()->route('vendor.time_slots.list')
                         ->with('success', 'Time slot added successfully.');
    }

    public function time_slots_delete($id)
    {
        $slot = TimeSlot::where('vendor_id', Auth::id())->findOrFail($id);
        $slot->delete();

        return redirect()->route('vendor.time_slots.list')
                         ->with('success', 'Time slot deleted successfully.');
    }
}