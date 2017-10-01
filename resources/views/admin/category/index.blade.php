@extends('admin.layout.admin')

@section('content')
	
    <div class="navbar">
        <a class="navbar-brand" href="#">Categories: </a>
        <ul class="nav navbar-nav">
            @if(!empty($categories))
                @forelse($categories as $category)
                    <li>
                        <a href="category/{{$category->id}}">{{$category->name}}</a>

                    </li>
                @empty
                <li>No data</li>
                @endforelse
            @endif
        </ul>

        <!-- Bootstrap 4 modal instead of bs3-->
        <a class="btn btn-primary" data-toggle="modal" href="#modal-id">Add Category</a>
        <div class="modal fade" id="modal-id">
            <div class="modal-dialog" role="document">


                <form method="POST" action="/admin/category/store" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                    </div>

                </form>




            </div>
        </div>


    </div>



@endsection

