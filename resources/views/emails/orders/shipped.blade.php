@component('mail::message')
# Sylhet,Bangladesh
<h4>{{$userInfo->name}},CodeBin User ID{{$userInfo->id}}</h4>
<h4>Hey {{$userInfo->name}},</h4>
Your product has been shipped just now! The costing is <strong>${{$order->total}}</strong>.<br><br>Please collect your product with your credentials.
@component('mail::button', ['url' => 'https://github.com/rahuljohnny'])
Check our website for new products.
@endcomponent
<hr>
Thanks,<br>Rahul Johnny<br>CEO<br>{{ config('app.name') }}
@endcomponent
