@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold text-dark">Payment Receipt</h5>
                        <span class="badge rounded-pill bg-{{ $payment->status === 'completed' ? 'success' : ($payment->status === 'failed' ? 'danger' : 'warning') }}-subtle text-{{ $payment->status === 'completed' ? 'success' : ($payment->status === 'failed' ? 'danger' : 'warning') }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <p class="text-muted small mb-1">Transaction ID</p>
                            <h4 class="mb-0 text-dark fw-semibold">{{ $payment->transaction_id ?? 'N/A' }}</h4>
                        </div>
                        <div class="text-end">
                            <p class="text-muted small mb-1">Date</p>
                            <p class="mb-0">{{ $payment->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-light-subtle p-4 rounded mb-4">
                        <div class="row">
                            <div class="col-md-6 border-end-md">
                                <p class="text-muted small mb-1">Amount Paid</p>
                                <h3 class="text-primary fw-bold">Rs.{{ number_format($payment->amount, 2) }}</h3>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <p class="text-muted small mb-1">Payment Method</p>
                                <h5 class="mb-0">{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
    
    <div class="col-md-6">
        <label class="form-label fw-semibold">Payment Date:</label>
        <p class="form-control-static">{{ $payment->payment_date->format('M d, Y') }}</p>
    </div>
</div>

<div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Bank Name:</label>
                            <p class="form-control-static">{{ $payment->b_name ?? 'N/A' }}</p>
                        </div>
                    
                    @if($payment->description)
                    <div class="border-top pt-3 mt-3">
                        <p class="text-muted small mb-1">Description</p>
                        <p class="mb-0">{{ $payment->description }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="card-footer bg-white border-top py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('user/payments/list') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left me-2"></i> Back to Payments
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-color: #e9ecef;
    }
    .card-header {
        background-color: #f8f9fa;
    }
    .bg-light-subtle {
        background-color: #f8f9fa;
    }
    .border-end-md {
        border-right: 1px solid #e9ecef;
    }
    @media (max-width: 767.98px) {
        .border-end-md {
            border-right: none;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
    }
</style>
@endsection