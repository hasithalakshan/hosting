
@extends('layouts.master')

@section('register')


@include('elements.header')

    <div class="background_server">
    <br/>
        <div class="order_logo_margin">
            <a href="index.html"><img style="width: 200px; height: 60px" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
        </div>
    <br/><br/><br/>

    {{--background: url(../images/banner.jpg) no-repeat 0px 0px;--}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" id="register-form-link" class="active">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body" ng-app="validationApp" ng-controller="mainController">
                        <div class="row">
                            <div class="col-lg-12">
                                <form name="registerForm" id="register-form" class="form-group" method="post" role="form" novalidate ng-submit="submitForm(registerForm, $event)" style="display: block;">
                                    <div class="form-group">
                                        <input type="hidden" name="pkg" ng-model="pkg" id="pkg" tabindex="1" class="form-control">
                                    </div>

                                    <div class="form-group" ng-class="{'has-error':registerForm.$submitted && !registerForm.fname.$valid}">
                                        <input type="text" name="fname" ng-model="fname" required ng-maxlength="8" id="fname" tabindex="1" class="form-control" placeholder="Username" value="{{old('fname')}}">
                                        <span ng-show="registerForm.$submitted && registerForm.fname.$error.required" class="error-registerandlogin help-block">&nbsp&nbsp First name is required.</span>
                                        <span ng-show="registerForm.$submitted && registerForm.fname.$error.maxlength" class="error-registerandlogin help-block">&nbsp&nbsp First name is too long.</span>
                                    </div>

                                    <div class="form-group" ng-class="{'has-error':registerForm.$submitted && !registerForm.email.$valid}">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" ng-model="email" ng-pattern="/^(?:\d{10}|\w+@\w+\.\w{2,3})$/" required placeholder="Email Address" value="{{old('email')}}">
                                        <span ng-show="registerForm.$submitted && registerForm.email.$error.required" class="error-registerandlogin help-block">&nbsp&nbsp Email is required.</span>
                                        <span ng-show="registerForm.$submitted && registerForm.email.$error.pattern" class="error-registerandlogin help-block">&nbsp&nbsp Email is invalid.</span>
                                    </div>

                                    <div class="form-group" ng-class="{'has-error':registerForm.$submitted && !registerForm.password.$valid}">
                                        <input type="password" name="password" id="password" ng-model="password" required ng-minlength="3" tabindex="2" class="form-control" placeholder="Password">
                                        <span ng-show="registerForm.$submitted && registerForm.password.$error.required" class="error-registerandlogin help-block">&nbsp &nbsp Password is required.</span>
                                        <span ng-show="registerForm.$submitted && registerForm.password.$error.minlength" class="error-registerandlogin help-block">&nbsp &nbsp Password length is too short.</span>
                                    </div>

                                    <div class="form-group" ng-class="{'has-error':registerForm.$submitted && !registerForm.confirmpassword.$valid}">
                                        <input type="password" name="confirmpassword" id="confirm-password" ng-model="confirmpassword" ng-pattern="password" required tabindex="2" class="form-control" placeholder="Confirm Password">
                                        <span ng-show="registerForm.$submitted && registerForm.confirmpassword.$error.required" class="error-registerandlogin help-block">&nbsp &nbsp Configer password is required.</span>
                                        <span ng-show="registerForm.$submitted && registerForm.confirmpassword.$error.pattern" class="error-registerandlogin help-block">Confirm password didn't match</span>
                                    </div>

                                    </br>
                                    <div style="text-align: center">
                                        <input type="checkbox" name="termandcondition" id="termandcondition" ng-model="checked" />
                                        <label for="termandcondition">&nbsp;&nbsp; I agreed to the </label> &nbsp;<a href="termsAndCondition" class="order_summary_anchor">Terms of Service</a>.<br/><br/>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" ng-disabled="!checked" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
            @if(Session::has('regfailed'))
                <div class="sucessaccount-msg col-xs-12">
                    <h2 class="sucessaccount-msg-header-fail">{{ Session::get('regfailed') }}</h2>
                </div>
            @endif

        </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        @include('elements.footer')
</div>

@endsection



    <script>
        window.onload= function(){
            document.getElementById("pkg").value = localStorage.getItem("selectedPkg")
        }
    </script>






























