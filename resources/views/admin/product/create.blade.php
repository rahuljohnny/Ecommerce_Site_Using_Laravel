@extends('admin.layout.admin')

@section('content')

    <div class="col-sm-8">
        <h1>Register</h1>
        <hr>

        <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>

                <select class="form-control" id="size" name="size">
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>

            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" placeholder="Select Category">  <!--conf -->

                    @foreach($categories as $category)
                        <option>{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" >
            </div>

            <div class="form-group">
                <h1>{{auth()->id()}}</h1>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

@endsection