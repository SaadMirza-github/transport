@extends('layouts.mainsite')

@section('template_title')
    <?php echo $titlee = "PAYMENT RECEIVED"; ?>
@endsection

@section('content')
    <style>
        #example-1{
            width: 100% !important;
        }
        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }

        .table-bordered, .text-wrap table, .table-bordered th, .text-wrap table th, .table-bordered td, .text-wrap table td {
            border: 1px solid rgb(0 0 0);
        }

        .table {
            color: rgb(0 0 0);
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            font-weight: 500;
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


    </style>

    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    <ul class="breadcrumb">
        <li><a href="./dashboard">Home</a></li>
        <li><a>PAYMENT RECEVIED</a></li>
    </ul>




    <div class="row">
        <div class="col-12">

            @if(session('flash_message'))
                <div class="alert alert-success">
                    {{session('flash_message')}}
                </div>
                @endif
                        <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Payment Received</div>
                        <form action="/get_payment_received" method="get" style=" display: contents; " >
                            <label class="form-label p-2" style="margin-left:auto">Select Month</label>
                            <input type="month" name="monthyear" id="monthyear" class="form-control w-25" value="{{date('Y-m')}}" />
                            <input type="button" onclick="get_month()" class="btn btn-primary w-25 ml-2" name="display" value="Display"/>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="table_data">
                            @include('main.management2.show_payment_received')
                        </div>
                    </div>
                </div>

        </div>

    </div><!-- end app-content-->


@endsection

@section('extraScript')

    <script>
        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {

                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data3(page);

            });

            function fetch_data3(page) {

                $('#table_data').html('');
                $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);



                var monthyear =   $('#monthyear').val();
                $.ajax({

                    url: "/get_payment_received?page=" + page + "&monthyear="+ monthyear,
                    success: function (data) {
                        $('#table_data').html('');
                        $('#table_data').html(data);

                    },
                    complete: function (data) {
                        $('#ldss').hide();
                        regain();
                    }

                })

            }

        });

        function  get_month(){

            $('#table_data').html('');
            $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);

            var monthyear =   $('#monthyear').val();
            if(monthyear.length > 0) {
                url = "/get_payment_received?monthyear="+ monthyear;
                $.ajax({
                    url: url,
                    success: function (data) {
                        $('#table_data').html('');
                        $('#table_data').html(data);

                    },
                    complete: function (data) {
                        $('#ldss').hide();
                        regain();
                    }

                })

            }
        }
    </script>

    <!--Scrolling Modal-->

@endsection


