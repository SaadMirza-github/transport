<style>
    .predefined_styles{
        width: 100% !important;
    }
</style>

<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('dashboard')}}">
            <img src="{{ url('assets/images/brand/ship_logo.png')}}" class="header-brand-img desktop-lgo"
                 alt="Admintro logo">
            <img src="{{ url('assets/images/brand/ship_logo.png')}}" class="header-brand-img dark-logo"
                 alt="Admintro logo">
            <img src="{{ url('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo"
                 alt="Admintro logo">
            <img src="{{ url('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo"
                 alt="Admintro logo">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="sidebar-navs">
            <ul class="nav nav-pills-circle">
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="New Quote">
                    <a class="icon" href="{{url('add_new')}}">
                        <i class="las la-phone header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Add Employee">
                    <a class="icon" href="{{url('add_employee')}}">
                        <i class="las la-user header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="View/Edit Employee">
                    <a class="icon" href="{{url('view_employee')}}">
                        <i class="las  la-edit header-icons"></i>
                    </a>
                </li>
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="CHAT">
                    <a href="{{url('chats')}}" class="icon">
                        <i class="las la-inbox header-icons"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills-circle">
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Add Issues">
                    <a href="{{url('issues_add')}}" class="icon">
                        <i class="las la-ticket-alt header-icons"></i>
                    </a>
                </li>

                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="My Issues">
                    <a href="{{url('my_issues')}}" class="icon">
                        <i class="las la-user header-icons"></i>
                    </a>
                </li>

                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Admin Issues">
                    <a href="{{url('admin_issues')}}" class="icon">
                        <i class="las la-user-alt header-icons"></i>
                    </a>
                </li>

                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Issues Comments List">
                    <a href="{{url('issue_comments_list')}}" class="icon">
                        <i class="las la-inbox header-icons"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @php
        $phoneaccess=explode(',',Auth::user()->emp_access_phone)
    @endphp
    <ul class="side-menu app-sidebar3">
        <li>
            <a class="side-menu__item" href="{{url('dashboard')}}">
                <span class="js-search-result-thumbnail responsive-img img_border fa fa-dashboard"></span>
                <span class="side-menu__label">DASHBOARD</span>
            </a>
        </li>
        @if (in_array("0", $phoneaccess))
            <li>

                <a class="side-menu__item" href="{{url('new')}}">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-quora"></span>
                    <span class="side-menu__label">NEW</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>

            </li>
        @endif
        @if (in_array("2", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-tasks"></span>
                    <span class="side-menu__label">Follow Up</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("1", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-thumbs-up"></span>
                    <span class="side-menu__label">Interested</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif

        @if (in_array("3", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-level-down"></span>
                    <span class="side-menu__label">ASKING LOW</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("4", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-thumbs-down"></span>
                    <span class="side-menu__label">NOT INTERESTED</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("5", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-phone-square"></span>
                    <span class="side-menu__label">NOT RESPONDING</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("6", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-clock-o"></span>
                    <span class="side-menu__label">TIME QUOTE</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("7", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-money"></span>
                    <span class="side-menu__label">PAYMENT MISSING</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("8", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-book"></span>
                    <span class="side-menu__label">BOOKED</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("9", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-list"></span>
                    <span class="side-menu__label">LISTED</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("10", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-truck"></span>
                    <span class="side-menu__label">DISPATCH</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("11", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-map"></span>
                    <span class="side-menu__label">PICKED UP</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("12", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fe-box"></span>
                    <span class="side-menu__label">DELIVERED</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("13", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-compress"></span>
                    <span class="side-menu__label">COMPLETED</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
        @if (in_array("16", $phoneaccess))
            <li>
                <a class="side-menu__item" href="index.html#">
                    <span class="js-search-result-thumbnail responsive-img img_border fa fa-dollar"></span>
                    <span class="side-menu__label">OWNS MONEY</span><span
                        class="badge badge-warning side-badge">11</span>
                </a>
            </li>
        @endif
    </ul>
</aside>
<!--aside closed-->                <!-- App-Content -->
