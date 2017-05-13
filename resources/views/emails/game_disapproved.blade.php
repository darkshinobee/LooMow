@component('mail::message')
# Game Disapproved

Hello {{ $customer->first_name }},<br>
your game has been unfortunately rejected by our consoles. Our efforts to fix the game proved futile. Your game is packed and ready for collection. See details below.

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $game->title }}|{{ $game->platform }}|{{ $game->status }}|
@endcomponent

You can find us @:<br>
<ul style="list-style:none">
  <li>4 Tapa Close</li>
  <li>Limpopo Street</li>
  <li>Maitama</li>
  <li>Abuja</li>
</ul>

@component('mail::panel')
For more information:<br>
<a href="#">Returns Policy</a><br>
T: 0801 234 5678<br>
E: returns@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
