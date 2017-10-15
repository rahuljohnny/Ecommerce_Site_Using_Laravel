{!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
{!! Form::hidden('parent_id', $category['id']) !!}

{{ Form::text('name', null, array('class' => 'form-control')) }}


<div class="form-group">
    <button type="submit" class="button success">submit</button>
</div>
<hr>

{!! Form::close() !!}