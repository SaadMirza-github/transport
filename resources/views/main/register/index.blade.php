@include('partials.mainsite_pages.return_function')
@extends('layouts.innerpages')

@section('template_title')
    Add Employee
@endsection

@section('content')


    <style>
        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }


        .side-badge {
            font-size: 21px;
            background-color: transparent;
            color: red;
            font-weight: 800;
        }

        .panel-tabs {
            display: flex;
            flex-wrap: wrap
        }

        .tabs-menu ul li a {
            padding: 10px 20px 11px 20px;
            display: block;
            border: 1px solid #645959;
            margin: 3px;
            border-radius: 4px;
            box-shadow: 5px 5px #9E9E9E;
        }

        .tabs-menu ul li a:hover {
            padding: 10px 20px 11px 20px;
            display: block;
            border: 1px solid #645959;
            margin: 3px;
            border-radius: 4px;
            box-shadow: -2px -2px #9E9E9E;
        }

        .tabs-menu ul li .active {
            background: #705ec8;
            box-shadow: -2px -2px #9E9E9E;
            color: white

        }

        .tab-menu-heading {
            padding: 0px !important;
        }

        .panel-body {
            padding: 0px !important;

        }

        .tab_style {
            box-shadow: 5px 5px #888888;
            margin-right: 11px;
        }

        .btn:hover {
            text-decoration: none;
        }

        ul > li > a > .fa {
            color: white !important;
            text-shadow: -3px 0 #000, 0 1px #000, 2px 0 #000, 0 2px #000
        }

        /*btn_background*/
        .effect01 {
            color: #FFF;
            border: 4px solid #000;
            box-shadow: 0px 0px 3px 0px #000 inset;
            background-image: -webkit-radial-gradient(50% 0%, 8% 50%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(50% 100%, 12% 50%, hsla(0, 0%, 100%, .6) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(0% 50%, 50% 7%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(100% 50%, 50% 5%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 3%, hsla(0, 0%, 0%, .1) 3.5%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 6%, hsla(0, 0%, 100%, .1) 7.5%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 1.2%, hsla(0, 0%, 100%, .2) 2.2%), -webkit-radial-gradient(50% 50%, 200% 50%, hsla(0, 0%, 90%, 1) 5%, hsla(0, 0%, 85%, 1) 30%, hsla(0, 0%, 60%, 1) 100%);
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
            font-size: 21px;
            height: 34px;
            width: 100px;
            padding: 0px !important;
            margin: 6px !important;
        }

        .effect01:hover {
            border: 4px solid #666;
            background-color: #FFF;
            box-shadow: 0px 0px 0px 4px #EEE inset;
        }

        .blue {
            background-color: #1fd1f9;
            background-image: linear-gradient(to right, rgb(41, 128, 185), rgb(109, 213, 250), rgb(255, 255, 255));
            box-shadow: 2px 2px #9E9E9E;
        }

        .green {
            background-color: #378b29;
            background-image: linear-gradient(315deg, #378b29 0%, #74d680 74%);
            box-shadow: 2px 2px #9E9E9E;
        }

        .purple {

            background-image: linear-gradient(315deg, #fc9842 0%, #fe5f75 74%);
            box-shadow: 2px 2px #9E9E9E;

        }

        .red {

            background-image: linear-gradient(to right, rgb(128, 0, 128), rgb(255, 192, 203));
            box-shadow: 2px 2px #9E9E9E;

        }

        .rainbow {
            background-image: linear-gradient(to right, rgb(0, 242, 96), rgb(5, 117, 230));
            box-shadow: 2px 2px #9E9E9E;
        }

        .orange {
            background-image: linear-gradient(to right, rgb(252, 74, 26), rgb(247, 183, 51));
            box-shadow: 2px 2px #9E9E9E;
        }

        .darkblue {
            background-image: linear-gradient(to right, rgb(57, 106, 252), rgb(41, 72, 255));
            box-shadow: 2px 2px #9E9E9E;
        }

        /*btn_text*/
        .effect01 span {
            transition: all 0.2s ease-out;
            z-index: 2;
        }

        .effect01:hover span {
            letter-spacing: 0.13em;
            color: #333;
        }

        .header_show {
            cursor: pointer;
        }

        /*highlight*/
        .effect01:after {
            background: #FFF;
            border: 0px solid #000;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
            width: 50px;
            transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1); /*easeOutCirc*/
            z-index: 1;
        }

        .effect01:hover:after {
            background: #FFF;
            border: 20px solid #000;
            opacity: 0;
            left: 120%;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
        }

        .modal-full {
            min-width: 20%;
            margin-left: 6%;
        }

        .modal-full .modal-content {
            min-height: 80vh;
            min-width: 90vw;
        }


        .glow-on-hover {
            width: 220px;
            height: 50px;
            border: none;
            outline: none;
            color: #fff;
            background: #705ec8;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }
        .glow-on-hover>a{
            color: white;
            font-size: 14px;
            font-weight: 900;
        }
        .glow-on-hover>a:hover{
            color: white;
            font-size: 14px;
            font-weight: 900;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left:-2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-on-hover:active {
            color: #705ec8;
        }

        .glow-on-hover:active:after {
            background: transparent;
        }

        .glow-on-hover:hover:before {
            opacity: 1;
        }

        .glow-on-hover:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #705ec8;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        @keyframes glowing {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }

        @keyframes click-wave {
            0% {
                height: 40px;
                width: 40px;
                opacity: 0.35;
                position: relative;
            }
            100% {
                height: 200px;
                width: 200px;
                margin-left: -80px;
                margin-top: -80px;
                opacity: 0;
            }
        }

        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 13.33333px;
            right: 0;
            bottom: 0;
            left: 0;
            height: 40px;
            width: 40px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000;
        }
        .option-input:hover {
            background: #9faab7;
        }
        .option-input:checked {
            background: #705ec8;
        }
        .option-input:checked::before {
            height: 40px;
            width: 40px;
            position: absolute;
            content: '✔';
            display: inline-block;
            font-size: 26.66667px;
            text-align: center;
            line-height: 40px;
        }
        .option-input:checked::after {
            -webkit-animation: click-wave 0.65s;
            -moz-animation: click-wave 0.65s;
            animation: click-wave 0.65s;
            background: #705ec8;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
        }
        .option-input.radio {
            border-radius: 50%;
        }
        .option-input.radio::after {
            border-radius: 50%;
        }
        .modal-backdrop{
            width: 100%;
            height: 100%;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            color: inherit;
            font-family:"Raleway", sans-serif;
            font-weight: 300;
            line-height: 1.1;
        }

        .title h1, .title h2, .title h3, .title h4 { margin: 5px; }
        .title {
            position: relative;
            display: block;
            padding-bottom: 0;
            border-bottom: 3px double #dcdcdc;
            margin-bottom: 30px;
        }
        .title::before {
            width: 15%;
            height: 3px;
            background: #53bdff;
            position: absolute;
            bottom: -3px;
            content:'';
        }

        /* ==========================================================================
           WYSIWYG
           ========================================================================== */
        #editor {
            resize: vertical;
            overflow: auto;
            line-height: 1.5;
            background-color: #ffffff;
            background-image: none;
            border: 0;
            border-bottom: 0px solid #000000;
            min-height: 200px;
            box-shadow: none;
            padding: 8px 16px;
            margin: 0 auto;
            font-size: 22px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
        #editControls{
            border-bottom: 1px solid black;
        }
        #editor:focus {
            background-color: #f0f0f0;
            border-color: #38af5b;
            box-shadow: none;
            outline: 0 none;
        }


    </style>

    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>

    {{--<ul class="breadcrumb">--}}
        {{--<li><a href="./dashboard">Home</a></li>--}}
        {{--<li><a>Employee</a></li>--}}
    {{--</ul>--}}
   
    <!--End Page header-->
    <!-- Row -->
    <form action="" id="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Employee</div>
                    </div>
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Basic info:</div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" required name="first_name" class="form-control"
                                           placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" required name="phone_number" class="form-control"
                                           placeholder="Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" required>JOB TYPE</label>
                                    <select class="form-control select2" name="job_type">
                                        <optgroup label="job type">
                                            <option value="" selected="" disabled="">Select</option>
                                            @foreach ($data as $val) ?>
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Employee Access (Phone Quotes)</label>
                                    <select multiple="multiple"  name="emp_access_phone[]" class="multiselect">
                                        <option value="0">New</option>
                                        <option value="1">Interested</option>
                                        <option value="2">FollowMore</option>
                                        <option value="3">AskingLow</option>
                                        <option value="4">NotInterested</option>
                                        <option value="5">NoResponse</option>
                                        <option value="6">TimeQuote</option>
                                        <option value="7">PaymentMissing</option>
                                        <option value="8">Booked</option>
                                        <option value="9">Listed</option>
                                        <option value="10">Dispatch</option>
                                        <option value="11">Pickup</option>
                                        <option value="12">Delivered</option>
                                        <option value="13">Completed</option>
                                        <option value="14">Cancel</option>
                                        <option value="15">Deleted</option>
                                        <option value="16">Owes Money</option>
                                        <option value="17">Carrier Update</option>
                                        <option value="19">Active</option>
                                        <option value="20">Pickup Pending</option>
                                        <option value="21">Pickup Rejected</option>
                                        <option value="22">Delivery Pending</option>
                                        <option value="23">Delivery Rejected</option>
                                        <option value="24">Complete Pending</option>
                                        <option value="25">Earning Report</option>
                                        <option value="26">Quotes Report</option>
                                        <option value="27">Reviews Report</option>
                                        <option value="28">Performance Report</option>
                                        <option value="29">QA Portal Report</option>
                                        <option value="30">User Report</option>
                                        <option value="31">Manage Accounts</option>
                                        <option value="32">General  Setting</option>
                                        <option value="33">No Payment Received</option>
                                        <option value="34">Payment Update</option>
                                        <option value="35">Payment Received</option>
                                    </select>
                                </div>



                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Employee Access (Website Quotes)</label>
                                    <select multiple="multiple"  name="emp_access_web[]" class="multiselect">
                                        <option value="0">New</option>
                                        <option value="1">Interested</option>
                                        <option value="2">FollowMore</option>
                                        <option value="3">AskingLow</option>
                                        <option value="4">NotInterested</option>
                                        <option value="5">NoResponse</option>
                                        <option value="6">TimeQuote</option>
                                        <option value="7">PaymentMissing</option>
                                        <option value="8">Booked</option>
                                        <option value="9">Listed</option>
                                        <option value="10">Dispatch</option>
                                        <option value="11">Pickup</option>
                                        <option value="12">Delivered</option>
                                        <option value="13">Completed</option>
                                        <option value="14">Cancel</option>
                                        <option value="15">Deleted</option>
                                        <option value="16">Owes Money</option>
                                        <option value="17">Carrier Update</option>
                                        <option value="18">Pickup Pending</option>
                                        <option value="19">Pickup Rejected</option>
                                        <option value="20">Delivery Pending</option>
                                        <option value="21">Delivery Rejected</option>
                                        <option value="22">Complete Pending</option>
                                    </select>
                                </div>



                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" required name="password" class="form-control"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" required name="address" class="form-control" style=" height: 100px; "
                                           placeholder="Home Address" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inline">

                                    <input type="checkbox"  name="targetapply" id="targetapply" value="1"
                                    onclick="targetshow();">
                                    <label class="form-label"> &nbsp; &nbsp;Target Apply</label>
                                    &nbsp; &nbsp;
                                    <div id="targetid">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button id="sv_btn" type="submit" class="btn  btn-primary w-30">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>


    <div class="modal" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-check-circle fs-100 text-success lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold" id="success"></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger" id="not_success"></h4>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extraScript')
    <script>

        $(document).ready(function (e) {
            $("#form").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/save_employee",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {

                    },
                    success: function (data) {

                        // view uploaded file.
                        //$("#preview").html(data).fadeIn();

                        let test = data.toString();
                        let test2 = $.trim(test);
                        let text = "SUCCESS";
                        if (test2 == text) {
                            $('#success').html(data);
                            $('#modaldemo4').modal('show');
                            window.location.href = "/view_employee";
                        } else {
                            $('#not_success').html(data);
                            $('#modaldemo5').modal('show');
                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });

    function targetshow() {
        if ($("#targetapply").is(':checked')) {
            $('#targetid').html('');
            $('#targetid').append(`
            Target <br>
             <input required type="number" name="target" id="target" value="" class="form-control" />
            `)
        }
        else {
            $('#targetid').html('');
        }
    }
    </script>

@endsection

