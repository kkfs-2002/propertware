@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Cancelled') }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">
                        {{ __('Your payment was cancelled.') }}
                    </div>
                    <a href="{{ route('payment') }}" class="btn btn-primary">
                        {{ __('Return to Payment Dashboard') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection