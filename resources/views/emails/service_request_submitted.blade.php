@component('mail::message')
# Service Request Submitted

Hello {{ $user->name }},

Your service request (ID: {{ $serviceRequest->id }}) has been submitted successfully.  
Our team will review your request soon.

@if($serviceRequest->description)
**Description:**  
{{ $serviceRequest->description }}
@endif

@if($serviceRequest->available_date)
**Preferred Date:** {{ $serviceRequest->available_date }}
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent