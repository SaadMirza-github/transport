@include('partials.mainsite_pages.return_function')

<table id="example-1" class="table table-striped table-bordered text-nowrap">
    <thead>
    <tr>
        <th class="border-bottom-0">ORDER ID</th>
        <th class="border-bottom-0">PICKUP</th>
        <th class="border-bottom-0">DELIVIERY</th>
        <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
        <th class="border-bottom-0">CUSTOMER/DEALER</th>
        <th class="border-bottom-0">CUSTOMER PAYMENTS</th>
        <th class="border-bottom-0">LISTED PRICE</th>
        <th class="border-bottom-0">PROFIT</th>
        <th class="border-bottom-0">DATES</th>

    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <tr>
            <td>
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
                @if($val->customer_or_delear==1)
                    Customer
                @endif
                @if($val->customer_or_delear==2)
                    Dealer
                @endif

            </td>
            <td>
                Paid: {{$val->payment}}
            </td>
            <td>
                Paid: {{$val->listed_price}}
            </td>
            <td>
                {{$val->profit}}
            </td>
            <td>
                {{$val->created_at}}

            </td>

        </tr>

    @endforeach
    </tbody>
</table>
{{  $data->links() }}

{{$sumofprofit}}

<script>
    selectRefresh();
</script>