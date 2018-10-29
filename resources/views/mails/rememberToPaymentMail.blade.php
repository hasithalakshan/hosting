

<div style="text-align: center; background-color: mistyrose;">
    {{--<img class="payment-logo" src="{{URL::asset('/images/logo22.png')}}" alt=""/>--}}
    <br/>
    <h1 style="color: orangered;">Hello {{$userName}}</h1>
    <h2 style="font-weight: bold;">Welcome to vestaCP...</h2>
    <br/><br/>
    {{--<p class="mail-head-paragraph">Your payment renew date for {{$hostName}} Hosting plan is <strong style="color: #008000">{!! $title !!} </strong>. Please pay before this date</p>--}}
    <p class="mail-head-paragraph">Your payment renew date for {{$hostName}} Hosting plan is <strong style="color: #008000">{{$checkingUserPayToDate}} </strong>. Please pay before this date</p>
    <br/>
    <hr>
    <br/>
    <p style="color: blueviolet;">If You have any question please inform us..</p>

    <h2 style="color: #0000ff">Thank YOU...</h2>
    <br/>
    <br/>
</div>