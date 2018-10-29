

<!DOCTYPE HTML>
<html>
<head>
    <title>coolbit Hosting Site</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Konnect Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
            Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    {{--angularjs --}}
    <script src="js/angular.min.js"></script>

    {{--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />--}}
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{--<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>--}}
    <script src="js/jquerynew-3.2.1.min.js" type="text/javascript"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<!-- Custom Theme files -->--}}
    {{--<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>--}}
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    {{--<!-- Custom Theme files -->--}}
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="css/payment-style.css" rel='stylesheet' type='text/css' />
    {{--<link rel="stylesheet" href="css/jquery-ui.css">--}}



    {{--<script src="js/jquery.easydropdown.js"></script>--}}
                {{--<!-- Add fancyBox main JS and CSS files -->--}}
                {{--<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>--}}
                <link href="css/font-awesome.min.css" rel='stylesheet' type='text/css'>
                {{--<link href="css/popup.css" rel="stylesheet" type="text/css">--}}

                {{--myscript.js import--}}
    <script src="js/myscript.js"></script>
    {{--for data picker specially import--}}


    {{--my angularjs file--}}
    <script src="js/myangular.js"></script>




</head>
<body>

@yield('content')

@yield('plan')

@yield('register')

@yield('directlogin')

@yield('invoice')

@yield('checkout')

@yield('myproduct')

@yield('myProfile')

@yield('finishCheckout')

@yield('unSuspendAndThankYou')

@yield('termsAndCondition')

{{--@yield('invoiceToMail')--}}

@yield('yearlyPaymentSuccess')

@yield('paymentInvoice')

@yield('clientArea')

@yield('invoicePdf')

@yield('passwordEmail')
@yield('passwordReset')



{{--services pages--}}
@yield('webHosting')
@yield('fileExchange')
@yield('performanceOptimization')
@yield('sslCertification')
@yield('technicalServices')
@yield('vpsServer')

</body>