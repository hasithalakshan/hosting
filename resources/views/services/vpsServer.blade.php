@extends('layouts.master')

@section('vpsServer')

    @include('elements.header2')
        <div class="service-head">
            <br/><br/>
            <div class="col-lg-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid" style="background-color: #4980c4">
                        <ul class="nav navbar-nav" style="margin-left: 15%">
                            <li style="width: 200px"><a href="webHosting" style="color: white">Web Hosting</a></li>
                            <li style="width: 200px"><a href="fileExchange" style="color: white">File Exchange FTP</a></li>
                            <li style="width: 200px"><a href="sslCertification" style="color: white">SSL Certificates</a></li>
                            <li style="width: 200px"><a href="technicalServices" style="color: white">Technical Service</a></li>
                            <li style="width: 200px"><a href="performanceOptimization" style="color: white">Performance</a></li>
                            <li class="active" style="width: 200px"><a href="vpsServer">Vps Server</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <br/><br/><br/><br/><br/><br/>
            <div class="col-md-12 ser-header-body">
                <div class="col-sm-6 ser-header-web">
                    <h3 class="ser-header-topic">Complete Customization<br/>Without The Expense</h3>
                    <ul>
                        <li><p>Full root access allows total control over your hosting environment, including custom installs and configuration</p></li>
                        <li><p>The completely autonomous virtual server is fully allocated to your site</p></li>
                        <li><p>All the benefits of dedicated resources without the cost of a dedicated server</p></li>
                    </ul>
                </div>
                <div class="col-sm-6 ser-header-web-right">
                    <img src="/images/vps6.png" />
                </div>
            </div>

            <div class="col-md-12 ser-header-body">
                <div class="col-sm-6 ser-header-web">
                    <img src="/images/src3.png" />
                </div>
                <div class="col-sm-6 ser-header-web-right" style="padding-left: 0px;">
                    <h3 class="ser-header-topic">Increased Reliability</h3>
                    <ul>
                        <li><p>Multiple layers of network security and several bandwidth providers are utilized to ensure maximize server reliability</p></li>
                        <li><p>All VPS servers are housed in a state-of-the-art data center featuring redundant power and HVAC unit</p></li>
                        <li><p>A RAID 10 disk configuration provides maximum data protection</p></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 ser-header-body">
                <div class="col-sm-6 ser-header-web">
                    <h3 class="ser-header-topic">Fully Scalable<br/>To Grow With You</h3>

                    <ul>
                        <li><p>A VPS scales up at the click of a button to easily add resources as your website grows in audience or complexity</p></li>
                        <li><p>Easy scalability means never paying for more resources than you actually need</p></li>
                        <li><p>Start small and grow your hosting along with your business</p></li>
                    </ul>
                </div>
                <div class="col-sm-6 ser-header-web-right">
                    <img src="/images/src4.png" />
                </div>
            </div>



            <div>
                &nbsp;<br/><br/><br/><br/>
            </div>
        </div>

    @include('elements.footer')
@endsection