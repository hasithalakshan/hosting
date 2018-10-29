@extends('layouts.master')

@section('passwordReset')
    <style>
        html{
            background-color: #4077b5;
        }
        body{
            background-color: #4077b5;
        }
    </style>
    <br/><br/><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('passwordUpdate') }}" novalidate>
                            {{ csrf_field() }}

                            {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">

                                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus >

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="directLogin">Return to Login</a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <span style="color: #a3afb7">New to CoolHost?</span> &nbsp; <a href="register">Sign up!</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload= function(){

        @if (session('resetUserEmail'))
        {{--alert('{{ session('resetUserEmail')}}');--}}
        //store reset email in localStorage...
        localStorage.setItem('resetUserEmail', '{{ session('resetUserEmail')}}');
        @endif

        //get variable and set that to email field value...
        document.getElementById("email").value = localStorage.getItem("resetUserEmail");
    }
</script>
