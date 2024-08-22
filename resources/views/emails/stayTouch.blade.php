@component('mail::message')
# Introduction

Thank you for subscribing wikiplast.com .

@component('mail::button', ['url' => ''])
Your coupon code is {{$coupon->code}}.
@endcomponent
Enjoy {{$coupon->discount}} % off on your order by using this coupon.
Thanks,<br>
{{ config('app.name') }}
@endcomponent
