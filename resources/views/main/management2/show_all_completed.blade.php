@include('partials.mainsite_pages.return_function')

<table id="example4" class="display dataTable">
    <thead>
    <tr>
        <th class="border-bottom-0">ORDER ID</th>
        <th class="border-bottom-0">PICKUP</th>
        <th class="border-bottom-0">DELIVERY</th>
        <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
        <th class="border-bottom-0">PHONE</th>
        <th class="border-bottom-0">CUSTOMER/DEALER</th>
        <th class="border-bottom-0">DATES</th>
        <th class="border-bottom-0">BOOK PRICE</th>
        <th class="border-bottom-0">LISTED PRICE</th>
        <th class="border-bottom-0">ACTIONS</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <tr id="row_{{$val->id}}">
            <td class="details-control">
                {{$val->id}}
            </td>
            <td>
                {{$val->originzsc}}
            </td>
            <td>
                {{$val->destinationzsc}}
            </td>

            <td>
                <?php $ymk = explode('*^-', $val->ymk); ?>
                @foreach($ymk as $val2)
                    @if($val2)
                        <span class="text-center pd-2 bd-l">{{$val2}}<br></span>
                    @endif
                @endforeach


            </td>
            <td>
                {{$val->ophone}}
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
                {{$val->created_at}}
                <br>
                <span class="badge badge-pill badge-default mt-2">Payment: <?php echo pay_status($val->paid_status)?></span>
            </td>
            <td>
                {{$val->payment}}
            </td>
            <td>
                {{$val->listed_price}}
            </td>
            <td id='order_action' >
                <div class="btn-list">


                    <button type="button" class="btn btn-default ">
                        <a class="nav-link icon"  href="/owes_money_update/{{ $val->id}}" title="View Payment Logs">
                            <i class="fa fa-credit-card " style="font-size: 25px"></i>
                            <span class="pulse "></span>
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
    payment_log_regain();
    selectRefresh();
</script>