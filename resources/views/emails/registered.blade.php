@component('mail::message')
# Welcome To LooMow!

Hello {{ $customer->first_name }},<br>
Thank you for signing up to LooMow.

@component('mail::button', ['url' => '/'])
Let's Go!
@endcomponent

@component('mail::panel')
For more information:<br>
T: 0801 234 5678<br>
E: help@loomow.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
