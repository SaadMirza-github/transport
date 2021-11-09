<?php

namespace App\Http\Controllers\phone_quote\management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\chat;
use App\role;
use App\zipcodes;
use App\AutoOrder;
use App\count_click2;
use App\call_history;
use App\profit;
use App\general_settings;
use App\payment_log;
use Carbon\Carbon;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use DB;
use Vinkla\Hashids\Facades\Hashids;
use App\order_assign;


class ManagementController extends Controller
{
    public function user_report()
    {
        $data = array();
        $get_roles = role::where('id', 2)->orwhere('id', 3)->get();

        return view('main.management.user_report', compact('get_roles', 'data'));
    }

    public function get_user_by_role(Request $request)
    {
        $users = user::where('role', $request->userrole)->get();
        return $users;
    }

    public function get_assign_data(Request $request)
    {
        $data = array();

        if ($request->rollid == 2) {
            $data = AutoOrder::where('assign_ordertaker_id', '=', $request->user_id)
                ->orwhere('assign_other_ordertaker', 'like', '%' . $request->user_id . '%')
                ->whereBetween('created_at', [$request->date_from, $request->date_to])
                ->get();
        }
        if ($request->rollid == 3) {
            $data = AutoOrder::where('assign_orderdispatcher_id', '=', $request->user_id)
                ->orwhere('assign_other_orderdispatcher', 'like', '%' . $request->user_id . '%')
                ->whereBetween('created_at', [$request->date_from, $request->date_to])
                ->get();
        }


        foreach ($data as $key => $val) {

            $data[$key]['total_sms'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 2)->count();
            $data[$key]['total_call'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 1)->count();
            $data[$key]['total_email'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 3)->count();
            $data[$key]['call_history'] = call_history::where('orderId', $val->id)->where('userId', $request->user_id)->count();
            $data[$key]['call_connected'] = call_history::where('orderId', $val->id)->where('userId', $request->user_id)->where('is_connected', 1)->count();
            $data[$key]['call_not_connected'] = call_history::where('orderId', $val->id)->where('userId', $request->user_id)->where('is_connected', 2)->count();

        }
        //dd($data);


        $get_roles = role::where('id', 2)->orwhere('id', 3)->get();


        return view('main.management.user_report_load', compact('data', 'get_roles'));
    }

    public function get_assign_data2(Request $request)
    {
        $setting = general_settings::where('user_id', Auth::user()->id)->first();
        $data = array();
        $chart = array();
        $all_status = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
        $chart = array();

        if ($request->rollid == 2) {

            $data = AutoOrder::where('assign_ordertaker_id', '=', $request->user_id)
                ->orwhere('assign_other_ordertaker', 'like', '%' . $request->user_id . '%')
                ->whereBetween('created_at', [$request->date_from, $request->date_to])
                ->get();

            for ($i = 0; $i < count($all_status); $i++) {
                $current_year = date('Y');   //2021
                $minimum_year = date('Y') - 5; //2016
                while ($current_year >= $minimum_year) {
                    $sql = AutoOrder::WhereYear('created_at', $current_year)
                        ->where('pstatus', '=', $all_status[$i])
                        ->where('assign_ordertaker_id', '=', $request->user_id)
                        ->orwhere('assign_other_ordertaker', 'like', '%' . $request->user_id . '%')
                        ->count();
                    if (empty($sql)) {
                        $sql = 0;
                    }
                    array_push($chart, $sql);
                    $current_year--;
                }
            }

        }


        if ($request->rollid == 3) {

            $data = AutoOrder::where('assign_orderdispatcher_id', '=', $request->user_id)
                ->orwhere('assign_other_orderdispatcher', 'like', '%' . $request->user_id . '%')
                ->whereBetween('created_at', [$request->date_from, $request->date_to])
                ->get();

            for ($i = 0; $i < count($all_status); $i++) {
                $current_year = date('Y');   //2021
                $minimum_year = date('Y') - 5; //2016
                while ($current_year >= $minimum_year) {
                    $sql = AutoOrder::WhereYear('created_at', $current_year)
                        ->where('pstatus', '=', $all_status[$i])
                        ->where('assign_orderdispatcher_id', '=', $request->user_id)
                        ->orwhere('assign_other_orderdispatcher', 'like', '%' . $request->user_id . '%')
                        ->count();
                    if (empty($sql)) {
                        $sql = 0;
                    }
                    array_push($chart, $sql);
                    $current_year--;
                }
            }
        }


        foreach ($data as $key => $val) {
            $data[$key]['total_sms'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 2)->count();
            $data[$key]['total_call'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 1)->count();
            $data[$key]['total_email'] = count_click2::where('order_id', $val->id)->where('user_id', $request->user_id)->where('type', 3)->count();
            $data[$key]['call_history'] = call_history::where('orderId', $val->id)->where('userId', $request->user_id)->count();

        }


        //dd($data);
        $get_roles = role::where('id', 2)->orwhere('id', 3)->get();


        return view('main.management.user_report_load2_chart'
            , compact('data', 'get_roles', 'currentYear', 'dataperformance',
                'intertesed', 'followmore', 'listed', 'completed', 'chart'));
    }

