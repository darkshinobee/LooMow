@component('mail::message')
# Order Sheet [{{ $ref_no }}]

@component('mail::table')
| Game               | Platform              | Quantity              |Price                                    |
|:------------------:|:---------------------:|:---------------------:|:---------------------------------------:|
@foreach ($obj as $key)
|{{ $key->title }}   |{{ $key->platform }}   |{{ $key->quantity }}   |&#8358;{{ number_format($key->price,2) }}|
@endforeach
@endcomponent

The order will be delivered to:<br>
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
