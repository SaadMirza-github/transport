<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('partials.chat.head')
</head>

<body class="app sidebar-mini">

<!-- Start Switcher -->
<div class="switcher-wrapper">
    <div class="demo_changer">
        <div class="demo-icon"><i class="fa fa-exclamation-triangle fa-blink  text_primary"
                                  style="color: red;font-size: 30px; "></i></div>
        <div class="form_holder switcher-sidebar">
            <div class="row">
                <div class="predefined_styles" style=" width: 100%; ">
                    <div class="swichermainleft">

                        <div class="card overflow-hidden">
                            <div class="card-header bg-info ">
                                <h3 class="card-title text-white">Work Title</h3>

                            </div>
                            <div class="card-body">
                                <h5>some work</h5>
                                <h6>24/08/2021</h6>
                            </div>
                            <div class="card-footer">

                                <a href="" class="btn btn-info btn-sm">Done</a>
                                <a href="" class="btn btn-secondary btn-sm ml-2">Reject</a>

                            </div>
                        </div>
                    </div>

                </div>
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
        
        <div class="app-content main-content">
            <div class="side-app">
                <!--nav header-->
            @include('partials.mainsite_pages.nav')
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
                    Copyright © {{date('Y')}} <a href="{{url('/dashboard')}}">SHIPA1</a>. Designed by <a  href="{{url('/dashboard')}}">SHIPA1
                        IT DEPARTMENT </a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>

</div><!-- End Page -->

@include('partials.chat.foot')

@yield('extraScript')


</body>
</html>
