@component('mail::message')
# Sylhet,Bangladesh
<h4>Hey {{$userInfo->name}},</h4><br>
Your product has been shipped just now! Your Ecom User ID is {{$userInfo->id}}.The costing is ${{$order->total}}.<br><br>Please collect your product with your credentials.
@component('mail::button', ['url' => 'https://github.com/rahuljohnny'])
Check our website for new products.
@endcomponent
<hr>
Thanks,<br>Rahul Johnny<br>CEO<br>{{ config('app.name') }}
@endcomponent
