@extends('layouts.innerpages')

@section('template_title')
    New
@endsection

@section('content')

    <!--/app header-->                                                <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Data Tables</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Tables</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Data Tables</a></li>
            </ol>
        </div>

    </div>
    <!--End Page header-->
    <!-- Row -->


    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Details Display DataTable</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example-1" class="table table-striped table-bordered text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Order-ID</th>
                                <th class="border-bottom-0">Pickup</th>
                                <th class="border-bottom-0">Delivery</th>
                                <th class="border-bottom-0">Vehicle-ID</th>
                                <th class="border-bottom-0">Order Price</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Ship On</th>
                                <th class="border-bottom-0">Modified</th>
                                <th class="border-bottom-0">Actions</th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>111<input style="display:none " id="" class='order_id' value="111"></td>
                                <td>Nixon</td>
                                <td>test</td>
                                <td>25478</td>
                                <td> $320,800</td>
                                <td>993654782454</td>
                                <td>2011/04/25</td>
                                <td>2011/05/15</td>

                                <td id='order_action'>
                                    <div class="btn-list">

                                        <button type="button" data-target="#modaldemo1" data-toggle="modal"
                                                class="btn btn-facebook updatee"><i
                                                class="fa fa-cloud-download mr-2"></i>View/Update
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-twitter"><i
                                                class="fa fa-edit mr-2"></i>Edit Listing
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-google"><i
                                                class="fa fa-road mr-2"></i>View Route
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-youtube"><i
                                                class="fa fa-trash mr-2"></i>Delete
                                        </button>

                                    </div>
                                </td>


                            </tr>

                            <tr>
                                <td>222<input style="display:none " id="" class='order_id' value="222"></td>
                                <td>Nixon</td>
                                <td>test</td>
                                <td>25478</td>
                                <td> $320,800</td>
                                <td>993654782454</td>
                                <td>2011/04/25</td>
                                <td>2011/05/15</td>

                                <td id='order_action'>
                                    <div class="btn-list">

                                        <button type="button" data-target="#modaldemo1" data-toggle="modal"
                                                class="btn btn-facebook updatee"><i
                                                class="fa fa-cloud-download mr-2"></i>View/Update
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-twitter"><i
                                                class="fa fa-edit mr-2"></i>Edit Listing
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-google"><i
                                                class="fa fa-road mr-2"></i>View Route
                                        </button>
                                        <br>
                                        <button type="button" class="btn btn-youtube"><i
                                                class="fa fa-trash mr-2"></i>Delete
                                        </button>

                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="modal" id="modaldemo1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Update Data</h6>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title font-weight-bold">Basic info:</div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Order-ID</label>
                                                <input type="text" class="form-control" id='order_id1'
                                                       placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">PickUp</label>
                                                <input type="name" id='order_pickup1' class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Delivery</label>
                                                <input type="text" id='order_delivery1' class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Vehicle-ID</label>
                                                <input type="number" id='order_vehicle1'
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input type="number" id='order_phone1' class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Order Price</label>
                                                <input type="text" id='order_priced1' class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Ship On</label>
                                                <input type="text" id='order_ship1' class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Modified On</label>
                                                <input type="text" id='order_modified1' class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-indigo" type="button">Save changes</button>
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /Row -->

        </div>
    </div><!-- end app-content-->


@endsection



@section('extraScript')
     <script>

         document.body.style.zoom = "80%";

     </script>
    <script>
        $(document).ready(function () {

            $(".updatee").click(function () {
                var order_id = $(this).closest('tr').find('.order_id').val();
                $("#order_id1").attr("value", order_id);
            });
        });
    </script>


@endsection

