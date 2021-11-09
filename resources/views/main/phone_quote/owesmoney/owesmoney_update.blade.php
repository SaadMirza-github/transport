@extends('layouts.innerpages')

@section('template_title')
    Summary
@endsection
@include('partials.mainsite_pages.return_function')

<style>
    ul.breadcrumb li a {
        color: rgb(2 117 216);
        text-decoration: none;
    }
    .fa-check {
        color: green;
    }

    #table_heading {
        font-size: 15px;
        font-weight: 600;
        color: black;
        background-color: #6cabefd1;
    }

    .table {
        border: 1px solid black;
    }

    .oauc {
        padding: 11px;
        width: 100%;
    }

    .dauc {
        padding: 11px;
        width: 100%;
    }

    .history_content {
        /*background-color: white;*/
    }

    #right_border_radius {
        border-right: 1px solid black;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    #left_border_radius {
        border-left: 1px solid black;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
    }

    .strong_word {
        font-weight: 700;
        font-size: 14px;
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    * {
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }
    .span_style{
        color:mediumblue;
        font-weight:700;
    }
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: rgb(0 0 0 / 0%);
    }
    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 0;
        list-style: none;
        border-radius: 3px;
        font-weight: 400;
        background: rgb(240 240 242);
    }
    body {
        background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185)) !important;
        box-shadow: 2px 2px #9E9E9E !important;
    }
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: rgb(255 255 255);
        background-clip: border-box;
        position: relative;
        margin-bottom: 1.5rem;
        width: 100%;
        border: 1px solid rgb(219 226 235);
        box-shadow: 0px 6px 8px rgba(4, 4, 7, 0.1);
        border-radius: 8px;
    }
    .card-header {
        background: rgb(0 0 0 / 0%);
        padding: 17px 30px 0px 16px !important;
        display: -ms-flexbox;
        display: flex;
        min-height: 3.5rem;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 0;
        border-bottom: 1px solid rgb(235 236 241);
        position: relative;

    }
    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        margin: 0;
        padding: 1.5rem 1.5rem;
        position: relative;
    }
</style>

