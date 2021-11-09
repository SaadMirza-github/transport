@include('partials.mainsite_pages.return_function')

<table id="example1" class="table table-striped table-bordered text-nowrap table-sm">
    <thead>
    <tr>
        <th class="border-bottom-0">DATE</th>
        <th class="border-bottom-0">ORDER</th>
        <th class="border-bottom-0">BOOKED BY</th>
        <th class="border-bottom-0">OTHER BOOKERS</th>
        <th class="border-bottom-0">TYPE</th>
        <th class="border-bottom-0">LISTED ID</th>
        <th class="border-bottom-0">PAYMENT STATUS</th>
        <th class="border-bottom-0">CURRENT STATUS</th>
        <th class="border-bottom-0">DISPATCHER</th>
        <th class="border-bottom-0">OTHER <br> DISPATCHER</th>
        <th class="border-bottom-0">BOOK PRICE</th>
        <th class="border-bottom-0">LISTED PRICE</th>
        <th class="border-bottom-0">PROFIT</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <tr>
            <td>
                {{date('Y-m-d',strtotime($val->created_at))}}
            </td>
            <td>
                <?php echo $val->id .' '. get_car_or_heavy($val->paynal_type); ?>

            </td>
            <td>
               @if(!empty($val->b_user_id))
                {{get_user_name($val->b_user_id)}}
               @endif
            </td>
            <td>
                @if(!empty($val->b_others))
                  <?php  $book_by = explode(',', $val->b_others);
                    foreach ($book_by as $key=>$obk){
                        echo $key.')'. get_user_name($obk).'<br>';
                    }
                  ?>
                @endif
            </td>

            <td>
                @if($val->customer_or_delear==1)
                    Customer
                @endif
                @if($val->customer_or_delear==2)
                    Dealer
                @endif

            </td>

            <td>
                {{$val->listed_id}}
            </td>
            <td
                @if($val->paid_status==3) style="background-color:greenyellow" @endif
                @if($val->paid_status==2) style="background-color:yellow" @endif
                @if($val->paid_status==1) style="background-color:#ff7c7c" @endif
              >
                {{payment_status($val->paid_status)}}
            </td>
            <td>
                {{get_pstatus($val->pstatus)}}
            </td>
            <td>
                @if(!empty($val->d_user_id))
                    {{get_user_name($val->d_user_id)}}
                @endif
            </td>
            <td>
                    @if(!empty($val->d_others))
                        <?php  $diss_by = explode(',', $val->d_others);
                        foreach ($diss_by as $key=>$odk){
                            echo $key.')'. get_user_name($odk).'<br>';
                        }
                        ?>
                    @endif
            </td>

            <td class="text-right">
                @if(empty($val->payment))
                    NA
                @else
                    {{$val->payment}}
                @endif
            </td>
            <td class="text-right">
                @if(empty($val->listed_price))
                    NA
                @else
                   {{$val->listed_price}}
                @endif
            </td>
            <td class="text-right">
              @if(!empty($val->profit))
                {{$val->profit}}
              @endif
            </td>
            </tr>

    @endforeach
    <tr style="font-size: 20px">
        <td>Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"> {{$sumofbokkingprice}}</td>
        <td class="text-right">{{$sumoflistedprice}}</td>
        <td class="text-right">{{$sumofprofit}}</td>
    </tr>
    </tbody>
</table>
{{  $data->links() }}



<script>
    selectRefresh();
</script>