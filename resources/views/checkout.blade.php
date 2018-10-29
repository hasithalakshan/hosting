@extends('layouts.master')

@section('checkout')

    {{--<script src="https://www.2checkout.com/checkout/Api/2co.min.js"></script>--}}
    <div class="header_top" style="background-color: #394962" xmlns="http://www.w3.org/1999/html">
            <div class="container">
                <div class="col-sm-6 header-top-left">
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-6 header-top-right">
                        <div class="col-xs-7 phone">
                            <p>24/7&nbsp;Support&nbsp;&nbsp;&nbsp;011-2541879</p>
                        </div>
                        <div class="col-xs-5 check_box dropdown">
                            <a>
                                <ul class="check" style="height: 42px">
                                    <i class="" aria-hidden="true"> </i>
                                        <li class="cart_desc dropbtn"> &nbsp;<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; {{$userName}}</li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </a>
                            <div class="dropdown-content">
                                <a href="{{url('myProfile')}}">My Profile</a>
                                <a href="{{url('logout')}}">Logout</a>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="background_server-checkout">
            </br>
            <div class="order_logo_margin">
                <a href="/"><img class="payment-logo" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
            </div>
            </br>
            <div style="background-color: #dbe7ef">
                <br/>
                <div class="">
                    <div style="text-align: center">
                        <h3>Hosting Payment Area</h3>
                        <p style="color: #74c3d5">We have plans for more type of websites. You have choosen a better shared hosting plan and consider following details</p>
                        </br>
                    </div>
                </div>
            </div>
            <br/>
            @if(Session::has('loginsuccess'))
                <div class="sucessaccount-msg col-xs-12">
                    <h3 class="sucessaccount-msg-header">{{ Session::get('loginsuccess') }}</h3>
                    <br/>
                </div>
            @endif

            <div class="container" ng-app="checkoutApp"  ng-controller="mainController">
                <div class="row">
                    <br>
                    <div class="col-md-12">
                        <div class="panel panel-login" style="width: 100%">
                            <div class="panel-heading"  style="background-color: #6f889b; height: 140px">
                                <div class="row">
                                    <div class="col-xs-12"><br/>
                                        <p class="payment-topic">Review Order Details</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form name="" id="tcoCCForm" action="paymentInvoice" onsubmit="return true" method="get" role="form" >
                                            <div class="row" style="background: #f0f6fa;">
                                                <div class="form-group order-row-margin">
                                                    <p class="payment-paragra">Hosting plan:</p>
                                                    <span class="payment-span-1 payment-span-typefont">{{$hostPlan->type}}</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group order-row-margin">
                                                        <p class="payment-paragra"> 24/7/365 Phone,Email Support :</p>
                                                        <span class="payment-span-1">Free</span>
                                                </div>
                                            </div>

                                            <div class="row" style="background: #f0f6fa;">
                                                <div class="form-group order-row-margin">
                                                        <p class="payment-paragra"> Uptime Guarantee :</p>
                                                        <span class="payment-span-1">99.99%</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group order-row-margin">
                                                    <p class="payment-paragra">Total price :</p>
                                                    <span class="payment-span-1"  name="" >Rs:{{($hostPlan->price)*12}}/-</span>
                                                </div>
                                            </div>

                                            <div class="row" style="background: #f0f6fa;">
                                                <div class="form-group order-row-margin">
                                                    <p class="payment-paragra">Discount :</p>
                                                    <span class="payment-span-1">(-)Rs:{{'12'*'10'}}/-</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group order-row-margin">
                                                    <p class="payment-paragra">Amount Due (1 Year) :</p>
                                                    <span class="payment-span-1 payment-span-font">Rs:{{($hostPlan->price)*12-'120'}}/-</span>
                                                </div>
                                            </div>

                                            </br>
                                            <legend></legend>

                                            <div class="row">
                                            </div>
                                            </br>

                                            <div class="form-group text-center" style="color: #a1a1a1;font-size: 14px;">
                                                <p>Qualified packages include instant activation and 24 hour support. Introductory prices apply to the first term. Money-back guarantee applies to hosting and domain privacy. All plans and products automatically renew for the same term length at regular rates, which will be available in your control panel. Unless you request a change or cancellation, the payment method provided today will be used for renewals.</p>
                                            </div>
                                            <legend></legend>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" name="agreeForCondition" id="payment-agree" ng-model="checked" />
                                                <label for="payment-agree">I agreed to <a href="termsAndCondition">terms of services</a></label>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-4 col-sm-offset-4">
                                                        <input type="submit" name="payment-submit" ng-disabled="!checked" tabindex="4" class="form-control btn btn-checkout" value="Order Complete">
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="checkout-area-para">After placing you will be redirected to 2CHECKOUT to complete your payment.</p>


                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/><br/>

            @include('elements.footer')

        </div>
@endsection


