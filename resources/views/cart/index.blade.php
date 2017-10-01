@extends('layout.main')
@section('content')

  <div class="row">
      <h3>Cart Items</h3>

      <table class="table table-hover">

          <thead>
          <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Size</th>
              <th>Action</th>

          </tr>
          </thead>


          <tbody>
          @foreach($cartItems as $cartItem)
              <tr>
                  <td>{{$cartItem->name}}</td>
                  <td>{{$cartItem->price}}</td>
                  <td width="50px">
                      {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                      <input type="text" name="qty" value="{{$cartItem->qty}}">

                  </td>
                  {{-- <td>{{$cartItem->options->has('size')?$cartItem->options->size:''}}</td>--}}
                  <td>
                     <div>{!! Form::select('size',['small'=>'Small','medium'=>'medium','large'=>'Large'],$cartItem->options->has('size')?$cartItem->options->size:'') !!}</div>
                  </td>

                  <!-- Remove Button -->
                  <td>
                      {{--<a class="button" href="{{route('cart.destroy',$cartItem->rowId)}}">Delete--}}
                      {{--</a>--}}
                      <input style="float: left" type="submit" class="button success small" value="ok">
                      {!! Form::close() !!}
                      <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <input class="button small alert" type="submit" value="Delete" >
                      </form>
                  </td>

              </tr>
          @endforeach

          @if(Cart::total()>0)

          <tr>
              <td></td>
              <td>
                  Total: ${{Cart::total()}}<hr>
                  Tax: ${{Cart::tax()}}<hr>
                  SubTotal: {{Cart::total()}}
              </td>
              <td>Items: {{Cart::count()}}</td>
              <td></td>
              <td></td>

          </tr>

          @endif

          </tbody>

      </table>

      <a href="/checkout" class="button">Checkout</a>
  </div>

@endsection
