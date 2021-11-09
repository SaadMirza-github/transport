@extends('layouts.chat')

@section('template_title')
    Chat
@endsection

@section('content')
    @include('partials.mainsite_pages.return_function')
    <head>
        <title>Chat</title>
        <link rel="icon" href="https://version1.shipa1.com/assets/images/brand/ship_logo.png" type="image/png">
    </head>
    <style>
        .demo-icon{
            display: none;
        }
        div#ChatBody {
            min-height: 36pc;
        }
        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }

        .message-feed.media .media-body, .message-feed.right .media-body {
            overflow: visible;
            display: flow-root;
        }

        span.dot-label {
            position: relative !important;
            display: inline-grid !important;
            place-content: center !important;
        }

        .ps {
            overflow: scroll !important;
            overflow-anchor: none;
            -ms-overflow-style: none;
            touch-action: auto;
            -ms-touch-action: auto;
        }
    </style>
    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>

    <?php
    function get_unread_chat($fromuserId)
    {
        $data = DB::table('chats')
            ->where('fromuserId', $fromuserId)
            ->where('touserId', Auth::user()->id)
            ->where('chat_view', 0)
            ->count();
        return $data;
    }


    ?>
    <!--End Page header-->
    <!-- Row -->
    <div class="row" style=" width: 76%; margin-left: 9%; ">
        <div class="col-md-12">
            <div class="card">
                <div class="tile tile-alt mb-0" id="messages-main" style="width: 100%">
                    <div class="ms-menu">
                        <div class="tab-menu-heading border-top-0">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#tab-7" class="active" data-toggle="tab">Chat</a></li>
                                    <li class="m-0"><a href="#tab-8" data-toggle="tab" class="">Contacts</a>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-7" style="height: 100%;overflow: scroll;">
                                <ul class="list-group lg-alt chat-conatct-list" id="ChatList">
                                    @foreach($data as $row)
                                        <li class="list-group-item media p-4 mt-0 border-0">
                                            <a style="cursor: pointer"
                                               onclick="fetch_data('{{ $row->id  }}','{{ Auth::user()->id }}','{{ $row->name }}')">
                                                <div class="media-body">
                                                    <div
                                                            class="list-group-item-heading text-default font-weight-semibold">
                                                        {{ $row->name }}<span
                                                                class="dot-label bg-success ml-2 w-4 h-4"> {{get_unread_chat($row->id)}}  </span>
                                                    </div>
                                                    <small
                                                            class="list-group-item-text text-muted">{{ $row->email }}</small>
                                                </div>
                                                <span class="chat-time text-muted">2 mins</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab-8">
                                <ul class="list-group lg-alt chat-conatct-list" id="ChatList2">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ms-body">
                        <div class="action-header clearfix">
                            <a href="#" class="ms-menu-trigger">
                                <i class="fe fe-align-left"></i>
                            </a>
                            <div class="float-left hidden-xs d-flex ml-4 chat-user">
                                <div class="align-items-center mt-1">
                                    <p id="touser" class="font-weight-bold mb-0 fs-16"></p>
                                    <span><span class="dot-label bg-success mr-2 w-2 h-2"></span>online</span>
                                </div>
                            </div>
                            <ul class="ah-actions actions align-items-center">
                                <li>
                                    <a data-toggle="tooltip" href="#" title="Call"><i
                                                class="fe fe-phone"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" href="#" title="Archive"><i
                                                class="fe fe-folder-plus"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" href="#" title="Trash"><i
                                                class="fe fe-trash-2"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" href="#" title="View Info"><i
                                                class="fe fe-alert-octagon"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="option-dots" href="#">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Refresh</a>
                                        </li>
                                        <li>
                                            <a href="#">Message Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-body-style ChatBody" id="ChatBody">
                            <div class="message-feed media">
                                <div class="media-body">
                                    <div class="mf-content">
                                        SELECT USER TO START THE CHAT
                                    </div>
                                    <small class="mf-date"><i
                                                class="fa fa-clock-o"></i><?php echo date('Y-m-d H:i:s') ?></small>
                                </div>

                            </div>
                            <div id="her" onload="focus()"></div>
                        </div>

                        <form action="" id="form" method="POST" style="display: none">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <div class="msb-reply">
                                <textarea id="description" name="description"
                                          placeholder="What's on your mind..."></textarea>
                                <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                            <input type="hidden" id="to_user_id" name="to_user_id" value=""/>
                            <input type="hidden" id="count_read" value="0">
                            <input type="hidden" id="count_interval" value="0">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-->

    <div class="modal" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fe fe-check-circle fs-100 text-success lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold" id="success"></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger" id="not_success"></h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')

    <script>
        $(document).ready(function () {
            $(".app-sidebar__toggle").trigger('click');
            $('.app-sidebar ').hover(function () {
                $(".app-sidebar__toggle").trigger('click');
            });
        });
        $(document).ready(function () {
            $("#ChatBody").animate({scrollTop: 20000000000}, "slow");
            $(".updatee").click(function () {
                var order_id = $(this).closest('tr').find('.order_id').val();
                $("#order_id1").attr("value", order_id);
            });
        });

        function fetch_data(to_user_id, from_user_id, tousername) {

            $('#count_read').val(1);

            // alert(tousername);
            document.getElementById("to_user_id").value = to_user_id;
            document.getElementById("touser").innerHTML = tousername;
            touserId = document.getElementById("to_user_id").value;
            $('#ChatBody').html("");

            $.ajax({

                type: "GET",
                url: "/get_chat",
                data: {'touserId': touserId},
                success: function (data) {
                    $('#ChatBody').html(data);
                    $("#ChatBody").animate({scrollTop: 20000000000}, "slow");
                    $('#form').show();
                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });

            $.ajax({

                type: "GET",
                url: "/view_chat",
                data: {'touserId': touserId},
                success: function (data) {

                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });


            var interval_id = setInterval(function () {
                var count_read = $('#count_read').val();

                $.ajax({

                    type: "GET",
                    url: "/view_chat_timer",
                    data: {'touserId': touserId},
                    success: function (data) {
                        if (data > 0) {
                            fetch_data3(touserId);
                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }

                });


            }, 10000);

            for (var i = 1; i < interval_id; i++)
                window.clearInterval(i);


        }

        function fetch_data3(to_user_id) {

            $.ajax({

                type: "GET",
                url: "/get_chat2",
                data: {'touserId': touserId},
                success: function (data) {
                    $('#ChatBody').append(data);
                    $("#ChatBody").animate({scrollTop: 20000000000}, "slow");
                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });
            var count_read = $('#count_read').val();
            if (count_read == 1) {
                viewchat(touserId);
            }
        }

        function viewchat(touserId) {

            $.ajax({

                type: "GET",
                url: "/view_chat",
                data: {'touserId': touserId},
                success: function (data) {

                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });

        }

        function fetch_data2(to_user_id) {

            document.getElementById("to_user_id").value = to_user_id;
            touserId = document.getElementById("to_user_id").value;
            $('#ChatBody').html("");

            $.ajax({

                type: "GET",
                url: "/get_chat",
                data: {'touserId': touserId},
                success: function (data) {
                    $('#ChatBody').html(data);
                    $("#ChatBody").animate({scrollTop: 20000000000}, "slow");
                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });

            $.ajax({

                type: "GET",
                url: "/view_chat",
                data: {'touserId': touserId},
                success: function (data) {

                },
                error: function (e) {
                    $("#err").html(e).fadeIn();
                }

            });


        }

        document.getElementById('description').onkeydown = function (e) {
            if (e.keyCode == 13) {
                $('#form').submit();
                $('#description').val("");
                $('#her').focus();
            }
        };


        $(document).ready(function (e) {
            $("#form").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/save_chat",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {

                    },
                    success: function (data) {

                        // view uploaded file.
                        //$("#preview").html(data).fadeIn();

                        let test = data.toString();
                        let test2 = $.trim(test);
                        let text = "SUCCESS";
                        if (test2 == text) {
                            var to_user = $('#to_user_id').val();
                            fetch_data2(to_user);
                            $('#description').val("");
                            $("#ChatBody").animate({scrollTop: 20000000000}, "slow");

                        } else {

                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });


    </script>


@endsection
