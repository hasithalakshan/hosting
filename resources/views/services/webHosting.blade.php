@extends('layouts.master')

@section('webHosting')

    @include('elements.header2')
    <div class="service-head">
        <br/><br/>
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color: #4980c4">
                    <ul class="nav navbar-nav" style="margin-left: 15%">
                        <li class="active" style="width: 200px"><a href="webHosting">Web Hosting</a></li>
                        <li style="width: 200px"><a href="fileExchange" style="color: white">File Exchange FTP</a></li>
                        <li style="width: 200px"><a href="sslCertification" style="color: white">SSL Certificates</a></li>
                        <li style="width: 200px"><a href="technicalServices" style="color: white">Technical Service</a></li>
                        <li style="width: 200px"><a href="performanceOptimization" style="color: white">Performance</a></li>
                        <li style="width: 200px"><a href="vpsServer" style="color: white">Vps Server</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <br/><br/><br/><br/><br/><br/>
        <div class="col-md-12 ser-header-body">
            <div class="col-sm-6 ser-header-web">
                <h3 class="ser-header-topic">High Performance with CoolHost</h3>
                <ul>
                    <li><p>CoolHost gives you a vast array of tools to take your idea or business online today! From site building tools and templates,
                            to our one-click application installer, everything you need to launch a website is literally at your fingertips.</p></li>
                    {{--<li><p>The completely autonomous virtual server is fully allocated to your site</p></li>--}}
                    {{--<li><p>All the benefits of dedicated resources without the cost of a dedicated server</p></li>--}}
                </ul>
            </div>
            <div class="col-sm-6 ser-header-web-right">
                <img src="/images/ser7.png" />
            </div>
        </div>

        <div class="col-md-12 ser-header-body">
            <div class="col-sm-6 ser-header-web">
                <img src="/images/ser5.png" />
            </div>
            <div class="col-sm-6 ser-header-web-right" style="padding-left: 0px;">
                <h3 class="ser-header-topic">Easily And Quickly Started</h3>
                <ul>
                    <li><p>For example, our own CoolHost Website Builder provides an incredibly convenient drag-and-drop building experience.
                            You can choose from a wide selection of themes, and even pre-built sections, to craft your own amazing website and
                            publish it in no time!</p></li>
                    {{--<li><p>All VPS servers are housed in a state-of-the-art data center featuring redundant power and HVAC unit</p></li>--}}
                    {{--<li><p>A RAID 10 disk configuration provides maximum data protection</p></li>--}}
                </ul>
            </div>
        </div>

        <div class="col-md-12 ser-header-body">
            <div class="col-sm-6 ser-header-web">
                <h3 class="ser-header-topic">Quickly Installation! </h3>

                <ul>
                    <li><p>With our QuickInstall tool, available on every Web Hosting plan, you can create virtually any type of website: blog,
                            forum, CMS, wiki, photo gallery, E-commerce store, and so much more! Since coolhost runs on Linux, Apache, MySQL, and PHP,
                            thousands of existing applications and software are compatible.</p></li>
                    <li><p>Easy scalability means never paying for more resources than you actually need</p></li>
                    <li><p>Start small and grow your hosting along with your business</p></li>
                </ul>
            </div>
            <div class="col-sm-6 ser-header-web-right">
                <img src="/images/server.png" />
            </div>
        </div>


        <div>
            &nbsp;<br/><br/><br/><br/>
        </div>


    @include('elements.footer')

@endsection


