@component('mail::message')
Hi {{ $user->name }},<br>

<p>Thanks for Joining {{ config('app.name') }}.</p>

<p>Cick on the button bellow, to VAlidate your email address.</p>

@component('mail::button', ['url' => url('vendor/password/'.$user->forgot_token)
])
login
@endcomponent

Thanks,<br>
Property Management Service
@endcomponent