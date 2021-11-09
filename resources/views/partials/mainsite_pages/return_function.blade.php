<?php
date_default_timezone_set("Asia/Karachi");
//  $setting = 	App\general_setting::first();
///  ->where('created_at','>=',\Carbon\Carbon::today()->subDays($setting->no_days))
///  25 feb 2020 > show
///
///

function get_click_type($id)
{
    if ($id == 1) {
        return "PHONE";
    } else if ($id == 2) {
        return "SMS";
    } else if ($id == 3) {
        return "EMAIL";
    }
}

function pay_status($id){
    if($id == 1){
        return '<span class="badge badge-warning">Pending</span>';
    }else if($id == 2){
        return '<span class="badge badge-info">Updated</span>';
    }else if($id == 3){
        return '<span class="badge badge-success">Received</span>';
    }
}

function get_role($id, $column)
{
    $setting = App\general_setting::first();
    $query = \App\role::where('id', $id)->first();
    return $query->$column;
}


function get_user($id, $column)
{
    $setting = App\general_setting::first();
    $query = \App\role::where('id', $id)->first();
    return $query->$column;

}

function get_user_name($id)
{
    $setting = App\general_setting::first();
    $query = \App\User::where('id', $id)->first();
    return $query->name;
}

function get_autoorder($id, $column)
{
    $setting = App\general_setting::first();
    $query = \App\AutoOrder::where('id', $id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->first();
    if (!empty($query->$column)) {
        return $query->$column;
    } else {
        return "NOT FOUND";
    }

}

function count_history($user_id, $order_id)
{
    $setting = App\general_setting::first();
    $query = \App\call_history::where('orderId', $order_id)
        ->where('userId', $user_id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->count();
    return $query;
}

function check_panel()
{
    $setting = App\general_setting::first();
    $ptype = 1;
    $query = \App\user_setting::where('user_id', Auth::user()->id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->first();
    if (!empty($query)) {
        $ptype = $query['penal_type'];
    }
    return $ptype;
}

function get_panel_name()
{
    $setting = 	App\general_settings::orderBy('id', 'DESC')->first();
    $ptype = 1;
    $penaltypename = '';
    $query = \App\user_setting::where('user_id', Auth::user()->id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->first();
    if (!empty($query)) {
        $ptype = $query['penal_type'];
    }
    if ($ptype == '1') {
        $penaltypename = 'Phone Quote';
    } else {
        $penaltypename = 'Website Quote';
    }

    return $penaltypename;
}

function get_total_new($id, $ptype)
{
    $days=0;
    $setting = 	App\general_settings::orderBy('id', 'DESC')->first();
    if(!empty($setting)){
        $days=$setting->no_days;
     }
    $data_new = \App\AutoOrder::where('pstatus', '=', $id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($days))
        ->orderBy('id', 'DESC')->count();

    if (!empty($data_new)) {
        return $data_new;
    } else {
        return 0;
    }
}

function get_total_pickup_approval($id, $ptype)
{
    $setting = 	App\general_settings::orderBy('id', 'DESC')->first();
    $data_new = \App\AutoOrder::where('pstatus', '=', $id)->where('approve_pickup', '=', 0)->where('paneltype', '=', $ptype)
        ->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->orderBy('id', 'DESC')->count();
    if (!empty($data_new)) {
        return $data_new;
    } else {
        return 0;
    }
}

function get_total_deliver_approval($id, $ptype)
{
    $setting = 	App\general_settings::orderBy('id', 'DESC')->first();
    $data_new = \App\AutoOrder::where('pstatus', '=', $id)->where('approve_deliver', '=', 0)->where('paneltype', '=', $ptype)
        ->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->orderBy('id', 'DESC')->count();
    if (!empty($data_new)) {
        return $data_new;
    } else {
        return 0;
    }
}

function get_pstatus($id)
{

    $ret = "";
    if ($id == 0) {
        $ret = "NEW";
    } elseif ($id == 1) {
        $ret = "Interested";
    } elseif ($id == 2) {
        $ret = "FollowMore";
    } elseif ($id == 3) {
        $ret = "AskingLow";
    } elseif ($id == 4) {
        $ret = "NotInterested";
    } elseif ($id == 5) {
        $ret = "NoResponse";
    } elseif ($id == 6) {
        $ret = "TimeQuote";
    } elseif ($id == 7) {
        $ret = "PaymentMissing";
    } elseif ($id == 8) {
        $ret = "Booked";
    } elseif ($id == 9) {
        $ret = "Listed";
    } elseif ($id == 10) {
        $ret = "Dispatch";
    } elseif ($id == 11) {
        $ret = "Pickup";
    } elseif ($id == 12) {
        $ret = "Delivered";
    } elseif ($id == 13) {
        $ret = "Completed";
    } elseif ($id == 14) {
        $ret = "Cancel";
    } elseif ($id == 15) {
        $ret = "Deleted";
    } elseif ($id == 16) {
        $ret = "OwesMoney";
    } elseif ($id == 17) {
        $ret = "CarrierUpdate";
    } elseif ($id == 18) {
        $ret = "PIssue";
    } elseif ($id == 19) {
        $ret = "Active";
    } elseif ($id == 20) {
        $ret = "Pickup Pending";
    }elseif ($id == 21) {
        $ret = "Pickup Rejected";
    }elseif ($id == 22) {
        $ret = "Delivery Pending";
    }elseif ($id == 23) {
        $ret = "Delivery Rejected";
    }elseif ($id == 24) {
        $ret = "Complete Pending";
    }
    return $ret;

}

function get_oterminal_name($id)
{
    $terminal = "";
    if ($id == 1) {
        $terminal = 'Residence';
    } elseif ($id == 2) {
        $terminal = 'COPART Auction';
    } elseif ($id == 3) {
        $terminal = 'Manheim Auction';
    } elseif ($id == 4) {
        $terminal = 'Auction';
    } elseif ($id == 5) {
        $terminal = 'Shop';
    } elseif ($id == 10) {
        $terminal = 'Dealership';
    } elseif ($id == 7) {
        $terminal = 'Business Location';
    } elseif ($id == 8) {
        $terminal = 'Auction (Heavy)';
    } elseif ($id == 6) {
        $terminal = 'Other';
    }
    return $terminal;
}


function get_dterminal_name($id)
{
    $terminal = "";
    if ($id == 1) {
        $terminal = 'Residence';
    } elseif ($id == 2) {
        $terminal = 'COPART Auction';
    } elseif ($id == 3) {
        $terminal = 'Manheim Auction';
    } elseif ($id == 4) {
        $terminal = 'IAAI Auction';
    } elseif ($id == 5) {
        $terminal = 'Body Shop';
    } elseif ($id == 10) {
        $terminal = 'Auction(Heavy)';
    } elseif ($id == 7) {
        $terminal = 'Port';
    } elseif ($id == 8) {
        $terminal = 'Other';
    } elseif ($id == 6) {
        $terminal = 'AirPort';
    } elseif ($id == 9) {
        $terminal = 'Business Location';
    } elseif ($id == 11) {
        $terminal = 'Dealership';
    }
    return $terminal;
}

function get_cartype($id)
{
    if ($id == 1) {
        return "Open";
    } else {
        return "Enclosed";
    }

}

function get_car_or_heavy($id)
{
    if ($id == 0) {
        return '<span class="badge badge-pill badge-warning mt-2 ">' . 'Calling' . '</span>';
    } elseif ($id == 1) {
        return '<span class="badge badge-pill badge-red mt-2 ">' . 'Shipment' . '</span>';
    } elseif ($id == 2) {
        return '<span class="badge badge-pill badge-blue mt-2 ">' . 'Heavy' . '</span>';
    }

}


function get_condtion($id)
{

    if ($id == 1) {
        return "Running";
    } else {
        return "Not- Running";
    }
}

//shariq
function get_payment_detail($id, $column)
{
    $setting = App\general_setting::first();
    $paid = \App\orderpayment::where('orderId', $id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->first();
    if (!empty($paid)) {
        return ucfirst($paid->$column);
    } else {
        return $column;
    }
}

function payment_status($id){
    if($id == 1){
        return "No Payment Receive";
    }else if($id == 2){
        return "Payment Update";
    }elseif($id == 3){
        return "Payment Receive";
    }else{
        return "No Payment Receive";
    }
}

//faisal

function get_paid($id)
{
    $setting = App\general_setting::first();
    $value = "No Payment Receive";
    $paid = \App\orderpayment::where('orderId', $id)->first();

    if (!empty($paid)) {

        return ucfirst(payment_status($paid->payment_status));

    } else {
        return $value;
    }
}

function get_carrier($id, $column)
{
    $setting = App\general_setting::first();
    $query = App\carrier::where('orderId', '=', $id)->where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))->first();
    if (!empty($query->$column)) {
        return $query->$column;
    }

}

function get_total_invoice($ptype)
{
    $setting = App\general_setting::first();
    $data = App\carrier::where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->orderBy('id', 'DESC')->count();
    if (!empty($data)) {
        return $data;
    } else {
        return 0;
    }

}

function get_total_storage($ptype)
{
    $setting = App\general_setting::first();
    $data = App\storage::where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->orderBy('id', 'DESC')->count();
    if (!empty($data)) {
        return $data;
    } else {
        return 0;
    }

}

function get_total_carrier($ptype)
{
    $setting = App\general_setting::first();
    $data = App\carrier::where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->orderBy('id', 'DESC')->count();
    if (!empty($data)) {
        return $data;
    } else {
        return 0;
    }
}

function get_total_customer($ptype)
{
    $setting = App\general_setting::first();
    $data = App\AutoOrder::where('created_at', '>=', \Carbon\Carbon::today()->subDays($setting->no_days))
        ->where('paneltype', '=', $ptype)
        ->orderBy('id', 'DESC')->count();
    if (!empty($data)) {
        return $data;
    } else {
        return 0;
    }
}


function get_user_attendance($date, $user_id, $value)
{

    $data = App\attendance::where('attendance_date', 'like', '%' . $date . '%')
        ->where('user_id', '=', $user_id)->first();
    if (!empty($data)) {
        return $data->$value;
    } else {
        return "NOT FOUND";
    }

}

function issue_comments($issue_id, $user_id)
{

    $data = App\issue_chats::where('issueId', $issue_id)->where('userId', $user_id)->first();
    if (!empty($data)) {
        return $data->comments;
    } else {
        return "NOT FOUND";
    }

}


function combo_return($id, $userid)
{

    $query = \App\User::where('role', $id)->get();
    $return_values = "";
    $selected = "";


    foreach ($query as $q) {

        if ($q->id == $userid) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        $return_values = $return_values . "<option  $selected  value='$q->id'>$q->name</option>";
    }
    return $return_values;


}

function combo_return2($id, $userid)
{

    $query = \App\User::where('role', $id)->where('status', 1)->get();
    $return_values = "";
    $selected = "selected";


    $assign = explode(",", $userid);
    if (!$assign) {
        $assign = $userid;
    }

    $i = 0;
    foreach ($query as $q) {

        if (in_array($q->id, $assign)) {
            $selected = "selected";
            $i++;
        } else {
            $selected = "";
        }

        if ($i == 1) {
            $return_values = $return_values . "<option disabled $selected value='$q->id'>$q->name</option>";
            $i++;
        } else {
            $return_values = $return_values . "<option $selected value='$q->id'>$q->name</option>";
        }

    }
    return $return_values;

}

function check_quote_request($order_id)
{

    $data = App\request_quote::where('order_id', $order_id)
        ->where('request_user_id', Auth::user()->id)
        ->first();
    if (!empty($data->order_id)) {
        return true;
    } else {
        return false;
    }
}


?>
