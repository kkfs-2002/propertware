@component('mail::message')
Hello {{ $user->name }},

Your service request (ID: {{ $serviceRequest->id }}) has been **approved** by our team.

@if($serviceRequest->estimated_response_time)
**Estimated Response Time:** {{ $serviceRequest->estimated_response_time }}
@endif

@if($serviceRequest->admin_notes)
**Admin Notes:**  
{{ $serviceRequest->admin_notes }}
@endif

Thank you for using our services.

@component('mail::button', ['url' => url('/user/service_history/list')])
View Your Requests
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent