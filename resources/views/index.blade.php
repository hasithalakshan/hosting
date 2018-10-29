
@extends('layouts.master')

@section('content')

<div class="header">
    @include('elements.header')

	<div class="container">
		<div class="header_bottom">
			<div class="col-xs-3 logo">
				<a href="/"><img style="width: 60%; height: 10%" src="images/logo22.png" alt=""/></a>
			</div>
			<div class="col-xs-9 header_nav">
				<div class="col-xs-9 menu">
					<a class="toggleMenu" href="#"><img src="images/nav_icon.png" alt="" /> </a>
					<ul class="nav" id="nav">
						<li class="current"><a href="">Home</a></li>
						<li><a href="#hosting-section">Hosting</a></li>
						<li><a href="#services-section">Services</a></li>
						<li><a href="#aboutus-section">About Us</a></li>
						<li><a href="#contactus-section">Contact us</a></li>
					</ul>
					<script type="text/javascript" src="js/responsive-nav.js"></script>
				</div>
				<div class="col-xs-3 header_but">
					<menu class="cl-effect-8" id="cl-effect-8">
						<a href="goToClientArea">Client Area</a>
					</menu>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="header_bot_grid">
		<h1>CoolHost with us for better Experience</h1>
		<div class="header-btns">
			<a class="plans btn btn-primary1 btn-normal btn-inline" href="{{ url('plans')}}">View Plans</a>
			<!-- <a class="plans btn btn-primary2 btn-normal btn-inline" href="domain.html">Buy Now</a> -->
		</div>
		<span></span>
	</div>
</div>

<div class="content_top">
	<div class="container">
		<div class="col-md-3 grid_1">
			<i class="time"> </i>
			<h3>99.99% Uptime</h3>
			<p>The 99.9% uptime guarantee also features daily backups, with multiple restore points and Password-protected directories are also included.</p>
		</div>
		<div class="col-md-3 grid_1">
			<i class="platform"> </i>
			<h3>Multi-Platform</h3>
			<p>Both Windows- and Linux-based shared hostingy can be used as your prefere.Enjoy with with maximal uptime guarantees</p>
		</div>
		<div class="col-md-3 grid_1">
			<i class="fast"> </i>
			<h3>Amazingly Fast</h3>
			<p>Rich server performance is almost always up to your web host. So we always give you high performance.so you can get super fast!.</p>
		</div>
		<div class="col-md-3 grid_1">
			<i class="data"> </i>
			<h3>Data Recovery</h3>
			<p>Oursubject-matter have prepared complex backup scripts that automatically maintain copies of all important files and folders, in a secure manner.</p>
		</div>
	</div>
</div>

<div class="content_bottom">
	<div class="container" id="hosting-section">
		<div class="box3">
			<h2>Hosting Pricing Plans.</h2>
			<p>We have plans for every type of websites. You can choose a better shared hosting plan by cosidering following details</p>
		</div>
		<div class="plans">

			<div class="col-md-4">
                <div class="pricing-table-grid hosttype1" id="1">
                    @foreach($hostPlans as $hostPlan)
                        @if(($hostPlan->id)=='1')
                            <form>
                                <div class="plans_head">
                                    <h3 type-id="4" name="1">{{$hostPlan->type}}</h3>
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
                                <a class="button hostpkg1" onclick="setSelectedPkg('1')" id="1" href="{{ url('register')}}" >Order Now</a>
                                {{ csrf_field() }}
                            </form>
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
                                <p>Professional hosting plan is good for medium requirements</p>
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
                            <a class="button1 hostpkg1" id="2"  onclick="setSelectedPkg('2')" href="{{ url('register')}}" id="ordernow_2">Order Now</a>
                            {{ csrf_field() }}
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
                                <p>We recommend this business plan for better performance</p>
                            </div>
                            <ul>
                                <li><a href="#">{{$hostPlan->price}}GB Disk Space</a></li>
                                <li><a href="#">{{$hostPlan->bandwidth}}GB Monthly Bandwidth</a></li>
                                <li><a href="#">Unlimited Users</a></li>
                                <li><a href="#">Cron Job</a></li>
                                <li><a href="#">SSH</a></li>
                                <li><a href="#">{{$hostPlan->no_of_email_account}} Email Accounts</a></li>
                                <li><a href="#">Automatic Cloud Backups</a></li>
                            </ul>
                            <a class="button hostpkg1" id="3"  onclick="setSelectedPkg('3')" href="{{ url('register')}}" id="ordernow_3">Order Now</a>
                        @endif
                    @endforeach
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="plans_desc">
			<h3>Want some Customize Plan for your need ?</h3>
			<a class="contact_btn" href="#contactus-section">Contact Us</a>
		</div>
	</div>
