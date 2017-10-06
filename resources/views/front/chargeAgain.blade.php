@extends('layout.main')
@section('content')
  <div class="container">

    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <form action="/api/charge" method="post" id="chargeAgain-form">
          {{csrf_token()}}
          <div class="form-row">




            <label><h3>Monthly user charge</h3></label>
            <hr>

            <div class="form-group">
              <label for="userId">User ID:</label>
              <input type="text" id="userId" name="userId" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="stripeKey">Stripe Key:</label>
              <input type="text" id="stripeKey" name="stripeKey" class="form-control" required>
            </div>

            <hr>

            <div class="form-group">
              <button type="submit" class="button success">Submit Payment</button>
            </div>


          </div>
        </form>

      </div>
    </div>

  </div>


@endsection