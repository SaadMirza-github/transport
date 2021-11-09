
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
          content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

    <!-- Title -->
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>


    <!--Favicon -->
    <link rel="icon" href="{{ url('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">





    <link rel="stylesheet" href="{{ url('assets/js/jquery-ui-1.12.1/jquery-ui.min.css')}}">

    <!-- Style css -->
    <link href="{{ url('assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{ url('assets/css/dark.css')}}" rel="stylesheet"/>
    <link href="{{ url('assets/css/skin-modes.css')}}" rel="stylesheet"/>


    <!-- Animate css -->
    <link href="{{ url('assets/css/animated.css')}}" rel="stylesheet"/>

    <!--Sidemenu css -->
    <link href="{{ url('assets/css/sidemenu.css')}}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ url('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet"/>

    <!---Icons css-->
    <link href="{{ url('assets/css/icons.css')}}" rel="stylesheet"/>

    <!-- Data table css -->
    <link href="{{ url('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{ url('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ url('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>

    <!-- INTERNAL Select2 css -->
    {{--<link href="{{ url('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>--}}

    <!-- INTERNAL File Uploads css -->
    <link href="{{ url('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>

    <!-- INTERNAL Time picker css -->
    <link href="{{ url('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet"/>

    <!-- INTERNAL Date Picker css -->
    <link href="{{ url('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet"/>

    <!-- INTERNAL File Uploads css-->
    <link href="{{ url('assets/plugins/fileupload/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

    <!-- INTERNAL Mutipleselect css-->
    {{--<link rel="stylesheet" href="{{ url('assets/plugins/multipleselect/multiple-select.css')}}">--}}

    <!-- INTERNAL Sumoselect css-->
    <link rel="stylesheet" href="{{ url('assets/plugins/sumoselect/sumoselect.css')}}">

    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="{{ url('assets/plugins/telephoneinput/telephoneinput.css')}}">

    <!-- INTERNAL Jquerytransfer css-->
    <link rel="stylesheet" href="{{ url('assets/plugins/jQuerytransfer/jquery.transfer.css')}}">
    <link rel="stylesheet" href="{{ url('assets/plugins/jQuerytransfer/icon_font/icon_font.css')}}">

    <!-- INTERNAL multi css-->
    <link rel="stylesheet" href="{{ url('assets/plugins/multi/multi.min.css')}}">


    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ url('assets/plugins/simplebar/css/simplebar.css')}}">


    <!-- Color Skin css -->
    <link id="theme" href="{{ url('assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Switcher css -->
    <link rel="stylesheet" href="{{ url('assets/switcher/css/switcher.css')}}">
    <link rel="stylesheet" href="{{ url('assets/switcher/demo.css')}}">


    <link href="{{ url('')}}/assets/plugins/notify/css/jquery.growl.css" rel="stylesheet" />
    <link href="{{ url('')}}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />



    <style>
        .img_border {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 35px;
        }
    </style>


    <style>
        .fade {
            transition: opacity 0.15s linear;
        }

        .modal_Style {
            background: black;
            opacity: 0.5;
        }

        #btn_center {
            max-width: 720px;
            margin: auto;
        }

        .radio_btn {
            margin: 31px;
        }

        textarea.form-control {
            height: 99px;
        }

        .form-group i {
            color: #705ec8;
        }

        .form-group i {
            margin-right: 10px;
            font-weight: bold;
            font-size: 16px;
            /* padding-top: 10px; */
            line-height: 1;
        }

        #add_btn {
            font-size: 20px;
            color: blue;

        }

        #remove_btn {
            font-size: 20px;
            color: red;
            padding: 9px;
        }

        .margin_lft {
            margin-left: -10px;
        }

        .nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: initial;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .modal_style {
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px #404040;
        }

        .heading_style {

            justify-content: center;
            font-family: fangsong;
            color: black;
            border-bottom: 3px solid black;
            font-size: 25px;
            padding: 2px;


        }

        .form-control {
            color: #020402;
            opacity: 2;
            border: 1px solid black;
        }

        .heading_font {
            font-size: 30px;
            border-bottom: 0px solid black;

        }

        .modal-title {

            font-size: 18px;
            color: black;
            font-family: revert;
            padding: 7px;
        }

        .modal_subtitle {

            font-size: 20px;
            color: black;
            font-family: revert;
            padding: 7px;
        }
    </style>

    <style>
        @keyframes fa-blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0;
            }
        }

        .fa-blink {
            -webkit-animation: fa-blink .75s linear infinite;
            -moz-animation: fa-blink .75s linear infinite;
            -ms-animation: fa-blink .75s linear infinite;
            -o-animation: fa-blink .75s linear infinite;
            animation: fa-blink .75s linear infinite;

        }
    </style>
