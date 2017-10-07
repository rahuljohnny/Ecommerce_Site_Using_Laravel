@extends('admin.layout.admin')
@section('content')

  <h3>Orders</h3>
  <ul>
      <style>
          hr {display: block;margin-top: 0.5em;margin-bottom: 0.5em; margin-left: auto;  margin-right: auto;  border-style: inset;  border-width: 3px;}
      </style>

      @foreach($orders as $order)

              <h4>Order by {{$order->user->name}}<br><br></h4>
              <h5>Price: {{$order->total}}</h5>

              @if($order->delivered==0) {{--Show the deliver checkbox if and only if the product is not delivered--}}
                  <form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right">
                      {{csrf_field()}}
                      <label for="delivered">Mark as Delivered</label>
                      <input type="checkbox" value="1" name="delivered">
                      <input type="submit" value="submit">
                  </form>
              @endif

              @if($order->delivered==1) {{--Show the deliver checkbox if and only if the product is not delivered--}}
              <form action="{{route('toggle.undoDeliver', $order->id)}}" method="POST" class="pull-right">
                  {{csrf_field()}}
                  <label for="undoDeliver">Mark as Undelivered</label>
                  <input type="checkbox" value="0" name="delivered">
                  <input type="submit" value="submit">
              </form>
              @endif

              <div class="clearfix"></div>
              <hr><hr>

              <h5>Items</h5>
              <table class="table table-striped table-bordered">
                  <tr>
                      <th>Name</th>
                      <th>qty</th>
                      <th>Price</th>
                  </tr>

                  @foreach($order->orderItems as $item)
                      <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->pivot->qty}}</td>
                          <td>{{$item->pivot->total}}</td>
                      </tr>
                  @endforeach
              </table>

          <br><hr><br>
      @endforeach
  </ul>

@endsection