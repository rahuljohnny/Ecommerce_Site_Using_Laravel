@extends('layout.main')
@section('content')



<div class="row">
    <div class="small-4 small-centered collumns">




        <hr><hr>

        <h3>Shipping Cart</h3>
        <hr><hr>



        <form method="POST" action="/checkout/shipping" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="addressline">Address Line:</label>
                <input type="text" class="form-control" id="addressline" name="addressline" required>
            </div>


            <div class="form-group">
                <label for="city">city:</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="state">state:</label>
                <input type="text" id="state" name="state" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="zip">zip:</label>
                <input type="text" id="zip" name="zip" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="country">zip:</label>
                <input type="text" id="country" name="country" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">zip:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">

                <button type="submit" class="button success">Proceed</button>
            </div>



        </form>
    </div>
</div>

@endsection