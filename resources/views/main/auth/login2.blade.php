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
            margin: 10px;
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
    @if(session('flash_message'))
        <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  {{session('flash_message')}}</div>
    @endif
    <div class="page">
        <div class="page-content">
            <div class="container">
                <form action="{{ route('getlogin2') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <div class="text-white">
                                    <div class="card-body">
                                        <h2 class="display-4 mb-2 font-weight-bold error-text text-center">
                                            <strong>Login</strong></h2>
                                        <h4 class="text-white-80 mb-7 text-center">Signn In to your account</h4>
                                        <div class="row">
                                            <div class="col-9 d-block mx-auto">
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    </div>
                                                    <input id="email" type="email"
                                                           class="form-control"
                                                           name="email" value="" required autofocus>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-lock"></i>
                                                        </div>
                                                    </div>
                                                    <input id="password" type="password" class="form-control"
                                                           name="password" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" id="loginBtn"
                                                                class="btn-grad ">
                                                            Login
                                                        </button>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <a href="/password/reset"
                                                           class="btn btn-link box-shadow-0 px-0 text-white-80">Forgot
                                                            password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center pt-4">
                                            <div class="font-weight-normal fs-16">You Don't have an account <a
                                                    class="btn-link font-weight-normal text-white-80" href="#">Register
                                                    Here</a>
                                            </div>
                                        </div>
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
                            {{--<img src="assets/images/png/login.png" alt="img">--}}
                            <img src="/public/assets/images/pictures/truck_image1.png" alt="img">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('extraScript')


@endsection

