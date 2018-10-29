
@extends('layouts.master')

@section('paymentInvoice')



    {{--<div class="background_server-invoice-dep">--}}

        <div class="invoice-outer">
            <div class="row">
                <br>
                <div>
                    <div class="panel panel-invoice">
                        <div class="invoice-body-de" style=" height: auto">
                            <form id="paymentInvoiceForm" action="https://css.lk/payment/hosting/index.php" method="post"  enctype="multipart/form-data" >
                                <div class="row  invoice-logo-style">
                                    <div class="col-sm-6 pull-left">
                                        <a href="/"><img class="payment-logo" src="{{URL::asset('/images/logo22.png')}}" alt=""/></a>
                                        <br/><br/>
                                        <p>Invoice #{{$currentInvoice->id}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class=" pull-right">

                                            <div class="invoice-col text-center">

                                                <div class="invoice-status font-weight-bold">
                                                    <span class="invoice-paymentStatus">{{$currentInvoice->paymentStatus}}</span>
                                                </div>

                                                <div class="invoice-due-date">

                                                    Due Date: {{$invoiceRenewDate}}
                                                </div><br/>
                                                <div class="payment-btn-container hidden-print" align="center">
                                                    <!-- <p>Please refer invoice (PDF) for bank account details<br />Reference Number: 71988</p> -->
                                                    {{--@if($currentInvoice->paymentStatus=='unpaid')--}}
                                                        {{--<a href='#'><button type="submit" class="btn btn-info payOnlineButton">Pay Online </button></a>--}}
                                                    {{--@endif--}}
                                                    {{--<a href='#'><button type="submit" class="btn btn-info payOnlineButton">Pay Online </button></a>--}}
                                                </div>

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
                                                {{$user->name}}<br />
                                                {{$user->email}}<br />
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

                                    <div class="col-sm-6">
                                        <div class="invoice-col invoice-select-pay-method">
                                            <label class="">Select Payment method :</label>
                                            {{--id=invoice-select-payment--}}
                                            <select id="invoice-select-payment" class="form-control pull-right invoice-select-payment" name="payment_method">
                                                <option value="CC" selected="selected">2Checkout</option>
                                                <option value="2_checkout">Bank Deposit</option>
                                            </select>
                                            <input type="hidden" name="site_key" value="20181234568">
                                            <input type="hidden" id="product-ids" name="product_name" value="{{$chosenHostingPlan->type}}">
                                            <input type="hidden" id="amount" name="amount" value="{{$currentInvoice->amount}}">
                                            <input type="hidden" id="order-id" name="order_id" value="{{$currentInvoice->id}}">
                                            <input type="hidden" id="user-id" name="user_id" value="{{$currentInvoice->user_id}}">
                                            <input type="hidden" name="site_name" value="COOLHOST">
                                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                                        </div><br/><br/>
                                        <div class="col-sm-6 pull-right" style="text-align: center">
                                            <a href='#'><button type="submit" class="btn btn-info payOnlineButton">Pay Online </button></a>
                                        </div>
                                    </div>
                                </div>


                                <div id="bank-deposit-area" class="row bank-deposit-area" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="col-sm-6 pull-left">
                                            <ul class="deposit-bank-ul">
                                                <li><span>Upload Your Payment Materials :-</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 pull-right">
                                            <input type="file" name="image" /><br/>
                                            <button class="file-upload-button"><i class="glyphicon glyphicon-upload"></i> Upload</button>
                                        </div>
                                        <div class="col-sm-6 pull-right">

                                        </div>

                                        <br/><br/><br/><br/>
                                        <hr>
                                        <div class="row">
                                            <div class="">
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
                                                                    <td width="50%" class="text-center"><strong>{{$currentInvoice->id}}</strong></td>
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
                                        </div>
                                    </div>
                                </div>

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
                                                                <td>{{$chosenHostingPlan->type}} Standard - Hosting Plan ({{$currentInvoiceStartDate}} - {{$invoiceRenewDate}})</td>
                                                                <td class="text-center">Rs {{$currentInvoice->amount}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="total-row text-right"><strong>Sub Total</strong></td>
                                                                <td class="total-row text-center">Rs {{$currentInvoice->amount}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="total-row text-right"><strong>Credit</strong></td>
                                                                <td class="total-row text-center">Rs 0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="total-row text-right"><strong>Total</strong></td>
                                                                <td class="total-row text-center">Rs {{$currentInvoice->amount}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                    {{--<td class="text-center">Rs {{$currentInvoice->amount}}</td>--}}
                                                    {{--</tr>--}}
                                                {{--</tbody>--}}
                                                {{--</table>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{csrf_field()}}
                            </form>
                            <div class="row">
                                <br/><br/><br/>
                                <div class="pull-right btn-group btn-group-sm">
                                    <form action="downloadInvoice" method="get" name="download-pdf-form">
                                        <a href="javascript:window.print()" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print</a>
                                        <button type="submit" class="btn-group btn-group-sm"><i class="glyphicon glyphicon-download"></i> Download</button>

                                        <input type="hidden" name="invoice_id" value="{{$currentInvoice->id}}"/>
                                    </form>
                                </div>
                            </div>
                            <br/><br/>
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
        background-color: #efefef;
    }
    body{
        background-color: #efefef;
    }

    .table-content > table, tr, td {
        border: none;
    }
</style>



@endsection