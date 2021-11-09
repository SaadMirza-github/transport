@include('partials.mainsite_pages.head')
        <!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('partials.mainsite_pages.head')
</head>
<body class="app sidebar-mini">

<!-- Start Switcher -->

<!-- End Switcher -->


<!---Global-loader-->
<div id="global-loader">
    <img src="{{ url('assets/images/svgs/loader.svg')}}" alt="loader">
</div>
<!--- End Global-loader-->
<!-- Page -->

<div class="page">

    @yield('content')




</div><!-- End Page -->

@include('partials.mainsite_pages.foot')

@yield('extraScript')


</body>
</html>
