<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceTypeModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BookServiceModel;
use App\Models\UserNotification;
use App\Models\BookServiceImageModel;
use App\Models\AMCModel;
use Auth;
use Str;
use File;

class BookServiceController extends Controller
{
    public function book_service_add(Request $request)
    {
        $data['getServiceType'] = ServiceTypeModel::where('is_delete', 0)->get();
        $data['getCategory'] = CategoryModel::where('is_delete', 0)->get();
        $data['getAMC'] = AMCModel::where('id', Auth::user()->amc_id)->first();
        $data['getSubCategory'] = old('category_id')
            ? SubCategoryModel::where('category_id', old('category_id'))->where('is_delete', 0)->get()
            : collect([]);
        return view('user.book_service.add', $data);
    }

    public function sub_category_dropdown(Request $request)
    {
        $subCategories = SubCategoryModel::where('category_id', $request->cat_id)
            ->where('is_delete', 0)
            ->get(['id', 'name']);
        return response()->json($subCategories);
    }

    public function book_service_store(Request $request)
    {
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
         $insert_r->status = (string) BookServiceModel::STATUS_PENDING; 
        $insert_r->save();

        if(!empty($request->option)){
            foreach($request->option as $value) {
                if(!empty($value['attachment_image'])){
                    $option_ind = new BookServiceImageModel;
                    $option_ind->book_service_id =  $insert_r->id;
                    $file      = $value['attachment_image'];
                    $randomStr   = Str::random(30);
                    $filename    = $randomStr . '.' .$file->getClientOriginalExtension();
                    $file->move('upload/service/', $filename);
                    $option_ind->attachment_image = $filename;
                    $option_ind->save();
                }
            }
        }
        return redirect('user/service_history/list')->with('success', 'Record Successfully created');
    }

    public function service_history_list(Request $request)
    {
        $data['getrecord'] = BookServiceModel::getBookService(Auth::user()->id, $request);
        $data['highlightDecision'] = $request->get('decision');
        // Add: pass notifications to the view
        $data['notifications'] = UserNotification::where('user_id', Auth::id())
            ->where('is_read', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('user.book_service.list', $data);
    }

    public function updateStatus(Request $request)
{
    $serviceRequestId = $request->service_request_id ?? $request->id;

    $service = BookServiceModel::find($serviceRequestId);
    if (!$service) {
        return response()->json([
            'success' => false,
            'message' => 'Service request not found'
        ]);
    }

    if ($request->action == 'approve') {
        $service->status = BookServiceModel::STATUS_USERAPPROVED; // Changed from APPROVED to USERAPPROVED
    } elseif ($request->action == 'reject') {
        $service->status = BookServiceModel::STATUS_REJECTED;
    }
    $service->save();

    // Create notification for ADMIN
    UserNotification::create([
        'user_id' => 1, // Assuming admin user ID is 1
        'service_request_id' => $service->id,
        'type' => $request->action == 'approve' ? 'info' : 'danger',
        'title' => $request->action == 'approve' 
            ? 'User Approved Service Request' 
            : 'User Rejected Service Request',
        'message' => $request->action == 'approve'
            ? 'User has approved service request (ID: ' . $service->id . '). Please assign a vendor.'
            : 'User has rejected service request (ID: ' . $service->id . ').',
        'status' => $request->action == 'approve'
            ? UserNotification::STATUS_APPROVED
            : UserNotification::STATUS_REJECTED,
    ]);

    return response()->json([
        'success' => true,
        'status' => $service->status,
        'status_label' => $service->status_label,
        'message' => $request->action == 'approve'
            ? 'Service request approved! Admin will now assign a vendor.'
            : 'Service request rejected!',
    ]);
}
public function markNotificationAsRead($id)
{
    $notification = UserNotification::findOrFail($id);
    $notification->update(['is_read' => 1]);
    
    return response()->json(['success' => true]);
}
    public function book_service_delete($id)
    {
        $record = BookServiceModel::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found or unauthorized access.');
        }

        // Delete related images
        $images = BookServiceImageModel::where('book_service_id', $record->id)->get();
        foreach ($images as $img) {
            $filePath = public_path('upload/service/' . $img->attachment_image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $img->delete();
        }

        // Delete the service record
        $record->delete();

        return redirect('user/service_history/list')->with('success', 'Service record deleted successfully.');
    }

    public function payment($id)
{
    $service = BookServiceModel::where('id', $id)
                ->where('user_id', Auth::id())
                ->where('status', BookServiceModel::STATUS_APPROVED)
                ->firstOrFail();
                
    return view('user.payments.create', ['service' => $service]);
}
}