@extends('layouts.mainsite')

@section('template_title')
    <?php echo $titlee = "COMPLTETED ORDERS"; ?>
@endsection

@section('content')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
   <style>
       td.details-control {
           background: url({{url('public').'/details_open.png'}}) no-repeat center center;
           cursor: pointer;
       }
       tr.details td.details-control {
           background: url({{url('public').'/details_close.png'}}) no-repeat center center;
       }
       .span_style{
           color:mediumblue;
           font-weight:700;
       }
   </style>

    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    <ul class="breadcrumb">
        <li><a href="./dashboard">Home</a></li>
        <li><a>COMPLETED ORDERS LIST</a></li>
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
                        <div class="card-title">All Completed Orders</div>
                        <form action="/get_all_completed_order" method="get" style=" display: contents; " >
                            <label class="form-label p-2" style="margin-left:auto">Select Month</label>
                            <input type="month"  name="monthyear" id="monthyear" class="form-control w-25" value="{{date('Y-m')}}" />
                            <input type="button" onclick="get_month()" class="btn btn-primary w-25 ml-2" name="display" value="Display"/>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="table_data">
                            @include('main.management2.show_all_completed')
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



                $.ajax({

                    url: "/get_completed_orders?page=" + page,
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
                url = "/get_completed_orders?monthyear="+ monthyear;
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


    <script>

        function format ( d ) {
            return `<div id='pay_log${d[0]}'></div>`;
        }

        $(document).ready(function() {
            var dt = $('#example4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'print',
                ],
                "ordering": false,
                aLengthMenu: [[100, 125, 150, -1], [100, 125, 150, "All"]],
                "bDestroy": true

            } );

            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#example4 tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );
                var data_row = row.data();

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    row.child( format( row.data() ) ).show();
                    $.ajax({
                        data:{orderid:data_row[0]},
                        url: "/show_payment_logs",
                        type: "GET",
                        success: function (data) {
                            var obj = jQuery.parseJSON(data);
                            var merge = "";
                            $.each(obj, function(key,value) {
                                merge = merge +` <h5 class="list-group-item">
                                -- Pay Type:
                                <span class="span_style">${value.pay_type} </span>
                                -- Pay On:
                                <span class="span_style">${value.pay_location}</span>
                                -- Pay By:
                                <span class="span_style">${value.pay_method}</span>
                                -- Amount:
                                <span class="span_style">${value.amount}</span>`
                            });

                            $(`#pay_log${data_row[0]}`).html(merge);
                        }
                    });

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            } );

            // On each draw, loop over the `detailRows` array and show any child rows
            dt.on( 'draw', function () {
                $.each( detailRows, function ( i, id ) {
                    $('#'+id+' td.details-control').trigger( 'click' );
                } );
            } );
        } );


        function payment_log_regain() {


            var dt = $('#example4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'print',
                ],
                "ordering": false,
                aLengthMenu: [[100, 125, 150, -1], [100, 125, 150, "All"]],
                "bDestroy": true

            } );

            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#example4 tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );
                var data_row = row.data();

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    row.child( format( row.data() ) ).show();
                    $.ajax({
                        data:{orderid:data_row[0]},
                        url: "/show_payment_logs",
                        type: "GET",
                        success: function (data) {
                            var obj = jQuery.parseJSON(data);
                            var merge = "";
                            var amount=0;
                            var profit=0;
                            $.each(obj, function(key,value) {
                                amount=amount+value.amount;
                                profit=value.profit;
                                merge = merge +` <h5 class="list-group-item">
                                -- Pay Type:
                                <span class="span_style">${value.pay_type} </span>
                                -- Pay On:
                                <span class="span_style">${value.pay_location}</span>
                                -- Pay By:
                                <span class="span_style">${value.pay_method}</span>
                                -- Amount:
                                <span class="span_style">${value.amount}</span>
                                
                                `

                            });
                            merge = merge + ` <br><br> --Total Amount <span class="span_style">` + amount + `</span>`;
                            merge = merge + `--Total Profit <span class="span_style">` + profit + `</span>`;
                            $(`#pay_log${data_row[0]}`).html(merge);
                        }
                    });

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            } );

            // On each draw, loop over the `detailRows` array and show any child rows
            dt.on( 'draw', function () {
                $.each( detailRows, function ( i, id ) {
                    $('#'+id+' td.details-control').trigger( 'click' );
                } );
            } );

        }

    </script>

    <!--Scrolling Modal-->

@endsection


