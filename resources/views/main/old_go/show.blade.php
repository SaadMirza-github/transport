@include('partials.mainsite_pages.return_function')

<table id="example-1" class="table table-striped table-bordered text-nowrap">
    <thead>
    <tr>
        <th class="border-bottom-0">ORDER#</th>
        <th class="border-bottom-0">Pickup</th>
        <th class="border-bottom-0">Delivery</th>
        <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
        <th class="border-bottom-0">Dates</th>
        @if(Auth::user()->role==6 || Auth::user()->role==1)

        @endif
        <th class="border-bottom-0">Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <?php



        if(Auth::user()->role == 2){
            $all_assign_array = array();
            //$all_assign = $val->assign_other_ordertaker;
            if(empty($all_assign)){

            }
        }else if(Auth::user()->role == 3){

            $all_assign_array = array();
            //$all_assign = $val->assign_other_orderdispatcher;
            if(empty($all_assign)){

            }
        }

        $n_active = "";
        $n_active2 ="";
        $user_idd = Auth::user()->id;

        if (Auth::user()->role != 1 && Auth::user()->role != 5 && Auth::user()->role != 6) {

            if (!empty($all_assign)) {

                if (strpos($all_assign, ',') !== false) {
                    // $all_assign_array = explode(",", $all_assign);
                } else {
                    //array_push($all_assign_array, $all_assign);
                }
            }

            //if (!in_array($user_idd, $all_assign_array)) {
            //  $n_active = "not-active";
            // $n_active2 = "not-active2";
            //}

        }

        ?>


        <tr >

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
                <input type="hidden" class="client_name" value="{{ $val->ocname }}">
                <input type="hidden" class="phoneno" value="{{ $val->ophone }}">

                <input type="hidden" class="link" value="https://classic.mapquest.com/embed?q1={{$val->ocity}}+{{$val->ozip}}+{{$val->ostate}}+US&q2={{$val->dcity}}+{{$val->dzip }}+{{$val->dstate}}+US">


            </td>
            <td class="{{$n_active}}">
                <a href="http://classic.mapquest.com/embed?zoom=5&amp;q={{$val->ocity}}+{{$val->ostate}}+{{$val->ozip}}"
                   target="_blank">
                    <i class="fa fa-map-marker" style="color:green;" aria-hidden="true"></i>
                    {{$val->ocity . "-".$val->ostate ."-" .$val->ozip  }}
                </a><br>
                <strong><i class="fa fa-location-arrow" style="color:green;" aria-hidden="true"></i>
                    <?php  $rest = ""; if (strlen($val->oaddress) > 10) {
                        $rest = substr($val->oaddress, 0, 10);
                    } else {
                        $rest = $val->oaddress;
                    }  ?><a class="btn btn-outline-success btn-sm"
                            data-toggle="tooltip" data-placement="top" title="<?php echo $val->oaddress ?>"><?php echo $rest ?></a>
                </strong>
                <br>

            </td>
            <td class="{{$n_active}}">
                <a href="http://classic.mapquest.com/embed?zoom=5&amp;q={{$val->dcity}}+{{$val->dstate}}+{{$val->dzip}}"
                   target="_blank">
                    <i class="fa fa-map-marker" style="color:red;" aria-hidden="true"></i>
                    {{$val->dcity . "-".$val->dstate ."-" .$val->dzip  }}
                </a><br>

            </td>
            <?php //$ymk = explode('*^-', $val->ymk); ?>
            <td class="{{$n_active}}">
                {{--
                @foreach($ymk as $val2)
                @if($val2)
                <span class="text-center pd-2 bd-l">{{$val2}}<br></span>
                @endif
                @endforeach
                --}}
                <?php $y = explode('^*', $val->vyear); ?>
                @foreach($y as $valyear)
                    @if($valyear)
                    <span class="text-center pd-2 bd-l">{{$valyear}} <br></span>
                    @endif
                @endforeach
                <?php $make = explode('^*', $val->vmake); ?>
                @foreach($make as $valmake)
                    @if($valmake)
                        <span class="text-center pd-2 bd-l">{{$valmake}} <br></span>
                    @endif
                @endforeach
                <?php $model = explode('^*', $val->vmodel); ?>
                @foreach($model as $valmodel)
                    @if($valmodel)
                        <span class="text-center pd-2 bd-l">{{$valmodel}} <br></span>
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
                <span class=""><?php //echo get_car_or_heavy($val->paynal_type) ?></span>
                <br>
            </td>

            <td id='order_action' >
                <div class="btn-list">


                    <button type="button"
                            class="btn btn-info btn-sm btn-sm ">
                        <a href="{{url('/move_to_new/'. $val->id.'/'.$penaltype.'/'.$tablev.'/' )}}" title="Move To New">
                            <i class="fa fa-thumbs-o-up"></i>
                        </a>
                    </button>


                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{{  $data->links() }}

<script>
    regain_status();
    regain_count();
    selectRefresh();
</script>