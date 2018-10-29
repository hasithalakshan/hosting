@extends('layouts.master')

@section('fileExchange')

    @include('elements.header2')

    <div class="service-head">
        <br/><br/>
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color: #4980c4   ">
                    <ul class="nav navbar-nav" style="margin-left: 15%">
                        <li style="width: 200px"><a href="webHosting" style="color: white">Web Hosting</a></li>
                        <li class="active" style="width: 200px"><a href="fileExchange">File Exchange FTP</a></li>
                        <li style="width: 200px"><a href="sslCertification" style="color: white">SSL Certificates</a></li>
                        <li style="width: 200px"><a href="technicalServices" style="color: white">Technical Service</a></li>
                        <li style="width: 200px"><a href="performanceOptimization" style="color: white">Performance</a></li>
                        <li style="width: 200px"><a href="vpsServer" style="color: white">Vps Server</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <br/><br/><br/><br/><br/><br/>
        <div class="col-md12 ser-ftp-headerImg">
            <img src="/images/ftp2.png" />
        </div>
        <br/><br/><br/><br/>
        <div class="col-md-12 ser-ftp-body">
            <div class="row ser-ftp-row">
                <div class="col-md-12 ser-ftp-head">
                    <h3>FTP Support?</h3>
                </div>

                <div class="col-md-12 ser-ftp-details">
                    <p>FTP is short for File Transfer Protocol. A protocol is a set of rules that networked computers<br/> use to talk to one another. And FTP is the language that computers on a TCP/IP network<br/> (such as the internet) use to transfer files to and from each other.</p>
                    <br/>
                    <p>You’ve probably encountered FTP out there on the net already. Ever downloaded a fresh nightly build of Firefox<br/> or grabbed MP3s from some kid’s personal server in Sweden? Then you have probably used FTP without even knowing it. </p>
                    <br/>
                    <p>The best way to pursue file transfers is with a bona fide FTP client. <br/>You use an FTP client to log into an FTP server, navigate the server’s folder structure, and exchange files.<br/> That’s pretty much all FTP clients do — unlike Web browsers, <br/>FTP clients are tailor-made for such duties.</p>
                </div>
            </div>
            <div class="row ser-ftp-row">

            </div>
            <br/><br/><br/>
        </div>
        <div>
            &nbsp;<br/><br/><br/><br/>
        </div>


    @include('elements.footer')

@endsection