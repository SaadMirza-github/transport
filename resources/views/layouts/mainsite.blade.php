<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('partials.mainsite_p.head')
    <?php

    if(!isset($data_array)){
        $data_array = array();
    }
    ?>


</head>
<style>
    .btn-sidebar {
        box-shadow: 5px 5px #888888b3;
        margin-right: 11px;
        margin-top: 24px;
    }

    .fa-caret-right {
        font-size: 100px !important;
        color: rgb(0 0 0) !important;
        margin-top: 1pc !important;
    }

    .demo_changer .form_holder {
        height: 106vh !important;
    }

    .show_buttons i.fa {
        color: rgb(255 255 255) !important;
    }

    .fa-style {
        font-size: 28px !important;
        width: auto !important;
        padding: 0px !important;
        margin: 5px !important;
        height: auto !important;
    }

    /* Style the list */
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: transparent;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li + li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    .predefined_styles {
        width: 100% !important;
    }
</style>

<body class="app sidebar-mini">

<!-- Start Switcher -->

<div class="switcher-wrapper">
    <div class="demo_changer">
        <div class="demo-icon bg_dark"><i class="fa fa-caret-left  text_primary check_icon"></i></div>
        <div class="form_holder switcher-sidebar">
            <div class="row">

                <div class="predefined_styles">
                    <div class="swichermainleft">
                        <div class="row side_button pt-3">
                            {{--<a href="https://laravel.spruko.com/admitro/" class="btn btn-primary btn-sm mt-0"><i--}}
                            {{--class="fa fa-phone" aria-hidden="true"></i>Calling Dashboard</a>--}}
                            {{--<a href="#" class="btn btn-secondary btn-sm"> <i class="fa fa-ship"--}}
                            {{--aria-hidden="true"></i>--}}
                            {{--Ship Dashboard</a>--}}
                            {{--<a href="https://themeforest.net/user/sprukosoft/portfolio"--}}
                            {{--class="btn btn-warning btn-sm"><i class="fa fa-truck" aria-hidden="true"></i>--}}
                            {{--Heavy Dashboard</a>--}}
                        </div>
                    </div>
                        @if(\Auth::user()->role == 1)
                            <div style="padding-bottom: 0px;">
                                <a class="btn btn-outline-info  btn-xs btn-sidebar view_buttons" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="View All Buttons">
                                    <i class="fa fa-unlock fa-style fa-fw lock" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="row" style="padding-bottom: 0px;padding: 18px;">

                            <br>
                            <div class="side_button show_buttons" style='padding: 10px 0px 0px 31px;'>

                                <a href="" class="btn btn-warning  btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Order On Phone">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Generate Form Link">
                                    <i class="fa fa-chain" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Sticky Note">
                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-success btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Employee Status">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Add Employee">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Edit Employee">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-pink btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Check Payment">
                                    <i class="fa fa-unlock" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-blue btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="SMS">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-purple btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="searchOrder" id="searchOrder">
                                    <i class="fa fa-search " aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Email">
                                    <i class="fa fa-internet-explorer" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-success btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Attendace">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="View Daily Report">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="View Report">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-warning btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Add Card Info">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Call Reminder">
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                </a>
                                <a href="/click_to_count" class="btn btn-dark btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Total Clicks">
                                    <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                                </a>
                                <a href="/day_count" class="btn btn-pink btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Day Counts">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="View Cards">
                                    <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Find Price">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-success btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Check Relist">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Phone">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Price Setting">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Payment Missing">
                                    <i class="fa fa-dollar" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-success btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Carrier Update">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Generate Invoice">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="ADD CARRIER">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-warning btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Total Carriers">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="ASSIGN YEARLY ORDER">
                                    <i class="fa fa-cube" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="ASSIGN YEARLY ORDER">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-info btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="SD">
                                    <label style=" font-size: 15px;font-weight: 900; ">SD</label>
                                </a>
                                <a href="" class="btn btn-primary btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="AM">
                                    <label style=" font-size: 15px;font-weight: 900; "> AM</label>
                                </a>
                                <a href="" class="btn btn-success  btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="DP">
                                    <label style=" font-size: 15px;font-weight: 900; ">DP</label>
                                </a>
                                <a href="" class="btn btn-warning btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Book">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs btn-sidebar" data-toggle="tooltip"
                                   data-placement="top" title="Owes Money">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>

                            </div>
                            <br>
                            <br>

                        </div>
                        @else
                            <div class="row" style="padding-bottom: 0px;padding: 18px;">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">All Orders <strong
                                                        style="float: right">({{$total_orders}})</strong></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <div id="chart12" class="h-300 mh-300"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
                {{--<div class="p-l-0" style='width: 100%;'>--}}
                {{--<div class="card text-center overflow-hidden">--}}
                {{--<h3 style=" padding-top: 23px; ">Daily Tasks</h3>--}}
                {{--<canvas id="myChart" style="width:100%;max-width:600px"></canvas>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->


<!---Global-loader-->
<div id="global-loader">
    <img src="{{ url('assets/images/svgs/loader.svg')}}" alt="loader">
</div>
<!--- End Global-loader-->
<!-- Page -->
<div class="page">
    <div class="page-main">
        {{--sidebar start--}}
        {{--@include('partials.mainsite_p.sidebar')--}}
        {{--sidebarend--}}

        <div class="app-content main-content">
            <div class="side-app">
                <!--nav header-->
            @include('partials.mainsite_p.nav')
            <!--/nav header-->

                <!--/content-->
                @yield('content')


            </div>
        </div>
        <!-- End app-content-->
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2020 <a href="/dashboard">autotransportgo.</a>. Designed by <a href="/dashboard">IT
                        Team</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>

</div><!-- End Page -->

<style>

</style>

@include('partials.mainsite_p.foot')

@yield('extraScript')


<script>

    $(document).ready(function () {
//        $('.show_buttons').hide();
        $(".view_buttons").click(function () {
            $('.show_buttons').slideToggle();
            if ($(".lock").hasClass("fa-unlock")) {
                $('.lock').toggleClass('fa-unlock fa-lock');
            }

            else if ($(".lock").hasClass("fa-lock")) {
                $('.lock').toggleClass('fa-lock fa-unlock');
            }
        });

    });


            var options11 = {
                series: [44, 55, 67, 83],
                chart: {
                    height: 300,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: false,
                                label: 'Total',
                                formatter: function (w) {
                                    // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                    return 249
                                }
                            }
                        }
                    }
                },
                labels: ['Manager', 'QA', 'Dispatcher', 'Order Taker'],
                colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
            };
            var chart11 = new ApexCharts(document.querySelector("#chart11"), options11);
            chart11.render();

            @if(count($data_array))

                var options12 = {

                        series: [{{ $data_array['new'] }},{{$data_array['listed']}},{{$data_array['active']}}, {{ $data_array['booked']}}, {{$data_array['deliver'] }}, {{$data_array['dispatch']}},{{$data_array['picked_up']}},{{$data_array['deliver']}}],
                        colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
                        chart: {
                            height: 300,
                            type: 'pie',
                        },
                        labels: ['new', 'listed', 'active', 'booked', 'deliver', 'dispatch', 'picked up', 'deliver'],
                        legend: {
                            show: false,
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    show: false,
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    var chart12 = new ApexCharts(document.querySelector("#chart12"), options12);
                    chart12.render();

            @endif


    var options14 = {
            series: [44, 55, 67, 83],
            colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
            chart: {
                height: 300,
                type: 'pie',
            },
            labels: ['new', 'listed', 'active', 'booked', 'deliver', 'dispatch', 'picked up', 'deliver'],
            legend: {
                show: false,
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: false,
                        position: 'bottom'
                    }
                }
            }]
        };
    var chart14 = new ApexCharts(document.querySelector("#chart14"), options14);
    chart14.render();


    var xValues = ["Achieved", "Not Achieved"];
    var yValues = [70, 30];
    var barColors = [
        "#000bce",
        "#0088ff"
    ];

    new Chart("myChart", {
        type: "doughnut",
        data: {

            datasets: [{
                data: yValues,
                backgroundColor: barColors

            }],
            labels: xValues
        },
        options: {
            title: {
                display: false,
                text: ""
            }
        }
    });
</script>
</body>
</html>
