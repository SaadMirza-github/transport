@extends('layouts.order')

@section('template_title')
    Login
@endsection

@section('content')
    <style>
        body{
            /*background-color: #0093E9;*/
            /*background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            */
            background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);


        }


        .btn-grad {
            background-image: linear-gradient( to right, #43CBFF 10%, #9708CC 100%);
        }

        /*.btn-grad {background-image: linear-gradient(to right, #1A2980 0%, #26D0CE  51%, #1A2980  100%)}*/
        .btn-grad {
            margin: -33px 0px 13px 9px;
            padding: 9px 0px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
            width: 93%;
        }

        .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }


    </style>
    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="page">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <div class="text-white">
                                <div class="card-body">
                                    <h2 class="display-4 mb-2 font-weight-bold error-text text-center"><strong>Verification</strong>
                                    </h2>
                                    <h4 class="text-white-80 mb-7 text-center">Verification</h4>
                                    <form action="{{ route('code_verify') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="password" value="{{ $password }}">
                                        <div class="row">
                                            <div class="col-9 d-block mx-auto">
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-check"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" name="verified"
                                                           placeholder="Verification code" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"/>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn-grad"><i
                                                        class="fe fe-send"></i> Verify
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{ route('resend_verify') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="password" value="{{ $password }}">
                                        <div class="pt-4 text-center">
                                            <div class="font-weight-normal fs-16">Forget it
                                                <button
                                                    class="btn-link font-weight-normal text-white-80" type="submit">
                                                    Resend
                                                    Verification
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="custom-btns text-center">
                                    <button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i
                                                class="fa fa-facebook-f"></i></span></button>
                                    <button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i
                                                class="fa fa-google"></i></span></button>
                                    <button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i
                                                class="fa fa-twitter"></i></span></button>
                                    <button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i
                                                class="fa fa-pinterest-p"></i></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-flex align-items-center">
                        {{--<img src="{{ url('assets/images/png/login.png') }}" alt="img">--}}
                        <img src="/public/assets/images/pictures/truck_image1.png" alt="img">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extraScript')




@endsection