@section('content')
    <ul class="breadcrumb" style=" font-size: 18px; padding: 35px 41px 5px 79px; ">
        <li><a href="./dashboard">Home &nbsp;</a></li>/
        <li><a>&nbsp; Owes Money</a></li>
    </ul>
    <div class="container pt-5">

        <h3>ORDER #{{$data->id}} </h3>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        <div class="history_content">

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3>CARRIER INFORMATION</h3>
                        </div>
                        <div class="card-body">
                                <h4 class="list-group-item">Company Name :
                                    <span class="span_style">@if(!empty($carrier->companyname)) {{$carrier->companyname}} @endif</span>
                                </h4><br>
                                <h4 class="list-group-item">Company Address :
                                    <span class="span_style"> @if(!empty($carrier->location)) {{$carrier->location}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">MC# :
                                    <span class="span_style">@if(!empty($carrier->mcno)) {{$carrier->mcno}} @endif </span></h4><br>
                                <h4 class="list-group-item">Company Contact :
                                    <span class="span_style">@if(!empty($carrier->companyphoneno)) {{$carrier->companyphoneno}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">Company Phone :
                                    <span class="span_style">@if(!empty($carrier->companyphoneno)) {{$carrier->companyphoneno}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">Driver Phone :
                                    <span class="span_style">@if(!empty($carrier->driverphoneno)) {{$carrier->driverphoneno}} @endif </span>
                                </h4><br>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="card" style=" min-height: 494px; ">
                        <div class="card-header bg-primary text-white">
                            <h3>CUSTOMER INFORMATION</h3>
                        </div>


                            <div class="card-body">
                                <h4 class="list-group-item">Customer Name:
                                    <span class="span_style">@if(!empty($data->oname)) {{$data->oname}} @endif</span>
                                </h4><br>
                                <h4 class="list-group-item">Address:
                                    <span class="span_style"> @if(!empty($data->oaddress)) {{$data->oaddress}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">Phone:
                                    <span class="span_style">@if(!empty($data->ophone)) {{$data->ophone}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">Email:
                                    <span class="span_style">@if(!empty($data->oemail)) {{$data->oemail}} @endif </span>
                                </h4><br>
                                <h4 class="list-group-item">Zip:
                                    <span class="span_style">@if(!empty($data->originzsc)) {{$data->originzsc}} @endif </span>
                                </h4><br>
                            </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-header bg-primary text-white">
                            <h4>PRICING & PAYMENT</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="list-group-item">Order Booking Price : <span class="span_style">${{$data->payment}}</span></h5>
                            <h5 class="list-group-item">Price to Pay Carrier : <span class="span_style">${{$data->listed_price}}</span>
                            </h5>
                            <h5 class="list-group-item">COD/COP Amount : <span class="span_style">${{ $data->cod_cop}}</span></h5>
                            <h5 class="list-group-item">Driver pay to us : <span class="span_style">
                                @php
                                    $driverpayus = 0;
                                    if( $data->listed_price > $data->pay_carrier){
                                    $driverpayus=$data->cod_cop-$data->pay_carrier;
                                    }
                                    @endphp
                                    ${{ $driverpayus}}
                             </span>
                            </h5>
                            <h5 class="list-group-item">Others pay to us : <span class="span_style">
                                @php
                                    $otherpayus=$data->payment-$data->pay_carrier-$driverpayus;
                                    @endphp
                                    ${{  $otherpayus }}
                             </span>
                            </h5>
                            @php
                            $totalbalance=$otherpayus+$driverpayus;
                            @endphp
                            <h5 class="list-group-item">Total Balance Amount : <span class="span_style">${{ $totalbalance }}</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="    min-height: 366px; ">
                        <div class="card-header bg-primary text-white">
                            <h4>PRICING & PAYMENT</h4>
                        </div>
                        <div class="card-body   ">
                            <h5 class="list-group-item">COD/COP Payment Method :
                                <span class="span_style">{{$data->payment_method}}</span></h5>
                            <h5 class="list-group-item">COD/COP Location : <span class="span_style">{{$data->cod_cop_loc}}</span></h5>
                            <h5 class="list-group-item">Balance Payment Method :
                                <span class="span_style">{{$data->balance_method}}</span></h5>
                            <h5 class="list-group-item">Balance Payment Time : <span class="span_style">{{$data->balance_time}}</span>
                            </h5>
                            <h5 class="list-group-item">Balance Payment Terms Begin On :
                                <span class="span_style">{{$data->terms}}</span></h5>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="card" style="height:96% ">
                    <div class="card-header bg-primary text-white">
                        <h4>CUSTOMER CARD HISTORY</h4>
                    </div>
                    <div class="card-body   ">

                        <table id="example-1" class="table table-striped table-bordered text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">ORDER#</th>
                                <th class="border-bottom-0">First Name</th>
                                <th class="border-bottom-0">Last Name</th>
                                <th class="border-bottom-0">Card No</th>
                                <th class="border-bottom-0">Card Expiry Date</th>
                                <th class="border-bottom-0">Card Security</th>
                                <th class="border-bottom-0">Signature</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data2 as $val2)
                                <?php

                                ?>
                                <tr>
                                    <td>{{$val2->orderId}}</td>
                                    <td>{{$val2->card_first_name}}</td>
                                    <td>{{$val2->card_last_name}}</td>
                                    <?php $card_no_array=explode('^*',$val2->card_no)   ?>

                                    <td>
                                        @foreach($card_no_array as $cardno)
                                              {{$cardno}}
                                             @if(!empty($cardno))
                                               <br>
                                             @endif
                                        @endforeach

                                    </td>
                                    <td>
                                      <?php $card_expiry_array=explode('^*',$val2->card_expiry_date)   ?>
                                      @foreach($card_expiry_array as $cardexpiry)
                                          {{$cardexpiry}}
                                           @if(!empty($cardexpiry))
                                              <br>
                                           @endif
                                      @endforeach
                                    </td>

                                    <td>
                                        <?php $card_security_array=explode('^*',$val2->card_security)   ?>
                                        @foreach($card_security_array as $cardsecurity)
                                           {{$cardsecurity}}
                                           @if(!empty($cardsecurity))
                                             <br>
                                           @endif
                                        @endforeach
                                    </td>
                                    <td>{{$val2->signature}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card" style="height:96% ">
                    <div class="card-header bg-primary text-white">
                        <h4>CUSTOMER PAYMENT HISTORY</h4>
                    </div>
                    <div class="card-body   ">

                        <table id="example-1" class="table table-striped table-bordered text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">ORDER#</th>
                                <th class="border-bottom-0">Pay-Confirm</th>
                                <th class="border-bottom-0">C-Name</th>
                                <th class="border-bottom-0">Signature</th>
                                <th class="border-bottom-0">Order Amount</th>
                                <th class="border-bottom-0">Carrier Amount</th>
                                <th class="border-bottom-0">COD/COP</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data2 as $val2)
                                <?php

                                ?>
                                <tr>
                                    <td>{{$val2->orderId}}</td>
                                    <td>{{$val2->payment_status}}</td>
                                    <td>{{$val2->your_name}}</td>
                                    <td>{{$val2->signature}}</td>
                                    <td>{{ get_autoorder($val2->orderId,"payment")}}</td>
                                    <td>{{ get_autoorder($val2->orderId,"pay_carrier")}}</td>
                                    <td>{{ get_autoorder($val2->orderId,"cod_cop")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card" style="height:96% ">
                    <div class="card-header bg-primary text-white">
                        <h4>OWES HISTORY</h4>
                    </div>
                    <div class="card-body   ">

                        @foreach($payment_log as $plog)
                            <h5 class="list-group-item">
                                -- Pay Type:
                                <span class="span_style">{{$plog->pay_type}} </span>
                                -- Pay On:
                                <span class="span_style">{{$plog->pay_location}}</span>
                                -- Pay By:
                                <span class="span_style">{{$plog->pay_method}}</span>
                                -- Amount:
                                <span class="span_style">{{$plog->amount}}</span>

                                @if($plog->owes_money=='0')
                                    ( Owes Money Confirmed By:
                                    {{get_user_name($plog->user_id)}}
                                    )
                                @else
                                ( Owes Money not Confirmed By:
                                {{get_user_name($plog->user_id)}}
                                    )

                                @endif
                            </h5>
                        @endforeach


                    </div>
                </div>
            </div>



        </div>
        @if($data->owes_money=='1')
            <div class="row">
                <div class="col-md-12">
                      <div class="card">
                        <div class="card-header bg-primary text-white w-100">
                            <h4>STATUS UPDATE</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">

                                <tbody>
                              <form action="/store_payment_status" method="post">
                                  @csrf
                                  <input type="hidden" name="orderid2" value="{{$data->id}}"/>
                                <tr>
                                    <td>
                                        <div class="col-md-6">
                                            <input type="radio" @if($data->paid_status=='2') checked @endif name="payment_status" value="2" required> Payment Update &nbsp;&nbsp;
                                            <input type="radio" @if($data->paid_status=='3') checked @endif name="payment_status" value="3" required> Payment Received
                                          <br><br>
                                            Profit: <input type="text" value="@if(!empty($profit->profit)) {{$profit->profit}} @endif" name="profit" >
                                            <br><br>
                                            <button id="sv_btn1" type="submit" name="save" class="btn  btn-primary">
                                                Save
                                            </button>
                                        </div>

                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                              </form>
                              <form name="storepayment" class="col-md-12" action="/store_payment_confirmed" method="post">
                                  @csrf
                                  <input type="hidden" name="orderid" value="{{$data->id}}"/>
                                <tr>
                                    <td>
                                        Pay Type *
                                    </td>
                                    <td>
                                        Pay on *
                                    </td>
                                    <td>
                                        Pay By *
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select name="paytype" required class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Send">Send</option>
                                                    <option value="Receive">Receive</option>

                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <select name="location" required class="form-control"
                                                        style="width: 100%">
                                                    <option value="">Select</option>
                                                    <option value="Pickup">Pickup</option>
                                                    <option value="Delivery">Delivery</option>

                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <select id="pmethod" name="paymentmethod" required
                                                        class="form-control" style="width: 100%">
                                                    <option value="">Select</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Certified Cheque">Certified Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Bank Deposit">Bank Deposit</option>

                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="detail" class="col-md-6">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="payconfirm" value="1"> Payment Confirmed
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="owesmoney" checked value="1"> Owes Money
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-6">
                                            Amount
                                            <input required type="text" name="amount" value="" class="form-control">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>
                                        <span>
                                            Additional Information
                                        </span>
                                        <div class="col-md-12">
                                            <textarea style="width:100%" required cols="60" rows="6"
                                                      name="additionalinfo"></textarea>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                 <td>
                                  <div class="card-footer text-center">
                                      <h5></h5> I accept the payment is confirmed </h5>
                                      <button id="sv_btn" type="submit" name="save" class="btn  btn-primary">Confirm
                                          Payment
                                      </button>
                                  </div>
                                 </td>
                                </tr>
                                 </form>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
      @endif
    </div>


@endsection

@section('extraScript')
    <script>
        $(function () {
            $('.status').hide();
            $('.status_update').change(function () {
                $('.status').hide();
                $('.' + $(this).val()).show();
            })
        })

        $("#pmethod").change(function () {
            if ($("#pmethod").val() == 'Cash') {
                $("#detail").html('');
                $("#detail").append(`
                Cash Status
                <br>
                <select required id="cashstatus" name="cashstatus" required class="form-control" >
                        <option value="">Select</option>
                        <option value="Cash Received">Cash Received</option>
                <option value="Cash Pay">Cash Pay</option>

                </select>

                `)
            }
            if ($("#pmethod").val() == 'Credit Card') {
                $("#detail").html('');
                $("#detail").append(`
                Card Type
                <input type="text" required name="cardtype" value="" class="form-control"/>
                        Card Number
                <input type="text" required name="cardno" value="" class="form-control"/>
                        Card SEC
                <input type="text" required name="security" value="" class="form-control"/>
                        Exp. Date
                        <input type="text" required name="expirydate" value="" class="form-control"/>
                `)
            }
            if ($("#pmethod").val() == 'Certified Cheque') {
                $("#detail").html('');
                $("#detail").append(`
                Certificated Cheque Number
                <input required type="text" name="cheqno" value="" class="form-control"/>

                `)
            }
            if ($("#pmethod").val() == 'Paypal') {
                $("#detail").html('');
                $("#detail").append(`
                Paypal Transcation ID
                <input  type="text" required name="paypalid" value="" class="form-control"/>

                `)
            }
            if ($("#pmethod").val() == 'Bank Deposit') {
                $("#detail").html('');
                $("#detail").append(`
                Bank Transcation ID
                <input required type="text" name="bankid" value="" class="form-control"/>

                `)
            }
        });


    </script>







@endsection

