@component('mail::message')
# Game Uploaded

Hello {{ $customer->first_name }},<br>
your game has been uploaded successfully and will be collected for verification within two working days.

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $upload->title }}|{{ $upload->platform }}|{{ $upload->status }}|
@endcomponent

The game will be collected from:<br>
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
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
