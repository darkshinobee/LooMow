@component('mail::message')
# Order Payment Failed

Dear {{ $customer->first_name }},<br>
Oops! Your order has not been processed. No worries, you will not be debited for the transaction and your cart has not been emptied. Head back and try again. We apologize for any inconvenience.

@component('mail::table')
| Game               | Platform              | Quantity              |Price                                    |
|:------------------:|:---------------------:|:---------------------:|:---------------------------------------:|
@foreach ($obj as $key)
|{{ $key->title }}   |{{ $key->platform }}   |{{ $key->quantity }}   |&#8358;{{ number_format($key->price,2) }}|
@endforeach
@endcomponent

@component('mail::button', ['url' => 'http://loomow.com/viewBuy'])
Back to Cart
@endcomponent

@component('mail::panel')
For more information about your order contact us @:<br>
T: 0801 234 5678<br>
E: orders@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
