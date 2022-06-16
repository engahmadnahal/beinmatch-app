@component('mail::message')
# Welcome {{$emp->full_name}}

Hi ,{{$emp->full_name}} Welcome to our company.
You can login to your account using the following credentials:

Email : {{$emp->email}}
<br>
Password : {{$passwordRandom}}

@component('mail::button', ['url' => env('APP_URL').'/auth','class'=>'btn btn-primary'])
Go To Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
