@component('mail::message')
# Game Upload Approved

Hello {{ $customer->first_name }},<br>
your request has been processed succesfully. Your game is available for purchase on LooMow. Cross your fingers and wait for that call!

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $game->title }}|{{ $game->platform }}|{{ $game->status }}|
@endcomponent

@component('mail::panel')
For more information:<br>
<a href="#">Terms and Conditions</a><br>
T: 0801 234 5678<br>
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
