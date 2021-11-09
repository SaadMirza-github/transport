<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('partials.order.head')
</head>

<body class="h-100vh bg-primary">

    @yield('content')

    @include('partials.order.foot')

    @yield('extraScript')

</body>
</html>
