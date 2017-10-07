<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shpping status</title>
</head>
<body>
<h4>Hey {{$userInfo->name}},User ID {{$userInfo->id}}</h4>
Your order has been shipped<br>
Total cost: ${{$order->total}}
</body>
</html>