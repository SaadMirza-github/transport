@include('partials.mainsite_pages.return_function')
<?php
function get_order_count($user_id, $monthyear, $ordertaker_or_dispatcher, $paneltype)
{

    $monthv = date('m', strtotime($monthyear));
    $yearv = date('Y', strtotime($monthyear));
    if ($ordertaker_or_dispatcher == 1) {
        $order_count = DB::table('auto_orders')
            ->where('booker_name', $user_id)
            ->whereMonth('created_at', $monthv)
            ->whereYear('created_at', $yearv)
            ->where('paynal_type', $paneltype)
            ->count();
    }
    if ($ordertaker_or_dispatcher == 2) {
        $order_count = DB::table('auto_orders')
            ->where('completer_id', $user_id)
            ->whereMonth('created_at', $monthv)
            ->whereYear('created_at', $yearv)
            ->where('paynal_type', $paneltype)
            ->count();
    }
    return $order_count;


}
?>
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
            font-size: 25px;
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

    <div>
        <div class="card w-100">
            <div class="card-header">
                <div class="card-title">Performance</div>
            </div>
            <div class="card-body">
                <div class="chartjs-wrapper-demo">
                    <div id="chart_pe" class="h-300 mh-300"></div>
                </div>
            </div>
        </div>
    </div><!-- col-6 -->

    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        var options3 = {
            series: [{
                name: 'Calling Bookeed/Completed',
                data: [
                    @foreach($users as $u1)
                    {{ get_order_count($u1->id,$monthyear,$ordertaker_or_dispatcher,'0') }},
                    @endforeach
                ]
            }, {
                name: 'Shipment Bookeed/Completed',
                data: [
                    @foreach($users as $u2)
                    {{ get_order_count($u2->id,$monthyear,$ordertaker_or_dispatcher,'1') }},
                    @endforeach
                ]
            }, {
                name: 'Heavy Bookeed/Completed',
                data: [
                    @foreach($users as $u3)
                    {{  get_order_count($u3->id,$monthyear,$ordertaker_or_dispatcher,'2') }},
                    @endforeach
                ]
            },
            ],
            colors: ['#705ec8', '#fa057a', '#2dce89'],
            chart: {
                type: 'bar',
                height: 340,
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                },
            },
            stroke: {
                width: 2,
                colors: ['#fff']
            },
            xaxis: {
                categories: [
                    @foreach($users as $u)
                        '{{get_user_name($u->id)}}',
                    @endforeach
                ],
                labels: {
                    formatter: function (val) {
                        return val + ""
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
                        return val + " ORDERS"
                    }
                }
            },
            fill: {
                opacity: 2
            },
            legend: {
                show: false,
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 10
            }
        };
        var chart_pe = new ApexCharts(document.querySelector("#chart_pe"), options3);
        chart_pe.render();

    </script>