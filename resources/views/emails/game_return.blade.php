@component('mail::message')
# Game Return

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

Thanks,<br>
{{ config('app.name') }}
@endcomponent
