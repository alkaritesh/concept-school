@component('mail::message')
# Welcome To School Days

## Hi {{ $user->name }}

It's been a pleasure to have you here. Please click on the button below to verify that it's you.

@component('mail::button', ['url' => route('verify',$token)])
It's Me
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
