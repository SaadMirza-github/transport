@include('partials.mainsite_pages.return_function')

<table id="example-1" class="table table-striped table-bordered text-nowrap">
    <thead>
    <tr>
        <th class="border-bottom-0">ORDER ID</th>
        <th class="border-bottom-0">PICKUP</th>
        <th class="border-bottom-0">DELIVIERY</th>
        <th class="border-bottom-0">VEHICLE#/ORDERTAKER</th>
        <th class="border-bottom-0">PHONE</th>
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
                {{$val->ophone}}
            </td>
            <td>
                {{$val->created_at}}
                <br>
                <span class="badge badge-pill badge-default mt-2">Payment: <?php echo pay_status($val->paid_status)?></span>
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