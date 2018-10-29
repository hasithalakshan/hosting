
@extends('layouts.master')

@section('invoicePdf')



    {{--<div class="background_server-invoice-dep">--}}

    <div class="invoice-outer">
        <div class="row">
            <br>
            <div>
                <div class="panel panel-invoice">
                    <div class="invoice-body-de" style=" height: auto">
                        <form id="paymentInvoiceForm" action="https://css.lk/payment/hosting/index.php" method="post">
                            <div class="row  invoice-logo-style">
                                <div class="col-sm-6 pull-left">
                                    <a href="/"><img style="width: 26%; height: 7%" src="images/logo22.png" alt=""/></a>
                                    <br/><br/>
                                    <p>Invoice #{{$invoice_id}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class=" pull-right">

                                            <div>
                                                <p class="unpaid invoice-status font-weight-bold">{{$paymentStatus}}</p>
                                                <p class="invoice-due-date">Due Date:{{$invoiceRenewDate}}</p><br/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-6 pull-left">
                                    <div class="invoice-col">
                                        <strong>Invoiced To</strong>
                                        <address class="small-text">
                                            {{$name}}<br />
                                            {{$email}}<br />
                                            Sri Lanka
                                        </address>
                                    </div>
                                </div>

                                <div class="col-sm-6 invoice-pay-to">
                                    <div class="invoice-col">
                                        <strong class="">Pay To</strong>
                                        <address>
                                            No 234/1/1 , Ramanayaka Road,<br />
                                            Boralesgamuwa, Sri Lanka
                                        </address>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6 pull-left">
                                    <div class="invoice-col">
                                        <strong>Invoice Date</strong><br>
                                                <span class="small-text">
                                                {{$currentInvoiceCreatedAt}}<br><br>
                                            </span>
                                    </div>
                                </div>

                            </div>
                            <br/><br/><br/><br/>
                            <div class="row">
                                <div class="invoice-col">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Invoice Items</strong></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive table-content">
                                                <table class="table table-condensed">
                                                    <thead>
                                                    <tr>
                                                        <td><strong>Description</strong></td>
                                                        <td width="20%" class="text-center"><strong>Amount</strong></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td> {{$hostName}} Standard - Hosting Plan ({{$currentInvoiceStartDate}} -{{$invoiceRenewDate}}) </td>
                                                        <td class="text-center">Rs {{$pkgPrice}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="total-row text-right"><strong>Sub Total</strong></td>
                                                        <td class="total-row text-center">Rs {{$pkgPrice}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="total-row text-right"><strong>Credit</strong></td>
                                                        <td class="total-row text-center">Rs 0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="total-row text-right"><strong>Total</strong></td>
                                                        <td class="total-row text-center">Rs {{$pkgPrice}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <p>Please refer to next page for Payment Methods,</p>
                            <br/><br/><br/><br/><br/>

                            <div class="col-md-12">
                                <h3>Bank Deposit Details</h3>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Bank Deposit</strong></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <td><strong>Payee Name</strong></td>
                                                    <td colspan="2" width="50%" class="text-center"><strong>coolbit software solution (pvt) ltd</strong></td>

                                                </tr>
                                                <tr>
                                                    <td><strong>Reference Number</strong></td>
                                                    <td width="50%" class="text-center"><strong>{{$invoice_id}}</strong></td>
                                                    <td><strong>&nbsp;</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr style="background-color: #a8b5cf">
                                                    <td class="text-center">Bank</td>
                                                    <td class="text-center">Branch</td>
                                                    <td class="text-center">Account</td>
                                                </tr>
                                                <tr>
                                                    <td>Sampath Bank</td>
                                                    <td class="text-center">kollupitiya</td>
                                                    <td class="text-center">98678676544</td>
                                                </tr>
                                                <tr>
                                                    <td>Commercial Bank</td>
                                                    <td class="text-center">Kiribathgoda</td>
                                                    <td class="text-center">5676567687022</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a>Visit http://coolhost.lk for online payments.</a>
                            <br/><br/>


                            <br/><br/>
                            {{--<div class="row">--}}
                                {{--<div class="invoice-col">--}}
                                    {{--<div class="transactions-container small-text">--}}
                                        {{--<div class="table-responsive table-content">--}}
                                            {{--<table class="table table-condensed">--}}
                                                {{--<thead>--}}
                                                {{--<tr>--}}
                                                    {{--<td class="text-center"><strong>Transaction Date</strong></td>--}}
                                                    {{--<td class="text-center"><strong>Gateway</strong></td>--}}
                                                    {{--<td class="text-center"><strong>Transaction ID</strong></td>--}}
                                                    {{--<td class="text-center"><strong>Amount</strong></td>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--<tr>--}}
                                                    {{--<td class="text-center"><strong> 25th Feb 2018</strong></td>--}}
                                                    {{--<td class="text-center"><strong>2Checkout</strong></td>--}}
                                                    {{--<td class="text-center"><strong>234</strong></td>--}}
                                                    {{--<td class="text-center"><strong>1900</strong></td>--}}
                                                    {{--<td class="text-center" colspan="4">No Related Transactions Found</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td class="text-right" colspan="3"><strong>Balance</strong></td>--}}
                                                    {{--<td class="text-center">Rs {{$pkgPrice}}</td>--}}
                                                {{--</tr>--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{csrf_field()}}
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/>

    {{--</div>--}}








    <style>

        html{
            background-color: white;
        }
        body{
            background-color: white;
        }

        /*.panel-invoice{*/
            /*border-color: #ccc;*/
            /*-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);*/
            /*-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);*/
            /*box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2)*/

        /*}*/

        .invoice-body-de{
            margin-left: 10%;margin-right: 10%;
        }

        .invoice-outer{
            margin-left: 0%;
            width: 100% ;
        }
        .invoice-col{
            margin-top: 10%;
            color: #818181;
        }

        .invoice-status{
            color: #ff0000;
            font-size: 1.4em;
        }
        .invoice-pay-to{
            text-align: right
        }
        .invoice-select-payment{
            width: 60%;
            text-align: center;
        }
        .invoice-select-pay-method{
            text-align: right;
        }
        .invoice-logo-style{
            margin-top: 6%;
        }
        .table-content > table, tr, td {
            border: none;
        }
        .deposit-bank-ul{
            color: #0075b0;
        }

        .payment-btn-container p{
            text-align: left;
        }

        .invoice-due-date{
            background-color: #ffff9e;
            padding: 5px;
        }

    </style>



@endsection