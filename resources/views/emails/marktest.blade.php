@component('mail::message')
# {{$f}} {{$l}}
Hello, {{$customer->first_name}}

Here is where you can register web routes for your application. These routes are loaded by the RouteServiceProvider within a group which contains the "web" middleware group. Now create something great!

@component('mail::button', ['url' => 'http://google.com'])
Button Text
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::table')
| Game          | Platform      | Price    |
| ------------- |:-------------:| --------:|
| Mafia III     | PS4           | &#8358;{{ number_format(250,2) }}      |
| Super Mario   | Nintendo Wii  | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
