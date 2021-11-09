@include('partials.mainsite_pages.return_function')

<table id="example-1" class="table table-striped table-bordered text-nowrap">
    <thead>
    <tr>
        <th class="border-bottom-0">ORDER ID</th>
        <th class="border-bottom-0">PROFIT</th>

        
    </tr>
    </thead>
    <tbody>

    @foreach($data as $val)
        <tr>
            <td>
                {{$val->order_id}}
            </td>
            <td>
                {{$val->profit}}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
{{  $data->links() }}

{{$sumofprofit}}

<script>
    regain_status();
    regain_count();
    selectRefresh();
</script>