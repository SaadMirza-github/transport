
@include('partials.mainsite_pages.return_function')

<style>
    .tooltip {
        display: inline;
        position: relative;
    }
    .tooltip:hover:after{
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
    .tooltip:hover:before{
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
    .growl-message{
    }
    .not-allowed {}
    .growl.growl-default{
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
        background:  #2dce89;
        font-size: 25px !important;
        font-weight: 900;

    }
    .growl.growl-sucess {
        color: #000000  !important;
        background:  #2dce89;
        font-size: 25px !important;
        font-weight: 900;

    }
</style>


<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Total Call</th>
        <th>SMS</th>
        <th>Email</th>
        <th>Connected Call</th>
        <th>Not Connected</th>
        <th>History Update</th>
        <th>Current Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $datarow)
        <tr>
            <td>{{$datarow->id}}</td>
            <td>{{$datarow->total_sms}}</td>
            <td>{{$datarow->total_call}}</td>
            <td>{{$datarow->total_email}}</td>
            <td>{{$datarow->call_connected}}</td>
            <td>{{$datarow->call_not_connected}}</td>
            <td>{{$datarow->call_history}}</td>
            <td>{{get_pstatus($datarow->pstatus)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@php
$a=10;
@endphp



<script>
    $("#growls-default").css("display","none");
</script>
