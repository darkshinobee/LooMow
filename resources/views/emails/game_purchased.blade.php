@component('mail::message')
# Congratulations!

Dear {{ $customer->first_name }},<br>
The following game you uploaded has been purchased. Your account has been credited with a {{ config('app.name') }} voucher. See details below.

@component('mail::table')
| Game               | Platform              | Price              |
|:------------------:|:---------------------:|:------------------:|
|{{ $game->name }}  |{{ $game->options->platform }}  |&#8358;{{ number_format($game->price,2) }}|
@endcomponent

{{ $customer->first_name.' '.$customer->last_name }}
@component('mail::panel')
Previous Voucher Value: &#8358;{{ number_format($customer->voucher_value,2) }}<br>
Game Price: &#8358;{{ number_format($game->price,2) }}<br>
Handling Fee: &#8358;{{ number_format(1000,2) }}<br>
New Voucher Value: &#8358;{{ number_format($customer->voucher_value + ($game->price - 1000),2) }}<br><br>
For more information contact us @:<br>
T: 0801 234 5678<br>
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
