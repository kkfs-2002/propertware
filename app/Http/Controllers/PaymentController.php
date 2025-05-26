<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function list()
    {
        $payments = Payment::where('user_id', Auth::id())
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('user.payments.list', compact('payments'));
    }

    public function create()
    {
        return view('user.payments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal,bank_transfer',
            'description' => 'nullable|string|max:255'
        ]);

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'description' => $validated['description'] ?? 'Payment for services'
        ]);

        $this->processPayment($payment);

        return redirect()->route('user.payments.list')->with('success', 'Payment initiated successfully!');
    }

    public function show(Payment $payment)
    {
        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.payments.show', compact('payment'));
    }

    protected function processPayment(Payment $payment)
    {
        // Simulate payment processing
        sleep(2);
        
        $payment->update([
            'status' => 'completed',
            'transaction_id' => 'TRX-' . strtoupper(uniqid())
        ]);
    }
}