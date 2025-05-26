@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">User Payments</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment List</h5>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>Rs.{{ $payment->amount }}</td>
                                        <td>{{ ucfirst($payment->status) }}</td>
                                        <td>{{ $payment->admin_message }}</td>
                                        <td>
                                            @if($payment->status == 'pending')
                                                <form action="{{ url('admin/payments/update', $payment->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" name="action" value="verify" class="btn btn-success btn-sm">
                                                        <i class="fas fa-check"></i> Verify
                                                    </button>
                                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times"></i> Reject
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">Completed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection