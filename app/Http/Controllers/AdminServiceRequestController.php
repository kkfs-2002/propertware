<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookServiceModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestApprovalMail;
use App\Mail\ServiceRequestRejectionMail;
use App\Models\UserNotification; 


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
        'status' => 'required|in:'.BookServiceModel::STATUS_PENDING.','.BookServiceModel::STATUS_APPROVED.','.BookServiceModel::STATUS_REJECTED,
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

    // Create notification for user
    UserNotification::create([
        'user_id' => $serviceRequest->user_id,
        'service_request_id' => $serviceRequest->id,
        'type' => $request->status == BookServiceModel::STATUS_APPROVED ? 'success' : 'danger',
        'title' => $request->status == BookServiceModel::STATUS_APPROVED 
            ? 'Service Request Approved' 
            : 'Service Request Rejected',
        'message' => $request->status == BookServiceModel::STATUS_APPROVED
            ? 'Your service request (ID: '.$serviceRequest->id.') has been approved.'
            : 'Your service request (ID: '.$serviceRequest->id.') has been rejected.',
        'status' => $request->status == BookServiceModel::STATUS_APPROVED
            ? UserNotification::STATUS_APPROVED
            : UserNotification::STATUS_REJECTED,
        'is_read' => 0
    ]);

    // Send email
    $user = $serviceRequest->user;
    if ($request->status == BookServiceModel::STATUS_APPROVED) {
        Mail::to($user->email)->send(new ServiceRequestApprovalMail($user, $serviceRequest));
    } elseif ($request->status == BookServiceModel::STATUS_REJECTED) {
        Mail::to($user->email)->send(new ServiceRequestRejectionMail($user, $serviceRequest));
    }

    return redirect()->back()->with('success', 'Status updated successfully.');
}
public function assignVendor($id)
{
    $serviceRequest = BookServiceModel::findOrFail($id);
    $vendors = VendorModel::where('service_type_id', $serviceRequest->service_type_id)
                ->where('is_active', 1)
                ->get();
                
    return view('admin.service_requests.assign_vendor', [
        'request' => $serviceRequest,
        'vendors' => $vendors
    ]);
}

public function storeVendorAssignment(Request $request, $id)
{
    $serviceRequest = BookServiceModel::findOrFail($id);
    
    $request->validate([
        'vendor_id' => 'required|exists:vendors,id',
        'assigned_date' => 'required|date',
    ]);
    
    $serviceRequest->vendor_id = $request->vendor_id;
    $serviceRequest->assigned_date = $request->assigned_date;
    $serviceRequest->status = self::STATUS_ASSIGNED; // Add this constant
    $serviceRequest->save();
    
    // Notify vendor and user here
    
    return redirect()->route('admin.service_requests')
           ->with('success', 'Vendor assigned successfully');
}

    
}