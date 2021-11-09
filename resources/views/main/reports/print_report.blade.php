@extends('layouts.innerpages')

@section('template_title')
    New Quote
@endsection
@include('partials.mainsite_pages.return_function')

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Rock+Salt|Shadows+Into+Light|Cedarville+Cursive');

    .sig3 {
        font-family: 'Cedarville Cursive', cursive;
        font-size: 1.8em;
    }
    .app-header.header {
        display: none !important;
    }
    tbody {
        border: 1px solid #ffffff;
    }

    @page {
        size: 1cm 0cm 1cm 7cm !important;
        margin: 2mm 2mm 0mm 2mm !important;


    }

    @media print {
        .card-body{
            padding-bottom:10px !important;
            margin-bottom:10px !important;
        }
    }

    * {
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .float_right span_input {
        display: flex;
        flex-direction: row-reverse;
        font-size: 15px;
        font-weight: 500;
        margin-top: -12px;
    }

    h3 {
        color: #8cc73e;
    }

    h2, h3 {
        padding-top: 2px;
    }

    .c_name {
        color: #007bff;
    }

    .c_heading {
        color: #009eda;
    }
    .row{
        margin-top: -21px;
    }
    .page {
        background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
        box-shadow: 2px 2px #9E9E9E;
    }
    .app-header , .header{
        display: inline-flex !important;
    }
    .history_content {
        /*background-color: white;*/
        margin-top: 38px;
    }
    .card-header{
        /*justify-content: center;*/
        border-bottom: 1px solid #007bff !important;
    }
    .card{
        border: 1px solid #007bff !important;
    }
    .span_input{
        color:var(--blue);
        font-weight:700;
    }


</style>

@section('content')
    <?php
    $condition2 = explode('*^', $data->condition);



    ?>

    <div class="container   p-5" style="margin-top: 35px !important;width: 69%;background-color: transparent;border: 0px solid #73d7fa !important;">
        <div class="row">
            <ol class="breadcrumb" style="background-color: transparent;border: ">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="fe fe-layout mr-2 fs-14"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Report</a></li>
            </ol>
            <div class="card" style=" ">

                <div class="card-header" >

                    <div class="row" style=" width: 100% !important; margin-top: 8px; ">
                        <div class="col-md-6">
                            <h3 class="c_name">Auto TransportGO Company </h3>
                        </div>
                        <div class="col-md-6">
                            <h3 style="color: #ff0048;height: 36px;float: right" >ORDER# {{$data->id}}</h3>
                        </div>
                    </div>


                </div>
                <div class="card-body" style=" margin-top: 19px; ">
                    <div style="margin-top: -25px">
                        <h5>201 International Cir STE 230, Hunt Valley, MD, 21030</h5>
                        <h5>Tel No: (240) 489-2730</h5>
                        <h5>Email: support@shipa1.com</h5>
                    </div>
                    <h4 class="c_heading" style=" margin-top: 21px; ">ORDER INFORMATION</h4>
                    <ul class="list-group">
                        <li class="list-group-item" style=" height: 50px; ">
                            <h5>Order No #<span  class="float_right span_input "> {{$data->id}}</span></h5>
                        </li>
                        <li class="list-group-item" style=" height: 50px; ">
                            <h5>Driver Pickup Date : <span  class="float_right span_input">{{$data->driver_pickup_date}}</span></h5>
                        </li>
                        <li class="list-group-item" style=" height: 50px; ">
                            <h5>Driver Delivery Date : <span  class="float_right span_input">{{$data->driver_deliver_date}}</span></h5>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="card col-md-6">
                <div class="card-header " style=" justify-content: center; ">
                    <h4 class="c_heading">ORIGIN INFORMATION</h4>
                </div>
                <div class="card-body">
                    <h5>Terminal, Dealer, Auction :
                        &nbsp;<span class="span_input">
                            <?php
                            echo get_oterminal_name($data->oterminal);
                            ?>
                            {{$data->oauction}}
                        </span>
                    </h5>
                    <h5>Name: <span class="span_input">&nbsp;{{$data->oname}}</span> </h5>
                    <h5>Buyer/Lot/Stock Number : <span class="span_input">&nbsp;{{$data->obuyer_no}}</span></h5>
                    <!--<h5>Auction Name :&nbsp;<span class="span_input"> {{$data->oauction}}</span></h5>
                    <h5>Auction Phone : <span class="span_input">&nbsp;{{$data->oauctionpho}}</span> </h5>
                    -->
                    <h5>Email Address :&nbsp;<span class="span_input">{{$data->oemail}}</span></h5>

                    <h4>Phone :
                        <span class="span_input">
                        <?php
                            $condition1 = explode('*^', $data->ophone);
                            foreach ($condition1 as $v) {
                                $new = '(xxx) xxx-'.substr( $v, -4);
                                echo "&nbsp;(" . $new . "),";
                            }

                            ?>
                        </span>
                    </h4>
                    <h4>Address : <span class="span_input"> &nbsp;{{$data->oaddress}} </span> </h4>
                    <h4>City or Zip : <span class="span_input"> &nbsp;{{$data->originzsc}} </span></h4>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-header" style=" justify-content: center; ">
                    <h4 class="c_heading">DESTINATION INFORMATION</h4>
                </div>
                <div class="card-body">
                    <h5>Terminal, Dealer, Auction : &nbsp;
                        <span class="span_input">
                            <?php
                            echo get_dterminal_name($data->dterminal);
                            ?>

                            {{ $data->dauction }}
                         </span>
                    </h5>
                    <h5>Name :&nbsp;<span class="span_input">{{$data->dname}}</span></h5>
                    <h5>Phone :
                        <span class="span_input">
                            <?php
                            $dphone = explode('*^', $data->dphone);
                            foreach ($dphone as $v) {
                                $new = '(xxx) xxx-'.substr( $v, -4);
                                echo "&nbsp;(" . $new . "),";
                            }

                            ?>
                        </span>

                    </h5>
                    <h5>Address : <span class="span_input"> &nbsp;{{$data->daddress}}</span></h5>
                    <h5>City or Zip : <Span class="span_input">&nbsp;{{$data->destinationzsc}} </span> </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-6">
                <div class="card-header" style=" justify-content: center; ">
                    <h4 class="c_heading">VEHICLE</h4>
                </div>
                <div class="card-body">
                    <h5>Vehicle Num : &nbsp;
                        <span class="span_input">
                        <?php
                            $vnums = explode('*^', $data->vin_num);
                            foreach ($vnums as $vnum){
                                if(!empty($vnum) && $vnum!=' ' ){
                                    echo " ($vnum) ";
                                }
                            }
                            ?>
                        </span>
                    </h5>
                    <h5>Vehicle Name :
                        <span class="span_input">
                        <?php
                            $vehiclename = explode('*^-', $data->ymk);
                            foreach ($vehiclename as $vehicleymk){
                                echo " ($vehicleymk) ";
                            }
                            ?>
                        </span>


                    </h5>
                    <h5>Vehicle Type :
                        <span class="span_input">
                        <?php
                            $condition3 = explode('*^', $data->type);
                            foreach ($condition3 as $type_val){
                                echo " ($type_val) ";
                            }
                            ?>
                        </span>

                    </h5>
                    <h5>Vehicle Condition : &nbsp;
                        <span class="span_input">
                        @foreach($condition2 as $val2)
                                {{ "(".get_condtion($val2).")"}}
                            @endforeach
                        </span>
                    </h5>
                </div>

            </div>
            <div class="card col-md-6">
                <div class="card-header" style=" justify-content: center; ">
                    <h4 class="c_heading">ADDITIONAL INFORMATION</h4>
                </div>
                <div class="card-body">
                    <h5>Trailer Type :
                        <span class="span_input">
                        <?php
                            $condition3 = explode('*^', $data->type);
                            foreach ($condition3 as $type_val){
                                echo " ($type_val) ";
                            }
                            ?>
                        </span>

                    </h5>
                    <h5>Need Title? : -- </h5>
                    <h5>Comments : <spsn class="span_input">&nbsp;{{$data->add_info}}</spsn> </h5>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header" style=" justify-content: center; ">
                    <h4 class="c_heading">PRICING & PAYMENT</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Order Booking Price :</td>
                            <td></td>
                            <td></td>

                            <td><h5 style="color: blue;font-weight: 600;float: right;font-size: 20px">
                                    <span class="span_input">
                                    $ {{$data->payment}}
                                    </span>
                                </h5></td>

                        </tr>
                        <tr>
                            <td>Price to Pay Carrier: <span class="span_input">{{$data->pay_carrier}} </span></td>
                            <td>COD/COP Amount: <span class="span_input">&nbsp;{{$data->company_price}}</span></td>
                            <td>COD/COP Payment Method: &nbsp;<span class="span_input">{{$data->payment_method}} </span> </td>
                            <td>COD/COP Location: <span class="span_input">&nbsp;{{$data->cod_cop_loc}} </span></td>
                        </tr>
                        <tr>
                            <td>Balance Amount: <span class="span_input">&nbsp;{{$data->balance}} </span></td>
                            <td>Balance Payment Method :&nbsp;<span class="span_input">{{$data->balance_method}} </span> </td>
                            <td>Balance Payment Time:&nbsp;<span class="span_input">{{$data->balance_time}} </span> </td>
                            <td>Balance Terms: <span class="span_input">{{$data->terms}} </span></td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="4">

                                <label>Additional Information :<span class="">&nbsp;{{$data->add_info}}</span></label><br>

                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td colspan="4" rowspan="4">
                                <label>CONFIRMATION SIGNATURE :
                                    <span class="span_input sig3">
                                    &nbsp; {{  get_payment_detail($data->id,"signature") }}
                                    </span>
                                    <br>
                                    {{$data->oname}}
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('extraScript')








@endsection

