@extends('layouts.innerpages')

@section('template_title')
    {{  ucfirst(trim("$_SERVER[REQUEST_URI]",'/'))}}
@endsection

@section('content')
    <style>
        select.custom-select.custom-select-sm.form-control.form-control-sm {
            height: 29px;
        }
    </style>

    <!--/app header-->                                                <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">{{  ucfirst(trim("$_SERVER[REQUEST_URI]",'/'))}}</h4>
            <input type="hidden" value="{{trim("$_SERVER[REQUEST_URI]",'/')}}" id="titlee">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Tables</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Carriers</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">

                <a href="" class="btn btn-info" data-toggle="modal" data-target="#carrirermodal">
                    <i class="fe fe-settings mr-1"></i> Add Carriers</a>
            </div>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->


    <div class="row">
        <div class="col-12">

            @if(session('flash_message'))
                <div class="alert alert-success">
                    {{session('flash_message')}}
                </div>
        @endif
        <!--div-->
            <div class="card">
                <div class="card-body">
                    <div id="table_data">
                        @include('main.phone_quote.carrier.load')
                    </div>
                </div>
            </div>

        </div>

    </div><!-- end app-content-->






@endsection

@section('extraScript')
    <!--Scrolling Modal-->
@endsection


