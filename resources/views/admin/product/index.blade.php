@extends('admin.layout.admin')

@section('content')

    <h3>Products</h3>

    <ul>
        @foreach($products as $product)
            <li>
                <h4>Product Name:{{$product->name}}</h4>
                {{$product->image}}
            </li>
        @endforeach
    </ul>
@endsection