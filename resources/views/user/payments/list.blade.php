@extends('user.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="ti ti-credit-card me-2"></i> Payments</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('user.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Payment History</h5>
                        <a href="{{ url('user/payments/create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Make New Payment
                        </a>
                    </div>

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="paymentsTable" class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->transaction_id ?? 'N/A' }}</td>
                                        <td>Rs.{{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $payment->status === 'completed' ? 'success' : ($payment->status === 'failed' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($payment->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('user/payments/show', $payment) }}" class="btn btn-outline-info btn-sm me-1" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No payments found</td>
                                    </tr>
                                    @endforelse

                                    <!-- In your table columns -->
<td>{{ $payment->bank_name ?? 'N/A' }}</td>


                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-3">
                            {{ $payments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set default payment date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('payment_date').value = today;
    
    // Toggle required fields based on payment method
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            if (this.value === 'bank_transfer') {
                document.getElementById('bank_name').required = true;
            } else {
                document.getElementById('bank_name').required = false;
            }
        });
    });
    
    // Your existing JavaScript code...
    // Format card number
    const cardNumber = document.getElementById('card_number');
    if (cardNumber) {
        cardNumber.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '');
            if (value.length > 0) {
                value = value.match(new RegExp('.{1,4}', 'g')).join(' ');
            }
            e.target.value = value;
        });
    }

    
});
</script>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#paymentsTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            pageLength: 10,
            processing: false,
            serverSide: false,
            searching: false,
            info: false
        });
    });
</script>
@endsection