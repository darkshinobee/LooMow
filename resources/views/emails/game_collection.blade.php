@component('mail::message')
# Game Collection [{{ $tref }}]

@component('mail::table')
| Game               | Platform              | Status              |
|:------------------:|:---------------------:|:-------------------:|
|{{ $upload->title }}|{{ $upload->platform }}|{{ $upload->status }}|
@endcomponent

The order will be collected from:<br>
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
