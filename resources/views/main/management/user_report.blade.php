@include('partials.mainsite_pages.return_function')
@extends('layouts.mainsite')

@section('template_title')
    User Report
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

        .glow-on-hover > a {
            color: white;
            font-size: 14px;
            font-weight: 900;
        }

        .glow-on-hover > a:hover {
            color: white;
            font-size: 14px;
            font-weight: 900;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
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
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 400% 0;
            }
            100% {
                background-position: 0 0;
            }
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

        .modal-backdrop {
            width: 100%;
            height: 100%;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            color: inherit;
            font-family: "Raleway", sans-serif;
            font-weight: 300;
            line-height: 1.1;
        }

        .title h1, .title h2, .title h3, .title h4 {
            margin: 5px;
        }

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
            content: '';
        }

        .table > thead > tr > td, .table > thead > tr > th {
            font-weight: 900;
            -webkit-transition: all .3s ease;
            color: rgb(0 0 0);
            font-size: 16px;
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

        #editControls {
            border-bottom: 1px solid black;
        }

        #editor:focus {
            background-color: #f0f0f0;
            border-color: #38af5b;
            box-shadow: none;
            outline: 0 none;
        }

        .card-title {
            font-size: 29px;
        }

        .border, tr, thead, td, tbody, th {
            border: 0.5px solid black !important;
            cursor: pointer
        }

        td {
            font-size: 18px;
            font-family: sans-serif;
        }

        th {
            font-size: 20px;
        }

        .inp {
            height: 33px;
            text-align: center;
            justify-content: center;
            border: 2px;
            border-radius: 23px;
        }

        .glow-on-hover {
            width: 220px;
            height: 50px;
            border: none;
            outline: none;
            color: #fff;
            background: #111;
            background-color: black;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
            font-size: 26px;
            font-family: serif;
            font-weight: 900;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
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
            color: rgb(178 215 255 / 68%);
        }

        .glow-on-hover:active:after {
            background: transparent;
        }

        .glow-on-hover:hover:before {
            opacity: 1;
        }

        .glow-on-hover:hover:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: transparent;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        table.dataTable {
            clear: both;
            margin-top: 6px !important;
            margin-bottom: 6px !important;
            max-width: none !important;
            border-collapse: separate !important;
            border-spacing: 0;
            font-family: cursive;
            font-weight: 600;
        }

        button {
            width: 10pc;
            border: 1px;
            border-radius: 50px;
            background-color: cadetblue;
            font-size: 20px;
        }

        @keyframes glowing {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 400% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        .multiple_select option::before {
            content: "\2610";
            background-color: white;
        }

        .multiple_select option:checked::before {
            content: "\2611";
            background-color: white;
            color: red;
        }

        option {
            background-color: #FFFFFF;
            padding: 5px;
        }

        option-selected {
            background-color: #008080;
            color: #FFFFFF;
        }

        /*---------------------*/

        .clearfix {
            clear: both;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: tomato;
            text-decoration: none;
        }

        a:hover {
            color: #2196f3;
        }

        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;

            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .rating-stars ul > li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
            font-size: 2.5em; /* Change the size of the stars */
            color: #ccc; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
            color: #FF912C;
        }

        .padding_bottom {
            padding-bottom: 23px;
        }

        .padd {
            padding: .375rem .75rem !important;
        }


    </style>

    <style>
        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }

        .table > thead > tr > th {
            font-weight: 800 !important;
            font-size: 18px !important;
            text-align: center !important;
            color: black !important;
            padding: 25px 25px !important;
            font-family: revert !important;

        }

        .card-title {
            line-height: 1.2;
            text-transform: capitalize;
            font-weight: 700;
            letter-spacing: .05rem;
            font-size: 35px !important;
        }

        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #ddd;
            font-size: 18px;
            justify-content: center;
            text-align: center;
            color: black;
            font-family: sans-serif;
            padding: 25px 0px 0px 26px;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: tomato !important;
            text-decoration: none;
        }

        a:hover {
            color: #2196f3 !important;
        }

        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #F5F5F5;
            border: 1px solid #CCC;
            border-radius: 4px;
        }

        .header {
            padding: 20px 0;
            margin-bottom: 10px;

        }

        .header:after {
            content: "";
            display: block;
            height: 1px;
            background: #eee;
            position: absolute;
            left: 30%;
            right: 30%;
        }

        .header h2 {
            font-size: 3em;
            font-weight: 300;
            margin-bottom: 0.2em;
        }

        .header p {
            font-size: 14px;
        }

        #a-footer {
            margin: 20px 0;
        }

        .new-react-version {
            padding: 20px 20px;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);

            text-align: center;
            font-size: 14px;
            line-height: 1.7;
        }

        .new-react-version .react-svg-logo {
            text-align: center;
            max-width: 60px;
            margin: 20px auto;
            margin-top: 0;
        }

        .star {
            cursor: pointer !important;
        }

        .success-box {
            margin: 50px 0;
            padding: 10px 10px;
            border: 1px solid #eee;
            background: #f9f9f9 !important;
        }

        .success-box img {
            margin-right: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .success-box > div {
            vertical-align: top;
            display: inline-block;
            color: #888 !important;
        }

        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;

        }

        .rating-stars ul > li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
            font-size: 2.5em; /* Change the size of the stars */
            color: #ccc !important; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
            color: #388eff !important;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
            color: #005be4 !important;
        }

        .card-header {
            justify-content: center;
            font-family: ui-sans-serif;
        }
        #example-1{
            width: 100% !important;
        }
        .desg  {
            background: rgb(41 171 225) ;
        }


    </style>


    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    <ul class="breadcrumb">
        <li><a href="/dashboard">Home</a></li>
        <li><a>Report</a></li>
    </ul>

    <!-- Row -->

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!--div-->
            <div class="card">
                <div class="card-header"><h3>User Record</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 padding_bottom">
                            <input autocomplete="nope" type="date" id="datepicker-1" name="date_from"
                                   class="form-control"
                                   placeholder="To Date"
                                   required=""
                            >
                        </div>
                        <div class="col-md-3 padding_bottom">
                            <input autocomplete="nope" type="date" id="datepicker-2" name="date_to"
                                   class="form-control"
                                   placeholder="From Date"
                                   required="">
                        </div>
                        <div class="col-md-3 padding_bottom">
                            <select autocomplete="nope" name="users_role" id="users_role" class="form-control"
                                    id="" required=""
                                    data-validation-required-message="This field is required"
                                    aria-invalid="false">
                                <option value="">Select</option>
                                @foreach($get_roles as $rolls)
                                    <option value="{{$rolls->id}}">{{$rolls->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 padding_bottom getusers">

                        </div>
                        <div class="col-md-3 padding_bottom">
                            <button id="display" class="btn btn-primary">View</button>
                        </div>
                    </div>


                    <div id="table_data">

                    </div>

                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <div id="chart_data"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!--div-->
            <div class="card">
                <div class="card-header"><h3>User Rating</h3></div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="example-1" class="table table-striped table-bordered table-sm">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Date</th>
                                <th class="border-bottom-0">Quote</th>
                                <th class="border-bottom-0">Qa remarks</th>
                                <th class="border-bottom-0">Communication</th>
                            </tr>
                            </thead>
                            <tbody id="maintable_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

@section('extraScript')
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>

        $('#display').on('click', function () {

            var user_id = $('#users').val();
            var rollid = $('#users_role').val();
            var users_name = $("#users option:selected").text();
            var date_from = $('#datepicker-1').val();
            var date_to = $('#datepicker-2').val();
            $.ajax({
                type: "get",
                url: "/get_assign_data",
                data: {user_id: user_id, rollid: rollid, date_from: date_from, date_to: date_to},
                success: function (data) {
                    $('#table_data').html('');
                    $('#table_data').html(data);
                },
            });


            $.ajax({
                type: "get",
                url: "/get_assign_data2",
                data: {user_id: user_id, rollid: rollid, date_from: date_from, date_to: date_to},
                success: function (data) {
                    $('#chart_data').html('');
                    $('#chart_data').html(data);

                },
            });

            getorders(user_id, users_name, date_from, date_to);
            regain2();
        });

        function getorders(employeeid, ccc1, date_from, date_to) {
            var employeeid = employeeid;
            var monthv = $('#monthv').val();


            $('#maintable_data').html('');
            //$('#emp_id').val(employeeid);
            $.ajax({
                type: 'get',
                url: '/get_orders_qa2',
                data: {employeeid: employeeid, date_from: date_from, date_to: date_to},
                success: function (data) {

                    $.each(data.get_user_orders, function (k, v) {

                        $('#maintable_data').append(`

                     <tr>
                        <td>` + ccc1 + `</td>
                        <td>` + v.created_at + `</td>
                        <td>` + v.order_id + `</td>
                        <td><input name='comments[]' value='${(v.comments !== null ? v.comments : '')}' placeholder='Max Length 30' class='form-control' maxlength='30'></td>
                       <td>
                        <div class='rating-stars text-center'>
                                <ul class='stars  padd' id='stars1'>
                                <li class='star ${(v.ratting >= 1 ? 'selected' : '')}' title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >= 2 ? 'selected' : '')}'  title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >= 3 ? 'selected' : '')}'  title='Satisfactory' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >= 4 ? 'selected' : '')}'  title='Good' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >= 5 ? 'selected' : '')}'  title='Excellent' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                </ul>
                                <input class='text-message' type='hidden' value='${v.ratting}' required name="rating_points[]" >
                                <input  type='hidden' name='order_ids[]' value='${v.order_id}' required  >
                                <input  type='hidden' name='user_id' value='${employeeid}' required  >
                           </div>
                          </td>
                      </tr>
                        `);

                    });
                    regain2();


                }
            });

        }


        $('#users_role').on('change', function () {
            var userrole = $('#users_role').val();
            var optionv = "";

            var selectcombo = "<select autocomplete='nope' name='users' id='users' class='form-control' id='' required=''>";

            $.ajax({
                type: "get",
                url: "/get_user_by_role",
                data: {userrole: userrole},
                success: function (data) {
                    // data = $.parseJSON(data);


                    $.each(data, function (i, item) {
                        optionv = optionv + "<option value='" + item.id + "'>" + item.name + " </option>";
                    });
                    var user = selectcombo + optionv;
                    $('.getusers').html('');
                    $('.getusers').append(user);

                },


            });


        });


        function regain2() {
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('.stars li').on('mouseover', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('.stars li').on('click', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected

                // alert(onStar);
                var stars = $(this).closest('tr').find('li.star')


                // $(this).closest('tr').find('.star').removeClass('selected');

                // $(this).closest('tr').find('.star').addClass('selected');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars1 li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                }
                else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }
                $(this).closest('tr').find('.text-message').val(onStar);

                //responseMessage(msg);

            });
        }

    </script>


@endsection

