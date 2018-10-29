
@extends('layouts.master')

@section('myProfile')

@include('elements.header')

<div class="profilePage_backGround">
        <br/>
        <div class="order_logo_margin">
            <a href="index.html"><img style="width: 200px; height: 60px" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
        </div>
        <br/>

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-2">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6" style="padding-left: 15%;">
                                    {{--<span><a href="#" id="register-form-link" class="">My Profile</a></span>--}}
                                    <span><img src="/thumbnail_images/{{$user->avatar}}" class="profile-picture-style" /></span>
                                </div>
                                <div class="col-xs-6 pull-right" style="margin-top: 10%;">
                                    {{--<span><a href="#" id="register-form-link" class="">My Profile</a></span>--}}
                                    <span><a href="#" id="register-form-link" style=" font-size: 1.6em">My Profile</a></span>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form name="myProfileForm" id="myProfile-form" class="form-group" method="post" action="updateMyProfile"  enctype="multipart/form-data" role="form" style="display: block;">

                                        <div class="form-group">
                                            <input type="text" name="userName" id="fname" tabindex="1" class="form-control" placeholder="Username" value="{{$user->name}}">
                                            @if ($errors->has('userName'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('userName') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" required placeholder="Email Address" value="{{$user->email}}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <ul class="myProfile-ui">
                                            <li>Update Your Password</li></br>
                                        </ul>
                                        <div class="form-group">
                                            <input type="password" name="currentPassword" id="currentPassword"  tabindex="2" class="form-control" placeholder="Current Password" value="{{old('currentPassword')}}">
                                            @if ($errors->has('currentPassword'))
                                                <span class="help-block">
                                                    <strong style="color: #a06c7e" >{{ $errors->first('currentPassword') }}</strong>
                                                </span>
                                            @endif
                                            @if(Session::has('currentPasswordNotMatch'))
                                                <span class="help-blockr">
                                                    <br/>
                                                    <h4  style="color: #a06c7e;" class="update-profile-password-error">{{ Session::get('currentPasswordNotMatch') }}</h4>
                                                </span>
                                            @endif
                                            {{--@if (count($errors) > 0)--}}
                                                {{--<span class="help-block">--}}
                                                    {{--<strong>{{ $errors ->first()}}</strong>--}}
                                                {{--</span>--}}
                                            {{--@endif--}}
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="newPassword" id="newPassword"  tabindex="2" class="form-control" placeholder="New Password">
                                            @if ($errors->has('newPassword'))
                                                <span class="help-block">
                                                    <strong style="color: #a06c7e">{{ $errors->first('newPassword') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="confirmPassword" id="confirmPassword"   tabindex="2" class="form-control" placeholder="Confirm Password">
                                            @if ($errors->has('confirmPassword'))
                                                <span class="help-block">
                                                    <strong style="color: #a06c7e;">{{ $errors->first('confirmPassword') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        </br>
                                        <ul class="myProfile-ui">
                                            <li>Update Your Profile Picture</li></br>
                                        </ul>
                                        <input type="file" name="image" />
                                        </br>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <div class="sucessaccount-msg col-xs-12">
                                <br/>
                                <h4 class="sucessaccount-msg-header-fail">{{ Session::get('message') }}</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/>

        @include('elements.footer')
    </div>

@endsection

<script type="text/javascript">

    {{--localStorage.setItem('user',{{$user}});--}}
//    alert("");
</script>