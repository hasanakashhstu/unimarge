@component('mail::message')

Id: {{$data['id']}},
Email: {{$data['email']}}

For download admit card use  those information to login. <br>
Thank you.

Thanks,<br>
{{ config('app.name') }}
@endcomponent