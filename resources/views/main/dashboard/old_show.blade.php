@include('partials.mainsite_pages.return_function')
<?php
$respn = ""
?>

<style>
    .tooltip {
        display: inline;
        position: relative;
    }

    .tooltip:hover:after {
        display: -webkit-flex;
        display: flex;
        -webkit-justify-content: center;
        justify-content: center;
        background: #444;
        border-radius: 8px;
        color: #fff;
        content: attr(title);
        margin: -82px auto 0;
        font-size: 16px;
        padding: 13px;
        width: 220px;
    }

    .tooltip:hover:before {
        border: solid;
        border-color: #444 transparent;
        border-width: 12px 6px 0 6px;
        content: "";
        left: 45%;
        bottom: 30px;
        position: absolute;
    }

    #order_action > .btn-list > buton > .fa {
        color: white !important;
        font-size: 25px;
    }

    .growl-message {
    }

    .not-allowed {
    }

    .growl.growl-default {
        display: none !important;

    }

    .not-active {
        pointer-events: none;
        cursor: not-allowed;
        text-decoration: none;
        background-color: #b15b5b26 !important;
    }

    .not-active2 {
        pointer-events: none;
        cursor: not-allowed;
        text-decoration: none;
    }

    .growl.growl-notice {
        color: #000000 !important;
        background: #2dce89;
        font-size: 25px !important;
        font-weight: 900;

    }

    .growl.growl-sucess {
        color: #000000 !important;
        background: #2dce89;
        font-size: 25px !important;
        font-weight: 900;

    }
</style>
<div class="table-responsive">
    <table id="example-1" class="table table-striped table-bordered text-nowrap">
        <thead>
        <tr>
            <th class="border-bottom-0">ORDER#</th>
            <th class="border-bottom-0">Pickup</th>
            <th class="border-bottom-0">Delivery</th>
            <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
            <th class="border-bottom-0">Dates</th>
            @if(Auth::user()->role==5 || Auth::user()->role==1)

            @endif
            @if(Auth::user()->role==6 || Auth::user()->role==1)
                <th class="border-bottom-0">Assign to Order Taker</th>
            @endif
            <th class="border-bottom-0">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $val)
            <?php



            $all_assign_array = array();
            $all_assign = $val->assign_other_ordertaker;
            if (empty($all_assign)) {
                $all_assign = $val->assign_ordertaker_id;
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
                    <input type="hidden" class='order_id' value="{{$val->id}}">
                    <input type="hidden" class="pstatus" value="{{ $val->pstatus }}">
                    <input type="hidden" class="client_email" value="{{ $val->oemail }}">
                    <input type="hidden" class="client_name" value="{{ $val->oname }}">
                    <input type="hidden" class="phoneno" value="{{ $val->ophone }}">

                    <input type="hidden" class="link"
                           value="https://classic.mapquest.com/embed?q1={{$val->origincity}}+{{$val->originzip}}+{{$val->originstate}}+US&q2={{$val->destinationcity}}+{{$val->destinationzip }}+{{$val->destinationstate}}+US">


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
                {{--<td>--}}
                {{--@foreach($ophone as $val3)--}}
                {{--@php--}}
                {{--$new = substr($val3, 0, -2) . 'xx';--}}
                {{--@endphp--}}
                {{--@if($val3)--}}
                {{--<span class="text-center pd-2 bd-l"><a--}}
                {{--class="btn btn-outline-info fa fa-phone mobile count_user"--}}
                {{--style="padding: 3px 5px; font-size: 20px;">{{$new}}</a><br></span>--}}
                {{--<span class="text-center pd-2 bd-l"><a--}}
                {{--onclick="window.location.href = 'rcmobile://sms?number={{$val3}}'"--}}
                {{--class="btn btn-outline-info fa fa-envelope sms"--}}
                {{--style="padding: 3px 5px; font-size: 20px;">{{$new}}</a><br></span>--}}
                {{--@endif--}}
                {{--@endforeach--}}

                {{--</td>--}}


                <td class="{{$n_active}}">
                    <span class="text-center pd-2 bd-l"> Created At:&nbsp;{{$val->created_at}}</span><br>
                    <span class="text-center pd-2 bd-l">Updated At:&nbsp;{{$val->updated_at}}</span><br>
                    <span class="badge badge-pill badge-danger-light mt-2 fa-blink">{{get_pstatus($val->pstatus)}}</span>
                    &nbsp;
                    <span class=""><?php echo get_car_or_heavy($val->paynal_type) ?></span>
                    <br>
                </td>
                @if(Auth::user()->role==5 || Auth::user()->role==1)

                @endif
                @if(Auth::user()->role==6 || Auth::user()->role==1)
                    <td class="{{$n_active}}">
                        <div id="managerassign" class="managerassign">
                            <form action="" method="post">
                                <select id="manager" name="ordertaker[]" multiple="multiple"
                                        class="form-control select2 multi-select assignorder"
                                        data-placeholder="50">
                                    <option value="">Select</option>
                                    @if(empty($val->assign_other_ordertaker))
                                        <?php echo combo_return2(2, $val->assign_ordertaker_id) ?>
                                    @else
                                        <?php echo combo_return2(2, $val->assign_other_ordertaker) ?>
                                    @endif
                                </select>
                            </form>
                        </div>
                    </td>

                @endif
                <td id='order_action'>
                    <div class="btn-list">

                        @if($respn == "picked_up_approval")
                            <button type="button"
                                    class="btn btn-info btn-md {{$n_active2}}">
                                <a href="{{url('/pickup_approve/'. $val->id)}}" title="Approve">
                                    <i class="fa fa-thumbs-o-up" style=" color: rgb(255 255 255) !important; "></i>
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
                        <button type="button" class="btn btn-youtube btn-sm {{$n_active2}}"><i
                                    class="fa fa-trash " style="color: white !important;"></i>
                        </button>

                        <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                            <a target="_blank"
                               href="https://classic.mapquest.com/embed?q1={{$val->origincity}}+{{$val->originzip}}+{{$val->originstate}}+US&q2={{$val->destinationcity}}+{{$val->destinationzip }}+{{$val->destinationstate}}+US">
                                <i class="fa fa-map-marker" style="color: white !important;"></i></a>

                        </button>
                        @if($val->pstatus>=11)
                            <button type="button" class="btn btn-info btn-sm {{$n_active2}}">
                                <a href="{{url('/owes_money_update/'. $val->id)}}">
                                    <i class="fa fa-dollar" style="color: white !important;"></i></a>

                            </button>
                        @endif
                        @php
                            $rst=check_quote_request($val->id);
                        @endphp
                        @if($rst=='nofound')
                            @if(Auth::user()->role==2 || Auth::user()->role==3 && !empty($n_active2))
                                <button type="button" class="btn btn-success btn-sm" title="Request Quote">
                                    <a href="{{url('/request_to_assign/'. $val->id)}}" title="Request Quote">
                                        <i class="fa fa-paper-plane fa-blink" title="Request Quote"
                                           style="color: white !important;"></i></a>

                                </button>
                            @endif
                        @endif

                        @if($rst=='found')
                            @if(Auth::user()->role==2 || Auth::user()->role==3  && !empty($n_active2))
                                <button type="button" class="btn btn-youtube btn-sm" title="Cancel Request">
                                    <a href="{{url('/cancel_request/'. $val->id)}}" title="Cancel Request">
                                        <i class="fa fa-window-close fa-blink" title="Cancel Request"
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


<Script>
    regain_status();
    regain_count();
    selectRefresh();
</Script>
