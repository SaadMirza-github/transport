@include('partials.mainsite_pages.return_function')
<?php
$respn = ""
?>

<a class=" notice"></a>
<div class="container_main">
    <table id="example1" class="table table-bordered">
        <thead style="position: sticky;top: 0" class="thead-dark">
        <tr>
            <th class="border-bottom-0">ORDER#</th>
            <th class="border-bottom-0">Pickup</th>
            <th class="border-bottom-0">Delivery</th>
            <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
            <th class="border-bottom-0">Dates</th>
            @if(Auth::user()->role==6 || Auth::user()->role==1)
                <th class="border-bottom-0">Assign Order</th>
            @endif
            <th class="border-bottom-0">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $val)
            <?php



            if (Auth::user()->role == 2) {
                $all_assign_array = array();
                $all_assign = $val->assign_other_ordertaker;
                if (empty($all_assign)) {
                    $all_assign = $val->assign_ordertaker_id;
                }
            } else if (Auth::user()->role == 3) {

                $all_assign_array = array();
                $all_assign = $val->assign_other_orderdispatcher;
                if (empty($all_assign)) {
                    $all_assign = $val->assign_orderdispatcher_id;
                }
            }

            $n_active = "";
            $n_active2 = "";
            $user_idd = Auth::user()->id;

            if (Auth::user()->role != 1 && Auth::user()->role != 5 && Auth::user()->role != 6) {

                if (!empty($all_assign)) {

                    if (strpos($all_assign, ',') !== false) {
                        $all_assign_array = explode(",", $all_assign);
                    } else {
                        array_push($all_assign_array, $all_assign);
                    }
                }

                if (!in_array($user_idd, $all_assign_array)) {
                    $n_active = "not-active";
                    $n_active2 = "not-active2";
                }

            }

            ?>


            <tr>

                <td class="{{$n_active}}">
                    {{$val->id}}

                    @if(!empty($val->request_user_id))
                        <br>
                        Requested By:
                        {{ get_user_name($val->request_user_id)}}
                    @endif
                    <input type="hidden" id="order_idd{{$val->id}}" class='order_idd' value="{{$val->id}}">
                    <input type="hidden" class="pstatus" value="{{ $val->pstatus }}">
                    <input type="hidden" class="client_email" value="{{ $val->oemail }}">
                    <input type="hidden" class="client_name" value="{{ $val->oname }}">
                    <input type="hidden" class="phoneno" value="{{ $val->ophone }}">
                    <input type="hidden" class="link"
                           value="//mapquest.com/embed?q1={{$val->origincity}}+{{$val->originzip}}+{{$val->originstate}}+US&q2={{$val->destinationcity}}+{{$val->destinationzip }}+{{$val->destinationstate}}+US">
                    <input type="hidden" class="driver_pickup_date" value="{{ $val->driver_pickup_date }}">
                    <input type="hidden" class="driver_deliver_date" value="{{ $val->driver_deliver_date }}">

                    <input type="hidden" class="location1" value="{{ $val->originzsc }}">
                    <input type="hidden" class="location2" value="{{ $val->destinationzsc }}">
                    <input type="hidden" class="origincity" value="{{ $val->origincity }}">
                    <input type="hidden" class="destinationcity" value="{{ $val->destinationcity }}">
                </td>
                <td class="{{$n_active}}">
                    <a href="http://classic.mapquest.com/embed?zoom=5&amp;q={{$val->origincity}}+{{$val->originstate}}+{{$val->originzip}}"
                       target="_blank">
                        <i class="fa fa-map-marker" style="color:green;" aria-hidden="true"></i>
                        {{$val->origincity . "-".$val->originstate ."-" .$val->originzip  }}
                    </a><br>
                    <strong><i class="fa fa-location-arrow" style="color:green;" aria-hidden="true"></i>
                        <?php  $rest = ""; if (strlen($val->oaddress) > 10) {
                            $rest = substr($val->oaddress, 0, 10);
                        } else {
                            $rest = $val->oaddress;
                        }  ?><a class="btn btn-outline-success btn-sm"
                                data-toggle="tooltip" data-placement="top"
                                title="<?php echo $val->oaddress ?>"><?php echo $rest ?></a>
                    </strong>
                    <br>

                </td>
                <td class="{{$n_active}}">
                    <a href="http://classic.mapquest.com/embed?zoom=5&amp;q={{$val->destinationcity}}+{{$val->destinationstate}}+{{$val->destinationzip}}"
                       target="_blank">
                        <i class="fa fa-map-marker" style="color:red;" aria-hidden="true"></i>
                        {{$val->destinationcity . "-".$val->destinationstate ."-" .$val->destinationzip  }}
                    </a><br>

                </td>
                <?php $ymk = explode('*^-', $val->ymk); ?>
                <td class="{{$n_active}}">
                    @foreach($ymk as $val2)
                        @if($val2)
                            <span class="text-center pd-2 bd-l">{{$val2}}<br></span>
                        @endif
                    @endforeach

                </td>
                <?php $ophone = explode('*^', $val->ophone); ?>
                <td class="{{$n_active}}">
                    <span class="text-center pd-2 bd-l"> Created At:&nbsp;{{$val->created_at}}</span><br>
                    <span class="text-center pd-2 bd-l">Updated At:&nbsp;{{$val->updated_at}}</span><br>
                    <span class="badge badge-pill badge-danger-light mt-2 fa-blink">{{get_pstatus($val->pstatus)}}
                        @if(!empty($val->old_code))
                            - OLD QUOTE
                        @endif
                    </span>
                    &nbsp;
                    <span class=""><?php echo get_car_or_heavy($val->paynal_type) ?>

                    </span>
                    <br>
                </td>

                @if(Auth::user()->role==6 || Auth::user()->role==1)
                    <td class="{{$n_active}}">
                        <div id="o_assign" class="o_assign" style=" display: inline-flex; ">
                            <span class="badge  badge-warning  "
                                  style=" padding: 9px 5px 0px 12px; font-size: 15px; "><i
                                        class="fa fa-phone"></i></span>

                            <form action="" method="post" style=" width: 150px; ">
                                <select id="assignorder{{$val->id}}" name="ordertaker[]"
                                        onchange="order_taker({{$val->id}})" multiple="multiple"
                                        class=" test1 assignorder">
                                    @if(empty($val->assign_other_ordertaker))
                                        <?php echo combo_return2(2, $val->assign_ordertaker_id) ?>
                                    @else
                                        <?php echo combo_return2(2, $val->assign_other_ordertaker) ?>
                                    @endif
                                </select>

                            </form>
                        </div>
                        <br>
                        <div id="d_assign" class="d_assign" style=" display: inline-flex; ">
                            <span class="badge badge-success " style=" padding: 9px 5px 0px 12px; font-size: 15px; "><i
                                        class="fa fa-truck"></i></span>

                            <form action="" method="post" style=" width: 150px; ">

                                <select id="assignorder_dispatch{{$val->id}}" name="orderdispatch[]"
                                        onchange="order_dispatch({{$val->id}})" multiple="multiple"
                                        class=" test2 assignorder_dispatch">
                                    @if(empty($val->assign_other_orderdispatcher))
                                        <?php echo combo_return2(3, $val->assign_orderdispatcher_id) ?>
                                    @else
                                        <?php echo combo_return2(3, $val->assign_other_orderdispatcher) ?>
                                    @endif
                                </select>

                            </form>
                        </div>

                    </td>

                @endif
                <td id='order_action'>

                    <div class="btn-list">
                        @if($get_payment=='yes')
                            <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                                <a href="{{url('/owes_money_update/'. $val->id)}}">
                                    <i class="fa fa-dollar" style="color: white !important;"></i></a>
                            </button>
                        @endif
                        @if($get_payment<>'yes')
                            @if($respn == "picked_up_approval")
                                <button type="button"
                                        class="btn btn-info btn-sm btn-sm {{$n_active2}}">
                                    <a href="{{url('/pickup_approve/'. $val->id)}}" title="Approve">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </a>
                                </button>
                            @endif
                            @if($respn == "deliver_approval")
                                <button type="button"
                                        class="btn btn-primary btn-sm btn-sm {{$n_active2}}">
                                    <a href="{{url('/deliver_approve/'. $val->id)}}">
                                        <i class="fa fa-eye" style="color: white !important;"></i>
                                    </a>
                                </button>
                            @endif
                            <button type="button"
                                    class="btn btn-facebook btn-sm updatee {{$n_active2}}"><i
                                        class="fa fa-eye" style="color: white !important;"></i>
                            </button>
                            <button type="button" class="btn btn-twitter btn-sm {{$n_active2}}">
                                <a href="{{url('/new_edit/'. $val->id)}}">
                                    <i class="fa fa-edit " style="color: white !important;"></i>
                                </a>
                            </button>
                            <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                                <a href="{{url('/print_summary/'. $val->id)}}">
                                    <i class="fa fa-print" style="color: white !important;"></i>
                                </a>
                            </button>

                            <button type="button" class="btn btn-google btn-sm {{$n_active2}}"><i
                                        class="fa fa-road " style="color: white !important;"></i>
                            </button>
                            <br>

                            <button type="button" data-toggle="modal" data-target="#reportmodal"
                                    data-book-id="{{ $val->id  }}"
                                    class="btn btn-twitter btn-sm {{$n_active2}}">
                                <i class="las la-inbox header-icons"></i>
                            </button>
                            @if($val->pstatus <>10 && $val->pstatus <>11 &&
                            $val->pstatus <>12 && $val->pstatus <>13 &&
                            $val->pstatus <>20 && $val->pstatus <>22 && $val->pstatus <>15)
                                <button type="button" data-toggle="modal" data-target="#trashmodal"
                                        data-book-id="{{ $val->id  }}" class="btn btn-youtube btn-sm {{$n_active2}}"><i
                                            class="fa fa-trash " data-toggle="tooltip" data-placement="bottom"
                                            title="Delete Order!" style="color: white !important;"></i>
                                </button>


                            @endif
                            <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                                <a target="_blank"
                                   href="https://classic.mapquest.com/embed?q1={{$val->origincity}}+{{$val->originzip}}+{{$val->originstate}}+US&q2={{$val->destinationcity}}+{{$val->destinationzip }}+{{$val->destinationstate}}+US">
                                    <i class="fa fa-map-marker" style="color: white !important;"></i></a>

                            </button>
                            {{-- @if($val->pstatus>=11) --}}
                        <!--
                            <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                                <a href="{{-- url('/owes_money_update/'. $val->id) --}}">
                                    <i class="fa fa-dollar" style="color: white !important;"></i></a>

                            </button>
                            -->
                            {{-- @endif --}}
                            @php
                                $rst=check_quote_request($val->id);
                            @endphp
                            @if($rst)
                                  @if(empty($n_active2))
                                    <button type="button" class="btn btn-youtube btn-sm" title="Cancel Request">
                                        <a href="{{url('/cancel_request/'. $val->id)}}" title="Cancel Request">
                                            <i class="fa fa-window-close fa-blink" title="Cancel Request"
                                               style="color: white !important;"></i></a>

                                    </button>
                                  @endif
                            @else
                                    @if(Auth::user()->role==2 || Auth::user()->role==3)
                                        @if(!empty($n_active2))
                                        <button type="button" class="btn btn-success btn-sm" title="Request Quote">
                                            <a href="{{url('/request_to_assign/'. $val->id)}}" title="Request Quote">
                                                <i class="fa fa-paper-plane fa-blink" title="Request Quote" style="color: white !important;"></i></a>

                                        </button>
                                        @endif
                                    @endif
                            @endif
                            @if($val->pstatus ==9)
                                <button type="button" data-toggle="modal" data-target="#find_carrier_modal"
                                        data-find_o_id="{{ $val->id  }}"
                                        data-location1="{{ $val->originzsc }}"
                                        data-location2="{{ $val->destinationzsc }}"
                                        class="btn btn-twitter btn-sm find_carrier">
                                    <i class="fa fa-truck" data-toggle="tooltip" data-placement="bottom"
                                       title="Find Carrier!"></i>
                                </button>
                            @endif

                            @if($val->pstatus ==15)
                                <button type="button" class="btn btn-success btn-sm" title="Re-new!">
                                    <a href="{{url('/renew_order/'. $val->id)}}" title="Re-new">
                                        <i class="fa fa-refresh " title="Re-new"
                                           style="color: white !important;"></i></a>

                                </button>

                            @endif

                        @endif

                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{  $data->links() }}

