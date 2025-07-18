<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
  public function list()
{
    $payments = Payment::with('user')->latest()->paginate(10); // 10 items per page
    return view('admin.payments.list', compact('payments'));
}

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        if ($request->action == 'verify') {
            $payment->status = 'verified';
            $payment->admin_message = 'Payment verified successfully.';
        } elseif ($request->action == 'reject') {
            $payment->status = 'rejected';
            $payment->admin_message = 'Payment rejected.';
        }

        $payment->save();

        return redirect('admin/payments/list')->with('success', 'Payment status updated.');
    }

    public function updateNote(Request $request, Payment $payment)
{
    $request->validate([
        'admin_message' => 'nullable|string|max:255'
    ]);

    $payment->update([
        'admin_message' => $request->admin_message
    ]);

    return back()->with('success', 'Admin note updated successfully');
}
}
