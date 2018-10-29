
@extends('layouts.master')

@section('technicalServices')

    @include('elements.header2')

<div class="service-head">
    <br/><br/>
    <div class="col-lg-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid" style="background-color: #4980c4">
                <ul class="nav navbar-nav" style="margin-left: 15%;">
                    <li style="width: 200px;"><a href="webHosting"  style="color: white">Web Hosting</a></li>
                    <li style="width: 200px"><a href="fileExchange"  style="color: white">File Exchange FTP</a></li>
                    <li style="width: 200px"><a href="sslCertification"  style="color: white">SSL Certificates</a></li>
                    <li class="active" style="width: 200px"><a href="technicalServices">Technical Service</a></li>
                    <li style="width: 200px"><a href="performanceOptimization" style="color: white">Performance</a></li>
                    <li style="width: 200px"><a href="vpsServer" style="color: white">Vps Server</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <br/><br/><br/><br/><br/><br/>
    <div class="col-md-12 ser-tec-body">
        <div class="row ser-tec-row">
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/disk1.png" />
                </div>
                <div class="ser-tec-details">
                    <h4>Unmetered Disk </br>Space & Bandwidth</h4>
                    <p>CoolHost places no limitation on the amount <br/>or size of files directly pertaining to your website,<br/> nor do we cap data transfer.</p>
                </div>
            </div>
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/vesta1.png" />
                </div>
                <div class="ser-tec-details">
                    <h4>Easy to Use Control</br> Panel (vestaCP)</h4>
                    <p>We use most popular web hosting control<br/> panel in the world that vestaCP, With better security!</p>
                </div>
            </div>
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/email1.png" />
                </div>
                <div class="ser-tec-details">
                    <h4>Unlimited Email <br/>Addresses</h4>
                    <p>Create as many email addresses, <br/>and email forwards as you need!</p>
                </div>
            </div>
        </div>
        <div class="row ser-tec-row">
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/telephone1.png" />
                </div>
                <div class="ser-tec-details">
                    <h4>24/7/365 Technical</br>Support</h4>
                    <p>We're always here to assist via email, <br/>email, and telephone!</p>
                </div>
            </div>
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/ser7.png" />
                </div>
                <div class="ser-tec-details">
                    <h4>45 Day Money-Back<br/>Guarantee</h4>
                    <p>If you're not completely satisfied, <br/>simply cancel within 45 Days<br/> for a full refund.</p>
                </div>
            </div>
            <div class="col-md-4 ser-tec-type">
                <div class="ser-tec-imges">
                    <img src="/images/ser6.png" />
                </div><br/><br/><br/>
                <div class="ser-tec-details">
                    <h4> Free help for <br/>installation your website</h4>
                    <p>With our QuickInstall tool, available on <br/>every Web Hosting plan, you can create<br/> virtually any type of website.</p>
                </div>
            </div>
        </div>
        <br/><br/><br/>
    </div>
    <div>
        &nbsp;<br/><br/><br/><br/>
    </div>


    @include('elements.footer')

@endsection