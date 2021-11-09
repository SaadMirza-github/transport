<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('partials.mainsite_pages.head')
</head>
<style>
    .header_show {
        cursor: pointer;
        height: 71px;
    }
</style>
<body class="app sidebar-mini">




<!---Global-loader-->
<div id="global-loader">
    <img src="{{ url('assets/images/svgs/loader.svg')}}" alt="loader">
</div>

<!--- End Global-loader-->
<!-- Page -->
<div class="page">
    <div class="page-main">


        <div class="app-content main-content">
            <div class="side-app" style=" margin-left: -24px; " >
                <!--nav header-->
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
                    Copyright © {{date('Y')}} <a href="{{url('/dashboard')}}">autotransportgo</a>. Designed by <a  href="{{url('/dashboard')}}">autotransportgo
                        IT Department</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>

</div><!-- End Page -->

@include('partials.mainsite_pages.foot')

@yield('extraScript')


</body>
</html>
