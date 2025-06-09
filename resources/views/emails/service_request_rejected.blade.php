@component('mail::message')
# Service Request Rejected

Hello {{ $user->name }},

We regret to inform you that your service request (ID: {{ $serviceRequest->id }}) has been rejected.

@if(isset($reason) && $reason)
**Reason:**  
{{ $reason }}
@endif

If you have any questions, please contact support.

@component('mail::button', ['url' => url('/user/service_history/list?decision='.$serviceRequest->id)])
View Your Request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent