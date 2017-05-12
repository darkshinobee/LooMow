@component('mail::message')
# Thank you for your order [{{ $ref_no }}]

Dear {{ $customer->first_name }},<br>
Thank you for shopping on {{ config('app.name') }}. Your payment has been received and your order is being processed. Your order will be delivered within two working days.

@component('mail::table')
| Game               | Platform              | Quantity              |Price                                    |
|:------------------:|:---------------------:|:---------------------:|:---------------------------------------:|
@foreach ($obj as $key)
|{{ $key->title }}   |{{ $key->platform }}   |{{ $key->quantity }}   |&#8358;{{ number_format($key->price,2) }}|
@endforeach
@endcomponent

Your order will be delivered to:<br>
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
For more information about your order contact us @:<br>
T: 0801 234 5678<br>
E: orders@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
