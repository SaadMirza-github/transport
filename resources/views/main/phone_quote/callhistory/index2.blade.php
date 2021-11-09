@include('partials.mainsite_pages.return_function')
@foreach($data2 as $val)
    {{ get_click_type($val->type) }} By {{ucfirst(get_user_name($val->user_id))}} at {{ date("Y-M-d H:i:s",strtotime($val->created_at))}}
@endforeach