</div>

<div class="services" id="services-section">
	<div class="container">
		<div class="span_1">
			<h3>Services Offered</h3>
			<p>We provide following services to our clients with better experience. and also give special services according to customer request.</p>
		</div>
		<div class="span_2">
			<div class="span_2-top">
				<div class="col-md-4">
					<ul class="hosting">
						<i class="icon1"> </i>
						<li class="host_desc">
							<h4>Web Hosting</h4>
							<p>You can host your web site in our hosting plans as your choice. in this momvment we give three kind of hosting plans with lower price and better performance.</p>
							<a class="button2" href="webHosting">Learn More</a>
						</li>
					</ul>
				</div>

				<div class="col-md-4">
					<ul class="hosting">
						<i class="icon3"> </i>
						<li class="host_desc">
							<h4>File Exchange FTP</h4>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </p>
							<a class="button2" href="fileExchange">Learn More</a>
						</li>
					</ul>
				</div>

				<div class="col-md-4">
					<ul class="hosting">
						<i class="icon6"> </i>
						<li class="host_desc">
							<h4>SSL Certificates</h4>
							<p>Secure your site and boost your SEO with a free Let’s Encrypt SSL certificate. And enjoy with SSl certificates. </p>
							<a class="button2" href="sslCertification">Learn More</a>
						</li>
					</ul>
				</div>

				<div class="clearfix"> </div>
			</div>
			<div class="span_2-bottom">
				<div class="col-md-4">
                    <ul class="hosting">
                        <i class="icon2"> </i>
                        <li class="host_desc">
                            <h4>Technical Service</h4>
                            <p>We give you to most systematic approach to problem solving. We do not find the easy way to out. we find the correct way out with better service. </p>
                            <a class="button2" href="technicalServices">Learn More</a>
                        </li>
                    </ul>
                </div>
				<div class="col-md-4">
                    <ul class="hosting">
                        <i class="icon4"> </i>
                        <li class="host_desc">
                            <h4>Performance Optimization</h4>
                            <p>Slow site hurt your business. We boost web site loading time & optimize with 100% assurance. </p>
                            <a class="button2" href="performanceOptimization">Learn More</a>
                        </li>
                    </ul>
				</div>
				<div class="col-md-4">
					<ul class="hosting">
						<i class="icon5"> </i>
						<li class="host_desc">
							<h4>Vps Server</h4>
							<p>Virtual Private Servers give developers, designers, and businesses more power, speed, and scalability to run their websites and apps. </p>
							<a class="button2" href="vpsServer">Learn More</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<div class="about_grid" id="aboutus-section">
	<div class="container">
		<div class="span_1 span_3">
			<h4>About Us</h4>
			<p>While times may change, our commitment to our customers never waivers! We are one of the few service providers that offer around-the-clock customer support with live representatives available 24/7</p>
		</div>
		<div class="span_5">
			<div class="col-md-5 span_5-left">
				<p class="m_1">CoolHost is a better web hosting provider in the industries.We stated this service and business at 2017 by giving better performance to our clients.</p>
				<p class="m_2"> It was popularised in the same year 2017s. And we always dedicate to give service as much as possible to our clients</p>
				<a class="button3" href="https://css.lk/">Learn More</a>
			</div>
			<div class="col-md-7">
				<div class="span_5-right">
					<span> </span>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="testimonail">
	<div class="container">
		<ul class="test">
			<li class="test_img"><img src="images/test_pic.png" class="img-responsive" alt=""/></li>
			<li class="test_desc">
				<p><span class="quotes"> </span>We always ready to give for you better web hosting service with our better experiences.And also we give low price shared hosting packages with more opportunities  - <span class="link"><a href="#">sisira kumara (CEO)</a></span></p>
			</li>
			<div class="clearfix"> </div>
		</ul>
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5a6f40574b401e45400c7d1e/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->


@include('elements.footer')

@endsection

