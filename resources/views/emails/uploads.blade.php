@component('mail::message')
#  {{ $tref }} - Ad Request Received

Hello {{ $customer->first_name }},<br>
your request to advertise your game on Loomow has been received and is currently being processed.
You will be notified as soon as your ad is verified and goes live.
Details Below:<br>

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $upload->title }}|{{ $upload->platform }}|{{ $upload->status }}|
@endcomponent

@component('mail::panel')
For more information contact us @:<br>
T: 0801 234 5678<br>
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
