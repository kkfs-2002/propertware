<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
   public function payments_index(Request $request)
{
    $user = Auth::user();
    
    $payments = Payment::where('user_id', $user->id)
        ->latest()
        ->paginate(10); // ✅ Correct pagination method
    
    return view('user.payments.dashboard', compact('payments'));
}
  // In PaymentController
public function payments_process(Request $request)
{
    $validated = $request->validate([
        'amount' => 'required|numeric|min:100|max:1000000',
        'payment_method' => 'required|in:card,paypal',
    ]);

    try {
        DB::beginTransaction();
        
        $payment = Payment::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'reference' => 'PAY-' . strtoupper(Str::random(10)),
        ]);

        // Process payment
        $result = $this->processPayment($payment);
        
        if (!$result['success']) {
            throw new \Exception($result['message']);
        }

        DB::commit();
        
        return redirect()->route('user.payments.show', $payment)
            ->with('success', 'Payment processed successfully!');
            
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Payment failed: ' . $e->getMessage());
        return back()->with('error', 'Payment failed: ' . $e->getMessage());
    }
}

public function generateReceipt(Payment $payment)
{
    if ($payment->user_id !== auth()->id()) {
        abort(403);
    }

    if ($payment->status !== 'completed') {
        return back()->with('error', 'Receipt only available for completed payments');
    }

    $pdf = PDF::loadView('user.payments.receipt', compact('payment'));
    return $pdf->download("receipt-{$payment->reference}.pdf");
}
public function exportPayments(Request $request)
{
    $validated = $request->validate([
        'export_start_date' => 'nullable|date',
        'export_end_date' => 'nullable|date|after_or_equal:export_start_date',
        'export_format' => 'required|in:csv,pdf,excel'
    ]);

    $payments = Payment::where('user_id', auth()->id())
        ->when($validated['export_start_date'], fn($q) => $q->whereDate('created_at', '>=', $validated['export_start_date']))
        ->when($validated['export_end_date'], fn($q) => $q->whereDate('created_at', '<=', $validated['export_end_date']))
        ->orderBy('created_at', 'desc')
        ->get();

    if ($payments->isEmpty()) {
        return back()->with('error', 'No payments found for export');
    }

    return (new PaymentsExport($payments))->download('payments.'.$validated['export_format']);
}

    private function processCardPayment($payment)
    {
        // Integrate with a payment gateway like Stripe or local provider
        // This is a simplified example
        
        try {
            // Simulate payment processing
            $payment->update([
                'transaction_id' => 'txn_'.uniqid(),
                'status' => 'completed'
            ]);
            
            return redirect()->route('payment.success');
            
        } catch (\Exception $e) {
            $payment->update(['status' => 3]);
            return back()->with('error', 'Payment failed: '.$e->getMessage());
        }
    }

    public function payments_success()
    {
        return view('payment.success');
    }

    public function payments_cancel()
    {
        return view('payment.cancel')->with('error', 'Payment was cancelled');
    }

    public function payments_webhook(Request $request)
    {
        // Handle payment gateway webhooks for verification
        // This would be specific to your payment provider
    }
}