    public function user_performance()
    {
        return view('main.management.user_performance');
    }

    public function admin_portal()
    {
        return view('main.admin.admin_portal');
    }

    public function earning()
    {
        return view('main.admin.earning');
    }

    public function get_earning_chart(Request $request)
    {

        $setting = general_settings::where('user_id', Auth::user()->id)->first();

        $earning = array();

        $sumearning = 0;
        /*
        $total_earning_go = AutoOrder::where('created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('paynal_type', '=',0)
            ->sum('payment');
        */

        $total_earning_go = DB::table('auto_orders as au')
            ->join('profit as pf', 'au.id', '=', 'pf.order_id')
            ->where('au.created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('au.created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('au.paynal_type', '=', 0)
            ->where('au.created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->sum('pf.profit');
        $earning[] = $total_earning_go;
        $sumearning = $total_earning_go;
        /*
        $total_earning_uship = AutoOrder::where('created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('paynal_type', '=', 1)
            ->sum('payment');
        */

        $total_earning_uship = DB::table('auto_orders as au')
            ->join('profit as pf', 'au.id', '=', 'pf.order_id')
            ->where('au.created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('au.created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('au.paynal_type', '=', 1)
            ->where('au.created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->sum('pf.profit');
        $earning[] = $total_earning_uship;
        $sumearning = $sumearning + $total_earning_uship;

        /*
        $total_earning_heavy = AutoOrder::where('created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('paynal_type', '=', 2)
            ->sum('payment');
        */

        $total_earning_heavy = DB::table('auto_orders as au')
            ->join('profit as pf', 'au.id', '=', 'pf.order_id')
            ->where('au.created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('au.created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('au.paynal_type', '=', 2)
            ->where('au.aucreated_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->sum('pf.profit');
        $earning[] = $total_earning_heavy;
        $sumearning = $sumearning + $total_earning_heavy;

        /*
        $total_earning_delaer = AutoOrder::where('created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('customer_or_delear', '=', 2)
            ->sum('payment');
        */
        $total_earning_delaer = DB::table('auto_orders as au')
            ->join('profit as pf', 'au.id', '=', 'pf.order_id')
            ->where('au.created_at', '>=', date('Y-m-d', strtotime($request->fromdate)))
            ->where('au.created_at', '<=', date('Y-m-d', strtotime($request->todate)))
            ->where('customer_or_delear', '=', 2)
            ->where('au.created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->sum('pf.profit');
        $earning[] = $total_earning_delaer;
        $sumearning = $sumearning + $total_earning_delaer;

        $earning[] = $sumearning;

        if (!empty($earning)) {
            return $earning;
        } else {
            return 0;
        }
    }


    public function quotes(Request $request)
    {
        $setting = general_settings::where('user_id', Auth::user()->id)->first();

        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $quotes_go_generated = AutoOrder::where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_go_booked = AutoOrder::where('pstatus', 8)->where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();

        $quotes_go_delivered = AutoOrder::where('pstatus', 12)->where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_go_cancelled = AutoOrder::where('pstatus', 14)->where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_go_old = AutoOrder::where('old_code', '!=', null)->where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_go_dealer = AutoOrder::where('customer_or_delear', 2)->where('paynal_type', 0)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();

        $quotes_uship_generated = AutoOrder::where('paynal_type', 1)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_uship_booked = AutoOrder::where('paynal_type', 1)->where('pstatus', 8)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_uship_delivered = AutoOrder::where('paynal_type', 1)->where('pstatus', 12)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_uship_cancelled = AutoOrder::where('paynal_type', 1)->where('pstatus', 14)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_uship_old = AutoOrder::where('old_code', '!=', null)->where('paynal_type', 1)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_uship_dealer = AutoOrder::where('customer_or_delear', 2)->where('paynal_type', 1)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();

        $quotes_heavy_generated = AutoOrder::where('paynal_type', 2)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_heavy_booked = AutoOrder::where('paynal_type', 2)->where('pstatus', 8)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_heavy_delivered = AutoOrder::where('paynal_type', 2)->where('pstatus', 12)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_heavy_cancelled = AutoOrder::where('paynal_type', 2)->where('pstatus', 14)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_heavy_old = AutoOrder::where('old_code', '!=', null)->where('paynal_type', 2)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();
        $quotes_heavy_dealer = AutoOrder::where('customer_or_delear', 2)->where('paynal_type', 2)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->count();


        if (!empty($quotes_go_generated) && $quotes_go_generated <> 0) {
            //booked percentage
            $book_perc_booked_go = ($quotes_go_booked / $quotes_go_generated) * 100;
            //cancell percentage
            $cancell_perc_booked_go = ($quotes_go_cancelled / $quotes_go_generated) * 100;
        } else {
            $book_perc_booked_go = 0;
            $cancell_perc_booked_go = 0;
        }
        if (!empty($quotes_uship_generated) && $quotes_uship_generated <> 0) {
            $book_perc_uship = ($quotes_uship_booked / $quotes_uship_generated) * 100;
            $cancell_perc_uship = ($quotes_uship_cancelled / $quotes_uship_generated) * 100;
        } else {
            $book_perc_uship = 0;
            $cancell_perc_uship = 0;
        }
        if (!empty($quotes_heavy_generated) && $quotes_heavy_generated <> 0) {
            $book_perc_heavy = ($quotes_heavy_booked / $quotes_heavy_generated) * 100;
            $cancell_perc_heavy = ($quotes_heavy_cancelled / $quotes_heavy_generated) * 100;
        } else {
            $book_perc_heavy = 0;
            $cancell_perc_heavy = 0;
        }


        $tot_generated = $quotes_go_generated + $quotes_uship_generated + $quotes_heavy_generated;
        $tot_booked = $quotes_go_booked + $quotes_uship_booked + $quotes_heavy_booked;
        $tot_delivered = $quotes_go_delivered + $quotes_uship_delivered + $quotes_heavy_delivered;

        $tot_book_perc = $book_perc_booked_go + $book_perc_uship + $book_perc_heavy / 3;
        $tot_cancell_perc = $cancell_perc_booked_go + $cancell_perc_uship + $cancell_perc_heavy / 3;

        $tot_old_quotes = $quotes_go_old + $quotes_uship_old + $quotes_heavy_old;
        $tot_dealer_quotes = $quotes_go_dealer + $quotes_uship_dealer + $quotes_heavy_dealer;

        return view('main.admin.quotes',
            compact('quotes_go_generated', 'quotes_go_booked',
                'quotes_go_delivered', 'quotes_go_old', 'quotes_uship_generated', 'quotes_uship_booked',
                'quotes_uship_delivered', 'quotes_uship_old', 'quotes_heavy_generated', 'quotes_heavy_booked',
                'quotes_heavy_delivered', 'quotes_heavy_old', 'quotes_go_dealer',
                'quotes_uship_dealer', 'tot_generated', 'tot_booked', 'tot_delivered',
                'book_perc_booked_go', 'book_perc_uship', 'book_perc_heavy', 'book_perc_dealer', 'cancell_perc_booked_go',
                'cancell_perc_uship', 'cancell_perc_heavy', 'cancell_perc_dealer', 'tot_book_perc', 'tot_cancell_perc'
                , 'quotes_old_booked', 'quotes_old_delivered', 'book_perc_old_code',
                'cancell_perc_old_code', 'quotes_heavy_dealer', 'tot_old_quotes', 'tot_dealer_quotes', 'from_date', 'to_date', 'to_date'));
    }

    public function review()
    {
        return view('main.admin.review');
    }

    public function performance(Request $request)
    {
        $users = array();
        
        return view('main.admin.performance', compact('users'));
    }

    public function performance_load(Request $request)
    {
        $users = array();
        $ordertaker_or_dispatcher = $request->ordertaker_dispatcher;
        $monthyear = $request->monthv;

        if ($request->ordertaker_dispatcher == 1) {

            $users = DB::table('roles as rs')
                ->select('us.name as user_name', 'us.id as id')
                ->leftjoin('users as us', 'rs.id', '=', 'us.role')
                ->where('rs.id', '=', 2)
                ->get();
        }
        if ($request->ordertaker_dispatcher == 2) {

            $users = DB::table('roles as rs')
                ->select('us.name as user_name', 'us.id as id')
                ->leftjoin('users as us', 'rs.id', '=', 'us.role')
                ->where('rs.id', '=', 3)
                ->get();
        }

        return view('main.admin.performance_load', compact('users', 'monthyear', 'ordertaker_or_dispatcher'));
    }
    public function rating_load(Request $request)
    {
        $users = array();
        $ordertaker_or_dispatcher = $request->ordertaker_dispatcher;
        $monthyear = $request->monthv;

        if ($request->ordertaker_dispatcher == 1) {

            $users = DB::table('roles as rs')
                ->select('us.name as user_name', 'us.id as id')
                ->leftjoin('users as us', 'rs.id', '=', 'us.role')
                ->where('rs.id', '=', 2)
                ->get();
        }
        if ($request->ordertaker_dispatcher == 2) {

            $users = DB::table('roles as rs')
                ->select('us.name as user_name', 'us.id as id')
                ->leftjoin('users as us', 'rs.id', '=', 'us.role')
                ->where('rs.id', '=', 3)
                ->get();
        }

        return view('main.admin.rating_load', compact('users', 'monthyear', 'ordertaker_or_dispatcher'));
    }
    public function qa_portal()
    {
        return view('main.admin.qa_portal');
    }

    public function get_ordertaker_dispatcher(Request $request)
    {
        $users = User::where('role', $request->id)->get();
        return response()->json(['users' => $users]);
    }

    public function qa_submit(Request $request){

        if(isset($request->monthv) && isset($request->rating_points)){

            $comments = $request->comments;
            $order_ids = $request->order_ids;
            $rating_points = $request->rating_points;
            $monthv =  $request->monthv;
            $user_id = $request->user_id;

            if(count($rating_points) > 0){
                foreach ($rating_points as $key=>$value) {
                    $qamodel = order_assign::where('assign_user_id', $user_id)->where('order_id', $order_ids[$key])->first();
                    $qamodel->ratting = $rating_points[$key];
                    $qamodel->comments = $comments[$key];
                    $qamodel->save();
                }

                echo "SUCCESS";
            }

        }


    }

    public function get_orders_qa(Request $request)
    {

        if(isset($request->monthv)) {
            $month = date('m',strtotime($request->monthv));
            $year = date('Y',strtotime($request->monthv));
            $get_user_orders = order_assign::where('assign_user_id', $request->employeeid)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
            return response()->json(['get_user_orders' => $get_user_orders]);
        }
    }

    public function get_orders_qa2(Request $request)
    {

        if(isset($request->date_from)) {

            $get_user_orders = order_assign::where('assign_user_id', $request->employeeid)
                ->whereBetween('created_at', [$request->date_from, $request->date_to])
                ->get();
            return response()->json(['get_user_orders' => $get_user_orders]);
        }
    }

    public function dashboard_admin()
    {
        $setting = general_settings::orderby('id','desc')->first();
        $data_array = array();
        if (Auth::user()->role == 1) {
            $new = AutoOrder::where('pstatus', 0)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->count('id');
            $interested = AutoOrder::where('pstatus', 1)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->count('id');
            $paymissing = AutoOrder::where('pstatus', 7)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->count('id');
            $listed = AutoOrder::where('pstatus', 9)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->count('id');
            $completed = AutoOrder::where('pstatus', 13)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->count('id');

            $all_status = array(0, 1, 7, 9, 13);
            $chart = array();
            for ($i = 0; $i < count($all_status); $i++) {
                $current_year = date('Y');   //2021
                $minimum_year = date('Y') - 5; //2016
                while ($current_year > $minimum_year) {
                    //for ($j = date('Y'); $j >= date('Y') - 5; $j--) {
                    if ($all_status[$i] == 0) {
                        $sql = AutoOrder::WhereYear('created_at', $current_year)
                            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                            ->count();
                    } else {
                        $sql = AutoOrder::WhereYear('created_at', $current_year)
                            ->where('pstatus', $all_status[$i])
                            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                            ->count();
                    }
                    $current_year--;
                    //dd($sql);
                    if (empty($sql)) {
                        $sql = 0;
                    }
                    array_push($chart, $sql);
                }
            }
            return view('main.admin.dashboard_admin', compact('new', 'interested', 'paymissing', 'listed', 'completed', 'chart', 'data_array'));
        } else {
            $role = User::where('role', Auth::user()->role)->first();
            $rolelist = role::all();
            $data_array = array();

            $new = 0;
            $active = 0;
            $book = 0;
            $listed = 0;
            $dispatch = 0;
            $picked_up = 0;
            $deliver = 0;
            $total_orders = 0;

            if (Auth::user()->role == 2) {

                $user_id = Auth::user()->id;
                $get_user_orders = order_assign::where('assign_type', 2)->where('assign_user_id', $user_id)->get();

                foreach ($get_user_orders as $val) {
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id', $val->order_id)
                        ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                        ->first();
                    if (!empty($auto_orders)) {
                        $pstatus = $auto_orders->pstatus;
                        if ($pstatus == 0) {
                            $new++;
                        } else if ($pstatus == 19) {
                            $active++;
                        } else if ($pstatus == 8) {
                            $book++;
                        } else if ($pstatus == 9) {
                            $listed++;
                        } else if ($pstatus == 10) {
                            $dispatch++;
                        } else if ($pstatus == 11) {
                            $picked_up++;
                        } else if ($pstatus == 12) {
                            $deliver++;
                        }

                        $data_array['new'] = $new;
                        $data_array['active'] = $active;
                        $data_array['booked'] = $book;
                        $data_array['listed'] = $listed;
                        $data_array['dispatch'] = $dispatch;
                        $data_array['picked_up'] = $picked_up;
                        $data_array['deliver'] = $deliver;
                    }
                }

            } else if (Auth::user()->role == 3) {

                $user_id = Auth::user()->id;
                $current_month = date('m');

                $get_user_orders = order_assign::whereMonth('created_at', '=', date('m'))->where('assign_type', 3)->where('assign_user_id', $user_id)->get();
                foreach ($get_user_orders as $val) {
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id', $val->order_id)
                        ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                        ->first();
                    if (!empty($auto_orders)) {
                        $pstatus = $auto_orders->pstatus;
                        if ($pstatus == 0) {
                            $new++;
                        } else if ($pstatus == 19) {
                            $active++;
                        } else if ($pstatus == 8) {
                            $book++;
                        } else if ($pstatus == 9) {
                            $listed++;
                        } else if ($pstatus == 10) {
                            $dispatch++;
                        } else if ($pstatus == 11) {
                            $picked_up++;
                        } else if ($pstatus == 12) {
                            $deliver++;
                        }

                        $data_array['new'] = $new;
                        $data_array['active'] = $active;
                        $data_array['booked'] = $book;
                        $data_array['listed'] = $listed;
                        $data_array['dispatch'] = $dispatch;
                        $data_array['picked_up'] = $picked_up;
                        $data_array['deliver'] = $deliver;

                    }
                }
            }

            $total_orders = $new + $active + $book + $listed + $dispatch + $picked_up + $deliver;
            return view('main.dashboard.index', compact('role', 'rolelist', 'data_array', 'total_orders'));
        }

    }

    public function get_chart_1(Request $request)
    {
       $setting = general_settings::orderby('id','desc')->first();
        $year = $_GET['yearv'];
        $month = $_GET['monthv'];
        $penaltype = $_GET['panel_type2'];

        $get_month = array();
        $allstatus = array(0, 1, 7, 9, 13);

        for ($i = 0; $i < count($allstatus); $i++) {
            if (!empty($penaltype)) {
                $get_month[$i] = AutoOrder::where('pstatus', $allstatus[$i])
                    ->where('paynal_type', $penaltype)
                    ->WhereYear('created_at', $year)
                    ->WhereMonth('created_at', $month)
                    ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                    ->count();
            } else {
                $get_month[$i] = AutoOrder::where('pstatus', $allstatus[$i])
                    ->WhereYear('created_at', $year)
                    ->WhereMonth('created_at', $month)
                    ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                    ->count();
            }
        }
        return $get_month;
    }

    public function listing_profit()
    {

        $data = profit::orderby('id', 'desc')->paginate(50);
        $sumofprofit = $data->sum('profit');

        return view('main.management2.listing_profit', compact('data', 'sumofprofit'));

    }

    public function get_profit(Request $request)
    {

        $data = profit::orderby('id', 'desc')->paginate(50);
        $sumofprofit = $data->sum('profit');

        return view('main.management2.show', compact('data', 'sumofprofit'))->render();
    }

    public function all_completed_orders_list()
    {
       $setting = general_settings::orderby('id','desc')->first();
       $current_month = date('Y-m');
        $data = AutoOrder::where('pstatus', 13)
            ->whereMonth('created_at', date('m', strtotime($current_month)))
            ->whereYear('created_at', date('Y', strtotime($current_month)))
            ->orderby('id', 'desc')->paginate(50);
        return view('main.management2.all_completed_orders_list', compact('data'));
    }

    public function show_payment_logs(Request $request){

       // $payment_log = payment_log::where('orderId', '=', $request->orderid)->get();
        $payment_log = DB::table('payment_logs as plog')
            ->select('plog.*','profit.profit')
            ->leftjoin('profit as profit','plog.orderId','=','profit.order_id')
            ->where('plog.orderId', '=', $request->orderid)
            ->get();
        echo $payment_log;
    }

    public function get_completed_orders(Request $request)
    {
       $setting = general_settings::orderby('id','desc')->first();
        $data = AutoOrder::where('pstatus', 13)
            ->orderby('id', 'desc')
            ->where(function ($q) use ($request) {
                if (isset($request->monthyear) && !empty($request->monthyear)) {
                    $q->whereMonth('created_at', date('m', strtotime($request->monthyear)))
                        ->whereYear('created_at', date('Y', strtotime($request->monthyear)));
                }
            })
            ->paginate(50);
        return view('main.management2.show_all_completed', compact('data'))->render();
    }

    public function payment($id)
    {

        $data = AutoOrder::find($id);
        $profit = profit::where('order_id', $id)->first();
        return view('main.management2.payment', compact('data', 'profit'));

    }

    public function store_profit(Request $request)
    {
        $profitsave = profit::where('order_id', $request->orderid)->first();
        if (empty($profitsave)) {
            $profitsave = new profit();
            $profitsave->order_id = $request->orderid;
            $profitsave->profit = $request->profit;
            $profitsave->detail = $request->detail;
            $profitsave->save();
        } else {
            $profitsave->profit = $request->profit;
            $profitsave->detail = $request->detail;
            $profitsave->save();
        }
        return redirect('/listing_profit');
    }

    public function payment_received_list()
    {

        //$data=AutoOrder::orderby('id','desc')->where('paid_status',2)->paginate(50);

        //return view('main.management2.payment_received_list',compact('data'));

       $setting = general_settings::orderby('id','desc')->first();

        $data = DB::table('auto_orders as autoorder')
            ->select('autoorder.*', 'profit.profit as profit')
            ->leftjoin('profit as profit', 'autoorder.id', '=', 'profit.order_id')
            ->where('autoorder.paid_status', 2)
            ->where('autoorder.created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->paginate(50);

        $sumofprofit = $data->sum('profit');

        return view('main.management2.payment_received_list', compact('data', 'sumofprofit'))->render();


    }

    public function get_payment_received(Request $request)
    {
       $setting = general_settings::orderby('id','desc')->first();
        $data = DB::table('auto_orders as autoorder')
            ->select('autoorder.*', 'profit.profit as profit')
            ->leftjoin('profit as profit', 'autoorder.id', '=', 'profit.order_id')
            ->where('autoorder.paid_status', 2)
            ->where('autoorder.created_at', '>=', Carbon::today()->subDays($setting->no_days))    ->where(function ($q) use ($request) {
                if (isset($request->monthyear) && !empty($request->monthyear)) {
                    $q->whereMonth('autoorder.created_at', date('m', strtotime($request->monthyear)))
                        ->whereYear('autoorder.created_at', date('Y', strtotime($request->monthyear)));
                }
            })
            ->paginate(50);
        $sumofprofit = $data->sum('profit');
        return view('main.management2.show_payment_received', compact('data','sumofprofit'))->render();
    }

    public function employee_order()
    {
       $setting = general_settings::orderby('id','desc')->first();
        $data = AutoOrder::where('id', 0)
            ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->paginate(50);
        $userlist = User::all();
        return view('main.management2.employee_order_list', compact('data', 'userlist'));
    }

    public function fetch_employee_order(Request $request)
    {

       $setting = general_settings::orderby('id','desc')->first();
        if (Auth::check()) {
            $req = 0;
            if ($request->ajax()) {
                $data = AutoOrder::where('assign_ordertaker_id', '=', $request->user)
                    ->where('pstatus', '=', $request->ordertype)
                    ->whereMonth('created_at', date('m', strtotime($request->selectmonth)))
                    ->whereYear('created_at', date('Y', strtotime($request->selectmonth)))
                    ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                    ->orderby('id', 'desc')
                    ->paginate(50);
                return view('main.management2.show_employee_order', compact('data'))->render();
            }


        } else {
            return redirect('/loginn/');
        }
    }

    public function all_bookers_list(Request $request)
    {


       $setting = general_settings::orderby('id','desc')->first();
        $data = DB::table('auto_orders as autoorder')
            ->select('autoorder.*', 'booker.user_id as b_user_id', 'booker.other_bookers as b_others'
                , 'dispatchercompleter.user_id as d_user_id', 'dispatchercompleter.other_dispatchers as d_others',
                'profit as profit')
            ->leftjoin('booker as booker', 'autoorder.id', '=', 'booker.order_id')
            ->leftjoin('dispatcher_completer as dispatchercompleter', 'autoorder.id', '=', 'dispatchercompleter.order_id')
            ->leftjoin('profit as profit', 'autoorder.id', '=', 'profit.order_id')
            ->where('autoorder.pstatus', '>', 7)
            ->where('autoorder.created_at', '>=', Carbon::today()->subDays($setting->no_days))
            ->orderby('autoorder.created_at', 'desc')
            ->paginate(50);

        $sumofprofit = $data->sum('profit');
        $sumoflistedprice = $data->sum('listed_price');
        $sumofbokkingprice = $data->sum('payment');


        return view('main.management2.all_bookers_list', compact('data', 'sumofprofit', 'sumoflistedprice','sumofbokkingprice'))->render();
    }

    public function get_all_bookers(Request $request)
    {
       $setting = general_settings::orderby('id','desc')->first();
        if ($request->ajax()) {
            $data = DB::table('auto_orders as autoorder')
                ->select('autoorder.*', 'booker.user_id as b_user_id', 'booker.other_bookers as b_others'
                    , 'dispatchercompleter.user_id as d_user_id', 'dispatchercompleter.other_dispatchers as d_others',
                    'profit as profit')
                ->leftjoin('booker as booker', 'autoorder.id', '=', 'booker.order_id')
                ->leftjoin('dispatcher_completer as dispatchercompleter', 'autoorder.id', '=', 'dispatchercompleter.order_id')
                ->leftjoin('profit as profit', 'autoorder.id', '=', 'profit.order_id')
                ->where('autoorder.pstatus', '>', 7)
                ->where('autoorder.created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->where(function ($q) use ($request) {
                    if (isset($request->monthyear) && !empty($request->monthyear)) {
                        $q->whereMonth('autoorder.created_at', date('m', strtotime($request->monthyear)))
                            ->whereYear('autoorder.created_at', date('Y', strtotime($request->monthyear)));
                    }
                })
                ->orderby('autoorder.created_at', 'desc')
                ->paginate(50);
            $sumofprofit = $data->sum('profit');
            //$sumofl                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
            $sumoflistedprice = $data->sum('listed_price');

            $sumofbokkingprice = $data->sum('payment');

            return view('main.management2.show_all_bookers', compact('data', 'sumofprofit', 'sumoflistedprice','sumofbokkingprice'))->render();
            }
    }
}