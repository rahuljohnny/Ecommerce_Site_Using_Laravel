@extends('admin.layout.admin')

@section('content')

<div class="blog-post">

  <p class="blog-post-meta">

    <a href="{{$category->id}}"><h2>{{$category->name}}</h2></a>

    <!-- $post->user->name  -->
    In market from:{{$category->created_at}}

  </p>

  <p>
    @if(!empty($categorizedProductsName))
      <section>
        <h3>All the Products of {{$category->name}} category</h3>
        <hr>

        <table class="table table-hover">
          <thead>
          <tr>
            <th>Products</th>
          </tr>
          </thead>

          <tbody>
          @forelse($categorizedProductsName as $productName)
            <tr>
              <td>{{$productName}}</td>
            </tr>

          @empty

            <tr>
              <td>No data!!</td>
            </tr>

          @endforelse

          </tbody>
        </table>

      </section>
    @endif
  </p>
</div>

@endsection