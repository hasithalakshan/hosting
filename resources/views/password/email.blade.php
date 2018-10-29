@extends('layouts.master')

@section('passwordEmail')

    <style>
        html{
            background-color: #4077b5;
        }
        body{
            background-color: #4077b5;
        }
    </style>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('emailCheckToResetPwd') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="resetEmail" value="" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button> <br/><br/>

                                @if(session('resetEmailIssue'))
                                    <p style="color: indianred">{{session('resetEmailIssue')}}</p>
                                @endif
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="directLogin">Return to Login</a>&nbsp;&nbsp;&nbsp;<span style="color: #a3afb7">New to CoolHost?</span> <a href="register">Sign up!</a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">

                                </div>
                            </div>

                                @if(session('emailSend'))
                                    <div class="col-md-6 col-md-offset-4  alert-success">
                                        {{ session('emailSend') }}
                                    </div>
                                @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection