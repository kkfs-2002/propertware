@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-credit-card me-2"></i>Payments</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Make Payment Card -->
                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Make a Payment</h5>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{ url('user/payments/process') }}" id="paymentForm">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="amount" class="col-sm-3 col-form-label">Amount (LKR)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rs.</span>
                                        </div>
                                        <input type="number" class="form-control" id="amount" name="amount" min="100" step="0.01" required>
                                    </div>
                                    <small class="form-text text-muted">Minimum amount: LKR 100.00</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Payment Method</label>
                                <div class="col-sm-9">
                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            <input type="radio" name="payment_method" value="card" checked> Credit/Debit Card
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="payment_method" value="paypal"> PayPal
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-credit-card mr-2"></i> Pay Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment Filter Card -->
                <div class="card border-0 shadow-sm rounded-3 mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Filter Payment History</h5>
                    </div>
                    <div class="card-body p-3">
                        <form method="GET" action="{{ url('user/payments/index') }}" id="filterForm">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="start_date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="end_date" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="">All Statuses</option>
                                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="method" class="form-label">Method</label>
                                    <select class="form-select" id="method" name="method">
                                        <option value="">All Methods</option>
                                        <option value="card" {{ request('method') == 'card' ? 'selected' : '' }}>Card</option>
                                        <option value="paypal" {{ request('method') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="fas fa-filter mr-1"></i> Apply Filters
                                    </button>
                                    <a href="{{ url('user/payments/index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-undo mr-1"></i> Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Export Payments Card -->
                <div class="card border-0 shadow-sm rounded-3 mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Export Payments</h5>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{ url('user/payments/export') }}" id="exportForm">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="export_start_date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="export_start_date" name="export_start_date">
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="export_end_date" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="export_end_date" name="export_end_date">
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="export_format" class="form-label">Format</label>
                                    <select class="form-select" id="export_format" name="export_format">
                                        <option value="csv">CSV</option>
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-file-export mr-2"></i> Export Payments
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payment History Card -->
                <div class="card border-0 shadow-sm rounded-3 mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Payment History</h5>
                    </div>
                    <div class="card-body p-3">
                        @if($payments->isEmpty())
                            <div class="alert alert-info">No payment records found.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="paymentsTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Amount (LKR)</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $payment->reference }}</td>
                                            <td class="text-right">{{ number_format($payment->amount, 2) }}</td>
                                            <td>{{ ucfirst($payment->payment_method) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $payment->status == 'completed' ? 'success' : ($payment->status == 'failed' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('user/payments/show', $payment->id) }}" class="btn btn-sm btn-info" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            @if(!$payments->isEmpty())
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $payments->appends(request()->query())->links() }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set default dates for export form to match filter form
        const exportForm = document.getElementById('exportForm');
        const filterForm = document.getElementById('filterForm');
        
        if(exportForm && filterForm) {
            exportForm.elements.export_start_date.value = filterForm.elements.start_date.value;
            exportForm.elements.export_end_date.value = filterForm.elements.end_date.value;
        }
        
        // Payment form validation
        const paymentForm = document.getElementById('paymentForm');
        if(paymentForm) {
            paymentForm.addEventListener('submit', function(e) {
                const amount = parseFloat(paymentForm.elements.amount.value);
                if(amount < 100) {
                    e.preventDefault();
                    alert('Minimum payment amount is LKR 100.00');
                }
            });
        }

        // Initialize DataTable for payments table
        $('#paymentsTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            pageLength: 10,
            processing: false,
            serverSide: false,
            columnDefs: [
                { orderable: true, targets: [0, 1, 2] },
                { orderable: false, targets: [3, 4, 5] }
            ],
            order: [[0, 'desc']]
        });
    });
</script>
@endpush