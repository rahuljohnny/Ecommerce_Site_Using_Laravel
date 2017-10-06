@extends('layout.main')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <form action="{{route('lastStage.payment')}}" method="post" id="payment-form">

                    {{csrf_token()}}
                    <div class="form-row">




                        <label><h3>Credit or Debit card</h3></label>
                        <hr>

                        <label><h3>Amount {{$amount}}</h3></label>
                        <hr>

                        <div class="form-group" div id="card-element"></div>
                        <div class="form-group" div id="card-errors" role="alert"></div>

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