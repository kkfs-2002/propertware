<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\VendorTypeModel;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comments_index()
    {
        $comments = Comment::with(['user', 'vendor'])
            ->latest()
            ->get();
            
       $vendors = VendorTypeModel::active()->get(); // Assuming you have a Vendor model
        
        return view('user/comments/index', compact('comments', 'vendors'));
    }

    public function comments_store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'vendor_id' => 'nullable|exists:vendors,id',
            'type' => 'required|in:general,vendor'
        ]);

        $commentData = [
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'type' => $request->type
        ];

        if ($request->type === 'vendor') {
            $commentData['vendor_id'] = $request->vendor_id;
        }

        Comment::create($commentData);

        return back()->with('success', 'Comment Added Successfully!');
    }

    public function comments_delete(Comment $comment)
{
   
    if (Auth::id() !== $comment->user_id) {
        abort(403, 'Unauthorized action.');
    }

    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully.');
}
}