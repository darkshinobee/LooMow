@component('mail::message')
# Game Disapproved

Hello {{ $customer->first_name }},<br>
your game has been unfortunately rejected by our consoles. Our efforts to fix the game proved futile. Your game will be returned without any charges.

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $game->title }}|{{ $game->platform }}|{{ $game->status }}|
@endcomponent

The game will be returned to:<br>
<ul style="list-style:none">
  <li>{{ $customer->first_name.' '.$customer->last_name }}</li>
  <li>{{ $customer->address }}</li>
  @if ($customer->landmark)
    <li>{{ $customer->landmark }}</li>
  @endif
  <li>{{ $customer->state }}</li>
  <li>T: {{ $customer->phone }}</li>
  <li>E: {{ $customer->email }}</li>
</ul>

@component('mail::panel')
For more information contact us @:<br>
T: 0801 234 5678<br>
E: returns@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
