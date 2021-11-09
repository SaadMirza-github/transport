@extends('layouts.innerpages')

@section('template_title')
    Add Carrier
@endsection
@include('partials.mainsite_pages.return_function')
<style>
    .oauc {
        padding: 11px;
        width: 100%;
    }

    .dauc {
        padding: 11px;
        width: 100%;
    }
</style>

@section('content')

    <div class="page-header">
        <div class="page-leftheader">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Carrier</a></li>
            </ol>
        </div>

    </div>
    <!--End Page header-->
    <!-- Row -->

    <form action="/store_carrier" id="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <input type="hidden" name="orderid" value="{{ $orderid }}">

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-3"><h1>Add Carrier</h1></div>
                        <h3 class="page-title mb-0 w-85" style="display: flex;flex-direction: row-reverse;">Order Id
                            : {{ $orderid }} </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-title font-weight-bold"></div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" required name="company_name" class="form-control model0"

                                           placeholder="Enter Company Name">
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" required name="location" class="form-control" id="location"
                                           placeholder="Enter Location">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">MC#</label>
                                    <input type="text" required name="mc_no" class="form-control" id="mcno"
                                           placeholder="MC#">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Company Phone# (999) 999-9999</label>
                                    <input type="text" required name="companyphone" id="companyphone"
                                           class="form-control ophone"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Driver Phone# (999) 999-9999</label>
                                    <input type="text" required name="driverphone" id="driverphone"
                                           class="form-control ophone"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Est. Pickup</label>
                                    <input type="date" required name="pickupdate" id="pickupdate" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Est. Deliveryp</label>
                                    <input type="date" required name="deliverydate" id="deliverydate"
                                           class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Ask Price</label>
                                    <input type="number" required name="askprice" id="askprice" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    </br>
                                    <input type="checkbox" name="askinsurance" id="askinsurance" class="" value="1"/>
                                    Ask for insurance
                                    </br>
                                    <input type="checkbox" name="negative" id="negative" class="" value="1"/>
                                    Negative
                                    <div class="" id="negativeno">

                                        <!--  <input type="text" required name="negativenovalue" id="negativenovalue" class="" /> -->
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Comments</label>
                                    <textarea required name="comments" class="form-control" id="comments"
                                              placeholder="Enter Comments"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button id="sv_btn" type="submit" class="btn  btn-primary w-35">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>


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

@endsection

@section('extraScript')

    <script>
        $("body").delegate(".ophone", "focus", function () {
            $(".ophone").mask("(999) 999-9999");
            $(".ophone")[0].setSelectionRange(0, 0);
        });
        $(document).on('click', '#companyphone', function () {
            $("#companyphone").mask("(999) 999-9999");
        });
        $(document).on('click', '#driverphone', function () {
            $("#driverphone").mask("(999) 999-9999");
        });

        $(document).on('click', '#negative', function () {
            if ($('#negative').is(":checked")) {
                $('#negativeno').append(`<input type="text" required name="negativenovalue" id="negativenovalue" class="" />`);
            }
            else {

                $('#negativenovalue').remove();
            }
        });


        $(".model0").autocomplete({
            source: "/get_carrier_name"
        });

        $(".model0").change(function(){

            var carriername=$('.model0').val();
            $.ajax({
                url:'/get_carrier_detail',
                type: 'get',
                data: {carriername:carriername},
                success: function(data){

                    $('#location').val(data.location);
                    $('#mcno').val(data.mcno);
                    $('#companyphone').val(data.companyphoneno);
                    $('#driverphone').val(data.driverphoneno);
                    $('#pickupdate').val(data.est_pickupdate);
                    $('#deliverydate').val(data.est_deliverydate);
                    $('#askprice').val(data.askprice);
                    $('#comments').val(data.comments);
                    if(data.opt_insurance==1){
                        $("#askinsurance").prop("checked", true);
                    }
                    if(data.opt_negative==1){
                        //$("#negative").prop("checked", true);
                        $('#negative').trigger('click');

                        $('#negativenovalue').val(data.negative_no);


                    }

                }

            });
        });


    </script>

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

                    url: "/carrier_list?page=" + page,
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
    </script>

@endsection

