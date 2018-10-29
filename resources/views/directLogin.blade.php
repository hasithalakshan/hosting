
@extends('layouts.master')

@section('directlogin')


@include('elements.header')


<div class="background_loginPage">
    <br/>
        <div class="order_logo_margin">
            <a href="index.html"><img style="width: 200px; height: 60px" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
        </div>
    <br/><br/><br/>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body" ng-app="directvalidationApp" ng-controller="directmainController">
                        <div class="row">
                            <div class="col-lg-12">
                                <form name="directloginForm" id="login-form" method="post" role="form"  novalidate ng-submit="directsubmitForm2(directloginForm, $event)" style="display: block;">
                                    <div class="form-group" ng-class="{'has-error':directloginForm.$submitted && !directloginForm.existingemail.$valid}">
                                        <input type="text" name="existingemail" id="existingemail" ng-model="existingemail" required tabindex="1" class="form-control"  ng-pattern="/^(?:\d{10}|\w+@\w+\.\w{2,3})$/" placeholder="email" value="" >
                                        <span ng-show="directloginForm.$submitted && directloginForm.existingemail.$error.required" class="error-registerandlogin help-block">&nbsp &nbsp Email is required.</span>
                                        <span ng-show="directloginForm.$submitted && directloginForm.existingemail.$error.pattern" class="error-registerandlogin help-block">&nbsp&nbsp This is not a valid email address.</span>
                                    </div>
                                    <div class="form-group" ng-class="{'has-error':directloginForm.$submitted && !directloginForm.existingpassword.$valid}">
                                        <input type="password" name="existingpassword" id="password" ng-model="existingpassword" required tabindex="2" class="form-control" placeholder="Password">
                                        <span ng-show="directloginForm.$submitted && directloginForm.existingpassword.$error.required" class="error-registerandlogin help-block">&nbsp &nbsp Your password is required.</span>
                                    </div>

                                    </br>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember" />
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="{{url('passwordEmail')}}" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <br>
                                                    Dont't have an account? <a href="plans" tabindex="5" class="">Choose a host plan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Session::has('loginfailed'))
                <div class="sucessaccount-msg col-xs-12">
                    <h4 class="sucessaccount-msg-header-fail">{{ Session::get('loginfailed') }}</h4>
                </div>
            @endif

        </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

    @include('elements.footer')

</div>

    @endsection


