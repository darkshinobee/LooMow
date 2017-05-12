@component('mail::message')
# Delivery Confirmation [{{ $ref_no }}]

Dear {{ $customer->first_name }},<br>
Thank you for shopping on {{ config('app.name') }}. Receipt of this message confirms the delivery of your order. See details below.

@component('mail::table')
| Game               | Platform              | Quantity              |Price                                    |
|:------------------:|:---------------------:|:---------------------:|:---------------------------------------:|
@foreach ($obj as $key)
|{{ $key->title }}   |{{ $key->platform }}   |{{ $key->quantity }}   |&#8358;{{ number_format($key->price,2) }}|
@endforeach
@endcomponent

@component('mail::panel')
For more information about your order contact us @:<br>
T: 0801 234 5678<br>
E: orders@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
