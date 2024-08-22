@component('mail::message')
# Stock Updated

Stocks for {{$product->name}} has been updated.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
