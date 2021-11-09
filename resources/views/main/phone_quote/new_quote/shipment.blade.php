@extends('layouts.innerpages')

@section('template_title')
    Ship
@endsection

@section('content')
    <head>
        <title>Ship</title>
    </head>
    <style>
        .register {
            background: -webkit-linear-gradient(left, #1965B1, #00c6ff);
            margin-top: 0%;
            padding: 0%;
            border-radius: 50px !important;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 61%;
            margin-bottom: 0%;
            width: 93%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 9% 0 0 5%;
            margin-top: 10%;
        }

        #getPriceNow {
            /*float: right;*/
            margin-top: 0%;
            border: none;
            border-radius: 1.5rem;
            padding: 6px;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 30%;
            cursor: pointer;
            font-size: 24px;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 5%;
            margin-bottom: -14%;
            color: #495057;
        }

        .justify-content-center {
            -webkit-box-pack: center !important;
            -webkit-justify-content: center !important;
            -moz-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

        .form-control-position {
            position: absolute;
            top: -4px;
            /*right: 0;*/
            z-index: 200;
            display: block;
            width: 2.5rem;
            height: 2.5rem;
            line-height: 3.2rem;
            text-align: center;
        }

        html body .la {
            font-size: 1.4rem;
        }

        .has-icon-left .form-control {
            padding-right: 1rem;
            padding-left: calc(2.75rem + 2px);
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem 1.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        #remove_btn {
            padding: 0px !important;
        }

        .mb-1, .my-1 {
            margin-bottom: 0% !important;
        }

        .container {
            /*margin-left: 0px !important;*/
        }

        .fa-plus-circle {
            color: #083dc1 !important;
        }

        .fa-minus-circle {
            color: #c10808 !important;
        }

        .makeRed {

            border-bottom: 1px solid red !important;

        }

        .bar.red-bar:before, .bar.red-bar:after {
            background: red;
        }

        select {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            /*padding : 4px 20px*/
        }

        .ui-menu {
            z-index: 10000;
            font-size: 15px;
            background: rgba(223, 253, 255, 0.93);

        }

        .modal-backdrop.show {
            opacity: .5;
        }

        .zoomInUp {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #7a7b7d;
        }

        .black {
            font-size: 16px;
            padding: 14px;
            color: black;
        }

        .red {
            font-size: 16px;
            padding: 14px;
            color: red;
        }

        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            background-color: transparent;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        ul.breadcrumb li + li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }

        ul.breadcrumb li a {
            color: white;
            text-decoration: none;
            font-size: 10px
        }

        ul.breadcrumb li a:hover {
            color: white;
            text-decoration: underline;
            font-size: 11px;
        }

        /*#changePrice{*/
        /*margin: 2% 37%;*/
        /*box-shadow: inset -6px -7px #9E9E9E;*/
        /*border: 1px solid;*/
        /*padding: 11px;*/
        /*width: 26%;*/
        /*font-size: 24px;*/
        /*font-weight: bold;*/
        /*border-radius: 30px;*/
        /*}*/

        element.style {
        }

        /*#changePrice {*/
        /*margin: 23% -13%;*/
        /*box-shadow: inset -9px -9px 0px #9E9E9E;*/
        /*border: 1px solid #0b375c;*/
        /*padding: 11px;*/
        /*width: 140%;*/
        /*font-size: 24px;*/
        /*font-weight: bold;*/
        /*border-radius: 30px;*/
        /*background-color: #ffffff;*/
        /*}*/
        #changePrice {
            margin: 6% 12%;
            box-shadow: 1px 4px 15px #0062cc;
            border: 1px solid #0062cc;
            padding: 3px;
            width: 85%;
            font-size: -0px;
            font-weight: 500;
            border-radius: 100px;
            background-color: #ffffff;
        }

        .modal-content1 {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: transparent;
            border-radius: 3px;
            background-color: transparent;
        }

        #price1 {
            font-size: 30px;
            font-weight: bold;
            color: red;
            margin-left: 5px;
        }

        #cod_cop {
            font-size: 30px;
            font-weight: bold;
            color: red;
            margin-left: 5px;
        }

        #setupOrderNow {
            margin: 6px 34%;
            border: none;
            border-radius: 1.5rem;
            padding: 13px;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 48%;
            cursor: pointer;
            font-size: 19px;
        }

        .la.la-calendar-o {
            font-family: 'Line Awesome Free';
            font-weight: 400;
            color: #8576d0;
            background-color: white;
        }

        .la {
            z-index: 0;
            color: #705ec8;
        }

        #ui-datepicker-div {
            z-index: 1000 !important;
        }

        input, select, textarea {
            border: 1px solid #b0a6e0 !important;
        }

        .btn_shade:hover {
            background-color: #0000ffb0;
            box-shadow: 5px 4px 4px #9E9E9E;
            color: white;
        }

        .alert-success {
            width: 27%;
            font-size: 19px;
            font-weight: 400;
            color: white;
            background-color: #041e61;
            border-radius: 16px;
            justify-content: center;
            text-align: center;
            margin-left: 39%;
        }

        .border_bottom {
            border-bottom: 1px solid red !important;
        }

        .container {
            width: 1000px;
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        .container .card {
            position: relative;
            cursor: pointer;
        }

        .card {
            padding: 1% 0% 0% 1%;
            margin-top: 63px;
        }

        .container .card .face {
            width: 300px;
            height: 200px;
            transition: 0.5s;
        }

        .container .card .face.face1 {
            position: relative;
            background: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            transform: translateY(100px);
            border-radius: 15px;
        }

        .container .card:hover .face.face1 {
            /*background: #ff0057;*/
            background: #0088ff;
            transform: translateY(0);
        }

        .container .card .face.face1 .content {
            /*opacity: 0.2;*/
            transition: 0.5s;
        }

        .container .card:hover .face.face1 .content {
            opacity: 1;
        }

        .container .card .face.face1 .content img {
            max-width: 101%;
        }

        .container .card .face.face1 .content h3 {
            margin: 10px 0 0;
            padding: 0;
            color: #fff;
            text-align: center;
            font-size: 1.5em;
        }

        .container .card .face.face2 {
            position: relative;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
            transform: translateY(-100px);
            border-radius: 15px;

        }

        .container .card:hover .face.face2 {
            transform: translateY(0);
        }

        .container .card .face.face2 .content p {
            margin: 0;
            padding: 0;
        }

        .container .card .face.face2 .content a {
            margin: 15px 0 0;
            display: inline-block;
            text-decoration: none;
            font-weight: 900;
            color: #333;
            padding: 5px;
            border: 1px solid #0088ff;
            width: 100%;
            text-align: center;
        }

        .container .card .face.face2 .content a:hover {
            background: #0088ff;
            color: #fff;
        }

        #myModal2 {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10000;
            display: none;
            overflow: hidden;
            outline: 0;
            padding-right: 10% !important;
            margin: 0 !important;
            background-color: #f4f5fa;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #f4f5fa !important;
            background-clip: border-box;
            position: relative;
            margin-bottom: 1.5rem;
            width: 193px !important;
            border: 0px !important;
            box-shadow: 0px 0px 0px !important;
            border-radius: 8px;
            margin-left: -15px !important;
        }
        #mymodal1{
            background-color:#f4f5fa !important;
        }

        .gradient-border {
            --borderWidth: 10px;
            background: #ffffff;
            position: relative;
            border-radius: var(--borderWidth);
        }
        .gradient-border:after {
            content: '';
            position: absolute;
            top: calc(-1 * var(--borderWidth));
            left: calc(-1 * var(--borderWidth));
            height: calc(100% + var(--borderWidth) * 2);
            width: calc(100% + var(--borderWidth) * 2);
            background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
            border-radius: calc(2 * var(--borderWidth));
            z-index: -1;
            animation: animatedgradient 3s ease alternate infinite;
            background-size: 300% 300%;
        }


        @keyframes animatedgradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .modal-header {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: justify;

             padding: 0px;
             border-bottom: 3px solid #dee2e6;

        }
        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
            font-size: 32px !important;
            font-family: 'FontAwesome';
        }
        .page-main {
            margin-top: -63px !important;
        }
    </style>

    <!------ Include the above in your HEAD tag ---------->
    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    <div class="container-fluid register">

        <form class=" needs-validation" novalidate method="post" onsubmit="return false;" id="calling_form">
            @csrf
            <input name="panel_type" type="hidden" value="1">
            <input type="hidden" name="uid" id="uid" value="">
            <input type="hidden" name="orderType" id="orderType" value="">
            <input type="hidden" name="orderid" id="orderid" value="">
            <input type="hidden" name="sitevalue" id="sitevalue" value="">
            <input type="hidden" name="customer_type" id="customer_type" value="">
            <input type="hidden" style="width:40px;" readonly id="placeorder" name="placeorder"/>
            <input type="hidden" style="width:40px;" readonly id="rolee" value="{{Auth::user()->role}}"/>
            <div class="car_form">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <ul class="breadcrumb">
                            <li><a href="/dashboard">Home</a></li>
                            <li><a href="/shipment">Ship Quote</a></li>
                        </ul>
                        <img src="{{ url('/public/assets/images/pictures/ship.png')}}" alt="ship.png"/>

                        <h3>Welcome</h3>

                        <p>Create Ship Quote Here!</p>

                    </div>

                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent" style="margin-top: -40px">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <span>   <h3 class="register-heading "
                                             style="margin-right: 16%;">Order On Phone</h3>
                                   </span>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="register-form">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h6>
                                                        <strong>
                                                            Origin
                                                            <span class="text-danger"><span
                                                                        class="required">*</span></span>
                                                        </strong>
                                                    </h6>


                                                    <div class="form-group validate">

                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="text" name="o_zip" id="o_zip"
                                                                   class="form-control this_save"
                                                                   value="" placeholder="Enter Zip"
                                                                   data-validation-required-message="This field is required"
                                                                   autocomplete="nope" aria-invalid="false">

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls position-relative has-icon-left">
                                                            <select required name="ostate" id="ostate"
                                                                    class="form-control this_save"
                                                                    data-validation-required-message="This field is required"
                                                                    autocomplete="nope" aria-invalid="false">
                                                                <option value="">Select State</option>
                                                                <option value="AL">Alabama</option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="AZ">Arizona</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="CA">California</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="DC">District of Columbia</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="HI">Hawaii</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WA">Washington</option>
                                                                <option value="WV">West Virginia</option>
                                                                <option value="WI">Wisconsin</option>
                                                                <option value="WY">Wyoming</option>
                                                            </select>

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="text" name="ocity" id="ocity"
                                                                   class="form-control this_save"
                                                                   value="" placeholder="Enter City"
                                                                   data-validation-required-message="This field is required"
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Origin Address
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                            <input type="text" name="oaddress"
                                                                   style=" border-radius: 17px; "
                                                                   value=""
                                                                   id="oaddress0"
                                                                   maxlength="99"
                                                                   class="form-control this_save"
                                                                   placeholder="address" required=""
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-home"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <h6>
                                                        <strong>
                                                            Destination
                                                            <span class="text-danger"><span
                                                                        class="required">*</span></span>
                                                        </strong>
                                                    </h6>


                                                    <div class="form-group">

                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="text" name="d_zip" id="d_zip"
                                                                   class="form-control this_save"
                                                                   value="" placeholder="Enter Zip"
                                                                   data-validation-required-message="This field is required"
                                                                   autocomplete="nope" aria-invalid="false">

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls position-relative has-icon-left">
                                                            <select required name="dstate" id="dstate"
                                                                    class="form-control this_save"
                                                                    data-validation-required-message="This field is required"
                                                                    autocomplete="nope" aria-invalid="false">
                                                                <option value="">Select State</option>
                                                                <option value="AL">Alabama</option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="AZ">Arizona</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="CA">California</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="DC">District of Columbia</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="HI">Hawaii</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WA">Washington</option>
                                                                <option value="WV">West Virginia</option>
                                                                <option value="WI">Wisconsin</option>
                                                                <option value="WY">Wyoming</option>
                                                            </select>

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="text" name="dcity" id="dcity"
                                                                   class="form-control this_save"
                                                                   value="" placeholder="Enter City"
                                                                   data-validation-required-message="This field is required"
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-map-marker"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Destination Address
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                            <input type="text" name="daddress"
                                                                   style=" border-radius: 17px; "
                                                                   value=""
                                                                   id="daddress0"
                                                                   maxlength="99"
                                                                   class="form-control this_save"
                                                                   placeholder="address" required=""
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-home"></i>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="row justify-content-center ">
                                                <a style=" margin-right: 10px; " href="javascript:void(0)" id="viewMap"
                                                   class="btn btn-blue btn_shade">View Map</a>
                                                <a style=" margin-right: 10px;border: 1px solid;"
                                                   href="javascript:timezon('https://www.timeanddate.com/worldclock/usa');"
                                                   class="btn btn-outline-primary">TimeZone</a>
                                                <a style=" margin-right: 10px; " href="javascript:void(0)"
                                                   id="viewCentral"
                                                   class="btn  btn-blue btn_shade">Central Pricing</a>
                                                <a style=" margin-right: 10px;border: 1px solid;"
                                                   href="javascript:weather('https://www.weather.gov/');"
                                                   class="btn btn-outline-primary">Weather</a>
                                                <a href="javascript:fuel('http://www.truckmiles.com/FuelPrices.asp');"
                                                   class="btn btn-blue btn_shade">Fuel Price</a>
                                            </div>

                                            <div id="carEquip">
                                                <input required type="hidden" name="count[]">
                                                <div class="row ">
                                                    <div class="col-lg-6" style=" padding-top: 4%; ">
                                                        <h6 class="font-weight-bold">
                                                            VEHICLE INFORMATION
                                                        </h6>
                                                    </div>

                                                    <div class="col-lg-6 text-right">
                                                        <a href="javascript:void(0)" id="addMore" class="this_save"
                                                           style=" font-size: 39px; "><i class="fa fa-plus-circle"
                                                                                         aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Year
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>
                                                            </h6>

                                                            <div class="controls position-relative has-icon-left">
                                                                <input required type="text" id="vyear0" name="vyear[]"
                                                                       placeholder="Enter Year" class="form-control this_save"
                                                                       data-validation-required-message="This field is required"
                                                                       autocomplete="nope">

                                                                <div class="form-control-position">
                                                                    <i class="la la-car"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Make
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>
                                                            </h6>

                                                            <div class="controls position-relative has-icon-left">
                                                                                    <span class="twitter-typeahead"
                                                                                          style=""><input
                                                                                                required type="text"
                                                                                                class="form-control tt-hint this_save"
                                                                                                autocomplete="off"
                                                                                                readonly=""
                                                                                                spellcheck="false"
                                                                                                tabindex="-1" dir="ltr"
                                                                                                style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);"><input
                                                                                                type="text"
                                                                                                name="vmake[]"
                                                                                                id="vmake0"
                                                                                                onkeyup="getmake()"
                                                                                                placeholder="Enter Make"
                                                                                                class="form-control tt-input vmake0 this_save"
                                                                                                autocomplete="off"
                                                                                                required=""
                                                                                                spellcheck="false"
                                                                                                dir="auto"
                                                                                                style="position: relative; vertical-align: top; background-color: transparent;"><pre
                                                                                                aria-hidden="true"
                                                                                                style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div
                                                                                                class="tt-menu"
                                                                                                style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                                                                                            <div class="tt-dataset tt-dataset-users"></div>
                                                                                        </div></span>

                                                                <div class="form-control-position">
                                                                    <i class="la la-car"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Model
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>

                                                                <div class="googleimage pull-right" id="googleimage0"
                                                                     onclick="googl(0)">
                                                                    <a href="javascript:void(0);"><img id="googleImg0"
                                                                                                       width="24"
                                                                                                       src="{{ url('/public/assets/images/pictures/googleicon.png')}}"
                                                                                                       class="greyImg"></a>
                                                                </div>
                                                            </h6>
                                                            <div class="controls position-relative has-icon-left">
                                                                                    <span class="twitter-typeahead"
                                                                                          style=""><input
                                                                                                required type="text"
                                                                                                class="form-control tt-hint this_save"
                                                                                                autocomplete="off"
                                                                                                readonly=""
                                                                                                spellcheck="false"
                                                                                                tabindex="-1" dir="ltr"
                                                                                                style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);">
                                                                                        <input
                                                                                                required type="text"
                                                                                                name="vmodel[]"
                                                                                                id="vmodel0"
                                                                                                onkeyup="getmodel(0)"
                                                                                                placeholder="Enter Make"
                                                                                                class="form-control tt-input vmodel0 this_save"
                                                                                                autocomplete="off"
                                                                                                spellcheck="false"
                                                                                                dir="auto"
                                                                                                style="position: relative; vertical-align: top; background-color: transparent;"><pre
                                                                                                aria-hidden="true"
                                                                                                style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div
                                                                                                class="tt-menu"
                                                                                                style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                                                                                            <div class="tt-dataset tt-dataset-users"></div>
                                                                                        </div></span>

                                                                <div class="form-control-position">
                                                                    <i class="la la-car"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Vehicle Type
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>
                                                            </h6>

                                                            <div class="controls position-relative has-icon-left">
                                                                <select name="vehType[]" id="vehType0"
                                                                        class="form-control this_save"
                                                                        required="" autocomplete="nope">
                                                                    <option value="">Select</option>
                                                                    <option value="Car">Car</option>
                                                                    <option value="SUV">SUV</option>
                                                                    <option value="Van">Van</option>
                                                                    <option value="Pickup">Pickup</option>
                                                                </select>

                                                                <div class="form-control-position">
                                                                    <i class="la la-truck"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Carrier Type
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>
                                                            </h6>

                                                            <div class="controls position-relative has-icon-left">
                                                                <select name="trailer_type[]" id="trailer_type0"
                                                                        class="form-control this_save"
                                                                        required="" autocomplete="nope">
                                                                    <option value="">Select</option>
                                                                    <option value="open">Open</option>
                                                                    <option value="enclosed">Enclosed</option>

                                                                </select>

                                                                <div class="form-control-position">
                                                                    <i class="la la-truck"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="form-group">
                                                            <h6>
                                                                <strong>
                                                                    Condition
                                                                    <span class="text-danger"><span
                                                                                class="required">*</span></span>
                                                                </strong>
                                                            </h6>

                                                            <div class="controls position-relative has-icon-left">
                                                                <select name="condition[]" id="condition0"
                                                                        class="form-control this_save"                                                                         class="form-control "
                                                                        required="" autocomplete="nope">
                                                                    <option value="">Select</option>
                                                                    <option value="1">Running</option>
                                                                    <option value="2">Non-Running</option>
                                                                </select>

                                                                <div class="form-control-position">
                                                                    <i class="la la-check-square-o"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-1">
                                                        <h6>
                                                            <strong>
                                                                Is it in Auction?
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>
                                                        <div class="controls position-relative has-icon-left">
                                                            <select autocomplete="nope" name="auction[]"
                                                                    class="form-control this_save"
                                                                    id="auction0" required=""
                                                                    data-validation-required-message="This field is required"
                                                                    aria-invalid="false">
                                                                <option value="">Select</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="la la-newspaper-o"></i>
                                                            </div>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <h6>
                                                            <strong>
                                                                Vehicle Brakes
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>
                                                        <div class="controls position-relative has-icon-left">
                                                            <select autocomplete="nope" name="vbrakes[]"
                                                                    class="form-control this_save"
                                                                    id="vbrakes0" required=""
                                                                    data-validation-required-message="This field is required"
                                                                    aria-invalid="false">
                                                                <option value="">Select</option>
                                                                <option value="1">Working</option>
                                                                <option value="2">Not Working</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="la la-car"></i>
                                                            </div>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <h6>
                                                            <strong>
                                                                Vehicle Rolls
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>
                                                        <div class="controls position-relative has-icon-left">
                                                            <select autocomplete="nope" name="vrolls[]"
                                                                    class="form-control this_save"
                                                                    id="vrolls0" required=""
                                                                    data-validation-required-message="This field is required"
                                                                    aria-invalid="false">
                                                                <option value="">Select</option>
                                                                <option value="1">Working</option>
                                                                <option value="2">Not Working</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="la la-car"></i>
                                                            </div>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-4 mb-1">
                                                        <h6>
                                                            <strong>
                                                                Vehicle Color
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>
                                                        <div class="controls position-relative has-icon-left">
                                                            <input autocomplete="nope" type="text" name="vcolor[]"
                                                                   id="vcolor0"
                                                                   class="form-control this_save" value=""
                                                                   placeholder="Enter Vehicle Color" required=""
                                                                   data-validation-required-message="This field is required"
                                                                   aria-invalid="false">
                                                            <div class="form-control-position">
                                                                <i class="la la-eyedropper"></i>
                                                            </div>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div id="calling_data"></div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Name
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="text" name="oname" id="oname0"
                                                                   class="form-control this_save"
                                                                   value="" placeholder="Enter Name"
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Phone
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                            <input type="text" name="ophone" id="ophone0"
                                                                   class="form-control phone-inputmask ophone this_save" value=""
                                                                   placeholder="Enter Phone" required=""
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Email
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                            <input required type="email" name="oemail" id="oemail0"
                                                                   class="form-control this_save" placeholder="Enter Email"
                                                                   required=""
                                                                   autocomplete="nope">

                                                            <div class="form-control-position">
                                                                <i class="la la-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4  mb-1">
                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Vehicle First Available Date
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>
                                                        <div class="controls position-relative has-icon-left">
                                                            <input autocomplete="nope" type="date"
                                                                   id="datepicker"
                                                                   name="dateavailable"
                                                                   class="form-control this_save"
                                                                   value=""
                                                                   placeholder="select date"
                                                                   required=""
                                                                   data-validation-required-message="This field is required"
                                                                   aria-invalid="false">
                                                            <div class="form-control-position">
                                                                <i class="la  la-calendar-o"></i>
                                                            </div>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="form-group">
                                                        <h6>
                                                            <strong>
                                                                Additional Vehicle Information (Optional)
                                                                <span class="text-danger"><span
                                                                            class="required">*</span></span>
                                                            </strong>
                                                        </h6>

                                                        <div class="controls position-relative has-icon-left">
                                                                                <textarea type="text" name="additionalinfo"
                                                                                          style=" border-radius: 17px; "
                                                                                          id="VehicleInformation0"
                                                                                          class="form-control this_save"
                                                                                          placeholder="Enter Vehicle Information"
                                                                                          autocomplete="nope"></textarea>

                                                            <div class="form-control-position">
                                                                <i class="la la-car"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mb-1" style="text-align: center;">
                                                    <input type="submit" id="getPriceNow" class="btn btn-info btn_shade this_save"
                                                           value="Get Price Now"/>

                                                </div>
                                                <div class="card-footer text-left w-100"
                                                     style="text-align: center !important;justify-content: center;margin-left: 51px;">

                                                    <a href="javascript:void(0)" id=newCust class="btn btn-info"
                                                       style=" border-radius: 10px; ">New
                                                        Customer Order</a>
                                                    <a href="javascript:void(0)" id='oldCust' class="btn btn-info"
                                                       style=" border-radius: 10px; ">Old
                                                        Customer Order</a>
                                                    {{--<button type="submit" id="saveBtn" name="saveBtn"--}}
                                                    {{--style="border:1px solid;float:right;"--}}
                                                    {{--class="btn btn-outline-primary ">Save--}}
                                                    {{--</button>--}}
                                                </div>
                                                <div class="col-lg-12" id="payCondition"
                                                     style=" margin-left: 19%; "></div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="showw">

                    </div>

                </div>
            </div>

        </form>

        <div class="modal fade" id="myModal1" data-keyboard="false" data-backdrop="static">
            <div class="alert alert-success">
                <strong>Success!</strong> Quote Created successfully.
            </div>
            <div class="modal-dialog">
                <div class="modal-content1 ">
                    <div id="changePrice" style="">
                        <button type="button" class="close" data-dismiss="modal"
                                style=" font-size: 44px; color: red;margin-right: 43px; ">
                            &times;
                        </button>
                        <div class="row">
                            <div class="col-lg-12 mb-1" style="margin: 25px 64px;">
                                <label class="checkcontainer2">
                                    <span class="black">Change Price</span>
                                    <input type="radio" name="changeprice" id="edit_price" value="1"
                                           autocomplete="nope">
                                    <span class="radiobtn2"></span>
                                </label>
                            </div>
                            <div class="col-lg-12 mb-1" style="margin:0px 61px">
                                <label class="checkcontainer2 pull-left">
                                    <span class="black">Send Price to Customer</span>
                                    <input type="radio" name="changeprice" value="2" autocomplete="nope">
                                    <span class="radiobtn2"></span>
                                </label>
                                <input class="form-control border_bottom_color" type="email"
                                       placeholder="Customer Email" id="cust_email"
                                       style=" width: 60%; margin-left: 17px; height: 40%; ">
                            </div>
                            <div class="col-lg-12 mb-1" style="margin: 0px 61px">
                                <label class="checkcontainer2 pull-left">
                                    <span class="black">Setup Order</span>
                                    <input type="radio" name="changeprice" value="3" autocomplete="nope">
                                    <span class="radiobtn2"></span>
                                </label>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <h6>Book-Price</h6>
                                <input id="price1" name="payment" contenteditable="false" value="">
                            </div>
                            <div class="col-lg-12 mb-1">
                                <h6>Cod/Cop</h6>
                                <input id="cod_cop" name="cod_cop" contenteditable="false" value="">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" id="setupOrderNow" onclick="cust()"
                                        class="btn btn-info btn_shade">Set Order Now
                                </button>
                                <button class="btn btn-info btn_shade"
                                        style="display: none;margin-left: 40%; border-radius: 15px;"
                                        id="sendEmailcustomer" type="button">Send Email
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" style="background-color: #f4f5fa;">
            <div class="modal-dialog  ">
                <div class="modal-content gradient-border" >

                    <!-- Modal Header -->
                    <div class="modal-header" style="justify-content: center;">
                        <h1 class="modal-title">
                            Order On Phone
                        </h1>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row justify-content-center mt-2">
                            <div class="col-lg-6">
                                <label class="checkcontainer2 pull-right">
                                    <span class="black">Customer</span>
                                    <input type="radio" name="type" value="1" id="customer" >
                                    <span class="radiobtn2"></span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="checkcontainer2">
                                    <span class="black">Dealer</span>
                                    <input type="radio" name="type" value="2" id="dealer">
                                    <span class="radiobtn2"></span>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-1">
                            <div class="col-lg-12 col">
                                <select name="site" id="site" class="form-control" required=""
                                        style=" font-size: 16px; ">
                                    <option value="">Select Site</option>
                                    <option value="1">autotransportmy</option>
                                    <option value="2">autoshippingmy</option>
                                    <option value="3">autoshippingamerica</option>
                                    <option value="4">autotransporta1</option>
                                    <option value="5">unitedstatesautotransport</option>
                                    <option value="6">allstatetostateautotransport</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn w-100" id="siteOk">OK</button>
                    </div>

                </div>
            </div>
        </div>
        <div id="myModal2" >
            <div class="container">
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/public/assets/images/pictures/white_car.png" alter="white_car.png">
                            {{--<h3>CAR</h3>--}}
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <h3>Car Quote</h3>
                            <p>Sedan, SUV, Pickup, Coupe etc.</p>
                            <a  class="car_form_visible" onclick="setordertype(1);">Click Here</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="face face1">
                        <div class="content " style=" width: 250px; height: 167px ">
                            <img src="/public/assets/images/pictures/white_bike.png" alter="white_bike.png">
                            {{--<h3>Code</h3>--}}
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <h3>Motorcycle Quote</h3>
                            <p>Thunderbolt, Venom, Spitfire etc.</p>
                            <a class="car_form_visible" onclick="setordertype(2);" >Click Here</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/public/assets/images/pictures/white_atv.png" alter="white_atv.png">
                            {{--<h3>Launch</h3>--}}
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <h3>ATV/UTV & Mopeds Quote </h3>
                            <p>Arctic Cat, Prowler, Wildcat etc.</p>
                            <a class="car_form_visible" onclick="setordertype(3);">Click Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')
    <script>

       function setordertype(ordertype){

            $('#orderType').val(ordertype);

       }


        $(document).ready(function () {
            $('#myModal').modal('show');
            $('.car_form').css('display', 'none')
            $(".car_form").hide();
            $(".car_form_visible").click(function(){
                $('#myModal2').hide();
                $(".car_form").show();
                $(".header_show").hide();

            });
        });




        if ($('#customer').is(':checked') && $('#dealer').is(':checked') && $("#site").val() != "") {
            $("#siteOk").switchClass('btn-danger', 'btn-primary');
            $("#siteOk").attr("disabled", false);

        }
        else {
            $("#siteOk").attr("disabled", true);
            $("#siteOk").addClass("btn-danger");
        }
        $('#cust_email ').hide();
        $("input[name=changeprice]:radio").click(function () {
            if ($('input[name=changeprice]:checked').val() == "1") {
                $("#price1").attr("contenteditable", true);
                document.getElementById("price1").focus();

            } else if ($('input[name=changeprice]:checked').val() == "2") {
                $("#price1").attr("contenteditable", false);
                $('#cust_email ').show();
                $('#sendEmailcustomer').show();
                $("#setupOrderNow").css("display","none")
                document.getElementById("cust_email").focus();


            }
            else if ($('input[name=changeprice]:checked').val() == "3") {
                $("#price1").attr("contenteditable", false);
                $('#cust_email ').hide();
                $('#sendEmailcustomer').hide();
                $("#setupOrderNow").css("display","block");
            }
            else {
                $("#price1").attr("contenteditable", false);
                $('#cust_email ').hide();
                $('#sendEmailcustomer').hide();
                $("#setupOrderNow").css("display","block");
            }

        });

        $(".close").click(function () {
//            $('#getPriceNow ').show();
        });

        $('.card-footer ').hide();

       function cust() {


           var pricev = $('#price1').val();
           var cod_cop = $('#cod_cop').val();
           var orderid = $('#orderid').val();
           var rolee = $('#rolee').val();

           if(rolee != 2){
               setTimeout(function(){
                   window.location.href= "/dashboard";
               }, 1000);
           }

           $('.card-footer ').show();
           $('#getPriceNow ').hide();
           $('#myModal1').modal('hide');

           $.ajax({
               url: '/save_price',
               type: 'post',
               data: {"_token": "{{ csrf_token() }}", pricev: pricev, orderid: orderid,cod_cop:cod_cop},
               dataType: "json",
               success: function (data) {

               },
           });

       }

        var dateToday = new Date();
        $(function () {
            $("#datepicker-1").datepicker({
                numberOfMonths: 1,
                showButtonPanel: true,
                minDate: dateToday
            });
        });


        $(function () {
            $("#o_zip").autocomplete({
                source: "/get_zip"
            });
        });

        $(function () {
            $("#d_zip").autocomplete({
                source: "/get_zip"
            });
        });

        $("#o_zip").change(function () {
            var zip = $(this).val();
            var nameArr = zip.split(',');
            var cityy = nameArr[0];
            var statee = nameArr[1];
            $('#ocity').val(cityy);

            $(`#ostate option[value='${statee}']`).attr("selected", "selected");

        });

        $("#d_zip").change(function () {
            var zip = $(this).val();
            var nameArr = zip.split(',');
            var cityy = nameArr[0];
            var statee = nameArr[1];
            $('#dcity').val(cityy);

            $(`#dstate option[value='${statee}']`).attr("selected", "selected");

        });

        $('#site').change(function () {
            if ($(this).val() === "") {
                $('#siteOk').attr('disabled', true);
            }
            else {
                $('#siteOk').attr('disabled', false);
            }
        });

        $("#siteOk").click(function () {
            var site = $("#site").val();

            var customer_t = $('input[name="type"]:checked').val();

            $("#sitevalue").val(site);
            var checked = $('input[name=type]:checked').val();
            if (checked && site) {

                $('#myModal').modal('hide');
                $("#uid").val(site);
                $("#orderType").val(checked);
                $("#customer_type").val(customer_t);

                $('#myModal2 ').show();


                var panel_type = 1;

                $.ajax({
                    url:'/generate_order',
                    data:{paynal_type:panel_type},
                    type: 'get',
                    success: function(data){

                        $('#placeorder').val(data);
                    },
                });



            } else {
                if (!site && !checked) {
                    $("span").removeClass("black");
                    $("span").addClass("red");
                    $('#site').addClass("border_bottom");


                }
                if (!site) {
                    $('#site').addClass("border_bottom");

                }
                if (!checked) {
                    $("span").removeClass("black");
                    $("span").addClass("red");

                }
            }

        });
    </script>

    <script>

        var Ophone_count = 1;

        function payCondition() {
            var data = `<div class="row">
                    <input type="hidden" name="customer_status" value="1">
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond1"  type="radio" value="1">
                                <span>COD / COP</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond2" type="radio" value="2" >
                                <span>Pay With Email</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond3" type="radio" value="3" >
                                <span>Pay Now</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond4" type="radio" value="4" >
                                <span>Pay Later</span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="row" id="payConf">

                </div>

                <div class="row" id="emailRequired">

                </div>

                <div class="row" id="submitData" style="display:none">
                   <div class="col-lg-12" style="margin-left: 0%;">
                        <button type="button" id="clickToSubmit" name="neworderpay1" value="neworderpay1" class="btn btn-danger"></button>
						<input type="hidden" value="0" name="neworderpay_btn" id="neworderpay_btn">
						<input type="hidden" value="0" name="continuetopay_btn" id="continuetopay_btn">
                    </div>
                </div>
                `;

            return data;
        }

        function payConditionJS() {
            $("#pay_cond1").click(function () {
                $("#saveBtn").html('Save');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#payConf").html(`
            <div class="col-lg-12">
                <div class="form-group">

                    <label class="section-title mt-3">Payment Confirm <span class="text-danger">*</span></label>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">

                    <label class="rdiobox">
                        <input class="this_save" name="pay_confirm" id="payment_cond1" type="radio" value="1" required >
                        <span>Yes</span>
                    </label>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">

                    <label class="rdiobox">
                        <input class="this_save" name="pay_confirm" id="payment_cond2" type="radio" value="0" >
                        <span>No</span>
                    </label>

                </div>
            </div>
        `);
                $("#submitData").show();
                $("#emailRequired").html(`
            <div class="col-lg-4">
                <div class="form-group">

                    <label class="this_save -label font-boldd tx-black style="">Email Address <span class="text-danger">*</span></label>
                    <input required class="form-control this_save " autocomplete="nope" type="email" name="oemail2" id="oemail2" value="" >


                </div>
            </div>
        `);
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#pay_cond2").click(function () {
                $("#saveBtn").html('Save');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#payConf").html('');
                $("#submitData").show();
                $("#emailRequired").html(`
            <div class="col-lg-4">
                <div class="form-group">

                    <label class=" this_save -label font-boldd tx-black" style="color:black">Email Address <span class="text-danger">*</span></label>
                    <input required class="form-control this_save " autocomplete="nope" type="email" name="oemail2" id="oemail2" value="" >

                </div>
            </div>
        `);
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#pay_cond3").click(function () {
                $("#saveBtn").html('Next');
                $("#payConf").html('');
                $("#submitData").show();
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Continue To Payment');
                $("#continuetopay_btn").val(1);
                $("#continuetopayold_btn").val(1);
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#pay_cond4").click(function () {
                $("#saveBtn").html('Save');
                $("#payConf").html('');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#submitData").show();
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#clickToSubmit").click(function () {
                $("#neworderpay_btn").val(1);
                var datastring = $("#calling_form").serialize();
                $.ajax({

                    type: "post",
                    url: "/save_new_quote",
                    data: datastring,
                    dataType: "json",

                    success: function (data) {

                        $("#getPriceNow").hide();
                        $('#modaldemo4').modal('show');
                        $("#neworderpay_btn").val(0);

                        if ($("#continuetopay_btn").val() == 1 || $("#continuetopayold_btn").val() == 1) {


                            var orderid = $('#orderid').val();
                            window.open('/order_payment_card_us/' + orderid, '_blank');
                            window.location.href = "/dashboard";

                        } else {
                            window.location.href = "/dashboard";
                        }

                    },
                    complete: function (data) {
                        $('#global-loader').hide();

                    },
                    error: function (e) {

                    }

                });

            });

        }


        function oldPayCondition() {
            var data = `
                <input type="hidden" name="customer_status" value="0">
                <div class="row">
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond1" type="radio" value="1" >
                                <span>COD / COP</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond2" type="radio" value="2" >
                                <span>Pay With Email</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-3 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond3" type="radio" value="3" >
                                <span>Pay Now/Already Have Card</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond4" type="radio" value="4" >
                                <span>Pay Later</span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="row" id="sendEmailConf">

                </div>

                <div class="row" id="payConf">

                </div>

                <div class="row" id="emailRequired">

                </div>

                <div class="row" id="submitData" style="display:none">
                    <div class="col-lg-12">
                        <!--<button type="submit" id="clickToSubmit"  class="btn btn-primary"></button>-->
						<button type="button" id="clickToSubmit" name="neworderpay1" value="neworderpay1" class="btn btn-primary"></button>
						<input type="hidden" value="0" name="neworderpay_btn" id="neworderpay_btn">
						<input type="hidden" value="0" name="continuetopayold_btn" id="continuetopayold_btn">

                    </div>
                </div>
                `;

            return data;
        }

        function oldPayConditionJS() {
            $("#pay_cond1").click(function () {
                $("#saveBtn").html('Save');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#payConf").html(`
                <div class="col-lg-12">
                    <div class="form-group">

                        <label class="section-title mt-3">Payment Confirm <span class="text-danger">*</span></label>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">

                        <label class="rdiobox">
                            <input class="this_save" name="pay_confirm" id="payment_cond1" type="radio" value="1" required >
                            <span>Yes</span>
                        </label>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">

                        <label class="rdiobox">
                            <input class="this_save" name="pay_confirm" id="payment_cond2" type="radio" value="0" >
                            <span>No</span>
                        </label>

                    </div>
                </div>`);

                $("#sendEmailConf").html(`
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label class='section-title mt-3'>Send Email <span class='text-danger'>*</span></label>
                                </div>
                            </div>
                            <div class='col-lg-2'>
                                <div class='form-group'>

                                    <label class='rdiobox'>
                                        <input class='this_save' name='confirm1' onchange='' type='radio' value='1' required>
                                        <span>Yes</span>
                                    </label>

                                </div>
                            </div>
                            <div class='col-lg-2'>
                                <div class='form-group'>
                                    <label class='rdiobox'>
                                        <input class='this_save' name='confirm1' onchange='' type='radio' value='0'>
                                        <span>No</span>
                                    </label>

                                </div>
                            </div>`);


                $("#submitData").show();
                $("#emailRequired").html(`
                <div class='col-lg-4'>
                    <div class='form-group'>

                        <label class=' this_save -label font-boldd tx-black' style="color:black" id='emailAddrTxt'>Email Address <span class='text-danger'>*</span></label>
                        <input required class='form-control this_save ' autocomplete='nope' type='text' name='oemail2' id='oemail2' value='' >

                    </div>
                </div>`);


                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });


            $("#clickToSubmit").click(function () {
                //alert();
                $("#neworderpay_btn").val(1);
                // $("#saveBtn").trigger("click");


                var datastring = $("#calling_form").serialize();
                $.ajax({

                    type: "post",
                    url: "/save_new_quote",
                    data: datastring,
                    dataType: "json",

                    success: function (data) {

                        $("#getPriceNow").hide();
                        $('#modaldemo4').modal('show');
                        $("#neworderpay_btn").val(0);

                        if ($("#continuetopay_btn").val() == 1 || $("#continuetopayold_btn").val() == 1) {


                            var orderid = $('#orderid').val();
                            window.open('/order_payment_card_us/' + orderid, '_blank');
                            window.location.href = "/dashboard";

                        } else {
                            // window.location.href = "/dashboard";
                        }


                    },
                    complete: function (data) {
                        //$('#global-loader').hide();

                    },
                    error: function (e) {

                    }

                });

            });



            $("#pay_cond2").click(function () {
                $("#saveBtn").html('Save');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#sendEmailConf").html('');
                $("#submitData").show();
                $("#payConf").html('');
                $("#emailRequired").html(
                    `<div class="col-lg-4">
                    <div class="form-group">

                    <label class=" this_save -label font-boldd tx-black"  style="color:black" id="emailAddrTxt">Email Address <span class="text-danger">*</span></label>
                    <input required class="form-control this_save " autocomplete="nope" type="text" name="oemail2" id="oemail2" value="" >

                    </div>
                    </div>`);
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#pay_cond3").click(function () {
                $("#saveBtn").html('Save');
                $("#sendEmailConf").html('');
                $("#submitData").show();
                $("#payConf").html('');
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Continue To Payment');
                $("#continuetopay_btn").val(1);
                $("#continuetopayold_btn").val(1);
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#pay_cond4").click(function () {
                $("#saveBtn").html('Save');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#payConf").html('');
                $("#submitData").show();
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function () {
                    $("#oemail").val($(this).val());
                });
            });

            $("#clickToSubmit").click(function () {
                $("#selecttype").modal('hide')
                $("#manualOrder").attr('action', 'post.php');
                $("#manualOrder").submit();
            });
        }

        $("#newCust").click(function () {
            $("#payCondition").html('');
            $("#payCondition").html(payCondition());
            payConditionJS();
        });

        $("#oldCust").click(function () {
            $("#payCondition").html('');
            $("#payCondition").html(oldPayCondition());
            oldPayConditionJS();
        });

        $("#addMore").click(function () {
            $("#calling_data").append(`
                        <div id='vehicle_add${Ophone_count}'>
                            <input type='hidden' name='count[]'>
                            <div class='row'>
                                <div class='col-lg-6'><h6 class='font-weight-bold'> VEHICLE INFORMATION </h6></div>
                                <div class='col-lg-6 text-right'>
                                    <a href='javascript:void(0)' onclick='removee(${Ophone_count});func_save()' class='this_save'
                                       style=' font-size: 39px; '>
                                        <i class='fa fa-minus-circle' aria-hidden='true'></i>
                                    </a>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Year
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>
                                        </h6>

                                        <div class='controls position-relative has-icon-left'>
                                            <input required type='text' id='vyear${Ophone_count}' name='vyear[]'
                                                   placeholder='Enter Year' class='form-control this_save'
                                                   data-validation-required-message='This field is required'
                                                   autocomplete='nope'>

                                            <div class='form-control-position'>
                                                <i class='la la-car'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Make
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>
                                        </h6>

                                        <div class='controls position-relative has-icon-left'>
                                                                            <span class='twitter-typeahead'
                                                                                  style=''><input
                                                                                        required type='text'
                                                                                        class='form-control tt-hint this_save'
                                                                                        autocomplete='off' readonly='' spellcheck='false'
                                                                                        tabindex='-1' dir='ltr'
                                                                                        style='position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);'><input
                                                                                        type='text' name='vmake[]' id='vmake${Ophone_count}'
                                                                                        placeholder='Enter Make'
                                                                                        class='form-control tt-input vmake0' onkeyup='getmake()'
                                                                                        autocomplete='off' required='' spellcheck='false'
                                                                                        dir='auto'
                                                                                        style='position: relative; vertical-align: top; background-color: transparent;'><pre
                                                                                        aria-hidden='true'
                                                                                        style='position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;'></pre><div
                                                                                        class='tt-menu'
                                                                                        style='position: absolute; top: 100%; left: 0px; z-index: 100; display: none;'>
                                                                                    <div class='tt-dataset tt-dataset-users'></div>
                                                                                </div></span>

                                            <div class='form-control-position'>
                                                <i class='la la-car'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Model
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>

                                            <div class='googleimage pull-right' id='googleimage${Ophone_count}'
                                                 onclick="googl(${Ophone_count})">
                                                <a href='javascript:void(0);'><img id='googleImg${Ophone_count}' width='24'
                                                                                   src='{{ url('/public/assets/images/pictures/googleicon.png')}}'
                                                    class='greyImg'></a>
                                            </div>
                                        </h6>
                                        <div class='controls position-relative has-icon-left'>
                                                                            <span class='twitter-typeahead'
                                                                                  style=''>
                                                                                  <input
                                                                                          required type='text'
                                                                                          class='form-control tt-hint this_save'
                                                                                          autocomplete='off' readonly='' spellcheck='false'
                                                                                          tabindex='-1' dir='ltr'
                                                                                          style='position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);'>
                                                                                        <input
                                                                                                required type='text' name='vmodel[]'
                                                                                                id='vmodel${Ophone_count}'
                                                                                                onkeyup="getmodel(${Ophone_count})"
                                                                                                placeholder='Enter Make'
                                                                                                class='form-control tt-input vmodel0'
                                                                                                autocomplete='off' spellcheck='false'
                                                                                                dir='auto'
                                                                                                style='position: relative; vertical-align: top; background-color: transparent;'><pre
                                                                                        aria-hidden='true'
                                                                                        style='position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;'></pre><div
                                                                                        class='tt-menu'
                                                                                        style='position: absolute; top: 100%; left: 0px; z-index: 100; display: none;'>
                                                                                    <div class='tt-dataset tt-dataset-users'></div>
                                                                                </div></span>

                                            <div class='form-control-position'>
                                                <i class='la la-car'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Vehicle Type
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>
                                        </h6>

                                        <div class='controls position-relative has-icon-left'>
                                            <select name='vehType[]' id='vehType${Ophone_count}' class='form-control this_save'
                                                    required='' autocomplete='nope'>
                                                <option value=''>Select</option>
                                                <option value='Car'>Car</option>
                                                <option value='SUV'>SUV</option>
                                                <option value='Van'>Van</option>
                                                <option value='Pickup'>Pickup</option>
                                            </select>

                                            <div class='form-control-position'>
                                                <i class='la la-truck'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Carrier Type
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>
                                        </h6>

                                        <div class='controls position-relative has-icon-left'>
                                            <select name='trailer_type[]' id='trailer_type${Ophone_count}' class='form-control this_save'
                                                    required='' autocomplete='nope'>
                                                <option value=''>Select</option>
                                                <option value='open'>Open</option>
                                                <option value='enclosed'>Enclosed</option>

                                            </select>

                                            <div class='form-control-position'>
                                                <i class='la la-truck'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-4 mb-1'>
                                    <div class='form-group'>
                                        <h6>
                                            <strong>
                                                Condition
                                                <span class='text-danger'><span class='required'>*</span></span>
                                            </strong>
                                        </h6>

                                        <div class='controls position-relative has-icon-left'>
                                            <select name='condition[]' id='condition${Ophone_count}' class='form-control this_save'
                                                    required='' autocomplete='nope'>
                                                <option value=''>Select</option>
                                                <option value='1'>Running</option>
                                                <option value='2'>Non-Running</option>
                                            </select>

                                            <div class='form-control-position'>
                                                <i class='la la-check-square-o'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <h6>
                                        <strong>
                                            Is it in Auction?
                                            <span class="text-danger"><span
                                                        class="required">*</span></span>
                                        </strong>
                                    </h6>
                                    <div class="controls position-relative has-icon-left">
                                        <select autocomplete="nope" name="auction[]" class="form-control this_save" id="auction${Ophone_count}"
                                                required="" data-validation-required-message="This field is required" aria-invalid="false">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                        <div class="form-control-position">
                                            <i class="la la-newspaper-o"></i>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <h6>
                                        <strong>
                                            Vehicle Brakes
                                            <span class="text-danger"><span
                                                        class="required">*</span></span>
                                        </strong>
                                    </h6>
                                    <div class="controls position-relative has-icon-left">
                                        <select autocomplete="nope" name="vbrakes[]" class="form-control this_save"
                                                id="vbrakes${Ophone_count}" required=""
                                                data-validation-required-message="This field is required"
                                                aria-invalid="false">
                                            <option value="">Select</option>
                                            <option value="1">Working</option>
                                            <option value="2">Not Working</option>
                                        </select>
                                        <div class="form-control-position">
                                            <i class="la la-car"></i>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <h6>
                                        <strong>
                                            Vehicle Rolls
                                            <span class="text-danger"><span
                                                        class="required">*</span></span>
                                        </strong>
                                    </h6>
                                    <div class="controls position-relative has-icon-left">
                                        <select autocomplete="nope" name="vrolls[]" class="form-control this_save"
                                                id="vrolls${Ophone_count}" required=""
                                                data-validation-required-message="This field is required"
                                                aria-invalid="false">
                                            <option value="">Select</option>
                                            <option value="1">Working</option>
                                            <option value="2">Not Working</option>
                                        </select>
                                        <div class="form-control-position">
                                            <i class="la la-car"></i>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-1 mt-4 ">
                                    <h6>
                                        <strong>
                                            Vehicle Color
                                            <span class="text-danger"><span class="required">*</span></span>
                                        </strong>
                                    </h6>
                                    <div class="controls position-relative has-icon-left">
                                        <input autocomplete="nope" type="text" name="vcolor[]" id="vcolor${Ophone_count}"
                                               class="form-control this_save" value="" placeholder="Enter Vehicle Color" required=""
                                               data-validation-required-message="This field is required" aria-invalid="false">
                                        <div class="form-control-position">
                                            <i class="la la-eyedropper"></i>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
`);
            ++Ophone_count;
        });


        function googl(get) {

            var model = $(`#vmodel${get}`).val();
            var make = $(`#vmake${get}`).val();
            var year = $(`#vyear${get}`).val();

            var url = (`http://images.google.com/images?q=${year}+${make}+${model}`);
            window.open(url, 'GoogleImg', 'width=800,height=600,left=250,top=50, toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');


        }

        $("body").delegate(".ophone", "focus", function () {
            $(".ophone").mask("(999) 999-9999");
            $(".ophone")[0].setSelectionRange(0, 0);
        });

        function getmodel(num) {


            var yy = $("#vyear" + num).val();
            var mm = $("#vmake" + num).val();


            $(".vmodel0").autocomplete({
                source: "getmodel?year=" + yy + "&make=" + mm
            });


        }

        function getmake() {
            $(".vmake0").autocomplete({
                source: "getmake"
            });
        }

        function removee(num) {

            $(`#vehicle_add${num}`).remove();
            Ophone_count--;

        }

        $("#clickToSubmit").on("click", function () {

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');
            var checkk = 0;

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                            checkk = 1;
                        }
                        form.classList.add('was-validated');
                    }, false)
                });
        });

        $("#viewMap").click(function () {
            var ozip = $("#o_zip").val();
            var dzip = $("#d_zip").val();
            if (ozip == '' || dzip == '') {
                toastr.error("Please Enter Origin & Dest City or Zip", "Error");

            } else {
                ozip = ozip.split(",");
                dzip = dzip.split(",");

                var url = `https://www.google.com/maps/dir/${ozip[2]},+USA/${dzip[2]},+USA/`;
                window.open(url, 'Map', 'height=700,width=800,left=200,top=50,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');

            }
        });


        $("#getPriceNow").on("click", function () {

            // Fetch all the forms we want to apply custom Bootstrap validation styles to

            var forms = document.querySelectorAll('.needs-validation');
            var checkk = 0;

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                            checkk = 1;
                        }
                        form.classList.add('was-validated');
                    }, false)

                });

            setTimeout(function () {
                if (checkk == 0) {
                    $('#global-loader').show();

                    var datastring = $("#calling_form").serialize();
                    $.ajax({

                        type: "post",
                        url: "/save_new_quote",
                        data: datastring,
                        dataType: "json",

                        success: function (data) {

                            $('#myModal1').modal('show');

                            $('#orderid').val(data.order_id);

                            $('#price1').val(data.payment);
                            $('#cod_cop').val(data.cod_cop);


                            $("#getPriceNow").hide();


                        },
                        complete: function (data) {
                            $('#global-loader').hide();

                        },
                        error: function (e) {

                        }

                    });
                }

            }, 200);


        });




        $('#sendEmailcustomer').click( function(){

            if ($('#cust_email').val()!=''){
                var custemail=$('#cust_email').val();
                var price=$('#price1').val();
                // alert(price);
                $.ajax({
                    url: '/send_price_email',
                    type: 'post',
                    data: { "_token": "{{ csrf_token() }}",custemail: custemail, price: price},
                    success: function(data){
                        alert("Email has been sent");
                    }
                });
            }
        });


        $(document).ready(function (e) {

            //  selectRefresh();

            $("body").delegate(".this_save", "change", function () {

                var datastring = $("#calling_form").serialize();

                $.ajax({

                    type: "post",
                    url: "/save_new_quote",
                    data: datastring,
                    dataType: "json",

                    success: function (data) {

                    },
                    error: function (e) {

                    }

                });


            });
        });
function func_save(){
    var datastring = $("#calling_form").serialize();

    $.ajax({

        type: "post",
        url: "/save_new_quote",
        data: datastring,
        dataType: "json",

        success: function (data) {

        },
        error: function (e) {

        }

    });

}



    </script>

@endsection

