@extends('layouts.master')

@section('performanceOptimization')

    @include('elements.header2')

    <div class="service-opt-head">
        <br/><br/>
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color: #4980c4">
                    <ul class="nav navbar-nav" style="margin-left: 15%">
                        <li style="width: 200px"><a href="webHosting" style="color: white">Web Hosting</a></li>
                        <li style="width: 200px"><a href="fileExchange" style="color: white">File Exchange FTP</a></li>
                        <li style="width: 200px"><a href="sslCertification" style="color: white">SSL Certificates</a></li>
                        <li style="width: 200px"><a href="technicalServices" style="color: white">Technical Service</a></li>
                        <li class="active" style="width: 200px"><a href="performanceOptimization">Performance</a></li>
                        <li style="width: 200px"><a href="vpsServer" style="color: white">Vps Server</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <br/><br/><br/><br/><br/><br/>

        <div class="col-md-12 ser-opt-body">
            <div class="row ser-opt-row">
                <div class="col-md-12 ser-opt-headDetail">
                    <div class="ser-opt-detailTopic">
                        <h2>Performance Optimization</h2>
                    </div>
                    <div class="ser-opt-imageOPT">
                        <img src="/images/optimization1.png" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ser-opt-bodySecond">
            </br></br>
            <div class="row ser-opt-row ser-opt-middle">
                <h3>The Goals of Website Optimization</h3>
                <p><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;The goals of a website will vary depending upon the type of business, the business’ target customers, and the desired action of that audience: a purchase, filling out a form, or reading an article. The desired action of a website visitor can also be conversions, or the number of audience members who complete a certain action.</p>
            </div>
        </div>

        <div class="col-md-12 ser-opt-bodySecond">
            </br></br>
            <div class="row ser-opt-row ser-opt-middle">
                <h3>Speed of the server</h3>
                <p><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp;Most of Search engines are usually very secretive about the variables that are part of their algorithms, likewise people like faster websites too. So CoolHost in 2017 explicitly affirms that the speed loading a page is one of those factors that can determine your ranking. This is only one of more than 200 factors in value, however you should still pay attention to it.
                        Shared hosting limits your website by bandwidth uploading and downloading rate, so you don’t have to upload much. <our></our> visitors expectation and hence affect your ranking.</p>
            </div>
        </div>
        <div class="col-md-12 ser-opt-bodySecond">
            </br></br>
            <div class="row ser-opt-row ser-opt-middle">
                <h3>Hosting Resources and software updates</h3>
                    <p><span class="glyphicon glyphicon-asterisk"></span> &nbsp;&nbsp; The resources or software utilizes by your web host operator should be recent and up to date with market standards. All the software and scripts should be a part of your arrangement with the company. A reliable web hosting provider always updates the recent versions of software. Negligence of software updates can put your website down and hence affect the search engine rankings. You need to be aware of the software used by them and it ought to be current and also acceptable by search engines.</p>
                        <br/>
                    <p>Choosing the right web hosting provider may not guarantee your rankings boost, but it mean you can avoid serious consequences which are significant. So, you need to choose wisely and not just base your decision on price or the reviews.</p>
                <br/><br/>
            </div>
        </div>


    @include('elements.footer')

@endsection