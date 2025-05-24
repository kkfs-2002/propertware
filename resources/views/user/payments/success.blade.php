@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Successful') }}</div>

                <div class="card-body">
                    <div class="alert alert-success">
                        {{ __('Your payment was processed successfully!') }}
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