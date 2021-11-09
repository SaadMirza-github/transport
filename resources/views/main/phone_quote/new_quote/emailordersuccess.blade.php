@extends('layouts.payment')

@section('template_title')
    PAYMENT
@endsection
@include('partials.mainsite_pages.return_function')
@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="    border-bottom: 1px solid;">
                        <div class=" mb-0"><strong class="heading">Order has been saved </strong>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')


    <script>

        $(".app-sidebar").hide();
        $(".app-header").hide();
        $(".switcher-wrapper").hide();

    </script>



@endsection


