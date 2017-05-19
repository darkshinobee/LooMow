@component('mail::message')
# Just Testing

Hello Test,<br>
Here is where you can register web routes for your application. These routes are loaded by the RouteServiceProvider within a group which contains the "web" middleware group. Now create something great!

@component('mail::panel')
This is the panel content.
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
