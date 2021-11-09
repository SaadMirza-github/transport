<?php

namespace App\Http\Controllers\phone_quote\callhistory;

use App\call_history;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\role;
use App\general_setting;
use App\AutoOrder;
use App\report;
use App\singlereport;
use App\zipcodes;
use App\count_click;
use App\count_click2;
use App\booker;
use App\dispatcher_completer;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use DB;
use App\count_day;
use Carbon;
use Vinkla\Hashids\Facades\Hashids;

class CallHistory extends Controller
{


    function get_pstatuss($id)
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
        }
        elseif ($id == 20) {
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

    function count_no_response($order_id)
    {
        $count_no_v = 0;

        $count_no = report::where('orderId', '=', $order_id)
            ->where('pstatus', '=', 5)
            ->count();
        if (!empty($count_no) > 0) {
            return $count_no;
        } else {
            return $count_no_v;
        }

    }

    function call_history_post(Request $request)
    {

        if (Auth::check()) {


            $autoorder = AutoOrder::find($request->order_id1);
            $pstatus_old = $autoorder->pstatus;
            $last_status = $this->get_pstatuss($pstatus_old);
            //check no response count
            if ($request->pstatus == "5") {
                $count_no_response = $this->count_no_response($request->order_id1);
                if ($count_no_response < 3) {
                    $autoorder->pstatus = $pstatus_old;
                } else {
                    if (!empty($request->pstatus)) {
                        $autoorder->pstatus = $request->pstatus;
                    } else {
                        $autoorder->pstatus = $pstatus_old;
                    }
                }

            } else {
                if (!empty($request->pstatus)) {
                    $autoorder->pstatus = $request->pstatus;
                } else {
                    $autoorder->pstatus = $pstatus_old;
                }
            }
            if (!empty($request->listed_price)) {

                $autoorder->listed_price = $request->listed_price;
            }
            if (!empty($request->pickup_date)) {

                $autoorder->driver_pickup_date = $request->pickup_date;
            }
            if ($request->pstatus == "11") {
                $autoorder->driver_deliver_date = $request->expected_date;
            }
            if (isset($request->approvalpickup) && $request->approvalpickup == 1) {

                $autoorder->approve_pickup = 1;

            }

            if ($request->pstatus == "11") {
                if($request->approvalpickup <> 1){
                    $autoorder->pstatus = 20;
                }
            }
            if (isset($request->deliver_date)) {

                $autoorder->driver_deliver_date = $request->deliver_date;
            }

            if (isset($request->approvaldeliver) && $request->approvaldeliver == 1) {

                $autoorder->approve_deliver = 1;

            }
            if ($request->pstatus == "12") {
                if($request->approvaldeliver <> 1){
                    $autoorder->pstatus = 22;
                }
            }
            if ($request->pstatus == "13") {
                $autoorder->completer_id = Auth::user()->id;
            }

            if ($request->pstatus == "8") {

                if (isset($request->bookers)) {
                    $book_by = implode(',', $request->bookers);
                    $booker = booker::where('order_id', $request->order_id1)->first();
                    if (empty($booker)) {
                        $booker = new booker();
                        $booker->order_id = $request->order_id1;
                        $booker->user_id = Auth::user()->id;
                        $booker->other_bookers = $book_by;
                        $booker->book_source = $request->book_source;

                        $booker->save();

                        $autoorder->booker_name = $book_by;
                        $autoorder->book_source = $request->book_source;
                        $autoorder->listed_id = $request->list_id;

                    }

                }

                $autoorder->listed_price = $request->listed_price;
            }

            

            if ($request->pstatus == "13") {

                if (isset($request->completers)) {
                    $dispatch_by = implode(',', $request->completers);
                    $dispatcher = dispatcher_completer::where('order_id', $request->order_id1)->first();
                    if (empty($dispatcher)) {
                        $dispatcher = new dispatcher_completer();
                        $dispatcher->order_id = $request->order_id1;
                        $dispatcher->user_id = Auth::user()->id;
                        $dispatcher->other_dispatchers = $dispatch_by;
                        $dispatcher->save();
                        //$autoorder->booker_name = $dispatch_by;
                    }
                }
            }

            if ($request->pstatus == "11") {
                $autoorder->driver_deliver_date = $request->expected_date;
            }


            $autoorder->save();


            $callhistory = new call_history();
            $callhistory->userId = Auth::user()->id;
            $callhistory->orderId = $request->order_id1;
            $callhistory->history = "<h6>LAST STATUS : $last_status</h6>" . "<h6>Remarks: $request->history_update<h6>";
            $callhistory->is_connected = $request->pstatus1;
            $callhistory->save();
            if (!empty($request->pstatus)) {
                $autoorderreport = new report();
                $autoorderreport->userId = Auth::user()->id;
                $autoorderreport->orderId = $request->order_id1;
                $autoorderreport->pstatus = $request->pstatus;
                $autoorderreport->save();

                $singlereport = singlereport::where('orderId', '=', $request->order_id1)->first();
                if ($singlereport == '') {
                    $singlerreportadd = new singlereport();
                    $singlerreportadd->userId = Auth::user()->id;
                    $singlerreportadd->orderId = $request->order_id1;
                    $singlerreportadd->pstatus = $request->pstatus;
                    $singlerreportadd->save();

                } else {
                    $singlereport->userId = Auth::user()->id;
                    $singlereport->save();
                }

                $this->expected_date($request->order_id1, Auth::user()->id, $request->pstatus, $request->expected_date);
            }

            Session::flash('flash_message', 'Data Successfully Saved');
            return redirect()->back();


        } else {
            return redirect('/loginn/');
        }


    }

    function call_history_post_relist(Request $request)
    {
        if (Auth::check()) {
            $last_status = "";
            $pstatus_old = 0;
            $autoorder = AutoOrder::find($request->order_id1);

            // last status for call hisorty
            $pstatus_old = $autoorder->pstatus;
            $last_status = $this->get_pstatuss($pstatus_old);


            if (isset($request->relist)) {
                $autoorder->listed_price = $request->listed_price;
                $autoorder->pstatus = $pstatus_old;
                $request->pstatus = $pstatus_old;
            } else {
                $autoorder->pstatus = $request->pstatus;
                $autoorder->carrier_id = $request->current_carrier;
                $autoorder->driver_pickup_date = $request->expected_date;
                $autoorder->dispatcher_id = Auth::user()->id;

                $this->expected_date($request->order_id1, Auth::user()->id, $request->pstatus, $request->expected_date);
            }
            $autoorder->save();


            $callhistory = new call_history();
            $callhistory->userId = Auth::user()->id;
            $callhistory->orderId = $request->order_id1;
            $callhistory->history = "<h6>LAST STATUS : $last_status</h6>" . "<h6>Remarks: $request->history_update<h6>";
            $callhistory->save();

            $autoorderreport = new report();
            $autoorderreport->userId = Auth::user()->id;
            $autoorderreport->orderId = $request->order_id1;
            $autoorderreport->pstatus = $request->pstatus;
            $autoorderreport->save();

            $singlereport = singlereport::where('orderId', '=', $request->order_id1)->first();
            if ($singlereport == '') {
                $singlerreportadd = new singlereport();
                $singlerreportadd->userId = Auth::user()->id;
                $singlerreportadd->orderId = $request->order_id1;
                $singlerreportadd->pstatus = $request->pstatus;
                $singlerreportadd->save();

            } else {
                $singlereport->pstatus = $request->pstatus;
                $singlereport->userId = Auth::user()->id;
                $singlereport->save();
            }

            Session::flash('flash_message', 'Data Successfully Saved');
            return redirect()->back();


        } else {
            return redirect('/loginn/');
        }
    }

    function pickup_approve($id)
    {
        $autoorder = AutoOrder::find($id);
        $autoorder->approve_pickup = 1;
        $autoorder->save();
        return redirect()->back();
    }

    function deliver_approve($id)
    {
        $autoorder = AutoOrder::find($id);
        $autoorder->approve_deliver = 1;
        $autoorder->save();
        return redirect()->back();
    }

    function show_call_history(Request $request)
    {
        if (isset($request->id)) {

            $data = call_history::where('orderId', '=', $request->id)
                ->orderBy('created_at', 'ASC')->get();

            return view('main.phone_quote.callhistory.index', compact('data'));
        }
    }

    function show_count_click(Request $request)
    {
        if (isset($request->id)) {

            $temp = "";
            $data2 = count_click2::where('order_id', '=', $request->id)
                ->orderBy('created_at', 'DESC')->get();

            foreach ($data2 as $val) {
                $temp = $temp . ucfirst($this->get_click_type($val->type)) . " By " . ucfirst($this->get_user_name($val->user_id)) . " at " . date("Y-M-d H:i:s", strtotime($val->created_at)) . "\n";
            }
            return $temp;


        }
    }

    function get_user_name($id)
    {
        $setting = general_setting::first();
        $query = User::where('id', $id)->first();
        return $query->name;
    }


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

    function show_pop_up(Request $request)
    {
        if (isset($request->id)) {

            $data = AutoOrder::where('id', '=', $request->id)
                ->orderBy('created_at', 'ASC')->get();
            return view('main.phone_quote.callhistory.pop_up', compact('data'));

        }
    }


    public function day_count()
    {
        if (Auth::check()) {

            $data = count_day::where('pstatus', '=', 0)
                ->orderBy('expected_date', 'DESC')
                ->paginate(50);
            return view('main.phone_quote.day_count.index', compact('data'));

        } else {
            return redirect('/loginn/');
        }
    }

    public function fetch_day(Request $request)
    {
        if (Auth::check()) {

            $req = 0;
            if (isset($request->pstatus)) {
                $req = $request->pstatus;
            }
            if ($request->ajax()) {
                $data = count_day::where('pstatus', '=', $req)
                    ->orderBy('expected_date', 'DESC')
                    ->paginate(50);
                return view('main.phone_quote.day_count.load', compact('data'))->render();
            }


        } else {
            return redirect('/loginn/');
        }
    }

    public function fetch_day2(Request $request)
    {
        if (Auth::check()) {

            $req = 0;
            if (isset($request->pstatus)) {
                $req = $request->pstatus;
            }
            if ($request->ajax()) {
                $data = count_day::where('pstatus', '=', $req)
                    ->orderBy('expected_date', 'DESC')
                    ->paginate(50);
                return view('main.phone_quote.day_count.load', compact('data'));
            }
        } else {
            return redirect('/loginn/');
        }
    }


    public function click_to_count(Request $request)
    {
        if (Auth::check()) {

            $type = 1;
            if (isset($request->typee)) {
                $type = $request->typee;
            }

            $data = count_click::where('type', $type)
                ->orderBy('id', 'DESC')
                ->paginate(10);
            return view('main.phone_quote.click_count.index', compact('data'));

        } else {
            return redirect('/loginn/');
        }
    }

    public function fetch_count(Request $request)
    {
        if (Auth::check()) {

            if ($request->ajax()) {

                $type = 1;
                if (isset($request->typee)) {
                    $type = $request->typee;
                }

                $data = count_click::where('type', $type)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
                return view('main.phone_quote.click_count.load', compact('data'))->render();
            }


        } else {
            return redirect('/loginn/');
        }
    }


    public function count_user(Request $request)
    {

        $count_save = count_click::where('order_id', '=', $request->order_id)
            ->where('user_id', '=', Auth::user()->id)
            ->where('type', '=', $request->type)
            ->first();
        if ($count_save) {

            if (empty($request->client_email)) {
                $request->client_email = "";
            }
            if (empty($request->client_name)) {
                $request->client_name = "";
            }

            $count_save->client_email = $request->client_email;
            $count_save->client_name = $request->client_name;
            $count_save->total_clicks = $count_save->total_clicks + 1;
            $count_save->type = $request->type;
            $count_save->save();


            $count_save2 = new count_click2();
            $count_save2->order_id = $request->order_id;
            $count_save2->pstatus = $request->pstatus;
            $count_save2->client_email = $request->client_email;
            $count_save2->client_name = $request->client_name;
            $count_save2->user_id = Auth::user()->id;
            $count_save2->total_clicks = 1;
            $count_save2->type = $request->type;
            $count_save2->save();


        } else {
            if (empty($request->client_email)) {
                $request->client_email = "";
            }
            if (empty($request->client_name)) {
                $request->client_name = "";
            }
            $count_save = new count_click();
            $count_save->order_id = $request->order_id;
            $count_save->pstatus = $request->pstatus;
            $count_save->client_email = $request->client_email;
            $count_save->client_name = $request->client_name;
            $count_save->user_id = Auth::user()->id;
            $count_save->total_clicks = 1;
            $count_save->type = $request->type;
            $count_save->save();

            $count_save2 = new count_click2();
            $count_save2->order_id = $request->order_id;
            $count_save2->pstatus = $request->pstatus;
            $count_save2->client_email = $request->client_email;
            $count_save2->client_name = $request->client_name;
            $count_save2->user_id = Auth::user()->id;
            $count_save2->total_clicks = 1;
            $count_save2->type = $request->type;
            $count_save2->save();

        }

        return $count_save->total_clicks;
    }

    public function expected_date($order_id, $user_id, $pstatus, $expected_date)
    {

        if (!empty($expected_date)) {
            $count_save = count_day::where('order_id', '=', $order_id)
                ->first();

            if ($count_save) {

                $count_save->user_id = $user_id;
                $count_save->expected_date = $expected_date;
                $count_save->pstatus = $pstatus;
                $count_save->save();

            } else {

                $count_save = new count_day();
                $count_save->user_id = $user_id;
                $count_save->order_id = $order_id;
                $count_save->expected_date = $expected_date;
                $count_save->pstatus = $pstatus;
                $count_save->save();
            }
        }

    }

    public function get_pickup_date(Request $request)
    {
        $data = AutoOrder::find($request->order_id);

        return response()->json($data, 200);
    }

    public function get_count(Request $request)
    {


        $phone = count_click::where('order_id', '=', $request->order_id)
            ->where('user_id', '=', Auth::user()->id)
            ->where('type', '=', 1)
            ->select('total_clicks')
            ->first();


        $sms = count_click::where('order_id', '=', $request->order_id)
            ->where('user_id', '=', Auth::user()->id)
            ->where('type', '=', 2)
            ->select('total_clicks')
            ->first();

        $email = count_click::where('order_id', '=', $request->order_id)
            ->where('user_id', '=', Auth::user()->id)
            ->where('type', '=', 3)
            ->select('total_clicks')
            ->first();


        $dt_ar = array();


        if (!empty($phone->total_clicks)) {
            $dt_ar['phone'] = $phone->total_clicks;
        }
        if (!empty($sms->total_clicks)) {
            $dt_ar['sms'] = $sms->total_clicks;

        }
        if (!empty($email->total_clicks)) {
            $dt_ar['email'] = $email->total_clicks;
        }

        return json_encode($dt_ar);


    }


}
