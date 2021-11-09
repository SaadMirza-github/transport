@include('partials.mainsite_pages.return_function')
@extends('layouts.mainsite')

@section('template_title')
Dashboard
@endsection
@php
$phoneaccess=explode(',',Auth::user()->emp_access_phone);
@endphp
@section('content')
<link rel="stylesheet" href="{{ url('assets/plugins/multipleselect/multiple-select.css')}}">
<link rel="stylesheet" href="{{ url('assets/plugins/multi/multi.min.css')}}">

<style>
    .message-feed:not(.right) .mf-content {
        background: var(--blue);
        position: relative;
        margin-left: 10px;
        color: rgb(255 255 255);
    }

    .mf-date {
        display: block;
        color: var(--white);
        margin-top: 7px;
    }

    .mf-date > i {
        font-size: 14px;
        line-height: 100%;
        position: relative;
        top: 1px;
        color: rgb(255 255 255) !important;
    }

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
        background: #6C757D;
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
        font-size: 18px;
        font-weight: 900;
    }

    .glow-on-hover > a:hover {
        color: white;
        font-size: 18px;
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

    textarea {
        resize: none;
        outline: none;
    }

    .SumoSelect > .CaptionCont {
        position: relative;
        border: 1px solid rgb(0 0 0);
        color: rgb(0 0 0);
        min-height: 14px;
        border-radius: .25rem;
        margin: 0;
        width: 100%;
        height: 40px;
        line-height: 30px;
        padding: 6px 17px;
        font-family: 'Roboto';
        font-size: 16px;
    }

    div.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    div.example button {
        float: left;
        width: 20%;
        padding: 6px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    div.example button:hover {
        background: #0b7dda;
    }

    div.example::after {
        content: "";
        clear: both;
        display: table;
    }

    .admin_search > .fa-search {
        color: white !important;
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: visible !important;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

</style>

<div class="header_show ">
    <center>
        <i class="fa fa-caret-down " style="font-size: 56px;"></i>
    </center>
</div>
<!--/app header-->                                                <!--Page header-->

<!--End Page header-->

<!-- Row-1 -->
<div class="row">
    <div class="card" id="tabs-style3">

        <div class="card-body" style="padding: 0px !important;">
            <div class="panel panel-primary tabs-style-3">
                <div class="tab-menu-heading click_setting">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs" id="p_tb">
                            @foreach($rolelist as $row)
                            @php
                            $show='no';
                            @endphp
                            @if(Auth::user()->role==$row->id)
                            @php
                            $show='yes';
                            @endphp
                            @endif
                            @if(Auth::user()->role==1)
                            @php
                            $show='yes';
                            @endphp
                            @endif
                            @if($show=='yes')
                            <li style=" width: 20%; text-align: center; ">
                                <a href="#{{$row->slug}}" id="{{$row->slug}}_hidden" data-toggle="tab"><i
                                        class="fa fa-edit mr-1"></i>
                                    {{$row->name}}
                                </a>
                            </li>
                            @endif
                            @endforeach
                            {{--<li><a href="#tab5" data-toggle="tab"><i class="fa fa-list mr-1"></i>--}}
                                    {{--Resolve Center</a></li>--}}
                            {{--<li><a href="#tab6" data-toggle="tab"><i class="fa fa-list-alt mr-1"></i>--}}
                                    {{--Other</a></li>--}}
                            {{--<li><a href="#tab7" data-toggle="tab"><i class="fa fa-users mr-1"></i>--}}
                                    {{--Dealers</a></li>--}}
                            {{--<li><a href="#tab8" data-toggle="tab"><i class="fa fa-history mr-1"></i>--}}
                                    {{--history</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body click_show">
                    <div class="tab-content">


                        <div class="tab-pane" id="Admin">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    @if (in_array("0", $phoneaccess))
                                    <li class="" data-toggle="tooltip" data-placement="bottom" title="New!">
                                        <a id="admin_new" onclick="get_data(0,'Admin_hidden','admin_new')"
                                           class="btn effect01 blue"
                                           data-toggle="tab">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(0,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("1", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Interested!">
                                        <a id="admin_interested"
                                           onclick="get_data(1,'Admin_hidden','admin_interested')"
                                           class="btn effect01 green"
                                           data-toggle="tab" title="">
                                            <i class=" fa fa-thumbs-up mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(1,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("4", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Not Interested!">
                                        <a id="admin_not_interested"
                                           onclick="get_data(4,'Admin_hidden','admin_not_interested')"
                                           class="btn effect01 purple" data-toggle="tab" title="">
                                            <i class="fa fa-thumbs-down mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(4,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("5", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Not Answer!">
                                        <a id="admin_not_answer"
                                           onclick="get_data(5,'Admin_hidden','admin_not_answer')"
                                           class="btn effect01 rainbow" data-toggle="tab">
                                            <i class="fa fa-phone-square mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(5,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("6", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Time Quote!">
                                        <a id="admin_time_quote"
                                           onclick="get_data(6,'Admin_hidden','admin_time_quote')"
                                           class="btn effect01 orange" data-toggle="tab" title="">
                                            <i class="fa fa-clock-o mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(6,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("2", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Follow More!">
                                        <a id="admin_follow_more"
                                           onclick="get_data(2,'Admin_hidden','admin_follow_more')"
                                           class="btn effect01 darkblue" data-toggle="tab" title="">
                                            <i class="fa fa-area-chart mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(2,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("18", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="P.issue!">
                                        <a id="admin_p_issue" class="btn effect01 blue" data-toggle="tab"
                                           onclick="get_data(18,'Admin_hidden','admin_p_issue')"
                                           title="">
                                            <i class="fa fa-credit-card mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(18,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("7", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="P. Missing!">
                                        <a id="admin_p_missing"
                                           onclick="get_data(7,'Admin_hidden','admin_p_missing')"
                                           class="btn effect01 green" data-toggle="tab" title="">
                                            <i class="fa fa-credit-card mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(7,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("19", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Active!">
                                        <a id="admin_active" class="btn effect01 purple" data-toggle="tab"
                                           onclick="get_data(19,'Admin_hidden','admin_active')"
                                           title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(19,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("8", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Booked!">
                                        <a id="admin_booked" onclick="get_data(8,'Admin_hidden','admin_booked')"
                                           class="btn effect01 red" data-toggle="tab" title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(8,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("9", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Listed!">
                                        <a id="admin_listed" onclick="get_data(9,'Admin_hidden','admin_listed')"
                                           class="btn effect01 rainbow" data-toggle="tab" title="">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(9,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("10", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Dispatch!">
                                        <a id="admin_dispatch"
                                           onclick="get_data(10,'Admin_hidden','admin_dispatch')"
                                           class="btn effect01 orange"
                                           data-toggle="tab" title="">
                                            <i class=" fa fa-car mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(10,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("11", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Picked Up!">
                                        <a id="admin_picked_up"
                                           onclick="get_data(11,'Admin_hidden','admin_picked_up')"
                                           class="btn effect01 darkblue" data-toggle="tab" title="">
                                            <i class="fa fa-mail-reply mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(11,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("12", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Delivery!">
                                        <a id="admin_delivery"
                                           onclick="get_data(12,'Admin_hidden','admin_delivery')"
                                           class="btn effect01 blue"
                                           data-toggle="tab" title="">
                                            <i class="fa fa-mail-forward  mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(12,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("13", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Completed!">
                                        <a id="admin_completed"
                                           onclick="get_data(13,'Admin_hidden','admin_completed')"
                                           class="btn effect01 green" data-toggle="tab" title="">
                                            <i class="fa fa-mail-forward  mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(13,0)}}</span>
                                        </a>
                                    </li>
                                    @endif


                                    <li data-toggle="tooltip" data-placement="bottom" title="Global Search!">
                                        <a id="search_btn_id"
                                           class="btn effect01 green search_btn" data-toggle="tab">
                                            <i class="fa fa-search mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    @if (in_array("33", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom"
                                        title="No Payment Received!">
                                        <a id="admin_no_payment_received"
                                           onclick="get_payment(1,'Admin_hidden','admin_no_payment_received')"
                                           class="btn effect01 purple" data-toggle="tab" title="">
                                            <i class="fa fa-dollar"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("34", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Payment Update!">
                                        <a id="admin_payment_update"
                                           onclick="get_payment(2,'Admin_hidden','admin_payment_update')"
                                           class="btn effect01 darkblue" data-toggle="tab" title="">
                                            <i class="fa fa-refresh"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("35", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Payment Received!">
                                        <a id="admin_payment_received"
                                           onclick="get_payment(3,'Admin_hidden','admin_payment_received')"
                                           class="btn effect01 green" data-toggle="tab" title="">
                                            <i class="fa fa-dollar"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    @endif
                                    <li data-toggle="tooltip" data-placement="bottom" title="Deleted Quotes!">
                                        <a id="admin_delete"
                                           onclick="get_data(15,'Admin_hidden','admin_delete')"
                                           class="btn effect01 purple" data-toggle="tab" title="">
                                            <i class="fa fa-trash"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>


                        <div class="tab-pane" id="OrderTaker">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">

                                    <li data-toggle="tooltip" data-placement="bottom" title="calling!">
                                        <a href="/calling" target="_blank" class="btn effect01 blue"
                                           data-sm-link-text="Calling New">
                                            <i class=" fa fa-phone mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="bottom" title="shipment!">
                                        <a href="/shipment" target="_blank" class="btn effect01 green"
                                           title="">
                                            <i class=" fa fa-ship mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="bottom" title="heavy!">
                                        <a href="/heavy" target="_blank" class="btn effect01 purple "
                                           title="">
                                            <i class=" fa fa-truck mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                    @if (in_array("0", $phoneaccess))
                                    <li class="" data-toggle="tooltip" data-placement="bottom" title="new!">
                                        <a id="o_new" onclick="get_data(0,'OrderTaker_hidden','o_new')"
                                           class="btn effect01 blue"
                                           data-toggle="tab">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(0,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("1", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="interested!">
                                        <a id="o_interested"
                                           onclick="get_data(1,'OrderTaker_hidden','o_interested')"
                                           class="btn effect01 green"
                                           data-toggle="tab" title="">
                                            <i class=" fa fa-thumbs-up mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(1,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("4", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="not interested!">
                                        <a id="o_n_interested"
                                           onclick="get_data(4,'OrderTaker_hidden','o_n_interested')"
                                           class="btn effect01 purple" data-toggle="tab" title="">
                                            <i class="fa fa-thumbs-down mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(4,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("5", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Not Answer!">
                                        <a id="o_not_answer"
                                           onclick="get_data(5,'OrderTaker_hidden','o_not_answer')"
                                           class="btn effect01 " data-toggle="tab">
                                            <i class="fa fa-phone-square mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(5,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("6", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="time quote!">
                                        <a id="o_time_quote"
                                           onclick="get_data(6,'OrderTaker_hidden','o_time_quote')"
                                           class="btn effect01 red" data-toggle="tab" title="">
                                            <i class="fa fa-clock-o mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(6,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("2", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="follow more!">
                                        <a id="o_follow_more"
                                           onclick="get_data(2,'OrderTaker_hidden','o_follow_more')"
                                           class="btn effect01 rainbow" data-toggle="tab" title="">
                                            <i class="fa fa-area-chart mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(2,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("18", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="P.issue!">
                                        <a id="o_p_issue" class="btn effect01 orange" data-toggle="tab"
                                           onclick="get_data(18,'OrderTaker_hidden','o_p_issue')"
                                           title="">
                                            <i class="fa fa-credit-card mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(18,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("7", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="P. Missing!">
                                        <a id="o_p_missing"
                                           onclick="get_data(7,'OrderTaker_hidden','o_p_missing')"
                                           class="btn effect01 darkblue"
                                           data-toggle="tab" title="">
                                            <i class="fa fa-credit-card mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(7,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("19", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Active!">
                                        <a id="o_active" class="btn effect01 blue" data-toggle="tab"
                                           onclick="get_data(19,'OrderTaker_hidden','o_active')"
                                           title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(19,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("8", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Booked!">
                                        <a id="o_booked" onclick="get_data(8,'OrderTaker_hidden','o_booked')"
                                           class="btn effect01 green" data-toggle="tab" title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(8,0)}}</span>
                                        </a>
                                    </li>
                                    @endif

                                    <li data-toggle="tooltip" data-placement="bottom" title="Global Search!">
                                        <a id="search_btn_id2"
                                           class="btn effect01 green search_btn" data-toggle="tab">
                                            <i class="fa fa-search mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-pane" id="Dispatcher">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">

                                    @if (in_array("19", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Active!">
                                        <a id="d_active" class="btn effect01 blue"
                                           data-toggle="tab"
                                           onclick="get_data(19,'Dispatcher_hidden','d_active')"
                                           title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(19,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("8", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Booked!">
                                        <a id="d_booked" class="btn effect01 green" data-toggle="tab"
                                           onclick="get_data(8,'Dispatcher_hidden','d_booked')"
                                           title="">
                                            <i class="fa fa-toggle-on mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(8,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("9", $phoneaccess))
                                    <li class="" data-toggle="tooltip" data-placement="bottom" title="Listed!">
                                        <a id="d_listed" class="btn effect01 purple" data-toggle="tab"
                                           onclick="get_data(9,'Dispatcher_hidden','d_listed')"
                                           title="">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(9,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("10", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Dispatch!">
                                        <a id="d_dispatch" class="btn effect01 red" data-toggle="tab"
                                           onclick="get_data(10,'Dispatcher_hidden','d_dispatch')"
                                           title="">
                                            <i class=" fa fa-car mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(10,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("11", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Picked Up!">
                                        <a id="d_picked_up" class="btn effect01 rainbow" data-toggle="tab"
                                           onclick="get_data(11,'Dispatcher_hidden','d_picked_up')"
                                           title="">
                                            <i class="fa fa-mail-reply mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(11,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("12", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Delivery!">
                                        <a id="d_delivery" class="btn effect01 orange" data-toggle="tab"
                                           onclick="get_data(12,'Dispatcher_hidden','d_delivery')"
                                           title="">
                                            <i class="fa fa-mail-forward  mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(12,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("13", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Completed!">
                                        <a id="d_completed" class="btn effect01 darkblue" data-toggle="tab"
                                           onclick="get_data(13,'Dispatcher_hidden','d_completed')"
                                           title="">
                                            <i class="fa fa-mail-forward  mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(13,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li data-toggle="tooltip" data-placement="bottom" title="Global Search!">
                                        <a id="search_btn_id3"
                                           class="btn effect01 green search_btn" data-toggle="tab">
                                            <i class="fa fa-search mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-pane" id="QA">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">

                                    @if (in_array("5", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Not Answer!">
                                        <a id="qa_not_answer"
                                           onclick="get_data(5,'QA_hidden','qa_not_answer')"
                                           data-toggle="tab" class="btn effect01 bg-pink"
                                        >
                                            <i class=" fa fa-phone mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(5,0)}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (in_array("0", $phoneaccess))
                                    <li class="" data-toggle="tooltip" data-placement="bottom" title="New!">
                                        <a id="qa_new" onclick="get_data(0,'QA_hidden','qa_new')"
                                           class="btn effect01 blue"
                                           data-toggle="tab">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(0,0)}}</span>

                                        </a>
                                    </li>
                                    @endif
                                    <li data-toggle="tooltip" data-placement="bottom" title="Global Search!">
                                        <a id="search_btn_id4"
                                           class="btn effect01 green search_btn" data-toggle="tab">
                                            <i class="fa fa-search mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>

                                    <li data-toggle="tooltip" data-placement="bottom" title="Ratting!">
                                        <a class="btn effect01 yellow" target="_blank" href="/qa_portal">
                                            <i class="fa fa-star mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane" id="Manager">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    <!--
                                        <li data-toggle="tooltip" data-placement="bottom" title="calling!">
                                            <a href="/calling" target="_blank" class="btn effect01 blue"
                                               data-sm-link-text="Calling New">
                                                <i class=" fa fa-phone mr-1"></i>
                                                <span class="badge badge-danger side-badge">10</span>
                                            </a>
                                        </li>
                                        <li data-toggle="tooltip" data-placement="bottom" title="shipment!">
                                            <a href="/shipment" target="_blank" class="btn effect01 green"
                                               title="">
                                                <i class=" fa fa-ship mr-1"></i>
                                                <span class="badge badge-danger side-badge">10</span>
                                            </a>
                                        </li>
                                        <li data-toggle="tooltip" data-placement="bottom" title="heavy!">
                                            <a href="/heavy" target="_blank" class="btn effect01 purple "
                                               title="">
                                                <i class=" fa fa-truck mr-1"></i>
                                                <span class="badge badge-danger side-badge">10</span>
                                            </a>
                                        </li>

                                        <li class="" data-toggle="tooltip" data-placement="bottom" title="New!">
                                                <a id="qa_new" onclick="get_data(0,'QA_hidden','qa_new')"
                                                   class="btn effect01 blue"
                                                   data-toggle="tab">
                                                    <i class="fa fa-clipboard mr-1"></i>
                                                    <span class="badge badge-danger side-badge">{{get_total_new(0,0)}}</span>

                                                </a>
                                            </li>
                                        -->

                                    <li class="">
                                        <a id="manager_pickup"
                                           onclick="get_data(20,'Manager_hidden','manager_pickup')"
                                           class="btn effect01 blue"
                                           style="width: 232px; color: black;" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i>
                                            Pickup Pending {{get_total_new(20,0)}}
                                        </a>
                                    </li>

                                    @if (in_array("20", $phoneaccess))
                                    <li class="">
                                        <a id="manager_deliver"
                                           onclick="get_data(22,'Manager_hidden','manager_deliver')"
                                           class="btn effect01 blue"
                                           style="width: 232px; color: black;" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i>
                                            Deliver Pending {{get_total_new(22,0)}}
                                        </a>
                                    </li>
                                    @endif

                                    @if (in_array("13", $phoneaccess))
                                    <li data-toggle="tooltip" data-placement="bottom" title="Completed!">
                                        <a id="admin_completed"
                                           onclick="get_data(13,'Admin_hidden','admin_completed')"
                                           class="btn effect01 green" data-toggle="tab" title="">
                                            <i class="fa fa-mail-forward  mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(13,0)}}</span>
                                        </a>
                                    </li>
                                    @endif

                                    @if (in_array("0", $phoneaccess))
                                    <li class="" data-toggle="tooltip" data-placement="bottom" title="New!">
                                        <a id="manager_new2"
                                           onclick="get_data(0,'Manager_hidden','manager_new2')"
                                           class="btn effect01 blue"
                                           data-toggle="tab">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge">{{get_total_new(0,0)}}</span>

                                        </a>
                                    </li>
                                    @endif
                                    <li class="" data-toggle="tooltip" data-placement="bottom"
                                        title="Requested Quotes!">
                                        <a href="#admin_new" id="requestedtrigger" onclick="get_requested_quotes()"
                                           class="btn effect01 blue"
                                           data-toggle="tab">
                                            <i class="fa fa-clipboard mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>

                                        </a>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="bottom" title="Global Search!">
                                        <a id="search_btn_id4"
                                           class="btn effect01 green search_btn" data-toggle="tab">
                                            <i class="fa fa-search mr-1"></i>
                                            <span class="badge badge-danger side-badge"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab55">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    <li>
                                        <a href="#tab11" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i> Res. Center </a></li>
                                    <li>
                                        <a href="#tab12" data-toggle="tab"><i
                                                class=" fa fa-thumbs-up mr-1"></i> Res. Complete</a></li>
                                    <li>
                                        <a href="#tab13" data-toggle="tab"><i
                                                class="fa fa-thumbs-down mr-1"></i>Completed</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab6">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab11" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i> Invalid </a></li>
                                    <li><a href="#tab12" data-toggle="tab"><i
                                                class=" fa fa-thumbs-up mr-1"></i> Cancel</a></li>
                                    <li><a href="#tab13" data-toggle="tab"><i
                                                class="fa fa-thumbs-down mr-1"></i>Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab7">
                            <p>DEALERS DATA</p>
                        </div>
                        <div class="tab-pane" id="tab8">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab11" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i> 2021 Data </a></li>
                                    <li><a href="#tab12" data-toggle="tab"><i
                                                class=" fa fa-thumbs-up mr-1"></i> 2020 Data</a></li>
                                    <li><a href="#tab13" data-toggle="tab"><i
                                                class="fa fa-thumbs-down mr-1"></i>2019 Data</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab8">
                            <div class="tabs-menu ">
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab11" data-toggle="tab"><i
                                                class="fa fa-clipboard mr-1"></i> 2021 Data </a></li>
                                    <li><a href="#tab12" data-toggle="tab"><i
                                                class=" fa fa-thumbs-up mr-1"></i> 2020 Data</a></li>
                                    <li><a href="#tab13" data-toggle="tab"><i
                                                class="fa fa-thumbs-down mr-1"></i>2019 Data</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


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
                                <div class="container">
                                    <form id="search_form" style="display: none">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3 text-left pd-10">
                                                    <select id="search_by" name="search_by"
                                                            class="form-control"
                                                            data-placeholder="50">
                                                        <option value="id">Order ID</option>
                                                        <option value="origincity">Pickup City</option>
                                                        <option value="originstate">Pickup State</option>
                                                        <option value="destinationcity">Delivery City</option>
                                                        <option value="destinationstate">Delivery State</option>
                                                        <option value="ophone">Customer Phone</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3 text-left pd-10">
                                                    <select id="paynal_type" name="paynal_type"
                                                            class="form-control"
                                                            data-placeholder="50">
                                                        <option value="0">Calling</option>
                                                        <option value="1">Shipment</option>
                                                        <option value="2">Heavy</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3 text-center pd-10">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               placeholder="Search for..." onkeyup="return_data()"
                                                               id="keywords"
                                                               name="keywords">
                                                        <span class="input-group-btn">
                                                                <button class="btn bd bd-l-0 bg-white tx-gray-600"
                                                                        type="button">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 text-center pd-10 search_show"  >
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               name="searchv" id="searchv" style="background: #5cbdcd38;" placeholder="Global Search">
                                                        <span class="input-group-btn">
                                                                <button id="searchButton"  class="btn bd bd-l-0 bg-white tx-gray-600"
                                                                        type="button">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </span>
                                                    </div>
                                                </div>
                                                {{--<div class="col-lg-3 text-left pd-10">--}}
                                                    {{--<div class="example search_show" style="margin-left: auto;max-width: 300px;border: 0px ">--}}
                                                        {{--<input type="text" class="form-control"--}}
                                                                   {{--onkeyup="get_search(this.value)" name="searchv"--}}
                                                                   {{--id="searchv">--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="p_status" value="0">
                                <div id="table_data">

                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- end app-content-->

            </div>
        </div>

    </div>
    <!-- End Row-1 -->
</div>


{{--modals--}}



<div class="modal" id="reportmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Send Email Link</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style=" font-size: 33px; color: red; ">×</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form action="" method="post" id="form">
                    <h5 class=" lh-3 mg-b-20">Order Id <input readonly type="text" name="orderid" value=""/></h5>

                    <div class="card">
                        <div class="card-body pd-20">

                            @csrf
                            Email Link
                            </br>
                            <!-- <input type="hidden" name="user_id" value="47"> -->
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-sm">
                                        <input type="text" readonly name="link" id="link"
                                               class="form-control"
                                               value=""/>
                                    </div><!-- col -->
                                </div><!-- row -->
                            </div><!-- form-group -->
                            <div class="form-group">
                                <input type="text" name="email" id="email"
                                       class="form-control"
                                       value="" placeholder="Enter email address..."/>
                            </div><!-- form-group -->
                            <button type="submit" class="btn btn-primary pd-x-20">Submit
                            </button>

                        </div><!-- card-body -->
                    </div>
                </form>
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

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

<div class="modal" id="trashmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delete Order</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/trash_order" method="post" id="form">
                @csrf
                <div class="modal-body pd-20">

                    <h5 class=" lh-3 mg-b-20">Order Id # <input style="border: none" readonly type="text"
                                                                name="orderid" value=""/></h5>

                    <div class="card">
                        <div class="card-body pd-20">
                            @csrf
                            <div class="form-group" style=" text-align: center; font-size: 24px; ">
                                Do you want to delete order <strong>?</strong>


                            </div><!-- card-body -->
                        </div>
                    </div>

                </div><!-- modal-body -->
                <div class="modal-footer" style=" justify-content: center; ">
                    <button type="submit" class="btn btn-danger pd-x-20 w-25">Yes
                    </button>
                    <button type="button" class="btn btn-info w-25" data-dismiss="modal">No
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal " id="largemodal" aria-hidden="true">
    <div class="modal-dialog  modal-full" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="largemodal1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--<form name="changestatusform" action="/call_history_post" method="post">

                        -->
                <div class="card-body" style="padding: 0.5rem 1.5rem;">

                    <div class="panel panel-primary">

                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav nav-pills">
                                <li><a data-toggle="pill" href="#home" class="active">View Order
                                    </a>
                                </li>
                                <li><a data-toggle="pill" href="#route_tab">View Route</a></li>
                                <li><a href="#">Edit order</a></li>
                                <li><a data-toggle="pill" href="#history_tab">View History</a></li>
                                <li><a data-toggle="pill" href="#email_tab">Email</a></li>


                            </ul>

                        </div>

                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="row" style="margin: 18px 0px 18px -11px;">
                                    <div class="col-md-12">
                                        {{--<textarea id="lock_text" style="display: none"></textarea>--}}
                                        <button type="button" class="glow-on-hover count_user" id="phoneno2"
                                                onclick="count_user(1)" style="width: 267px;">
                                            <i class="fa fa-dollar" style="color: white;"></i>
                                        </button>
                                        <button type="button" class="glow-on-hover count_user" id="smscount"
                                                onclick="count_user(2)">
                                            <i class="fa fa-dollar" style="color: white;"></i>
                                        </button>
                                        {{--<button type="button" class="glow-on-hover ">--}}
                                            {{--<a href="#" id="emailcount" class="count_user"--}}
                                                   {{--onclick="count_user(3);this.disabled=true;">--}}
                                                {{--<i class="fa fa-dollar" style="color: white;"></i> </a>--}}

                                            {{--</button>--}}
                                        <input type="hidden" name="type_hidden" id="type_hidden">
                                        <script>
                                            function settype(type) {
                                                $('#type_hidden').val(type);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <!--  !-->
                                <form name="changestatusform" id="changestatusform" action="/call_history_post"
                                      method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" readonly name="customername" id='customername'
                                                       class="form-control">
                                                <input type="hidden" readonly name="customeremail"
                                                       id='customeremail'
                                                       class="form-control">
                                                <input type="hidden" readonly name="pstatus2" id='pstatus2'
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Phone No</label>
                                                <input type="text" readonly name="phoneno" id='phoneno'
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Expected Date</label>
                                                <input type="date" name="expected_date" id='expected_date' required
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-2 ">
                                            <div class="form-group" style=" text-align: center; float: left;">
                                                <label style=" display: block; ">Call Contected </label>
                                                <input type="radio" style=" margin-top: -16px; "
                                                       class="option-input radio " required id="call_connect"
                                                       name="pstatus1" value="1">&nbsp;


                                            </div>
                                        </div>
                                        <div class="col-sm-2 ">
                                            <div class="form-group" style=" text-align: center; ">

                                                <label style=" display: block; ">Call Not Contected</label>
                                                <input type="radio" style=" margin-top: -16px; "
                                                       class="option-input radio" required id="not_connect"
                                                       name="pstatus1" value="2">&nbsp;

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row status" style="display: none;padding: 11px 0px 0px 16px;">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group" id="popup_data">


                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="mt-4">History</h5>
                                    <div class="row mt-5 mb-5">


                                        <div class="col-md-6 com-sm-6 col-lg-6 col-xl-6">
                                                          <textarea id="lock_text" readonly class="form-control"
                                                                    placeholder="Call History"
                                                                    name="user_input"
                                                                    style="background-color: white;border-right:transparent;height: 200px;"
                                                          ></textarea>
                                        </div>
                                        <div class="col-md-6 com-sm-6 col-lg-6 col-xl-6">
                                                             <textarea required name="history_update"
                                                                       placeholder="Enter Comments...."
                                                                       style="border-left:3px dotted rgb(0 0 0);margin-left: -33px; height: 200px;"
                                                                       id='history_update'
                                                                       class="form-control"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style=" text-align: center; font-size: 30px; ">
                                            <button type="submit" class="glow-on-hover  w-25">Save changes</button>
                                            <button type="button" class="glow-on-hover  w-25" data-dismiss="modal">
                                                Close
                                            </button>
                                            <input type="hidden" class="form-control" name="order_id1"
                                                   id='order_id1' placeholder="" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="route_tab" class="tab-pane fade"
                                 style=" margin: 13px 13px 13px 1px; border: 1px solid #9E9E9E; padding: 8px; ">
                                <label class="form-label">Route</label>
                                <div id="">

                                    <iframe width="1100px;" height="400px;" id="getlink" src=""
                                            title="route"></iframe>
                                </div>
                            </div>

                            <div id="history_tab" class="tab-pane fade"
                                 style="margin: 13px 13px 13px 1px;border: 1px solid #9E9E9E;padding: 8px;height: 466px;overflow: scroll;">
                                <label class="form-label">View History</label>
                                <div id="calhistory">
                                </div>
                            </div>

                            <div id="email_tab" class="tab-pane fade"
                                 style=" margin: 13px 13px 13px 1px; padding: 11px 37px; ">
                                <div class="container-fluid" style="border:1px solid black">
                                    <div id="editparent">
                                        <div id="editControls">
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-default" data-role="undo" href="#"
                                                   title="Undo"><i class="fa fa-undo"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="redo" href="#"
                                                   title="Redo"><i class="fa fa-repeat"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-default" data-role="bold" href="#"
                                                   title="Bold"><i class="fa fa-bold"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="italic" href="#"
                                                   title="Italic"><i class="fa fa-italic"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="underline" href="#"
                                                   title="Underline"><i class="fa fa-underline"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="strikeThrough" href="#"
                                                   title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-default" data-role="indent" href="#"
                                                   title="Blockquote"><i class="fa fa-indent"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="insertUnorderedList"
                                                   href="#" title="Unordered List"><i class="fa fa-list-ul"></i></a>
                                                <a class="btn btn-xs btn-default" data-role="insertOrderedList"
                                                   href="#" title="Ordered List"><i class="fa fa-list-ol"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-default" data-role="h1" href="#"
                                                   title="Heading 1"><i class="fa fa-header"></i><sup>1</sup></a>
                                                <a class="btn btn-xs btn-default" data-role="h2" href="#"
                                                   title="Heading 2"><i class="fa fa-header"></i><sup>2</sup></a>
                                                <a class="btn btn-xs btn-default" data-role="h3" href="#"
                                                   title="Heading 3"><i class="fa fa-header"></i><sup>3</sup></a>
                                                <a class="btn btn-xs btn-default" data-role="p" href="#"
                                                   title="Paragraph"><i class="fa fa-paragraph"></i></a>
                                            </div>
                                        </div>
                                        <div id="editor" contenteditable></div>
                                        <textarea name="ticketDesc" id="editorCopy" required="required"
                                                  style="display:none;"></textarea>
                                    </div>


                                </div>
                                <div class="mt-5" style="text-align: center;">
                                    <button type="button" class="glow-on-hover ">
                                        <a href="#" id="emailcount" class="count_user"
                                           onclick="count_user(3);this.disabled=true;">
                                            <i class="fa fa-dollar" style="color: white;"></i> </a>

                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="find_carrier_modal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content"
             style="width: max-content;right: 302px;min-width: 86pc !important;min-height: 36pc !important;">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="largemodal1">Find Carrier Data <span class="badge badge-warning"
                                                                                     style=" font-size: 17px; font-family: emoji; "
                                                                                     id="find_o_id"></span></h5>

                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                    <table class="table table-responsive table-bordered table-stripe table-condensed"
                           id="table_find_data_carrier">

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('extraScript')

<script>
    jQuery(document).ready(function ($) {
        /** ******************************
         * Simple WYSIWYG
         ****************************** **/
        $('#editControls a').click(function (e) {
            e.preventDefault();
            switch ($(this).data('role')) {
                case 'h1':
                case 'h2':
                case 'h3':
                case 'p':
                    document.execCommand('formatBlock', false, $(this).data('role'));
                    break;
                default:
                    document.execCommand($(this).data('role'), false, null);
                    break;
            }

            var textval = $("#editor").html();
            $("#editorCopy").val(textval);
        });

        $("#editor").keyup(function () {
            var value = $(this).html();
            $("#editorCopy").val(value);
        }).keyup();

        $('#checkIt').click(function (e) {
            e.preventDefault();
            alert($("#editorCopy").val());
        });
    });

    $('.radio').click(function () {
        if ($('#call_connect').is(':checked')) {

            $(".status").css("display", "block");
        }
        else if ($('#not_connect').is(':checked')) {
            $(".status").css("display", "none");
            $(".radio_value").checked = false;
            $(".radio_value").prop('checked', false);
            $(".SumoUnder").prop('selected', false);
            $(".opt").removeClass('selected');
            $(".CaptionCont").attr('title', 'Select Here');
            $('.placeholder').text("Select Here");
            $('.CaptionCont > span').empty();
            $('.CaptionCont > span').text("Select Here");
            $('#bookers  option').prop('selected', false);

        }

    });
    $('#lock_text').click(function () {
        $('#history_update').focus();
    });


    function selectRefresh() {
        $('.select2').select2({
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
    }

    var options3 = {
        series: [{
            name: 'Manager',
            data: [44, 55, 41, 37, 22, 43, 21]
        }, {
            name: 'QA',
            data: [23, 22, 23, 22, 13, 13, 12]
        }, {
            name: 'Dispatcher',
            data: [22, 27, 21, 29, 15, 21, 20]
        }, {
            name: 'Order Taker',
            data: [25, 12, 19, 32, 25, 24, 10]
        }, {
            name: 'Reborn Kid',
            data: [9, 7, 5, 8, 6, 9, 4]
        }],
        colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
        chart: {
            type: 'bar',
            height: 300,
            stacked: true,
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
            labels: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + "K"
                }
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            show: false,
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        }
    };
    var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
    chart3.render();
</script>


<script>document.body.style.zoom = "95%";</script>





<script>

    function get_data(get, header_menu, sub_menu) {


        $('#table_data').html('');
        $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
        $.ajax({

            url: "/get_data/" + get,
            type: "GET",
            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);


            },
            complete: function (data) {
                $('#p_status').val(get);
                $('#ldss').hide();
                $('#search_form').show();
                //regain();

            }

        });

        $.ajax({
            url: "/menu_setting/" + header_menu + "/" + sub_menu,
            type: "GET",
            success: function (data) {

            },
        });


    }

    $('#searchButton').on('keypress click', function(e){


        var search = $('#searchv').val();
        $('#table_data').html('');
        $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);

        $.ajax({

            url: "/global_search",
            type: "get",
            data: {search: search},

            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);


            },
        });
    });

    function get_payment($val) {
        $.ajax({
            url: "/get_payment/" + $val,
            type: "get",
            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);


            },
        });
    }

    function get_requested_quotes() {


        $('#table_data').html('');
        $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
        $.ajax({

            url: "/get_requested_quotes",
            type: "GET",
            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);


            },
            complete: function (data) {
                $('#ldss').hide();
                $('#search_form').show();
                //regain();
            }

        });

    }

    $('#trashmodal').on('show.bs.modal', function (e) {

        var orderId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[name="orderid"]').val(orderId);

    });
</script>

<script>
    function popup_update(get) {

        var temp = "";

        $('#changestatusform').attr('action', '/call_history_post');

        $('#popup_data').html('');
        if (get == 0) {
            $('#popup_data').html(`<input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
              `);

        } else if (get == 1) {
            $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;
                 <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
                 <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
        }
        else if (get == 2) {
            $('#popup_data').html(`
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;

               <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
        }
        else if (get == 4) {
            $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
        }
        else if (get == 5) {
            $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
        }
        else if (get == 6) {
            $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;

                 `);
        }

        else if (get == 7) {
            $('#popup_data').html(`
                <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Booked </h6>
                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='8'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Bookers</h6>
                    <select  required id='bookers'  multiple='multiple' name='bookers[]'>

                        <option value='' >Select Bookers</option>
                    </select>
                 </div>
                <div class='col-md-3'>
                        <h6 style=" margin-left: 10%; padding-bottom:11px; ">Listed Id</h6>
                    <input type='text' name='list_id' id='list_id' class='form-control' required>
                </div>
               </div>

                 `);
        }

        else if (get == 8) {
            $('#popup_data').html(`


               <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Listed </h6>

                     <input type='radio' class='option-input radio radio_value' name='pstatus' value='9'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Listed Price</h6>
                    <input type='text' class='form-control'  required id='listed_price'   name='listed_price'/>
                 </div>

               </div>


                 `);
        }

        else if (get == 9) {

            $('#changestatusform').attr('action', '/call_history_post_relist');

            $('#popup_data').html(`
                 <div class='row mb-5 pb-5' >
                      <div class='col-md-2 relist_hide'>
                         <label style="display: block;">Dispatch</label>
                        <input type='radio' class='option-input radio radio_value' name='pstatus' value='10'>
                      </div>
                      <div class='col-md-2 relist_hide' style=" margin-left: -13px; text-align: center; ">
                        <label style="display: block;">Cancel Order  </label>
                        <input type='radio' class='option-input radio radio_value' name='pstatus' value='14'>
                      </div>
                      <div class='col-md-4 relist_hide'>

                         <div class='form-group'>
                             <label class='form-label mb-4'>Select Carrier
                                 <a href='javascript:;'
                                    onclick="this.href='/carrier_add/'+$('#order_id1').val()"
                                    type='button' target='_blank'
                                    class='btn btn-sm' style='background-color: rgb(112 94 200); color: white; border-radius: 5px; '>UPDATE CARRIER</a>

                             </label>
                             <select id='current_carrier' class='form-control'
                                     name='current_carrier' required style=' height: auto; '
                                     data-validation-required-message='This field is required'>
                                 <option value=''>Please Add Carrier</option>
                             </select>
                         </div>
                     </div>
                     <div class='col-md-4'>
                         <div class='row '>
                             <div class='col-sm-2 col-md-2' style=' text-align: center; '>
                                 <div class='form-group'>
                                     <label class='form-label mb-4'>Relist</label>
                                     <input style='margin-top: -14px;' onclick='showprice()' type='checkbox' name='relist' id='relist' class='option-input radio'>
                                 </div>
                             </div>

                             <div class='col-sm-10 col-md-10 mt-2' id='r1' style='display: none'>
                                 <div class='form-group'>
                                     <label class='form-label'>	&nbsp;</label>
                                     <input type='number' name='listed_price'
                                            id='relist_id' class='form-control' placeholder='New Relist Price'>
                                 </div>
                             </div>
                         </div>

                     </div>


                 </div>


                 `);
        }
        else if (get == 10) {


            $('#popup_data').html(`
                    <div class="row">
                         <div class="col-sm-2 col-md-2">
                         <label class="form-label">Pickup</label>
                         <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='11'>
                         </div>

                          <div class="col-sm-2 col-md-2">
                            <div class="form-group" style=" text-align: center; ">
                            <label class="form-label ">Mark As Approved</label>
                            <input type='checkbox' class='option-input radio radio_value' name='approvalpickup' value='1'>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3 col-md-3">
                                    <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Pickup Date 	&nbsp;</label>
                                        <input type="date" name="pickup_date" value='{{date("Y-m-d")}}' id='pickup_date' required class="form-control">

                                    </div>
                         </div>
                    </div>

                 `);


        }

        else if (get == 11) {
            $('#popup_data').html(`


               <div class='row' >
                         <div class="col-sm-2 col-md-2">
                                 <label class="form-label">Deliverd</label>
                                 <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='12'>
                         </div>

                          <div class="col-sm-2 col-md-2">
                                    <div class="form-group" style=" text-align: center; ">
                                        <label class="form-label ">Mark As Deliver</label>
                                        <input type='checkbox' class='option-input radio radio_value' name='approvaldeliver' value='1'>
                                    </div>
                          </div>


                         <div class="col-sm-3 col-md-3">
                                   <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Pickup Date 	&nbsp;</label>
                                        <input type="date" readonly name="pickup_date" value='{{date("Y-m-d")}}' id='pickup_date' required class="form-control">
                                    </div>
                         </div>

                         <div class="col-sm-3 col-md-3">
                                   <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Deliver Date &nbsp;</label>
                                        <input type="date" name="deliver_date" value='{{date("Y-m-d")}}' id='deliver_date' required class="form-control">
                                    </div>
                         </div>

               </div>

                 `);
        }

        else if (get == 12) {
            $('#popup_data').html(`


               <div class='row mb-5 pb-5' >
                 <div class="col-sm-2 col-md-2">
                                 <label class="form-label">Completed</label>
                                 <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='13'>
                  </div>

                     <div class='col-md-3'>
                        <h6 style=" margin-left: 10%; padding-bottom:11px; ">Completes</h6>
                        <select  required id='completers'  multiple='multiple' name='completers[]'>
                            <option value='' >Select Complete</option>
                        </select>
                </div>

               </div>


                 `);
        }

        else if (get == 19) {
            $('#popup_data').html(`
               <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Booked </h6>
                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='8'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Bookers</h6>
                    <select  required id='bookers'  multiple='multiple' name='bookers[]'>

                        <option value='' >Select Bookers</option>
                    </select>
                 </div>
                <div class='col-md-3'>
                        <h6 style=" margin-left: 10%; padding-bottom:11px; ">Listed Id</h6>
                        <input type='text' name='list_id' id='list_id' class='form-control' required>
                </div>


               </div>

                 `);
        }
        else if (get == 20) {
            $('#popup_data').html(`
                     <div class='row mb-5 pb-5' >
                         <div class="col-sm-2 col-md-2">
                           <label class="form-label">Completed</label>
                             <input type='radio' class='option-input radio radio_value' name='pstatus' value='11'>Picked Up Confirm &nbsp;&nbsp;&nbsp;
                          </div>

                         <div class="col-sm-2 col-md-2">
                              <div class="form-group" style=" text-align: center; ">
                                  <label class="form-label ">Mark As Picked up</label>
                                  <input type='checkbox' checked='checked' class='option-input radio radio_value' name='approvalpickup' value='1'>

                              </div>
                         </div>
                     </div>
                `);
        }
        else if (get == 22) {
            $('#popup_data').html(`
                     <div class='row mb-5 pb-5' >
                         <div class="col-sm-2 col-md-2">
                           <label class="form-label">Completed</label>
                            <input type='radio' class='option-input radio radio_value' name='pstatus' value='12'>Delivery Confirm &nbsp;&nbsp;&nbsp;
                         </div>

                           <div class="col-sm-2 col-md-2">
                                  <div class="form-group" style=" text-align: center; ">
                                      <label class="form-label ">Mark As Deliver</label>
                                      <input type='checkbox' checked='checked' class='option-input radio radio_value' name='approvaldeliver' value='1'>

                                  </div>
                            </div>
                     </div>
                 `);
        }
    }
</script>


<script>
    function showprice() {

        if ($('#relist').is(":checked")) {

            $('.relist_hide').hide();
            $('#row1').hide();
            $('#r1').show();
            $('#r2').show();
            $('#r3').show();
            $(".getcarrier").removeAttr("required");
            $("#r1").attr("required", true);
            $("#relist_id").attr("required", true);
            $("#expected_date").removeAttr("required");
            $("#current_carrier").removeAttr("required");

        } else {
            $('.relist_hide').show();
            $('#row1').show();
            $('#r1').hide();
            $('#r2').hide();
            $('#r3').hide();
            $(".getcarrier").attr("required", true);
            $("#r1").removeAttr("required");
            $("#expected_date").attr("required", true);
            $("#current_carrier").attr("required", true);
            $("#relist_id").removeAttr("required");

        }
    }
</script>

<script>


    $(".updatee").click(function () {

        var routelink = $(this).closest('tr').find('.link').val();
        $("#getlink").attr("src", routelink);

        $("#largemodal").modal("show");


        var order_id = $(this).closest('tr').find('.order_idd').val();
        var client_name = $(this).closest('tr').find('.client_name').val();
        var client_email = $(this).closest('tr').find('.client_email').val();
        var phoneno = $(this).closest('tr').find('.phoneno').val();
        var pstatus = $(this).closest('tr').find('.pstatus').val();
        var driver_pickup_date = $(this).closest('tr').find('.driver_pickup_date').val();
        var driver_deliver_date = $(this).closest('tr').find('.driver_deliver_date').val();
        var count_no = 0;


        $("#order_id1").val(order_id);
        $("#customername").val(client_name);
        $("#customeremail").val(client_email);
        $("#pstatus2").val(pstatus);
        $("#phoneno").val(phoneno);

        $("#phoneno2").html('');
        $("#smscount").html('');
        $("#emailcount").html('');

        //var title = $('#p_status').val();
        var title = pstatus;
        popup_update(title);


        $.ajax({

            url: "/show_call_history",
            type: "GET",
            data: {id: order_id},
            success: function (data) {
                if (data.length > 0) {
                    $('#calhistory').html('');
                    $('#calhistory').html(data);
                    setTimeout(function () {
                        $("#calhistory").animate({scrollTop: 20000}, "slow");

                    }, 200);
                } else {
                    $('#calhistory').html('NO HISTORY FOUND');
                }
            }, complete: function () {

            }

        });

        if (title == 7 || title == 19) {

            setTimeout(function () {


                $.ajax({

                    url: "/get_assign_users",
                    type: "GET",
                    data: {id: order_id},
                    dataType: "json",
                    beforeSend: function () {

                        $('#bookers').empty();

                    },
                    success: function (data) {
                        var options = "";
                        $.each(data, function (i, item) {

                            if (item.id) {
                                options = options + `<option value='` + item.assign_user_id + `'>` + item.name + `</option>`;

                            }
                        });
                        $("#bookers").append(options);
                        $('#bookers').SumoSelect();

                    }

                });

            }, 500);
        }

        if (title == 9) {

            $("#current_carrier").empty();

            var options = "<option selected value=''>Select Carrier</option>";
            $.ajax({

                type: "GET",
                url: "/get_carrier",
                data: {'order_id': order_id},
                dataType: "json",

                success: function (data) {
                    $.each(data, function (i, item) {

                        if (item.id) {
                            options = options + `<option value='` + item.id + `'>` + item.companyname + `</option>`;

                        }
                    });
                    //$("#current_carrier").remove();
                    $("#current_carrier").append(options);
                },
                error: function (e) {
                    alert("error");
                }

            });

        }

        if (title == 11) {
            $('#pickup_date').val(driver_pickup_date);
            $('#deliver_date').val(driver_deliver_date);
        }

        get_count(order_id, phoneno);


    });

    $("#not_connect").click(function () {
        $('#history_update').val("call not connected");
    });
    $("#call_connect").click(function () {
        $('#history_update').val("");
    });

    function regain_status() {
        $(".updatee").click(function () {


            var routelink = $(this).closest('tr').find('.link').val();


            $("#getlink").attr("src", routelink);

            $("#largemodal").modal("show");
            var order_id = $(this).closest('tr').find('.order_idd').val();
            var client_name = $(this).closest('tr').find('.client_name').val();
            var client_email = $(this).closest('tr').find('.client_email').val();
            var phoneno = $(this).closest('tr').find('.phoneno').val();
            var pstatus = $(this).closest('tr').find('.pstatus').val();
            var count_no = 0;
            var driver_pickup_date = $(this).closest('tr').find('.driver_pickup_date').val();
            var driver_deliver_date = $(this).closest('tr').find('.driver_deliver_date').val();


            $("#order_id1").val(order_id);
            $("#customername").val(client_name);
            $("#customeremail").val(client_email);
            $("#pstatus2").val(pstatus);
            $("#phoneno").val(phoneno);

            $("#phoneno2").html('');
            $("#smscount").html('');
            $("#emailcount").html('');


//                var title = $('#p_status').val();
            var title = pstatus;
            popup_update(title);
            //get_count(order_id, phoneno);
            //alert(title);

            $.ajax({

                url: "/show_call_history",
                type: "GET",
                data: {id: order_id},
                success: function (data) {
                    if (data.length > 0) {
                        $('#calhistory').html('');
                        $('#calhistory').html(data);
                        setTimeout(function () {
                            $("#calhistory").animate({scrollTop: 20000}, "slow");

                        }, 200);
                    } else {
                        $('#calhistory').html('NO HISTORY FOUND');
                    }
                }, complete: function () {

                }

            });
            if (title == 12) {
                setTimeout(function () {

                    $.ajax({

                        url: "/get_assign_users2",
                        type: "GET",
                        data: {id: order_id},
                        dataType: "json",
                        beforeSend: function () {

                            $('#completers').empty();

                        },
                        success: function (data) {
                            var options = "";
                            $.each(data, function (i, item) {

                                if (item.id) {
                                    options = options + `<option value='` + item.assign_user_id + `'>` + item.name + `</option>`;
                                }
                            });
                            $("#completers").append(options);
                            $('#completers').SumoSelect();
                        }
                    });

                }, 500);
            }


            if (title == 7 || title == 19) {

                setTimeout(function () {


                    $.ajax({

                        url: "/get_assign_users",
                        type: "GET",
                        data: {id: order_id},
                        dataType: "json",
                        beforeSend: function () {

                            $('#bookers').empty();

                        },
                        success: function (data) {
                            var options = "";
                            $.each(data, function (i, item) {

                                if (item.id) {
                                    options = options + `<option value='` + item.assign_user_id + `'>` + item.name + `</option>`;

                                }
                            });
                            $("#bookers").append(options);
                            $('#bookers').SumoSelect();

                        }

                    });

                }, 500);
            }

            if (title == 9) {

                $("#current_carrier").empty();
                var options = "<option selected value=''>Select Carrier</option>";
                $.ajax({

                    type: "GET",
                    url: "/get_carrier",
                    data: {'order_id': order_id},
                    dataType: "json",

                    success: function (data) {
                        $.each(data, function (i, item) {

                            if (item.id) {
                                options = options + `<option value='` + item.id + `'>` + item.companyname + `</option>`;

                            }
                        });
                        //$("#current_carrier").remove();
                        $("#current_carrier").append(options);
                    },
                    error: function (e) {
                        alert("error");
                    }

                });

            }

            if (title == 11) {
                $('#pickup_date').val(driver_pickup_date);
                $('#deliver_date').val(driver_deliver_date);
            }


            get_count(order_id, phoneno);

        });
    }

    function get_count(order_id, phoneno) {

        $.ajax({

            url: "/get_count",
            type: "GET",
            data: {order_id: order_id},
            contentType: "application/json",
            dataType: "json",
            async: false,
            success: function (data) {

                $("#phoneno2").html("Call + " + phoneno + "-XX(" + data.phone + ")");
                $("#smscount").html("SMS (" + data.sms + ")");
                $("#emailcount").html("Email (" + data.email + ")");

                $("#order_id1").val(order_id);

            }

        });

        $.ajax({

            url: "/show_count_click",
            type: "GET",
            data: {id: order_id},
            success: function (data) {
                if (data.length > 0) {
                    $('#lock_text').html('');
                    $('#lock_text').html(data.trim());

                } else {
                    $('#lock_text').html('NO Data FOUND');
                }

            }, complete: function () {
                $('#largemodal').modal('show');
            }

        });
    }


    function count_user(type) {

        var order_id = $('#order_id1').val();
        var client_name = $('#customername').val();
        var client_email = $('#customeremail').val();
        var pstatus = $('#pstatus2').val();
        var client_phone = $('#phoneno').val();
        var email_text = $('#editor').html();
        var data = {
            order_id: order_id,
            pstatus: pstatus,
            client_email: client_email,
            client_name: client_name,
            type: type,

        };

        $.ajax({
            type: "GET",
            url: '/count_user',
            dataType: "json",
            data: data,
            beforeSend: function () {

            },
            success: function (response) {
                if (response) {

                    //var lock_text = $('#lock_text').val();

                    if (type == '1') {
                        $("#phoneno2").html('');
                        $("#phoneno2").html("Call + " + client_phone + "-XX(" + response + ")\n");
                    }
                    if (type == '2') {
                        $("#smscount").html('');
                        $("#smscount").html("SMS (" + response + ")");
                    }
                    if (type == '3') {
                        $("#emailcount").html('');
                        $("#emailcount").html("Email (" + response + ")");

                        $.ajax({
                            url: '/send_email_editor',
                            type: 'post',
                            data: {
                                '_token': '{{csrf_token()}}',
                                client_email: client_email,
                                email_text: email_text
                            },
                            success: function (data) {
                                //alert("Email has been sent");
                                $('#largemodal').modal('hide');
                                return $.growl.notice({
                                    message: "Email send Successfully"
                                });

                            }

                        });

                    }


                    //window.location.href = "rcmobile://call?number=" + client_phone;


                }

            },
        });

        $.ajax({

            url: "/show_count_click",
            type: "GET",
            data: {id: order_id},
            success: function (data) {
                if (data.length > 0) {
                    $('#lock_text').html('');
                    $('#lock_text').html(data.trim());

                } else {
                    $('#lock_text').html('NO Data FOUND');
                }

            }, complete: function () {
                $('#largemodal').modal('show');
            }

        });
    }


    function regain_count() {
        function count_user(type) {

            var order_id = $('#order_id1').val();
            var client_name = $('#customername').val();
            var client_email = $('#customeremail').val();
            var pstatus = $('#pstatus2').val();
            var client_phone = $('#phoneno').val();
            var email_text = $('#editor').html();
            var data = {
                order_id: order_id,
                pstatus: pstatus,
                client_email: client_email,
                client_name: client_name,
                type: type,

            };

            $.ajax({
                type: "GET",
                url: '/count_user',
                dataType: "json",
                data: data,
                beforeSend: function () {

                },
                success: function (response) {
                    if (response) {

                        //var lock_text = $('#lock_text').val();

                        if (type == '1') {
                            $("#phoneno2").html('');
                            $("#phoneno2").html("Call + " + client_phone + "-XX(" + response + ")\n");
                        }
                        if (type == '2') {
                            $("#smscount").html('');
                            $("#smscount").html("SMS (" + response + ")");
                        }
                        if (type == '3') {
                            $("#emailcount").html('');
                            $("#emailcount").html("Email (" + response + ")");

                            $.ajax({
                                url: '/send_email_editor',
                                type: 'post',
                                data: {
                                    '_token': '{{csrf_token()}}',
                                    client_email: client_email,
                                    email_text: email_text
                                },
                                success: function (data) {
                                    //alert("Email has been sent");
                                    $('#largemodal').modal('hide');
                                    return $.growl.notice({
                                        message: "Email send Successfully"
                                    });

                                }

                            });

                        }


                        //window.location.href = "rcmobile://call?number=" + client_phone;


                    }

                },
            });

            $.ajax({

                url: "/show_count_click",
                type: "GET",
                data: {id: order_id},
                success: function (data) {
                    if (data.length > 0) {
                        $('#lock_text').html('');
                        $('#lock_text').html(data.trim());

                    } else {
                        $('#lock_text').html('NO Data FOUND');
                    }

                }, complete: function () {
                    $('#largemodal').modal('show');
                }

            });
        }

    }


</script>

<script>
    $(".search_show").hide();

    $(".search_btn").click(function () {
        $(".search_show").toggle();
    });
    $("#p_tb").click(function () {
        $(".search_show").hide();
    });


    $("#form").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "/send_order_link",
            type: "POST",
            data: new FormData(this),

            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

            },
            success: function (data) {

                let test = data.toString();

                let test2 = $.trim(test);
                let text = "SUCCESS";
                if (test2 == text) {

                    $('#success').html(data);
                    $('#modaldemo4').modal('show');
                    $('#reportmodal').modal('hide');

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


</script>


<script>

    $("#p_tb").click(function () {
        $('#search_form').hide();
        $('#table_data').html('');

    });


    $("body").delegate("#keywords", "click", function () {
        setTimeout(function () {
            $('input[name="keywords"]').focus()
        }, 100);
    });

    $("body").delegate("#search_by", "change", function () {

        var search_by = $('#search_by').val();
        if (search_by == "ophone") {

            $("#keywords").mask("(999) 999-9999");
            setTimeout(function () {
                $('input[name="keywords"]').focus()
            }, 100);
        } else {
            $("#keywords").unmask();
            setTimeout(function () {
                $('input[name="keywords"]').focus()
            }, 100);

        }
    });
</script>
<script>
    function return_data() {

        var search_by = $('#search_by').val();
        var val = $('#keywords').val();
        var p_status = $('#p_status').val();
        var paynal_type = $('#paynal_type').val();

        if (val.length > 0) {

            $('#table_data').html('');
            $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
            $.ajax({

                url: "/return_data",
                type: "GET",
                data: {val: val, search_by: search_by, p_status: p_status, paynal_type: paynal_type},
                success: function (data) {
                    $('#table_data').html('');
                    $('#table_data').html(data);
                },
                complete: function (data) {
                    $('#ldss').hide();
                    //regain();
                }

            });
        }
    }


</script>







<script>


    $(document).ready(function () {


        $('#paynal_type').SumoSelect();
        $('#search_by').SumoSelect();

        $(document).on('click', '.pagination a', function (event) {

            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data3(page);

        });


        function fetch_data3(page) {
            var pstatus = $('#pstatus').val();

            $('#table_data').html('');
            $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);

            $.ajax({

                url: "get_data/" + pstatus + "/?page=" + page,
                success: function (data) {
                    $('#table_data').html('');
                    $('#table_data').html(data);

                },
                complete: function (data) {
                    $('#ldss').hide();
                    //regain();
                }

            })

        }
    });


    $(document).ready(function () {
        $.ajax({

            url: "/get_menu_setting",
            type: "get",
            dataType: "json",
            success: function (data) {
                var header = data["header_menu"];
                var sub_header = data["sub_menu"];
                $("#" + header).trigger('click');
                $("#" + sub_header).trigger('click');
            },
        });
    });


    $('#reportmodal').on('show.bs.modal', function (e) {

        //get data-id attribute of the clicked element
        var orderId = $(e.relatedTarget).data('book-id');

        //populate the textbox
        var encryptvuserid = btoa({{Auth::user()->id}});
        var encryptvoderid = btoa(orderId);
        var linkv = "{{url('/email_order/')}}" + '/' + encryptvoderid + '/' + encryptvuserid;
        $(e.currentTarget).find('input[name="orderid"]').val(orderId);
        $(e.currentTarget).find('input[name="link"]').val(linkv);
    });


</script>





@endsection