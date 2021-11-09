@include('partials.mainsite_pages.return_function')
@extends('layouts.mainsite')

@section('template_title')
    QA Portal
@endsection

@section('content')
    <style>
        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }

        .table > thead > tr > th {
            font-weight: 800 !important;
            font-size: 22px !important;
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
        <li><a href="./dashboard">Home</a></li>
        <li><a>Quality Assurance</a></li>
    </ul>

    <div class="card">
        <div class="card-header">
            <div class="card-title">QA-Portal</div>
        </div>
        <div class="card-body">
            <form action="#" method="post" id="qa_submit">
                @csrf
                <div class="row">

                    <div class="col-md-12 padding_bottom">
                        <button onclick="getuser(2);" type="button" id="ordertaker"
                                class="department btn btn-md btn-primary">Order Taker
                        </button>
                        <button onclick="getuser(3);" type="button" id="dispatcher"
                                class="department btn btn-md btn-primary">Dispatcher
                        </button>

                        <input style="float: right;width: 21%;height: 36px;margin-bottom: 9px;" class="form-control" type="month" id="monthv" value="{{date('Y-m')}}"  name="monthv" required/>

                    </div>

                    <div id="userplace" class="col-md-10 padding_bottom">

                    </div>

                </div>
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
                <div class="col-md-12 col-md-offset-5">
                    <input class="btn btn-info " name="submit" id="sm"
                           type="submit"
                           value="Save and Insert">
                </div>
            </form>

        </div>
    </div>

@endsection

@section('extraScript')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script>

        $(document).ready(function () {

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


        });




        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }


        $("#qa_submit").on('submit', (function (e) {
            $("#sm").val('Loading...');
            e.preventDefault();
            $.ajax({

                url: "/qa_submit",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                },
                success: function (data) {
                    $("#sm").val('Save and Insert');
                    var success = data.trim();
                    if(success === 'SUCCESS'){
                        return $.growl.notice({
                            message: "Successfully Saved"
                        });
                    }

                },
                error: function (e) {

                }
            });
        }));

        function getuser(id) {

            var id = id;
            $.ajax({
                type: 'get',
                url: '/get_ordertaker_dispatcher',
                data: {id: id},
                success: function (data) {
                    $('#userplace').html('');
                    $.each(data, function (k, v) {
                        $.each(this, function (k, v) {
                            $('#userplace').append(`
                        <button type="button" onclick="getorders(` + v.id + `,'` + v.name + `');" id="desg` + v.id + `" class="desg btn btn-dark mb-2">` + v.name + `</button>
                               `);
                        });
                    });


                }
            });
        }

        function getorders(employeeid, ccc1) {
            var employeeid = employeeid;
            var monthv = $('#monthv').val();


            $('#maintable_data').html('');
            //$('#emp_id').val(employeeid);
            $.ajax({
                type: 'get',
                url: '/get_orders_qa',
                data: {employeeid: employeeid,monthv:monthv},
                success: function (data) {

                    $.each(data.get_user_orders, function (k, v) {

                        $('#maintable_data').append(`

                     <tr>
                        <td>` + ccc1 + `</td>
                        <td>` + v.created_at + `</td>
                        <td>` + v.order_id + `</td>
                        <td><input name='comments[]' value='${(v.comments !== null ? v.comments: '')}' placeholder='Max Length 30' class='form-control' maxlength='30'></td>
                       <td>
                        <div class='rating-stars text-center'>
                                <ul class='stars  padd' id='stars1'>
                                <li class='star ${(v.ratting >=1 ? 'selected': '')}' title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >=2 ? 'selected': '')}'  title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >=3 ? 'selected': '')}'  title='Satisfactory' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >=4 ? 'selected': '')}'  title='Good' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star ${(v.ratting >=5 ? 'selected': '')}'  title='Excellent' data-value='5'>
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