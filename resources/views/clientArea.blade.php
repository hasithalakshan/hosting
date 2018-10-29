@extends('layouts.master')

@section('clientArea')
<style>
    html{
    background-color: white;
    }
    body{
    background-color: white;
    }

</style>

<nav class="navbar navbar-default navbar-static-top" style="background-color: #394962">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="http://localhost:8000">
                CoolHost
            </a>
        </div>
        <div class="collapse navbar-collapse " id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right ">
                <!-- Authentication Links -->
                <li><a><i class="glyphicon glyphicon-user"></i></a></li>
                <li class="dropdown"><a style="color: #ffffff" href="http://localhost:8000/login">{{$userName}}</a>
                    <div class="dropdown-content">
                        <a href="{{url('myProfile')}}">My Profile</a>
                        <a href="{{url('logout')}}">Logout</a>
                    </div>
                </li>

                <li class="navbar-brand show-notification dropdown"><span class="badge1 " data-badge="{{$noOfUnpaidInvoices}}" style="color: #8a8cff"><i class="glyphicon glyphicon-bell"></i></span>
                    <div class="dropdown-content" style="margin-top: 13px; width: 200px;right: 0">
                        <div class="show-notification-div">
                            <p><i class="glyphicon glyphicon-globe"></i>&nbsp; <span>{{$noOfUnpaidInvoices}}</span>&nbsp; notification(s)</p>
                            <hr>
                        </div>
                        <div class="show-notification-div">
                            <p>You have {{$noOfUnpaidInvoices}} unpaid invoice(s). Pay them early for peace of mind. </p>
                        </div>
                        <div class="show-notification-div">
                            <legend></legend>
                            <button type="submit" class="btn">Pay Online </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div style="background-color: #f2dede;padding: 20px">
        <h3 style="text-align: center;">Client Area</h3>
    </div>
<br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-3 pull-md-right">
                <div menuItemName="My Invoices Summary" class="panel panel-sidebar panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="glyphicon glyphicon-modal-window"></i>&nbsp;2 Invoices Due
                            <i class="glyphicon glyphicon-menu-down panel-minimise pull-right"></i>
                        </h3>
                    </div>
                    <div class="panel-body">
                        You have {{$noOfUnpaidInvoices}} invoice(s) currently unpaid with a total balance of Rs:{{$fullAmountForUnPaid}} LKR
                    </div>
                </div>

                <div menuItemName="My Invoices Status Filter" class="panel panel-sidebar panel-default panel-actions view-filter-btns">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="glyphicon glyphicon-filter"></i>&nbsp;Status
                            <i class="glyphicon glyphicon-menu-down panel-minimise pull-right"></i>
                        </h3>
                    </div>
                    <div class="list-group">
                        <a menuItemName="Paid" href="#" class="list-group-item view-paid-invoice">
                            <span class="badge noOfPaidInvoices">{{$noOfPaidInvoices}}</span><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;<span>Paid</span>
                        </a>
                        <a menuItemName="Unpaid" href="#" class="list-group-item view-unpaid-invoice">
                            <span class="badge noOfUnpaidInvoices">{{$noOfUnpaidInvoices}}</span><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;<span>Unpaid</span>
                        </a>
                        <a menuItemName="Cancelled" href="#" class="list-group-item">
                            <span class="badge">0</span><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;<span>Cancelled</span>
                        </a>
                        <a menuItemName="Refunded" href="#" class="list-group-item">
                            <span class="badge">0</span><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;<span>Refunded</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-md-right" style="clear: right;">

            </div>

            <!-- Container for main page display content -->
            <div class="col-md-9 pull-md-right main-content">
            </div>

            <div class="col-md-9">
                {{--<div class="col-md-4">--}}
                    <div class="col-xs-2">
                        <span>show rows</span>
                    </div>
                    <div class="col-xs-2">
                        <select class="form-control input-sm show-noOf-invoices">
                            <option value="3" selected="selected">3</option>
                            <option value="5">5</option>
                            <option value="8">8</option>
                            <option value="-1">All</option>
                        </select>
                    </div>
                <div class="col-sm-2" style="margin-left: 32%">
                    <input type="text" id="searchInvoices" class="form-control searchInvoices-input" placeholder="Search By Invoice Date"/>
                </div>

                {{--</div>--}}
                </br></br></br>
                <div class="table-container clearfix">
                    <table id="tableInvoicesList" class="datatable table table-hover table-bordered tc-table show-invoices-table-row">
                        <thead>
                        <tr>
                            <th data-class="expand">Invoice #</th>
                            <th data-hide="phone,tablet">Invoice Date</th>
                            <th data-hide="phone">Due Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="responsive-edit-button" style="display: none;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loggedUserInvoices as $key=>$loggedUserIn)

                        <tr class="selectable" rowNumber="{{$key+1}}" data-status="{{$loggedUserIn->paymentStatus}}">
                            <form action="viewInvoicesFromClientArea" method="get">
                                <td>{{$loggedUserIn->id}}</td>
                                <td>{{ date('F d, Y', strtotime($loggedUserIn->created_at)) }}</td>
                                <td>{{ date('F d, Y', strtotime($loggedUserIn->date))}}</td>
                                <td>Rs{{$loggedUserIn->amount}}LKR</td>
                                <td><button><span class="label status status-unpaid"><span class="textred">{{$loggedUserIn->paymentStatus}}</span></span></button></td>

                                <input type="hidden" name="invoice_id" value="{{$loggedUserIn->id}}" />
                                <input type="hidden" name="user_id" value="{{$loggedUserIn->user_id}}" />
                            </form>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

                    {{--<div class="text-center" id="tableLoading">--}}
                        {{--<p><i class="glyphicon glyphicon-repeat fa-spin"></i> Loading...</p>--}}
                    {{--</div>--}}
            </div>
                <span class="text-muted">Showing <span class="showing-entries-count"></span> invoices from <span class="showing-overall-entries-count">{{$countOfInvoices}}</span> entries</span>
        </div>
    </div>
</div>


<br/><br/><br/><br/><br/><br/><br/><br/>
<div style="background-color: #c0c0ff;padding: 20px">
    <h3 style="text-align: center;">Considering a hosting solution for your enterprise?</h3>
</div>

    <style>
        .textred{
            color: #ff0000;
        }

        .status-unpaid{
            background-color: #ede9ff;
        ;
        }

        .row-of-icons {
            -webkit-user-select: none;  /* Chrome all / Safari all */
            -moz-user-select: none;     /* Firefox all */
            -ms-user-select: none;      /* IE 10+ */
            user-select: none;          /* Likely future */
        }

        .selectable {
            cursor: pointer;
        }

        .invoice-show-span{
            display: inline;
        }

        .searchInvoices-input{
            width: 200px;
        }

    </style>

    <script type="text/javascript">


    </script>

@endsection