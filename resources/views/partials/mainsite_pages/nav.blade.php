{{--<head>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>--}}

{{--</head>--}}
@php
  $phoneaccess=explode(',',Auth::user()->emp_access_phone);
@endphp
<?php
function get_user_name123($id)
{
    $setting = App\general_setting::first();
    $query = \App\User::where('id', $id)->first();
    if (!empty($query)) {
        return $query->name;
    } else {
        return '';
    }


}
function get_pstatussss($id)
{

    $ret = "";
    if ($id == 0) {
        $ret = "NEW";
    } elseif ($id == 1) {
        $ret = "Interested";
    } elseif ($id == 2) {
        $ret = "FollowMore";
    } elseif ($id == 3) {
        $ret = "AskingLow";
    } elseif ($id == 4) {
        $ret = "NotInterested";
    } elseif ($id == 5) {
        $ret = "NoResponse";
    } elseif ($id == 6) {
        $ret = "TimeQuote";
    } elseif ($id == 7) {
        $ret = "PaymentMissing";
    } elseif ($id == 8) {
        $ret = "Booked";
    } elseif ($id == 9) {
        $ret = "Listed";
    } elseif ($id == 10) {
        $ret = "Dispatch";
    } elseif ($id == 11) {
        $ret = "Pickup";
    } elseif ($id == 12) {
        $ret = "Delivered";
    } elseif ($id == 13) {
        $ret = "Completed";
    } elseif ($id == 14) {
        $ret = "Cancel";
    } elseif ($id == 15) {
        $ret = "Deleted";
    } elseif ($id == 16) {
        $ret = "OwesMoney";
    } elseif ($id == 17) {
        $ret = "CarrierUpdate";
    }
    return $ret;

}


?>
<style>
    .nav_icon:hover {
        color: #2d80b8 !important;
        font-size: 40px !important;
        border-top: 5px solid #000000;
    }

    .nav_icon {

        font-size: 40px !important;

    }

    .app-header.header .nav-link.icon {
        padding: 5px;
        margin-left: 35px;
    }



    .profile_style{
        position: absolute;
        transform: translate3d(-165px, 45px, 0px);
        top: 70px !important;
        left: -115px !important;
        will-change: transform;
        margin-left: -7pc;
        margin-top: 15px;
    }
    .notice_style{
        position: absolute;
        transform: translate3d(-510px, -8px, 0px);
        top: 73px !important;
        left: -494px !important;
        will-change: transform;
        min-width: 800%!important;
    }

</style>



<div class="app-header header" style="height: 59px;">
    <div style="width: 24%;">
        <a href="/dashboard">
                            <span> <img src="/public/assets/images/brand/logo.png" class="header-brand-img desktop-lgo"
                                        alt="Admintro logo"><b
                                        style=" font-size: 18px; "> &nbsp;Auto Transport GO</b></span>
        </a>
    </div>


    <div class="container-fluid">

        <div class="d-flex">

            <a class="header-brand" href="/dashboard">
                {{--<img src="assets/images/brand/logo.png" class="header-brand-img desktop-lgo"--}}
                     {{--alt="Admintro logo">--}}
                {{--<img src="assets/images/brand/logo1.png" class="header-brand-img dark-logo"--}}
                     {{--alt="Admintro logo">--}}
                {{--<img src="assets/images/brand/favicon.png" class="header-brand-img mobile-logo"--}}
                     {{--alt="Admintro logo">--}}
                {{--<img src="assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo"--}}
                     {{--alt="Admintro logo">--}}
            </a>
            <div class="mt-1">
                {{--<button class="btn btn-primary" onclick="location.href ='/dashboard' ;" >Home</button>--}}


            </div><!-- SEARCH -->
            <div class="d-flex order-lg-2 ml-auto">

                <a href='/dashboard' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-home nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="Home"></i>
                </a>
                @if(in_array("31", $phoneaccess))
                    <a href='/listing_profit' data-toggle="search"
                       class="nav-link nav-link-lg icon header-icon">
                        <i class="fa fa-money nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                           title="Managed Accounts"></i>
                    </a>
                @endif
                @if(in_array("32", $phoneaccess))
                <a href='/general_setting' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-cog nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="General Setting"></i>
                </a>
               @endif
                <a href='/old_go' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-database nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="Old Go move to new"></i>
                </a>

                <a href='/chats' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-comment nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="Chat"></i>
                </a>

                <a href='/view_employee' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-eye nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="View Employees"></i>
                </a>
                <a href='/add_employee' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-user-plus nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="Add Employee"></i>
                </a>
                @if(in_array("30", $phoneaccess))
                <a href='/user_report' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-bar-chart nav_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"
                       title="User Report"></i>
                </a>
                @endif
                <a href='/admin_portal' data-toggle="search"
                   class="nav-link nav-link-lg icon header-icon">
                    <i class="fa fa-user-circle nav_icon" aria-hidden="true" data-toggle="tooltip"
                       data-placement="bottom" title="Admin Report"></i>
                </a>

                <div class="dropdown profile-dropdown">
                    <a href="/dashboard#" class="nav-link nav-link-lg icon header-icon" data-toggle="dropdown">
                        <i class="fa fa-bell nav_icon" aria-hidden="true" style="font-size: 29px;" data-toggle="tooltip"
                           data-placement="bottom" title="Notification"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated notice_style" >
                        <?php
                        $date = date('Y-m-d');
                        $data = \DB::table('reports')->where('created_at', 'like', "%$date%")->orderBy('created_at', 'desc')->get();


                        ?>
                    @if(count($data) > 0)
                        @foreach($data as $val2)
                            <a href="/all_notification" class="dropdown-item border-bottom d-flex pl-4">
                                <div class="notifyimg bg-info-transparent text-info"><i
                                            class="ti-comment-alt"></i></div>
                                <div>
                                    <div class="font-weight-normal1">

                                        <span
                                                class="text-info">{{get_user_name123($val2->userId)}}
                                           </span>
                                        change status to :

                                        {{get_pstatussss($val2->pstatus)}} ORDER ID :
                                        {{$val2->orderId}}
                                    </div>
                                    <div class="small text-muted">{{$val2->created_at}}</div>
                                </div>
                            </a>
                        @endforeach
                        @else No Record Found
                    @endif

                    </div>
                </div>


                <div class="dropdown profile-dropdown">
                    <a href="/dashboard#" class="nav-link nav-link-lg icon header-icon" data-toggle="dropdown">
                        <i class="fa fa-user nav_icon" aria-hidden="true" style="font-size: 29px;" data-toggle="tooltip"
                           data-placement="bottom" title="Profile"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated profile_style">
                        <div class="text-center">
                            <a href="/dashboard#"
                               class="dropdown-item text-center user pb-0 font-weight-bold">{{Auth::user()->name}}</a>
                            <div class="dropdown-divider"></div>
                        </div>
                        <a class="dropdown-item d-flex" href="/dashboard#">
                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/>
                            </svg>
                            <div class="">Profile</div>
                        </a>
                        <a class="dropdown-item d-flex" href="/dashboard#">
                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
                            </svg>
                            <div class="">Settings</div>
                        </a>
                        <a class="dropdown-item d-flex" href="/dashboard#">
                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/>
                            </svg>
                            <div class="">Messages</div>
                        </a>
                        <a class="dropdown-item d-flex" href="{{route('logout')}}">
                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg"
                                 enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24"
                                 width="24">
                                <rect fill="none" height="24" width="24"/>
                                <path
                                        d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/>
                            </svg>
                            <div class="">Sign Out</div>
                        </a>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

</div>