@component('mail::message')
# Contact Us - Message

Name: {{ $request->name }}<br>
Email: {{ $request->email }}<br>
Subject: {{ $request->subject }}<br>
Message: {{ $request->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
