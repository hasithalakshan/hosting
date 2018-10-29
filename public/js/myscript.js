//
//$(document).ready(function(){
//
////download Invoice...
//$(".downloadInvoice").click(function(){
////alert("dhjs");
//    $.ajax({
//        method: "GET",
//        url: 'downloadInvoice',
//
//        //data: $('#paymentInvoiceForm').serialize(),
//        data:{'id':"12"},
//        success: function(msg){
//            console.log("Returned "+msg);
//            alert("success");
//        },
//        error: function(msg){
//            console.log("Error occurred shick!"+msg);
//            alert("error");
//        }
//
//    });
//});
//});

$(window).on( "load", function() {

    //hide payment ares if has payment for that invoices...
    var invoice_paymentStatus= $('.invoice-paymentStatus').text();
    //alert(invoice_paymentStatus);
    if(invoice_paymentStatus=='paid'){

        $('.payment-btn-container').hide();
        $('.invoice-select-pay-method').hide();
    }

    $('.show-invoices-table-row tr:gt(3)').hide();

    $showing_overall_entries_count=$('.showing-overall-entries-count').text();
    if($showing_overall_entries_count>3){
        $('.showing-entries-count').text(3);
    }
    else{
        $('.showing-entries-count').text($showing_overall_entries_count);
    }
});



$(document).ready(function(){

    $("button").click(function(){
        $(".badge1").attr("data-badge","0");

    });


    $('.show-notification-div > button').click(function () {
        $noOfNotification=$('.badge1').attr('data-badge');
        //$('.showing-entries-count').text(value);
        //alert("das");
        $('.badge1').attr('data-badge').val(0);


    });





    $("#searchInvoices").on("keyup", function() {
        var search = $(this).val();
        $showing_entries_count=0;
        // Hide all table tbody rows
        $('table tbody tr').hide();

        // Searching text in columns and show match row
        $('table tbody tr td:nth-child(3):contains("'+search+'")').each(function(){
            $(this).closest('tr').show();
            $showing_entries_count++;
        });
        $('.showing-entries-count').text($showing_entries_count);
    });

    //show only paid invoices...
    $(".view-paid-invoice").click(function(){

        $('.show-invoices-table-row tr').show();

        $('.show-invoices-table-row .selectable').each(function() {

            var value = $(this).attr('data-status');
            //alert(value);
            if(value=='Unpaid'|| value=='canceled' || value=='refund'){
                $(this).hide();
            }


        });

        var value=$('.noOfPaidInvoices').text();
        $('.showing-entries-count').text(value);

    });

    //show only Unpaid invoices..
    $(".view-unpaid-invoice").click(function(){
        $('.show-invoices-table-row tr').show();

        $('.show-invoices-table-row .selectable').each(function() {

            var value = $(this).attr('data-status');
            //alert(value);
            if(value=='paid'){
                $(this).hide();
            }

        });


        var value=$('.noOfUnpaidInvoices').text();
        $('.showing-entries-count').text(value);

    });




    //change drop down and display bank deposit area
    $( function () {
        $('#invoice-select-payment option[value="CC"]').prop('selected', true);
    });
    $('#invoice-select-payment').on('change', function() {

        $action = $(this).val() == "2_checkout" ? "uploadDepositInfo" : "https://css.lk/payment/hosting/index.php";
        $("#paymentInvoiceForm").attr("action", $action);


        if ( this.value == '2_checkout')
        {
            $("#bank-deposit-area").show();
            $(".payOnlineButton").hide();
        }
        else
        {
            $("#bank-deposit-area").hide();
            $(".payOnlineButton").show();
        }
    });



    $( function () {
        $('.show-noOf-invoices option[value="3"]').prop('selected', true);
    });



    $('.show-noOf-invoices').on('change', function() {
        if ( this.value == '3')
        {

            $('.show-invoices-table-row tr:gt(3)').hide();

            //show no of invoices in client area..
            $showing_overall_entries_count=$('.showing-overall-entries-count').text();
            if($showing_overall_entries_count>3){
                $('.showing-entries-count').text(3);
            }
            else{
                $('.showing-entries-count').text($showing_overall_entries_count);
            }

        }
        else if( this.value == '5')
        {

            $('.show-invoices-table-row tr').show();
            $('.show-invoices-table-row tr:gt(5)').hide();

            $showing_overall_entries_count=$('.showing-overall-entries-count').text();
            if($showing_overall_entries_count>5){
                $('.showing-entries-count').text(5);
            }
            else{
                $('.showing-entries-count').text($showing_overall_entries_count);
            }

        }
        else if( this.value == '8')
        {

            $('.show-invoices-table-row tr').show();
            $('.show-invoices-table-row tr:gt(8)').hide();

            $showing_overall_entries_count=$('.showing-overall-entries-count').text();
            if($showing_overall_entries_count>8){
                $('.showing-entries-count').text(8);
            }
            else{
                $('.showing-entries-count').text($showing_overall_entries_count);
            }
        }
        else if( this.value == '-1')
        {
            $('.show-invoices-table-row tr').show();

            $showing_overall_entries_count=$('.showing-overall-entries-count').text();

            $('.showing-entries-count').text($showing_overall_entries_count);

        }
    });

});



