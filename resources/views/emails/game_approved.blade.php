@component('mail::message')
# Game Approved

Hello {{ $customer->first_name }},<br>
your game has been verified to be in good working condition and is awaiting purchase. You will be contacted as soon as a customer makes a purchase.

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $game->title }}|{{ $game->platform }}|{{ $game->status }}|
@endcomponent

@component('mail::panel')
For more information contact us @:<br>
T: 0801 234 5678<br>
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
