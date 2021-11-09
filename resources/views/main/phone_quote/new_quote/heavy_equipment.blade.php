@extends('layouts.innerpages')

@section('template_title')
    Car
@endsection

@section('content')

    <style>
        .register{
            background: -webkit-linear-gradient(left, #1965B1, #00c6ff);
            margin-top: 0%;
            padding: 0%;
            border-radius: 50px !important;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left input{
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
        .register-right{
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img {
            margin-top: 61%;
            margin-bottom: 0%;
            width: 70%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        #getPriceNow{
            /*float: right;*/
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
        .justify-content-center {
            -webkit-box-pack: center!important;
            -webkit-justify-content: center!important;
            -moz-box-pack: center!important;
            -ms-flex-pack: center!important;
            justify-content: center!important;
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
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        #remove_btn{
            padding: 0px !important;
        }
        .mb-1, .my-1 {
            margin-bottom: 1.25rem!important;
        }
        .container{
            margin-left: 0px !important;
        }
        .fa-plus-circle{
            color: #083dc1 !important;
        }
        .fa-minus-circle{
            color: #c10808 !important;
        }
        .makeRed{

            border-bottom: 1px solid red !important;

        }
        .bar.red-bar:before, .bar.red-bar:after {
            background: red;
        }
        select{
            /*background: url(data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0Ljk1IDEwIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9LmNscy0ye2ZpbGw6IzQ0NDt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmFycm93czwvdGl0bGU+PHJlY3QgY2xhc3M9ImNscy0xIiB3aWR0aD0iNC45NSIgaGVpZ2h0PSIxMCIvPjxwb2x5Z29uIGNsYXNzPSJjbHMtMiIgcG9pbnRzPSIxLjQxIDQuNjcgMi40OCAzLjE4IDMuNTQgNC42NyAxLjQxIDQuNjciLz48cG9seWdvbiBjbGFzcz0iY2xzLTIiIHBvaW50cz0iMy41NCA1LjMzIDIuNDggNi44MiAxLjQxIDUuMzMgMy41NCA1LjMzIi8+PC9zdmc+) no-repeat 95%;*/
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            /*padding : 4px 20px*/
        }
        .modal-backdrop.show {
            opacity: .5;
        }
        .zoomInUp{
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #7a7b7d;
        }
        .black{
            font-size: 23px;
            padding: 14px;
            color: black;
        }
        .red{
            font-size: 23px;
            padding: 14px;
            color: red;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    <div class="container-fluid register">
        <form class=" needs-validation" novalidate>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="{{ url('/public/assets/images/pictures/sports-car.png')}}" alt="car.png"/>
                    <h3>Welcome</h3>
                    <p>Create Car Quote Here!</p>

                </div>

                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Order On Phone</h3>
                            <div class="register-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>
                                            <strong>
                                                Origin
                                                <span class="text-danger"><span class="required">*</span></span>
                                            </strong>
                                        </h6>


                                        <div class="form-group validate">
                                            <input type="hidden" name="uid" id="uid" value="">
                                            <input type="hidden" name="orderType" id="orderType" value="">
                                            <div class="controls position-relative has-icon-left">
                                                <input required type="text" name="ozip" id="ozip" class="form-control" value="" placeholder="Enter Zip" data-validation-required-message="This field is required" autocomplete="nope" aria-invalid="false">
                                                <div class="form-control-position">
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls position-relative has-icon-left">
                                                <select required name="ostate" id="ostate" class="form-control" data-validation-required-message="This field is required" autocomplete="nope" aria-invalid="false">
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
                                                <input required type="text" name="ocity" id="ocity" class="form-control" value="" placeholder="Enter City" data-validation-required-message="This field is required" autocomplete="nope">
                                                <div class="form-control-position">
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <h6>
                                            <strong>
                                                Destination
                                                <span class="text-danger"><span class="required">*</span></span>
                                            </strong>
                                        </h6>


                                        <div class="form-group">

                                            <div class="controls position-relative has-icon-left">
                                                <input required type="text" name="dzip" id="dzip" class="form-control" value="" placeholder="Enter Zip" data-validation-required-message="This field is required" autocomplete="nope" aria-invalid="false">
                                                <div class="form-control-position">
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls position-relative has-icon-left">
                                                <select required  name="dstate" id="dstate" class="form-control" data-validation-required-message="This field is required" autocomplete="nope" aria-invalid="false">
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
                                                <input required type="text" name="dcity" id="dcity" class="form-control" value="" placeholder="Enter City" data-validation-required-message="This field is required" autocomplete="nope">
                                                <div class="form-control-position">
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center ">
                                    <a style=" margin-right: 10px; "  href="javascript:void(0)" id="viewMap" class="btn btn-blue">View Map</a>
                                    <a style=" margin-right: 10px; " href="javascript:timezon('https://www.timeanddate.com/worldclock/usa');" class="btn btn-outline-primary">TimeZone</a>
                                    <a style=" margin-right: 10px; " href="javascript:void(0)" id="viewCentral" class="btn  btn-blue">Central Pricing</a>
                                    <a style=" margin-right: 10px; " href="javascript:weather('https://www.weather.gov/');" class="btn btn-outline-primary">Weather</a>
                                    <a  href="javascript:fuel('http://www.truckmiles.com/FuelPrices.asp');" class="btn btn-blue">Fuel Price</a>
                                </div>
                                <hr>
                                <div id="carEquip">
                                    <input required type="hidden" name="count[]">
                                    <div class="row">
                                        <div class="col-lg-2">

                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <h6 class="font-weight-bold">
                                                VEHICLE INFORMATION
                                            </h6>
                                        </div>

                                        <div class="col-lg-6 text-right">
                                            <a href="javascript:void(0)" id="addMore"  class="btn btn-lg" style=" font-size: 39px; "><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-1">
                                            <div class="form-group">
                                                <h6>
                                                    <strong>
                                                        Year
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <input required type="text" id="year" name="year[]" placeholder="Enter Year" class="form-control" data-validation-required-message="This field is required" autocomplete="nope">
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
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input required type="text" class="form-control tt-hint" autocomplete="off" readonly="" spellcheck="false" tabindex="-1" dir="ltr" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);"><input  required type="text" name="make[]" id="make0" placeholder="Enter Make" class="form-control tt-input" autocomplete="off" required="" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-users"></div></div></span>
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
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                    <div class="googleimage pull-right" id="googleimage0">
                                                        <a href="javascript:void(0);"><img id="googleImg0" width="24" src="{{ url('/public/assets/images/pictures/googleicon.png')}}" class="greyImg"></a>
                                                    </div>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input required type="text" class="form-control tt-hint" autocomplete="off" readonly="" spellcheck="false" tabindex="-1" dir="ltr" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);"><input required type="text" name="model[]" id="model0" placeholder="Enter Make" class="form-control tt-input" required="" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-users"></div></div></span>
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
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <select name="vehType[]" id="vehType0" class="form-control" required="" autocomplete="nope">
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
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <select name="carrier[]" id="carrier0" class="form-control" required="" autocomplete="nope">
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
                                                        <span class="text-danger"><span class="required">*</span></span>
                                                    </strong>
                                                </h6>
                                                <div class="controls position-relative has-icon-left">
                                                    <select name="condition[]" id="condition0" class="form-control" required="" autocomplete="nope">
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
                                </div>
                                <div id="heavyEuip"></div>
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <div class="form-group">
                                            <h6>
                                                <strong>
                                                    Name
                                                    <span class="text-danger"><span class="required">*</span></span>
                                                </strong>
                                            </h6>
                                            <div class="controls position-relative has-icon-left">
                                                <input required type="text" name="name" id="name" class="form-control" value="" placeholder="Enter Name" required="" autocomplete="nope">
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
                                                    <span class="text-danger"><span class="required">*</span></span>
                                                </strong>
                                            </h6>
                                            <div class="controls position-relative has-icon-left">
                                                <input required type="text" name="phone" id="phone" class="form-control phone-inputmask" value="" placeholder="Enter Phone" required="" autocomplete="nope">
                                                <div class="form-control-position">
                                                    <i class="la la-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-1">
                                        <div class="form-group">
                                            <h6>
                                                <strong>
                                                    Email
                                                    <span class="text-danger"><span class="required">*</span></span>
                                                </strong>
                                            </h6>
                                            <div class="controls position-relative has-icon-left">
                                                <input required type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required="" autocomplete="nope">
                                                <div class="form-control-position">
                                                    <i class="la la-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-1" style="text-align: center;">
                                        <input type="submit" id="getPriceNow"  value="Get Price Now"/>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <div class="modal fade" id="myModal"  data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">Order On Phone</h3>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row justify-content-center mt-2">
                            <div class="col-lg-6">
                                <label class="checkcontainer2 pull-right">
                                    <span class="black">Customer</span>
                                    <input type="radio" name="type" value="1" id="customer">
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
                                <select name="site" id="site" class="form-control" required="" style=" font-size: 20px; ">
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
                        <button type="button" class="btn btn-primary w-100" id="siteOk" >OK</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


@section('extraScript')
    <script>
        $('#myModal').modal('show');
        var Ophone_count  = 0;

        $("#addMore").click(function(){
            $("#heavyEuip").append('<div class="vehicle_add"><input type="hidden" name="count[]"> <div class="row"> <div class="col-lg-2"> </div> </div> <div class="row mb-4"> <div class="col-lg-6"> <h6 class="font-weight-bold"> VEHICLE INFORMATION </h6> </div> <div class="col-lg-6 text-right"> <a href="javascript:void(0)" id="remove_btn"  class="btn" style=" font-size: 39px; "><i class="fa fa-minus-circle" aria-hidden="true"></i></a> </div> </div> <div class="row"> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Year <span class="text-danger"><span class="required">*</span></span> </strong> </h6> <div class="controls position-relative has-icon-left"> <input required type="text" id="year" name="year[]" placeholder="Enter Year" class="form-control" data-validation-required-message="This field is required" autocomplete="nope"> <div class="form-control-position"> <i class="la la-car"></i> </div> </div> </div> </div> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Make <span class="text-danger"><span class="required">*</span></span> </strong> </h6> <div class="controls position-relative has-icon-left"> <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="form-control tt-hint" autocomplete="off" readonly="" spellcheck="false" tabindex="-1" dir="ltr" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);"><input type="text" name="make[]" id="make0" placeholder="Enter Make" class="form-control tt-input" autocomplete="off" required="" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-users"></div></div></span> <div class="form-control-position"> <i class="la la-car"></i> </div> </div> </div> </div> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Model <span class="text-danger"><span class="required">*</span></span> </strong> <div class="googleimage pull-right" id="googleimage0"> <a href="javascript:void(0);"><img id="googleImg0" width="24" src="{{ url('/public/assets/images/pictures/googleicon.png')}}" class="greyImg"></a> </div> </h6> <div class="controls position-relative has-icon-left"> <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="form-control tt-hint" autocomplete="off" readonly="" spellcheck="false" tabindex="-1" dir="ltr" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);"><input type="text" name="model[]" id="model0" placeholder="Enter Make" class="form-control tt-input" required="" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-users"></div></div></span> <div class="form-control-position"> <i class="la la-car"></i> </div> </div> </div> </div> </div> <div class="row"> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Vehicle Type <span class="text-danger"><span class="required">*</span></span> </strong> </h6> <div class="controls position-relative has-icon-left"> <select name="vehType[]" id="vehType0" class="form-control" required="" autocomplete="nope"> <option value="">Select</option> <option value="Car">Car</option> <option value="SUV">SUV</option> <option value="Van">Van</option> <option value="Pickup">Pickup</option> </select> <div class="form-control-position"> <i class="la la-truck"></i> </div> </div> </div> </div> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Carrier Type <span class="text-danger"><span class="required">*</span></span> </strong> </h6> <div class="controls position-relative has-icon-left"> <select name="carrier[]" id="carrier0" class="form-control" required="" autocomplete="nope"> <option value="">Select</option> <option value="open">Open</option> <option value="enclosed">Enclosed</option> </select> <div class="form-control-position"> <i class="la la-truck"></i> </div> </div> </div> </div> <div class="col-lg-4 mb-1"> <div class="form-group"> <h6> <strong> Condition <span class="text-danger"><span class="required">*</span></span> </strong> </h6> <div class="controls position-relative has-icon-left"> <select name="condition[]" id="condition0" class="form-control" required="" autocomplete="nope"> <option value="">Select</option> <option value="1">Running</option> <option value="2">Non-Running</option> </select> <div class="form-control-position"> <i class="la la-check-square-o"></i> </div> </div> </div> </div> </div></div>')
            ++Ophone_count ;
        });
        $(document).on('click', "#remove_btn", function () {
            $(this).parents(".vehicle_add").remove();
            Ophone_count--;
        });

        $("#getPriceNow").on("click",function(){

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })

        });
//        $("#siteOk").click(function(){
//            alert("The paragraph was clicked.");
//            $('#backdrop').modal('hide');
//        });
        $("#siteOk").click(function(){
            var site = $("#site").val();
            var checked = $('input[name=type]:checked').val();
            if(checked && site){

                $('#myModal').modal('hide');
                $("#uid").val(site);
                $("#orderType").val(checked);
            }else{
                if (!site && !checked) {
//                    $('.black').css('border-bottom', 'solid 1px red');
//                    $('.black').attr('color', 'red !important','font-size:','23px','padding','14px');
                    $("span").removeClass("black");
                    $("span").addClass("red")
                    $('#site').css('border-bottom', 'solid 1px red');

                }
               if(!site) {
                    $('#site').css('border-bottom', 'solid 1px red');

                }
                if (!checked) {
//                    $('.black').css('border-bottom', 'solid 1px red');
//                    $('.black').attr('color', 'red !important','font-size:','23px','padding','14px');
                    $("span").removeClass("black");
                    $("span").addClass("red");

                }
            }

        });





    </script>

@endsection