//login and register ja
$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});

//phone area show and hide
$(document).ready(function(){
    $("#phonewindowanchor").mouseenter(function(){
        $("#phonewindow").fadeIn();

    });
    $("#phonewindowanchor").click(function(){
        $("#phonewindow").fadeOut();

    });

    $("#phonewindow").mouseleave(function(){
        $("#phonewindow").fadeOut();

    });
});


var selectedPkg=null;

function setSelectedPkg(value){
    selectedPkg=value;
    //alert(selectedPkg);
    localStorage.setItem('selectedPkg',value);
}




//send user message data to the controller to send that as an email...
$(document).ready(function(){
    //for index page
    $(".userSendMsg").click(function(){

        $('#loading ').css("display","inline");
        $(".alert").css("display", "none");
        $(".wrongAlert").css("display", "none");

        $.ajax({
            method: 'post',
            url: '/sendUserMessage',

            //set timeout to message send progress...
            timeout: 15000,
            data: $('#userMessageFormIndex').serialize(),
            success: function(msg){
                console.log("Returned "+msg);
                //view the success message in contact us area...
                $('#loading ').css("display","none");
                $(".alert").css("display", "block");
            },
            error: function(msg){
                console.log("Error occurred shick!"+msg);
                $('#loading ').css("display","none")
                $(".wrongAlert").css("display", "block");

            }

        });
    });
    //for plan page
    $(".userSendMsgPlan").click(function(){

        $('#loading ').css("display","inline");
        $(".alert").css("display", "none");
        $(".wrongAlert").css("display", "none");

        $.ajax({
            method: 'post',
            url: '/sendUserMessage',

            //set timeout to message send progress...
            timeout: 15000,
            data: $('#userMessageFormPlan').serialize(),
            success: function(msg){
                console.log("Returned "+msg);
                //view the success message in contact us area...
                $('#loading ').css("display","none");
                $(".alert").css("display", "block");
            },
            error: function(msg){
                console.log("Error occurred shick!"+msg);
                $('#loading ').css("display","none")
                $(".wrongAlert").css("display", "block");
            }

        });
    });


});














//function myFunction2(){
//    var pkg=localStorage.getItem('selectedPkg')
//    if(pkg!=null){
//        console.log(pkg);
//
//        $.ajax({
//            method: 'post',
//            url: '/selectedhost',
//
//            data: {id:pkg},
//            success: function(msg){
//                console.log("Returned "+msg);
//            },
//            error: function(msg){
//                console.log("Error occurred shick!"+msg);
//            }
//        });
//    }
//}


//payment gateway
//var args = {
//    sellerId: "901366530",
//    publishableKey: "AC807335-C9D6-42C1-BE94-2DFA0D71615D",
//    ccNo: "4000000000000002",
//    cvv: "123",
//    expMonth: "12",
//    expYear: "2019"
//};


    //function retrieveToken() {
    //    TCO.loadPubKey('sandbox', function() {
    //        console.log('eerere');
    //        TCO.requestToken(successCallback,errorCallback, args);
    //
    //    });
    //}
    //
    //function successCallback(data) {
    //    console.log('kkkk');
    //    var myForm = document.getElementById('tcoCCForm');
    //    myForm.token.value = data.response.token.token;
    //    myForm.submit();
    //}
    //
    //function errorCallback(data) {
    //    alert(data.errorMsg);
    //}

//function retrieveCheckout(){
//alert("peek peek hooooos...");
    //window.location="https://sandbox.2checkout.com/checkout/purchase";

    //var checkouturl="https://sandbox.2checkout.com/checkout/purchase";

    //$.ajax({
    //    url: checkouturl+"&callback=?",
    //    data: "message="+commentdata,
    //    type: 'POST',
    //    success: function (resp) {
    //        alert(resp);
    //    },
    //    error: function(e) {
    //        alert('Error: '+e);
    //    }
    //});

//}










    //$(function() {
    //    // Pull in the public encryption key for our environment
    //    TCO.loadPubKey('production');
    //
    //    $("#tcoCCForm").submit(function(e) {
    //        // Call our token request function
    //        tokenRequest();
    //
    //        // Prevent form from submitting
    //        return false;
    //    });
    //});
    //
    //    var tokenRequest = function() {
    //        // Setup token request arguments
    //        var args = {
    //            sellerId: "901366530",
    //            publishableKey: "AC807335-C9D6-42C1-BE94-2DFA0D71615D",
    //            ccNo: $("#ccNo").val(),
    //            cvv: $("#cvv").val(),
    //            expMonth: $("#expMonth").val(),
    //            expYear: $("#expYear").val()
    //        };
    //    }














//$('html').on('click', 'button', function() {
//
//    console.log("abc text");
//
//    var name = "";
//    var value = "";
//    var nameValueArr = [];
//    $('input').each(function(i,e){
//
//    });
//
//
//    $.ajax({
//        method: 'POST',
//        url: '/textdata',
//
//        data: $('.hosttext').serialize(),
//        success: function(msg){
//            console.log("Returned "+msg);
//        },
//        error: function(msg){
//            console.log("Error occurred!");
//        }
//    });
//
//
//});








