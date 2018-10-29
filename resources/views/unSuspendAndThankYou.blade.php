

@extends('layouts.master')

@section('unSuspendAndThankYou')


    <div class="jumbotron text-xs-center" style="text-align: center">
        <a href="index.html"><img class="payment-logo" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
        <br/><br/><br/>
        <h1 class="display-3">Thank You!</h1>
        <p>Your account has been unsuspended and you can use your host as usually. Please do payment on time for service offer.</p>
        <p class="lead"><strong>Please check your email</strong> for further instructions.</p>
        <hr>
        <p>
            Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="finishCheckout" role="button">Continue to homepage</a>
        </p>
    </div>

@endsection
