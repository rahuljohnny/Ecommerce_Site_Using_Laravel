@extends('admin.layout.admin')

@section('content')

    <div class="navbar">

        @include('admin.category._category-list',['collection'=>$categories['root']])

    </div>

@endsection