@extends('layouts.master')

@section('termsAndCondition')



    {{--chat exemple--}}
    {{--<div><br/><br/><br/><br/><br/><br/></div>--}}
    {{--<div class="col-sm-3 col-sm-offset-4 frame">--}}
        {{--<ul></ul>--}}
        {{--<div>--}}
            {{--<div class="msj-rta macro" style="margin:auto">--}}
                {{--<div class="text text-r" style="background:whitesmoke !important">--}}
                    {{--<input class="mytext" placeholder="Type a message"/>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<style>--}}
        {{--.mytext{--}}
            {{--border:0;padding:10px;background:whitesmoke;--}}
        {{--}--}}
        {{--.text{--}}
            {{--width:75%;display:flex;flex-direction:column;--}}
        {{--}--}}
        {{--.text > p:first-of-type{--}}
            {{--width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;--}}
        {{--}--}}
        {{--.text > p:last-of-type{--}}
            {{--width:100%;text-align:right;color: #6c8fff;margin-bottom:-7px;margin-top:auto;--}}
        {{--}--}}
        {{--.text-l{--}}
            {{--float:left;padding-right:10px;--}}
        {{--}--}}
        {{--.text-r{--}}
            {{--float:right;padding-left:10px;--}}
        {{--}--}}
        {{--.avatar{--}}
            {{--display:flex;--}}
            {{--justify-content:center;--}}
            {{--align-items:center;--}}
            {{--width:25%;--}}
            {{--float:left;--}}
            {{--padding-right:10px;--}}
        {{--}--}}
        {{--.macro{--}}
            {{--margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;--}}
        {{--}--}}
        {{--.msj-rta{--}}
            {{--float:right;background:whitesmoke;--}}
        {{--}--}}
        {{--.msj{--}}
            {{--float:left;background:white;--}}
        {{--}--}}
        {{--.frame{--}}
            {{--background:#e0e0de;--}}
            {{--height:450px;--}}
            {{--overflow:hidden;--}}
            {{--padding:0;--}}
        {{--}--}}
        {{--.frame > div:last-of-type{--}}
            {{--position:absolute;bottom:5px;width:100%;display:flex;--}}
        {{--}--}}
        {{--ul {--}}
            {{--width:100%;--}}
            {{--list-style-type: none;--}}
            {{--padding:18px;--}}
            {{--padding-bottom:48px;--}}
            {{--position:absolute;--}}
            {{--bottom:68px;--}}
            {{--display:flex;--}}
            {{--flex-direction: column;--}}
            {{--overflow-y: scroll;--}}
            {{--height: 382px;--}}

        {{--}--}}
        {{--.msj:before{--}}
            {{--width: 0;--}}
            {{--height: 0;--}}
            {{--content:"";--}}
            {{--top:-5px;--}}
            {{--left:-14px;--}}
            {{--position:relative;--}}
            {{--border-style: solid;--}}
            {{--border-width: 0 13px 13px 0;--}}
            {{--border-color: transparent #ffffff transparent transparent;--}}
        {{--}--}}
        {{--.msj-rta:after{--}}
            {{--width: 0;--}}
            {{--height: 0;--}}
            {{--content:"";--}}
            {{--top:-5px;--}}
            {{--left:14px;--}}
            {{--position:relative;--}}
            {{--border-style: solid;--}}
            {{--border-width: 13px 13px 0 0;--}}
            {{--border-color: whitesmoke transparent transparent transparent;--}}
        {{--}--}}
        {{--input:focus{--}}
            {{--outline: none;--}}
        {{--}--}}
        {{--::-webkit-input-placeholder { /* Chrome/Opera/Safari */--}}
            {{--color: #d4d4d4;--}}
        {{--}--}}
        {{--::-moz-placeholder { /* Firefox 19+ */--}}
            {{--color: #d4d4d4;--}}
        {{--}--}}
        {{--:-ms-input-placeholder { /* IE 10+ */--}}
            {{--color: #d4d4d4;--}}
        {{--}--}}
        {{--:-moz-placeholder { /* Firefox 18- */--}}
            {{--color: #d4d4d4;--}}
        {{--}--}}
    {{--</style>--}}

    {{--<script>--}}
        {{--var me = {};--}}
        {{--me.avatar = "https://lh6.googleusercontent.com/-lr2nyjhhjXw/AAAAAAAAAAI/AAAAAAAARmE/MdtfUmC0M4s/photo.jpg?sz=48";--}}

        {{--var you = {};--}}
        {{--you.avatar = "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg";--}}

        {{--function formatAMPM(date) {--}}
            {{--var hours = date.getHours();--}}
            {{--var minutes = date.getMinutes();--}}
            {{--var ampm = hours >= 12 ? 'PM' : 'AM';--}}
            {{--hours = hours % 12;--}}
            {{--hours = hours ? hours : 12; // the hour '0' should be '12'--}}
            {{--minutes = minutes < 10 ? '0'+minutes : minutes;--}}
            {{--var strTime = hours + ':' + minutes + ' ' + ampm;--}}
            {{--return strTime;--}}
        {{--}--}}

        {{--//-- No use time. It is a javaScript effect.--}}
        {{--function insertChat(who, text, time = 0){--}}
            {{--var control = "";--}}
            {{--var date = formatAMPM(new Date());--}}

            {{--if (who == "me"){--}}

                {{--control = '<li style="width:100%">' +--}}
                {{--'<div class="msj macro">' +--}}
{{--//                '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +--}}
                {{--'<div class="text text-l">' +--}}
                {{--'<p>'+ text +'</p>' +--}}
                {{--'<p><small>'+date+'</small></p>' +--}}
                {{--'</div>' +--}}
                    {{--'</div>' +--}}
                {{--'</li>';--}}
            {{--}else{--}}
                {{--control = '<li style="width:100%;">' +--}}
                {{--'<div class="msj-rta macro">' +--}}
                {{--'<div class="text text-r">' +--}}
                {{--'<p>'+text+'</p>' +--}}
                {{--'<p><small>'+date+'</small></p>' +--}}
                {{--'</div>' +--}}
{{--//                '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +--}}
                {{--'</li>';--}}
            {{--}--}}
            {{--setTimeout(--}}
                    {{--function(){--}}
                        {{--$("ul").append(control);--}}

                    {{--}, time);--}}

        {{--}--}}

        {{--function resetChat(){--}}
            {{--$("ul").empty();--}}
        {{--}--}}

        {{--$(".mytext").on("keyup", function(e){--}}
            {{--if (e.which == 13){    //key code 13 is the enter key...--}}
                {{--var text = $(this).val();--}}
                {{--if (text !== ""){--}}
                    {{--insertChat("me", text);--}}
                    {{--$(this).val('');--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}

        {{--//-- Clear Chat--}}
        {{--resetChat();--}}

        {{--//-- Print Messages--}}
        {{--insertChat("me", "Hello Tom...", 0);--}}
        {{--insertChat("admin ", "Hi, Pablo", 1500);--}}
        {{--insertChat("me", "What would you like to talk about today?", 3500);--}}
        {{--insertChat("admin", "Tell me a joke",7000);--}}
        {{--insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);--}}
        {{--insertChat("admin", "LOL", 12000);--}}


        {{--//-- NOTE: No use time on insertChat.--}}
    {{--</script>--}}













    <div class="header_top" style="background-color: #394962">
        <div class="container">
            <div class="col-sm-6 header-top-left">
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-6 header-top-right" style="height:42px;">
                <div class="col-xs-7 phone">
                    <p>24/7&nbsp;Support&nbsp;&nbsp;&nbsp;011-2541879</p>
                </div>
                <div class="col-xs-5 check_box dropdown">
                    <div class="clearfix"> </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
        <div class="container">
            <div class="header_bottom">
                <div class="col-xs-3 logo">
                    <a href="index.html"><img style="width: 200px; height: 60px" src="images/logo22.png" alt=""/></a>
                </div>
                <div class="col-xs-9 header_nav">
                    <div class="col-xs-9 menu">
                        <script type="text/javascript" src="js/responsive-nav.js"></script>
                    </div>
                    <div class="col-xs-3 header_but">

                    </div>

                </div>

            </div>
        </div>
    </div>


    <h2 style="color: blue;text-align: center">General terms and services</h2><br/>
    <p style="text-align: center;margin-left: 10%;margin-right: 10%">These Terms of Service (the "Agreement") are an agreement between CoolHost.com, LLC ("CoolHost" or "us" or "our") and you ("User" or "you" or "your").
        This Agreement sets forth the general terms and conditions of your use of the products and services made available by CoolHost and of the
        CoolHost.com website (collectively, the "Services"). By using the Services, you agree to be bound by this Agreement. If you do not agree to abide by the terms of this Agreement,
        you are not authorized to use or access the Services.</p>

    <br/><br/><br/><br/><br/>

    <h3 style="margin-left: 10%;margin-right: 10%">Additional plicies and agreement</h3>

    <p style="margin-left: 10%;margin-right: 10%">Use of the Services is also governed by the following policies, which are incorporated by reference. By using the Services,
        you also agree to the terms of the following policies. </p><br/>

        <ul style="margin-left: 17%;margin-right: 10%;color: #bf5329">
            <li>Privacy Policy</li>
            <li>Acceptable Use Policy</li>
            <li>Copyright Infringement Policy</li>
        </ul>

    <br/><br/>

    <h3 style="margin-left: 10%;margin-right: 10%">Account Eligibility</h3>

    <p style="margin-left: 10%;margin-right: 10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1) It is your responsibility to provide accurate, current, and complete information on the registration forms, including an email address
        that is different from the domain you are signing up under. If there is ever an abuse issue or we need to contact you, we will use the
        primary email address we have on file. It is your responsibility to ensure that the contact information for your account, including any
        domain accounts is accurate, correct and complete at all times. CoolHost is not responsible for any lapse in the Services, including
        without limitation, any lapsed domain registrations due to outdated contact information being associated with the domain. If you need
        to verify or change your contact information, you may utilize the CoolHost Billing and Support Portal to update your contact information.
        Providing false contact information of any kind may result in the termination of your account. In dedicated server purchases or certain other
        cases, you may be required to provide government issued identification and possibly a scan of the credit card used for verification purposes.
        Failure to provide the information requested may result in your order being denied. </p><br/><br/>

    <p style="margin-left: 10%;margin-right: 10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2) You agree to be fully responsible for all use of your account and for any actions that take place through your account. It is your responsibility
        to maintain the confidentiality of your password and other information related to the security of your account. </p><br/><br/>

    <p style="margin-left: 10%;margin-right: 10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3) The Service and any data you provide to HostGator is hosted in the United States (U.S.) unless otherwise provided. If you access the Service
        from outside of the U.S.,you are voluntarily transferring information (potentially including personally-identifiable information) and content
        to the U.S. and you agreeing that our collection, use, storage and sharing of your information and content is subject to the laws of the U.S., and not necessarily of the jurisdiction in which you are located.</p>


    <br/><br/><br/>
    <div class="footer">
        <div class="container">
            <p>&copy; Powered By CSS</p>
        </div>
    </div>

@endsection


