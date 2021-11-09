@include('partials.mainsite_pages.return_function')


<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Employee Performance</div>
            </div>
            <div class="card-body">
                <div class="chartjs-wrapper-demo">
                    <div id="chart3" class="h-300 mh-300" style="min-height: 355px; !important;"></div>
                </div>
            </div>
        </div>
    </div><!-- col-6 -->
    <div class="col-sm-12 col-lg-6"><!-- col-6 -->
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Total Orders</div>
            </div>
            <div class="card-body">
                <div id="chartContainer" class="h-300 mh-300" style="min-height: 355px; !important;"></div>
            </div>
        </div>

    </div>
</div>
<!-- /Row -->
@php
    $totalorder=0;
    $totalsms=0;
    $totalemail=0;
    $totalcall=0;
    $totalhistory=0;
@endphp
@foreach($data as $datarow)
    @php
        $totalorder=$totalorder+1;
        $totalsms=$totalsms+$datarow->total_sms;
        $totalemail=$totalemail+$datarow->total_email;
        $totalcall=$totalcall+$datarow->total_call;
        $totalhistory=$totalhistory+$datarow->call_history;
    @endphp
@endforeach

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    var options = {
        animationEnabled: true,
        title: {
            text: ""
        },
        axisY: {
            title: "",
            suffix: ""
        },
        axisX: {
            title: "Total Order"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.0#" % "",
            dataPoints: [
                {label: "Tot Orders", y: <?php echo $totalorder;?>},
                {label: "Tot SMS", y: <?php echo $totalsms;?>},
                {label: "Email", y: <?php echo $totalemail;?>},
                {label: "Call", y: <?php echo $totalcall;?>},
                {label: "History", y: <?php echo $totalhistory;?>}


            ]
        }]
    };
    $("#chartContainer").CanvasJSChart(options);

        <?php $datee = date('Y'); ?>
    var options3 = {
            series: [{
                name: 'New Order',
                data: [
                    <?php
                    for ($a = 0; $a < 6; $a++) {
                        echo $chart[$a] . ',';
                    }
                    ?>

                ]
            }, {
                name: 'Interested',
                data: [
                    <?php
                    for ($a = 6; $a < 12; $a++) {
                        echo $chart[$a] . ',';
                    }
                    ?>

                ]
            }, {
                name: 'Follow More',
                data: [
                    <?php
                    for ($a = 12; $a < 18; $a++) {
                        echo $chart[$a] . ',';
                    }
                    ?>
                ]
            }, {
                name: 'AskingLow',
                data: [
                    <?php
                    for ($a = 18; $a < 24; $a++) {
                        echo $chart[$a] . ',';
                    }
                    ?>
                ]
            }, {
                name: 'NotInterested',
                data: [
                    <?php
                    for ($a = 24; $a < 30; $a++) {
                        echo $chart[$a] . ',';
                    }
                    ?>
                ]
            }
                , {
                    name: 'NoResponse',
                    data: [
                        <?php
                        for ($a = 30; $a < 36; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'TimeQuote',
                    data: [
                        <?php
                        for ($a = 36; $a < 42; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'PaymentMissing',
                    data: [
                        <?php
                        for ($a = 42; $a < 48; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Booked',
                    data: [
                        <?php
                        for ($a = 48; $a < 54; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Listed',
                    data: [
                        <?php
                        for ($a = 54; $a < 60; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Dispatch',
                    data: [
                        <?php
                        for ($a = 60; $a < 66; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Pickup',
                    data: [
                        <?php
                        for ($a = 66; $a < 72; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Delivered',
                    data: [
                        <?php
                        for ($a = 72; $a < 78; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Completed',
                    data: [
                        <?php
                        for ($a = 78; $a < 84; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Cancel',
                    data: [
                        <?php
                        for ($a = 84; $a < 90; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }
                , {
                    name: 'Deleted',
                    data: [
                        <?php
                        for ($a = 90; $a < 96; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }

            ],
            colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09', '#fcbf09'],
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
                categories: ['{{$datee}}' ,{{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}],
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
    var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
    chart3.render();
</script>
