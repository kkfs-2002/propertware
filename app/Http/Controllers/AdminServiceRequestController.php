<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookServiceModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestApprovalMail;
use App\Mail\ServiceRequestRejectionMail;



class AdminServiceRequestController extends Controller
{
    public function reject($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $user = $serviceRequest->user; // or however you get the user

        // send the rejection email
        Mail::to($user->email)->send(new ServiceRequestRejectionMail($user, $serviceRequest));

        // ... other code ...
    }
    public function index()
    {
        $requests = BookServiceModel::with(['user', 'serviceType', 'category', 'subCategory'])
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.service_requests.list', compact('requests'));
    }

    public function show($id)
    {
        $request = BookServiceModel::with([
            'user',
            'serviceType',
            'category',
            'subCategory',
            'images'
        ])->findOrFail($id);

        return view('admin.service_requests.view', compact('request'));
    }

    public function updateStatus($id, Request $request)
    {
        $serviceRequest = BookServiceModel::findOrFail($id);

        $request->validate([
            'status' => 'required|in:0,1,2',
            'estimated_response_time' => 'nullable|string|max:255',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $serviceRequest->status = $request->status;
        $serviceRequest->estimated_response_time = $request->estimated_response_time;
        $serviceRequest->admin_notes = $request->admin_notes;
        if ($request->status == BookServiceModel::STATUS_APPROVED) {
            $serviceRequest->approved_at = now();
        }
        $serviceRequest->save();

        $user = $serviceRequest->user;
        if ($request->status == BookServiceModel::STATUS_APPROVED) {
            Mail::to($user->email)->send(new ServiceRequestApprovalMail($user, $serviceRequest));
        } elseif ($request->status == BookServiceModel::STATUS_REJECTED) {
         Mail::to($user->email)->send(new ServiceRequestRejectionMail($user, $serviceRequest));
        }

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}