{{--<script>--}}
    {{--window.onload= function(){--}}

        {{--@if (session('existingEmail'))--}}
        {{--alert('{{ session('resetUserEmail')}}');--}}
        {{--//store reset email in localStorage...--}}
        {{--localStorage.setItem('existingEmail', '{{ session('existingEmail')}}');--}}
        {{--@endif--}}

        {{--//get variable and set that to email field value...--}}
        {{--document.getElementById("existingemail").value = localStorage.getItem("existingEmail");--}}
    {{--}--}}
{{--</script>--}}




































    {{--@extends('layouts.master')--}}

{{--@section('ordernow')--}}

{{--<div class="about_header">--}}
    {{--<div class="header_top">--}}
        {{--<div class="container">--}}
            {{--<div class="col-sm-6 header-top-left">--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 header-top-right">--}}
                {{--<div class="col-xs-7 phone">--}}
                    {{--<p>24/7&nbsp;Support&nbsp;&nbsp;&nbsp;011-2541879</p>--}}
                {{--</div>--}}
                {{--<div class="col-xs-5 check_box">--}}
                    {{--<a href="https://developer.paypal.com/developer/accounts/">--}}
                        {{--<ul class="check">--}}
                            {{--<i class="cart"> </i>--}}
                            {{--<li class="cart_desc">Checkout Now</li>--}}
                            {{--<div class="clearfix"> </div>--}}
                        {{--</ul>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
        {{--<div class="header_bottom">--}}
            {{--<div class="col-xs-3 logo">--}}
                {{--<a href="index.html"><img style="width: 200px; height: 60px" src="images/logo22.png" alt=""/></a>--}}
            {{--</div>--}}
            {{--<div class="col-xs-9 header_nav">--}}
                {{--<div class="col-xs-9 menu">--}}
                    {{--<a class="toggleMenu" href="#"><img src="images/nav_icon.png" alt="" /> </a>--}}
                    {{--<ul class="nav" id="nav">--}}
                        {{--<li><a href="/">Home</a></li>--}}
                        {{--<li class="current"><a href="index#hosting-section">Hosting</a></li>--}}
                        {{--<li><a href="/#services-section">Services</a></li>--}}
                        {{--<li><a href="index#aboutus-section">About Us</a></li>--}}
                        {{--<li><a href="index#contactus-section">Contact us</a></li>--}}
                    {{--</ul>--}}
                    {{--<script type="text/javascript" src="js/responsive-nav.js"></script>--}}
                {{--</div>--}}
                {{--<div class="col-xs-3 header_but">--}}
                    {{--<menu class="cl-effect-8" id="cl-effect-8">--}}
                        {{--<a href="#cl-effect-8">Client Area</a>--}}
                    {{--</menu>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

    {{--<br /><br />--}}

{{--<div class="container bodyarea-margin" ng-app="validationApp" ng-controller="mainController">--}}
    {{--<div class="row">--}}
        {{--@if(Session::has('loginsuccess') || Session::has('regsuccess'))--}}
        {{--@else--}}
            {{--<div id="hide_account_area">--}}
            {{--<div class="ordernow-accountcreate-head">--}}
                {{--<p id="accountdetail-head1" class="accountdetail-head1">CREATE YOUR ACCOUNT </p>--}}
            {{--</div>--}}

            {{--@if(Session::has('regfailed'))--}}
                {{--<div class="sucessaccount-msg col-xs-12">--}}
                    {{--<h3 class="sucessaccount-msg-header-fail">{{ Session::get('regfailed') }}</h3>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if(Session::has('loginfailed'))--}}
                {{--<div class="sucessaccount-msg col-xs-12">--}}
                    {{--<h3 class="sucessaccount-msg-header-fail">{{ Session::get('loginfailed') }}</h3>--}}
                {{--</div>--}}
            {{--@endif--}}

                {{--ng-submit="submitForm(userForm.$valid)"--}}
            {{--<form name="userForm" role="form" novalidate ng-submit="submitForm(userForm, disablelogin, $event)" method="POST">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="col-xs-10 form_bar margin_user_area">--}}
                    {{--<p class="payment-detail-margindivhead fieldrequire-fontcolor">--}}
                    {{--Fields marked with <span>*</span> are required! </p>--}}
                {{--</div>--}}

                {{--<div id="userarea_background_style" class="col-xs-10 userarea_background" style="margin-bottom: 18px">--}}
                    {{--<br /><br />--}}

                    {{--<div class="account-detail-margindiv-buttonarea col-xs-12 account-detail-button">--}}
                        {{--<div class="form-group col-xs-6">--}}
                            {{--<button class="changestyleregister" ng-click="disablelogin=false; disablesignup=true" id="new-user-button" type="button" style="float: right;">I am a new user</button>--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-xs-6">--}}
                            {{--<button class="changestylelog" ng-click="disablesignup=false; disablelogin=true" id="existing-user-button" type="button" style="float: left;" onclick="show()">I am a existing user</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<br /><br />--}}
                    {{--<legend></legend>--}}

                    {{--<div id="new-user-area" class="col-sm-12 firstDiv1 payment-detail-margindiv marginfield">--}}
                        {{--<span ng-show="userForm.$submitted && userForm.fname.$error.required" class="inline-error-msg help-block error-margin">&nbsp &nbsp First name is required.</span>--}}
                        {{--<span ng-show="userForm.$submitted && userForm.fname.$error.maxlength" class="inline-error-msg help-block error-margin">&nbsp &nbsp First name is too long.</span>--}}

                        {{--<div class="col-sm-12">--}}

                            {{--<div class="form-group col-sm-5 height-div">--}}
                                {{--<label style="float: right">Your Name <span class="red_error">*</span></label>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.fname.$valid}">--}}
                                {{--<input type="test" name="fname" class="form-control textfield_sizeleft" ng-model="fname" ng-required="disablesignup" ng-init="disablesignup=true" ng-maxlength="8" id="exampleInputfname" placeholder="First Name" >--}}
                            {{--</div>--}}

                        {{--</div>--}}

                    {{--<div id="new-user-area" class="col-sm-12 firstDiv1 payment-detail-margindiv marginfield">--}}
                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.fname.$valid}">--}}
                            {{--<span>Name <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.fname.$error.required" class="inline-error-msg help-block">&nbsp &nbsp First name is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.fname.$error.maxlength" class="inline-error-msg help-block">&nbsp &nbsp First name is too long.</span>--}}
                            {{--<input type="test" name="fname" class="form-control textfield_sizeleft" ng-model="fname" ng-required="disablesignup" ng-init="disablesignup=true" ng-maxlength="8" id="exampleInputfname" placeholder="First Name" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.lname.$valid}">--}}
                            {{--<span>Last Name <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.lname.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Last name is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.lname.$error.maxlength" class="inline-error-msg help-block">&nbsp &nbsp Last name is too long.</span>--}}
                            {{--<input type="text" name="lname" class="form-control textfield_sizeright" ng-model="lname" ng-required="disablesignup" ng-init="disablesignup=true" ng-maxlength="8" id="exampleInputlname" placeholder="last Name">--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.telephone.$valid}">--}}
                            {{--<span class="textfield_sizeleft_label">Telephone <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.telephone.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Telephone number is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.telephone.$error.maxlength" class="inline-error-msghelp-block">&nbsp &nbsp Telephone number is not valied.</span>--}}
                            {{--<input type="text" name="telephone" class="form-control textfield_sizeleft" ng-model="telephone" ng-required="disablesignup" ng-init="disablesignup=true" ng-maxlength="10" id="exampleInputtelephone" placeholder="Telephone" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div">--}}
                            {{--<span>State</span>--}}
                            {{--<input type="text" name="state" class="form-control textfield_sizeright" ng-model="state" id="exampleInputstate" placeholder="State" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.address.$valid}">--}}
                            {{--<span class="textfield_sizeleft_label">Address <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.address.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Address is required.</span>--}}
                            {{--<input type="text" name="address" class="form-control textfield_sizeleft" ng-model="address" ng-required="disablesignup" ng-init="disablesignup=true" id="exampleInputaddress" placeholder="Address" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.country.$valid}">--}}
                            {{--<span>Country <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.country.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Country is required.</span>--}}
                            {{--<select name="country" class="form-control textfield_sizeright" ng-model="country" ng-required="disablesignup" ng-init="disablesignup=true" id="exampleInputcountry">--}}
                                {{--<option value="India">India</option>--}}
                                {{--<option value="Bangaladesh">Bangaladesh</option>--}}
                                {{--<option value="Pakistan">Pakistan</option>--}}
                                {{--<option value="Viyatnam">Viyatnam</option>--}}
                                {{--<option value="Amarica">Amarica</option>--}}
                                {{--<option value="Srilanka" selected="selected">Srilanka</option>--}}
                                {{--<option value="america">america</option>--}}
                                {{--<option value="newzeeland">newzeeland</option>--}}
                                {{--<option value="japan">japan</option>--}}
                                {{--<option value="koria">koria</option>--}}
                                {{--<option value="angola">angola</option>--}}
                                {{--<option value="alaska">alaska</option>--}}
                                {{--<option value="viyatnam">viyatnam</option>--}}
                                {{--<option value="boothan">boothan</option>--}}
                                {{--<option value="nepol">nepol</option>--}}
                                {{--<option value="ooman">ooman</option>--}}
                                {{--<option value="thaiwan">thaiwan</option>--}}
                                {{--<option value="uruguwe">uruguwe</option>--}}
                                {{--<option value="paraguwe">paraguwe</option>--}}
                                {{--<option value="kanada">kanada</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.username.$valid}">--}}
                            {{--<span class="textfield_sizeleft_label">Username <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.username.$error.required" class="inline-error-msg help-block">&nbsp&nbsp Username is not valid.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.username.$error.minlength" class="inline-error-msg help-block">&nbsp&nbsp Username length is too short.</span>--}}
                            {{--<input type="text" name="username" class="form-control textfield_sizeleft" ng-model="username" ng-required="disablesignup" ng-init="disablesignup=true" ng-minlength="4l" id="exampleInputusername" placeholder="Username" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.email.$valid}">--}}
                            {{--<span>Email Address <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.email.$error.required" class="inline-error-msg help-block">&nbsp&nbsp Email is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.email.$error.pattern" class="inline-error-msg help-block">&nbsp&nbsp Email is invalid.</span>--}}
                            {{--<input type="email" name="email" class="form-control textfield_sizeright" ng-model="email" ng-pattern="/^(?:\d{10}|\w+@\w+\.\w{2,3})$/" ng-required="disablesignup" ng-init="disablesignup=true"  id="exampleInputemail" placeholder="Email" >--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.password.$valid}">--}}
                            {{--<span>Password <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.password.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Password is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.password.$error.minlength" class="inline-error-msg help-block">&nbsp &nbsp Password length is too short.</span>--}}
                            {{--<input type="password" name="password" class="form-control textfield_sizeleft" ng-model="password" ng-required="disablesignup" ng-init="disablesignup=true" ng-minlength="3" id="exampleInputPassword1" placeholder="Password">--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.confirmpassword.$valid}">--}}
                            {{--<span>Confirm Password <span class="red_error">*</span></span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.confirmpassword.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Configer password is required.</span>--}}
                            {{--<span ng-show="userForm.$submitted && userForm.confirmpassword.$error.pattern" class="inline-error-msg help-block">Confirm password didn't match</span>--}}
                            {{--<input type="password" name="confirmpassword" class="form-control textfield_sizeright"  ng-model="confirmpassword" ng-pattern="password" ng-required="disablesignup" ng-init="disablesignup=true" id="exampleInputPassword2" placeholder="Confirm Password">--}}
                        {{--</div>--}}
                        {{--<div class="recapsize form-group col-sm-5 height-div">--}}
                            {{--<div class="recaptchesize g-recaptcha form-group col-xs-5 height-div " data-sitekey="6LfxwzUUAAAAAP8yz3jhFcr5AWu2tYS3X9zjIgyA">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div>--}}
                            {{--&nbsp;--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                        {{--<div id="existing-user-area" class="firstDiv1 col-sm-12 payment-detail-margindiv marginfield" ng-class="{'has-error':userForm.$submitted && !userForm.existingemail.$valid}">--}}
                            {{--<div class="form-group col-sm-5 height-div">--}}
                                {{--<span>Email <span class="red_error">*</span></span>--}}
                                {{--<span ng-show="userForm.$submitted && userForm.existingemail.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Your username is required.</span>--}}
                                {{--<input type="test" name="existingemail" ng-model="existingemail" ng-required="disablelogin" ng-init="disablelogin=false" class="form-control textfield_sizeleft" id="exampleInputusernemepayment" placeholder="Enter Email" >--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-sm-5 height-div" ng-class="{'has-error':userForm.$submitted && !userForm.existingpassword.$valid}">--}}
                                {{--<span>Password <span class="red_error">*</span></span>--}}
                                {{--<span ng-show="userForm.$submitted && userForm.existingpassword.$error.required" class="inline-error-msg help-block">&nbsp &nbsp Your password is required.</span>--}}
                                {{--<input type="password" name="existingpassword" ng-model="existingpassword" ng-required="disablelogin" ng-init="disablelogin=false" class="form-control textfield_sizeright" id="exampleInputpasswordpayment" placeholder="Enter password">--}}
                                {{--<a href="#" style="font-size: 10px; color: blue"; >&nbsp; Forgot my password</a>--}}
                            {{--</div>--}}

                            {{--<br /><br />--}}

                            {{--<div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<br/><br/>--}}
                {{--<script>--}}
                    {{--var asd=2;--}}
                {{--</script>--}}

                    {{--<div class="order_summary ordersume_icon">--}}
                        {{--<br/><br/>--}}
                        {{--<h3>Order Summary</h3>--}}
                        {{--<p class="order_summary_para" >Your shared hosting plan's</p>--}}
                        {{--@foreach($hostplans as $hostplan)--}}
                            {{--@if($hostplan->id=='3')--}}
                                {{--<p class="order_summary_para2">Total price</p>--}}
                                {{--<span><p class="order_summary_para3"><del>${{($hostplan->price)+10}}</del>&nbsp;&nbsp;<i class="arrow downarrow"></i>&nbsp;&nbsp;${{$hostplan->price}}</p></span><br/>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                        {{--<div class="checkbox_label_area">--}}
                        {{--<input type="checkbox" name="termandcondition" id="termandcondition" ng-model="checked" />--}}

                        {{--<label for="termandcondition">&nbsp;&nbsp; I have read and agree to the </label> &nbsp;<a href="termsandcondition" class="order_summary_anchor">Terms of Service</a>.<br/><br/></div>--}}

                        {{--<button type="submit" id="checkout1-button" class="checkout_button" ng-disabled="!checked">Chaeckout</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--@endif--}}
                {{--end of the first form--}}
            {{--<div id="userarea_background_style_add_br">--}}

            {{--</div>--}}
                {{--<br/><br/>--}}


                {{--<!--payment area-->--}}
        {{--@if(Session::has('loginsuccess') || Session::has('regsuccess'))--}}
        {{--<div id="credit_and_paypal_area" class="credit_and_paypal_area" ng-controller="paymentController">--}}


            {{--@if(Session::has('loginsuccess'))--}}
                {{--<div class="sucessaccount-msg col-xs-12">--}}
                    {{--<h3 class="sucessaccount-msg-header">{{ Session::get('loginsuccess') }}</h3>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if(Session::has('regsuccess'))--}}
                {{--<div class="sucessaccount-msg col-xs-12">--}}
                    {{--<h3 class="sucessaccount-msg-header">{{ Session::get('regsuccess') }}</h3>--}}
                {{--</div>--}}
            {{--@endif--}}
                {{--submitForm(userForm, disablelogin, $event)--}}
                {{--ng-submit="submitForm(paymentForm.$valid)"--}}
            {{--<form name="paymentForm" role="form" ng-submit="submitForm(paymentForm.$valid)" novalidate method="get">--}}
                {{--<div class="col-xs-12 form_bar">--}}
                    {{--<p class="payment-detail-margindivhead fieldrequire-fontcolor">--}}
                        {{--Fields marked with <span>*</span> are required! </p>--}}
                {{--</div>--}}


                {{--<div class="col-xs-12 paymentarea_background">--}}
                    {{--<br /><br />--}}
                    {{--<div class="cc">--}}
                        {{--<p class="paymentdetails-head1">PAYMENT INFORMATION</p>--}}
                    {{--</div>--}}
                    {{--<br/>--}}

                    {{--<!--payment button area-->--}}
                    {{--<div class="payment-detail-margindiv-buttonarea col-xs-12 payment-detail-area-button">--}}
                        {{--<div class="form-group col-xs-6">--}}
                            {{--<button class="changestylecrediit" ng-click="payment_credit=true;" id="credit-card-area" type="button" style="float: right; font-size: 17px;"><img style="width: 20px; height: 20px;" src="images/creditcard.png" />Cridit Card</button>--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-xs-6">--}}
                            {{--<button class="changestylepaypal" ng-click="payment_credit=false;" id="paypal-area" type="button" style="float: left; font-size: 17px"><img style="width: 20px; height: 20px;" src="images/paypal2.png" />PayPal</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<br/><br/>--}}
                    {{--<legend></legend>--}}
                    {{--<br/>--}}

                    {{--<!--payment creditcard area-->--}}

                    {{--<div id="payment-creditcard-area" class="payment-detail-margindiv">--}}

                        {{--<div class="col-xs-12 payment-creditcard-area-margin">--}}
                            {{--<div class="payment-creditcard-area-header2">--}}
                                {{--<h2>Secure credit card payment</h2>--}}
                            {{--</div>--}}

                            {{--<div class="height-div-credit form-group" ng-class="{'has-error':paymentForm.$submitted && !paymentForm.cardname.$valid}">--}}

                                {{--<span for="exampleInputlnameofcard">Name Of Card</span>--}}
                                {{--<p>Name appear on the card</p>--}}

                                {{--<select name="cardname" class="form-control creditcardname" ng-model="cardname" ng-required="payment_credit" ng-init="payment_credit=true" id="exampleInputlnameofcard">--}}
                                    {{--<option value="visa">VISA</option>--}}
                                    {{--<option value="master">master</option>--}}
                                    {{--<option value="amarican express">Amarican Express</option>--}}
                                    {{--<option value="discover">Discover</option>--}}
                                {{--</select>--}}
                                {{--<span><img src="images/visacard.png" class="paymentcard_img"/></span>--}}
                                {{--<span><img src="images/mastercard.png" class="paymentcard_img2" /></span>--}}
                                {{--<span><img src="images/American-Expresscard.png" class="paymentcard_img" /></span>--}}
                                {{--<div>--}}
                                    {{--<span ng-show="paymentForm.$submitted && paymentForm.cardname.$error.required" class="inline-error-msg-credit help-block">Card name is required.</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="height-div-credit form-group" ng-class="{'has-error':paymentForm.$submitted && !paymentForm.cardno.$valid}">--}}
                                {{--<span>credit card Number <span class="red_error">*</span></span>--}}
                                {{--<p>15-16 digits are allowed.</p>--}}
                                {{--<input type="test" name="cardno" ng-model="cardno" ng-required="payment_credit" ng-init="payment_credit=true" class="form-control creditcardno" id="exampleInputcreditcardno" placeholder="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card No';}" >--}}
                                {{--<span ng-show="paymentForm.$submitted && paymentForm.cardno.$error.required" class="inline-error-msg-credit help-block">Card no is required.</span>--}}
                            {{--</div>--}}

                            {{--<div class="form-group height-div-credit" ng-class="{'has-error':paymentForm.$submitted && !paymentForm.cardcode.$valid}">--}}
                                {{--<span>Security Code <span class="red_error">*</span></span>--}}
                                {{--<p>3-4 digit security code on card.</p>--}}
                                {{--<input type="text" name="cardcode" ng-model="cardcode" ng-required="payment_credit" ng-init="payment_credit=true" class="form-control creditsecuritycode" id="exampleInputssecuritycode" placeholder="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}">--}}
                                {{--<span ng-show="paymentForm.$submitted && paymentForm.cardcode.$error.required" class="inline-error-msg-credit help-block">Security code is required.</span>--}}
                            {{--</div>--}}

                            {{--<div class="form-group  height-div-credit" ng-class="{'has-error':paymentForm.$submitted && !paymentForm.exp_year.$valid}">--}}
                                {{--<span>Expiration Date <span class="red_error">*</span></span>--}}
                                {{--<p>The date your credit card expires.</p>--}}

                                {{--<select name="exp_year" class="form-control expire_year" ng-model="exp_year" style="display: inline" ng-required="payment_credit" ng-init="payment_credit=true" id="exampleInputexp_year">--}}
                                    {{--<option value="not selected" selected="selected">Year</option>--}}
                                    {{--<option value="1">2017</option>--}}
                                    {{--<option value="2">2018</option>--}}
                                    {{--<option value="3">2019</option>--}}
                                    {{--<option value="4">2020</option>--}}
                                    {{--<option value="5">2021</option>--}}
                                    {{--<option value="6">2022</option>--}}
                                    {{--<option value="7">2023</option>--}}
                                    {{--<option value="8">2024</option>--}}
                                    {{--<option value="9">2025</option>--}}
                                    {{--<option value="10">2026</option>--}}
                                    {{--<option value="11">2027</option>--}}
                                    {{--<option value="12">2028</option>--}}
                                    {{--<option value="13">2029</option>--}}
                                    {{--<option value="14">2030</option>--}}
                                    {{--<option value="15">2031</option>--}}
                                    {{--<option value="16">2032</option>--}}
                                    {{--<option value="17">2033</option>--}}
                                    {{--<option value="18">2034</option>--}}
                                    {{--<option value="19">2035</option>--}}
                                    {{--<option value="20">2036</option>--}}
                                    {{--<option value="21">2037</option>--}}
                                    {{--<option value="22">2038</option>--}}
                                    {{--<option value="23">2039</option>--}}
                                    {{--<option value="24">2040</option>--}}
                                {{--</select>--}}

                                {{--<select name="exp_month" class="form-control expire_month" ng-model="exp_month" ng-required="payment_credit" ng-init="payment_credit=true" id="exampleInputexp_month" style="display:inline; margin-right: 1%">--}}
                                    {{--<option value="not selected" selected="selected">Month</option>--}}
                                    {{--<option value="January">January</option>--}}
                                    {{--<option value="February">February</option>--}}
                                    {{--<option value="March">March</option>--}}
                                    {{--<option value="Aprial">Aprial</option>--}}
                                    {{--<option value="May">May</option>--}}
                                    {{--<option value="June">June</option>--}}
                                    {{--<option value="July">July</option>--}}
                                    {{--<option value="August">August</option>--}}
                                    {{--<option value="September">September</option>--}}
                                    {{--<option value="Octomber">Octomber</option>--}}
                                    {{--<option value="November">November</option>--}}
                                    {{--<option value="December">December</option>--}}
                                {{--</select>--}}
                                {{--<div>--}}
                                    {{--<span ng-show="paymentForm.$submitted && (paymentForm.exp_year.$error.required || paymentForm.exp_month.$error.required)" class="inline-error-msg-credit help-block">Card Expired month and year are required.</span>--}}
                                {{--</div>--}}

                                {{--<input style="width: 28%" type="text" name="cardexpiredate" ng-model="cardexpiredate" required class="form-control" id="exampleInputexpirationdate" placeholder="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}">--}}

                            {{--</div>--}}

                            {{--<div class="form-group ">--}}
                                {{--<input type="checkbox" name="agreetoterm" />&nbsp;I have read and agreed to <a>CoolHost's terms and service</a> and <a>privacy policy</a>.--}}
                            {{--</div>--}}

                            {{--<div class="form-group ">--}}
                                {{--<span>Note:&nbsp;</span>--}}
                                {{--<span class="privacystatement_span">These are our privacy policy and services read and unserstand our privacu policy and condition.<br/>--}}
                                    {{--so are our privacy policy and services read and unserstand our privacu policy and conditionv--}}
                                    {{--These are our privacy<br/> policy and services read and unserstand our privacu policy and conditionv<br/>--}}
                                {{--</span>--}}

                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                    {{--paypal area--}}

                    {{--<div id="payment-paypal-area" class="col-lg-12 secondDiv1 payment-paypal-area-margin">--}}
                        {{--<br>--}}
                        {{--<div>--}}
                            {{--<img src="images/paypal.png"/>--}}
                        {{--</div>--}}
                        {{--<br/>--}}
                        {{--<div>--}}
                            {{--<h3 class="paypal-area-head">PayPal payment</h3><br/>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-12">--}}
                            {{--<p class="paypal-area-para">You have chosen to pay using gpaypal.After placing your youwill be redirected to paypal to complte your payment.</p>--}}
                        {{--</div>--}}
                        {{--<br/><br/>--}}

                        {{--<div class="col-lg-12">--}}
                            {{--<input type="checkbox" name="agreetoterm" />&nbsp;&nbsp;I have read and agreed to <a>CoolHost's terms and service</a> and <a>privacy policy</a>.--}}
                        {{--</div>--}}
                        {{--<br/><br/><br/>--}}
                        {{--<div class="col-lg-12">--}}
                            {{--<span>Note:&nbsp;</span>--}}
                            {{--<span style="font-size: 0.9em;color: #a4aaae">These are our privacy policy and services read and unserstand our privacu policy and condition.<br/>--}}
                                    {{--so are our privacy policy and services read and unserstand our privacu policy and conditionv--}}
                                    {{--These are our privacy<br/> policy and services read and unserstand our privacu policy and conditionv<br/>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}




                    {{--<div class="clearfix"> </div>--}}

                {{--</div>--}}

                {{--<br/><br/>--}}

                {{--<div class="col-xs-6">--}}
                    {{--&nbsp;--}}
                {{--</div>--}}

                {{--<div class="payment-sendbtns form-group col-sm-6">--}}
                    {{--<input type="reset" value="Cancel" style="display: inline">--}}
                    {{--<input type="submit" value="Process order" style="display: inline">--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}

        {{--@endif--}}


                {{--success account msg div--}}



                {{--<div class="loginfailmsg col-xs-12">--}}
                    {{--<h4 class="loginfailmsg-header">Your login is fail.</h4>--}}
                    {{--<p>Please enter correct password.</p>--}}
                {{--</div>--}}


            {{--<div class="clearfix"></div>--}}

            {{--<br /><br />--}}
        {{--</div>--}}
    {{--</div>--}}



    {{--<!--//////////////////////////-->--}}


{{--<div class="footer">--}}
    {{--<div class="container">--}}
        {{--<p>&copy; Powered By CSS</p>--}}
    {{--</div>--}}
{{--</div>--}}





