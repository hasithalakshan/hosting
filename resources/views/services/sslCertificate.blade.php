@extends('layouts.master')

@section('sslCertification')

    @include('elements.header2')

    <div class="service-ssl-head">
        <br/><br/>
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color: #4980c4">
                    <ul class="nav navbar-nav" style="margin-left: 15%">
                        <li style="width: 200px"><a href="webHosting" style="color: white">Web Hosting</a></li>
                        <li style="width: 200px"><a href="fileExchange" style="color: white">File Exchange FTP</a></li>
                        <li class="active" style="width: 200px"><a href="sslCertification">SSL Certificates</a></li>
                        <li style="width: 200px"><a href="technicalServices" style="color: white">Technical Service</a></li>
                        <li style="width: 200px"><a href="performanceOptimization" style="color: white">Performance</a></li>
                        <li style="width: 200px"><a href="vpsServer" style="color: white">Vps Server</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <br/><br/><br/><br/><br/><br/>

        <div class="col-md-12 ser-ssl-body">
            <div class="row ser-ssl-row">
                <div class="col-md-6 ser-ssl-leftDetail">
                    <div class="ser-ssl-detailTopic">
                        <h2>Safty payment with credit card on your website</h2>
                    </div>
                    <div class="ser-ssl-detailSet">
                        <p>If you want to handle to a much larger customers, It is better to use SSL certificate with your host to take better performance. An SSL to keep customers clicking through to checkout. </p>
                    </div>
                </div>
                <div class="col-md-6 ser-ssl-rightDetail">
                    <div class="ser-ssl-images">
                        <img src="/images/ssl1.png" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ser-ssl-bodySecond">
            <div class="row ser-ssl-row">
                <div class="col-md-6 ser-ssl-leftDetail">
                    <div class="ser-ssl-detailTopic">
                        <h2> Increase customer confidence </h2>
                    </div>
                    <div class="ser-ssl-detailSet">
                        <p> Most of the people like to sea for the https:// prefix in they used browser url before send personal information like their name,credit card number and address to a website. So an SSL certificate is the only way to get this. </p>
                    </div>
                </div>
                <div class="col-md-6 ser-ssl-rightDetail">
                    <div class="ser-ssl-images">
                        <img src="/images/sslseo.png" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ser-ssl-body">
            <div class="row ser-ssl-row">
                <div class="col-md-6 ser-ssl-leftDetail">
                    <div class="ser-ssl-detailTopic">
                        <h2>Protect Your private information </h2>
                    </div>
                    <div class="ser-ssl-detailSet">
                        <p>SSL Certificates are responsible for protect your customers’ important sensitive information by encrypting the data which they send to you, then after decrypting it once you’ve received it through SSL. </p>
                    </div>
                </div>
                <div class="col-md-6 ser-ssl-rightDetail">
                    <div class="ser-ssl-images3">
                        <img src="/images/sslseure3.png" />
                    </div><br/><br/>
                </div>
            </div>
        </div>
    </div>


    @include('elements.footer')

@endsection