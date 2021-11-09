@include('partials.mainsite_pages.return_function')
<?php
$respn = trim("$_SERVER[REQUEST_URI]",'/');
if(isset($_GET['titlee'])){
    $respn = $_GET['titlee'];
}
?>
<div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered text-nowrap">
        <thead>
        <tr>
            <th class="border-bottom-0">ORDER ID</th>
            <th class="border-bottom-0">COMAPNY NAME</th>
            <th class="border-bottom-0">LOCATION</th>
            <th class="border-bottom-0">MCNO</th>
            <th class="border-bottom-0">COMPANY PHONE</th>
            <th class="border-bottom-0">DRIVER PHONE NO</th>
            <th class="border-bottom-0">EST.PICKUP DATE</th>
            <th class="border-bottom-0">EST.DELEVERY DATE</th>
            <th class="border-bottom-0">ASK PRICE</th>
            <th class="border-bottom-0">COMMENTS</th>

        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
            <tr>
                <td>
                    {{$val->orderId}}
                </td>
                <td>
                    {{ $val->companyname }}
                </td>
                <td>
                    {{ $val->location }}
                </td>

                <td>
                    {{ $val->mcno }}
                </td>
                <td>
                    {{ $val->companyphoneno }}

                </td>
                <td>
                    {{ $val->driverphoneno }}
                </td>
                <td>
                    {{ $val->est_pickupdate }}
                </td>
                <td>
                    {{ $val->est_deliverydate }}
                </td>
                <td>
                    {{ $val->askprice }}
                </td>
                <td>
                    {{ $val->comments }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{  $data->links() }}

</div>


<script>
    regain_call();
    regain_status();
    regain_report_modal();
</script>