</div>
{{--<div class="modal" id="modaldemo4">--}}
{{--<div class="modal-dialog modal-dialog-centered text-center " role="document">--}}
{{--<div class="modal-content tx-size-sm">--}}
{{--<div class="modal-body text-center p-4">--}}
{{--<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span--}}
{{--aria-hidden="true">&times;</span></button>--}}
{{--<i class="fe fe-check-circle fs-100 text-success lh-1 mb-5 d-inline-block"></i>--}}
{{--<h4 class="text-success tx-semibold" id="success"></h4>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


<script>
    //    $('.group-filter').multipleSelect({
    //        width: 460,
    //        multiple: true,
    //        multipleWidth: 55
    //    });


    $('.test1').SumoSelect();
    $('.test2').SumoSelect();

    $("#growls-default").css("display", "none");

    function order_taker(num) {

        var orderid = $(`#order_idd${num}`).val();
        var assing_to_id = $(`#assignorder${num}`).val();


        var assigntype = 2;
        $.ajax({
            url: '/assign_order',
            type: 'post',
            data: {'_token': '{{csrf_token()}}', assing_to_id: assing_to_id, orderid: orderid, assigntype: assigntype},
            success: function (data) {
                return not1();

            }
        });

    }

    function order_dispatch(num) {

        var orderid = $(`#order_idd${num}`).val();
        var assing_to_id = $(`#assignorder_dispatch${num}`).val();


        var assigntype = 3;
        $.ajax({
            url: '/assign_order_dispatcher',
            type: 'post',
            data: {'_token': '{{csrf_token()}}', assing_to_id: assing_to_id, orderid: orderid, assigntype: assigntype},
            success: function (data) {
                return not1();

            }
        });

    }

    $(".find_carrier").click(function () {

        var order_id = $(this).closest('tr').find('.order_idd').val();
        var originstate = $(this).closest('tr').find('.origincity').val();
        var destinationstate = $(this).closest('tr').find('.destinationcity').val();
        $('#find_o_id').html("Order-Id: " + order_id);

        $.ajax({

            url: "/find_carrier",
            type: "GET",
            //dataType: "json",
            data: {originstate: originstate, destinationstate: destinationstate, order_id: order_id},

            beforeSend: function () {
                $('#table_find_data_carrier').html("");
                $('#table_find_data_carrier').append(`<div class="lds-hourglass" id='ldss'></div>`);
            },

            success: function (data) {
                //success
                $('#table_find_data_carrier').html("");
                $('#table_find_data_carrier').html(data);

            },


        });

    });
    regain_status();
    regain_count();
    selectRefresh();

</script>
