

@extends('layouts.master')

@section('plan')


@include('elements.header')

<div class="about">
	<div class="container">
		<div class="plans-view">
			<div class="col-md-4">
				<div class="pricing-table-grid">
                    @foreach($hostPlans as $hostPlan)
                        @if(($hostPlan->id)=='1')
                            <div class="plans_head">
                                <h3>{{$hostPlan->type}}</h3>
                                <h4 class="m_4"><small class="m_2">RS</small>{{$hostPlan->price}}<small small class="m_3">/mo</small></h4>
                                <p>Personal hosting plan is better for low requirements</p>
                            </div>
                            <ul>
                                <li><a href="#">{{$hostPlan->storage}}GB Disk Space</a></li>
                                <li><a href="#">{{$hostPlan->bandwidth}}GB Monthly Bandwidth</a></li>
                                <li><a href="#">Unlimited Users</a></li>
                                <li><a href="#">Cron Job</a></li>
                                <li><a href="#">SSH</a></li>
                                <li><a href="#">{{$hostPlan->no_of_email_account}} Email Accounts</a></li>
                                <li><a href="#">Automatic Cloud Backups</a></li>
                            </ul>
                            <a class="button" href="{{ url('register')}}">Order Now</a>
                        @endif
                    @endforeach
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-table-grid">
                    @foreach($hostPlans as $hostPlan)
                        @if(($hostPlan->id)=='2')
                            <div class="plans_head1">
                                <h3>{{$hostPlan->type}}</h3>
                                <h4 class="m_4"><small class="m_2">RS</small>{{$hostPlan->price}}<small small class="m_3">/mo</small></h4>
                                <p>Professional hosting plan is better for medium requirements</p>
                            </div>
                            <ul>
                                <li><a href="#">{{$hostPlan->storage}}GB Disk Space</a></li>
                                <li><a href="#">{{$hostPlan->bandwidth}}GB Monthly Bandwidth</a></li>
                                <li><a href="#">Unlimited Users</a></li>
                                <li><a href="#">Cron Job</a></li>
                                <li><a href="#">SSH</a></li>
                                <li><a href="#">{{$hostPlan->no_of_email_account}} Email Accounts</a></li>
                                <li><a href="#">Automatic Cloud Backups</a></li>
                            </ul>
                            <a class="button1" href="{{ url('register')}}">Order Now</a>
                        @endif
                    @endforeach
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-table-grid">
                    @foreach($hostPlans as $hostPlan)
                        @if(($hostPlan->id)=='3')
                            <div class="plans_head">
                                <h3>{{$hostPlan->type}}</h3>
                                <h4 class="m_4"><small class="m_2">RS</small>{{$hostPlan->price}}<small small class="m_3">/mo</small></h4>
                                <p> We recommend this business plan for better performance</p>
                            </div>
                            <ul>
                                <li><a href="#">{{$hostPlan->storage}}GB Disk Space</a></li>
                                <li><a href="#">{{$hostPlan->bandwidth}}GB Monthly Bandwidth</a></li>
                                <li><a href="#">Unlimited Users</a></li>
                                <li><a href="#">Cron Job</a></li>
                                <li><a href="#">SSH</a></li>
                                <li><a href="#">{{$hostPlan->no_of_email_account}} Email Accounts</a></li>
                                <li><a href="#">Automatic Cloud Backups</a></li>
                            </ul>
                            <a class="button" href="{{ url('register')}}">Order Now</a>
                        @endif
                    @endforeach
				</div>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="contact_index" id="contactus-section" style="background-color: #292c2f;">
    <div class="container">
        <div class="col-md-8 contact_index-left">
            <h3>Send Us A Message</h3>
            <div class="contact-form">
                <form id="userMessageFormIndex">
                    {{--autocomplete=off mean when refresh page to clear fields..--}}
                    <input name="messageUserEmail" autocomplete="off" type="text" class="contact-form-font" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                    <textarea name="messageUserMessage" autocomplete="off" class="contact-form-font" placeholder="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                    {{csrf_field()}}
                </form>

                <input class="userSendMsg" type="submit" value="Send Now" />&nbsp;&nbsp;<span id="loading" style="display: none;"><i class="glyphicon glyphicon-refresh gly-spin"></i></span>
            </div>
            <br/>

            <div class="alert" style="display: none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Success!</strong> Received your message.
            </div>
            <div class="wrongAlert" style="display: none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Wrong!</strong> Something went wrong!
            </div>

        </div>
        <div class="col-md-4 contact_index-right">
            <h3 style="color: #5bc0de;display: inline">Quick Links &nbsp;&nbsp;&nbsp;&nbsp;</h3>
            <ul id="quicklink" class="footer_social" style="display: inline">
                <li><a href="mailto:hlakshan11@gmail.com" id="phoneWindowAnchorMail"> <i class="email"> </i> </a></li>
                <li><a href="#phonewindow" id="phonewindowanchor"> <i class="phone"> </i></a></li>
            </ul>
            <br/><br/>
            <div class="contact-number-window" id="phonewindow" style="display: none; border: 1px solid #5bc0de; width: 100%; height: 10%" >
                <p align="center">You can contact us using following numbers</p>
                <p align="center">0117646484,&nbsp;&nbsp;0112345434</p>
                <a href="tel:0117646484" style="float: right; color: #5bc0de">Call</a>
            </div>
        </div>
    </div>
</div>

@include('elements.footer')

@endsection

