<?php

namespace App\Http\Controllers\phone_quote\carrier;

use App\call_history;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\role;
use App\AutoOrder;
use App\report;
use App\zipcodes;
use App\count_click;
use App\count_carrier;
use App\count_carrier_history;
use App\carrier;
use App\carriers_company;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use DB;
use App\count_day;
use Carbon;
use Vinkla\Hashids\Facades\Hashids;

class CarrierController extends Controller
{

    public function carrier_list(Request $request)
    {


        $data = carrier::orderby("orderId", 'DESC')->paginate(50);
        if ($request->ajax()) {
            return view('main.phone_quote.carrier.load', compact('data'))->render();
        }else{
            return view('main.phone_quote.carrier.carrierlist', compact('data'));
        }


    }

    public function get_carrier_by_location(Request $request)
    {

        //$request->olcation = "Bessemer,AL,35023";
        //$request->dlcation = "Bessemer,AL,35023";


        if (isset($request->olcation) && isset($request->dlcation)) {


            $data = DB::select("select `auto_orders`.`carrier_id`, `carriers`.`id`,`carriers`.`companyname`, `carriers`.`orderId`, `carriers`.`location`, `carriers`.`mcno`, `carriers`.`companyphoneno`, `carriers`.`driverphoneno`, `carriers`.`est_pickupdate`, `carriers`.`est_deliverydate`, `carriers`.`askprice`, `carriers`.`opt_insurance`, `carriers`.`opt_negative`, `carriers`.`negative_no`, `carriers`.`comments`, `carriers`.`created_at` from `carriers` left join `auto_orders` on `auto_orders`.`carrier_id` = `carriers`.`id` where `auto_orders`.`originzsc` = '$request->olcation' and  `auto_orders`.`destinationzsc` = '$request->dlcation' ");


            if (count($data) > 0) {

                return view('main.phone_quote.new.compare_carrier', compact('data'));
            }


        }


    }

    public function find_carrier(Request $request)
    {

        if (isset($request->originstate) && isset($request->destinationstate)) {
            $order_id = $request->order_id;
            $originstate = $request->originstate;
            $destinationstate = $request->destinationstate;

//            $data = carriers_company::orderby("id", 'DESC')
//                ->where('typev','Carrier')
//                ->where('address', 'like', "%$originstate%")
//                ->orwhere('address', 'like', "%$destinationstate%")
//                ->groupby('company_name')
//                ->get();


            $data = carriers_company::groupby('company_name')
                ->where(function ($q) use ($originstate, $destinationstate) {
                    $q->where('typev','Carrier');
                })
                ->where(function ($q) use ($request,$originstate,$destinationstate) {
                    $q->orwhere('address', 'like', "%$originstate%")
                       ->orwhere('address', 'like', "%$destinationstate%");
                    ;
                })
                ->get();

            if (count($data) > 0) {

                return view('main.phone_quote.carrier2.load3', compact('data','order_id'));
            }
        }


    }


    public function assign_find_carrier(Request $request){

        if(isset($request->select_id) && isset($request->order_id)){

            $carrier_company = carriers_company::find($request->select_id);

            $carrier = carrier::where('orderId',$request->order_id)->where('carrier_id',$request->select_id)->first();
            if(empty($carrier)) {
                $carrier = new carrier();
                $carrier->orderId = $request->order_id;
                $carrier->companyname = $carrier_company->company_name;
                $carrier->location = $carrier_company->address;
                $carrier->mcno = $carrier_company->company_name;
                $carrier->companyphoneno = $carrier_company->main_number;
                $carrier->driverphoneno = $carrier_company->local_number;
                $carrier->est_pickupdate = date('Y-m-d');
                $carrier->est_deliverydate = date('Y-m-d');
                $carrier->askprice = null;
                $carrier->opt_insurance = null;
                $carrier->opt_negative = null;
                $carrier->negative_no = null;
                $carrier->carrier_id = $request->select_id;
                $carrier->comments = $carrier_company->typev;
                $carrier->save();
            }


        }

    }

    public function count_carrier(Request $request){

        if(isset($request->order_id) && isset($request->carrier_id)){

            $autoorders = AutoOrder::find($request->order_id);

            $count_carrier = count_carrier::where('order_id',$request->order_id)
                ->where('user_id',Auth::user()->id)
                ->where('carrier_id',$request->carrier_id)
                ->first();
            if(empty($count_carrier)){

                $count_carrier = new count_carrier();
                $count_carrier->order_id = $autoorders->id;
                $count_carrier->client_email = $autoorders->oemail;
                $count_carrier->client_name = $autoorders->oname;
                $count_carrier->pstatus = $autoorders->pstatus;
                $count_carrier->total_clicks = 1;
                $count_carrier->user_id = Auth::user()->id;
                $count_carrier->carrier_id = $request->carrier_id;
                $count_carrier->save();

            }else{

                $count_carrier->client_email = $autoorders->oemail;
                $count_carrier->client_name = $autoorders->oname;
                $count_carrier->pstatus = $autoorders->pstatus;
                $count_carrier->total_clicks = $count_carrier->total_clicks + 1;
                $count_carrier->save();
            }

            return $count_carrier->total_clicks;


        }

    }

    function get_user_name($id)
    {

        $query = \App\User::where('id', $id)->first();
        if(!empty($query)){
            return $query->name;
        }else{
            return '';
        }

    }

    public function carrier_history(Request $request){

        if(isset($request->order_id) && isset($request->carrier_id)){

            $temp = "";
            $autoorders = AutoOrder::find($request->order_id);

            $count_carrier = count_carrier_history::where('orderId',$request->order_id)
                ->where('carrier_id',$request->carrier_id)
                ->orderby('id','desc')
                ->get();
            $maker = "";
            $i = 0;
            foreach ($count_carrier as  $val){
                if(empty($val->history)){
                    $val->history = "N/A";
                }
                $span = "<span class='badge badge-dark' >".$val->history."</span>";
                $maker = ucwords($this->get_user_name($val->userId))."(".$val->created_at.") :- ".$span;
                if($i==0) {
                    $temp =  $maker;

                }else{
                    $temp = $temp . "<br>" . $maker;

                }
                $i++;
            }
            return trim($temp);


        }
    }

    public function carrier_history_post(Request $request){

        if(isset($request->ca_order_id) && isset($request->ca_carrier_id)){


            $count_carrier = new count_carrier_history();
            $count_carrier->userId = Auth::user()->id;
            $count_carrier->carrier_id =$request->ca_carrier_id;
            $count_carrier->orderId =$request->ca_order_id;
            $count_carrier->history =$request->ca_carrier_comments;
            $count_carrier->save();


            return Redirect::back();
        }
    }

    public function carrier_list2(Request $request)
    {


        $data = carriers_company::orderby("id", 'DESC')->paginate(50);
        if ($request->ajax()) {
            return view('main.phone_quote.carrier2.load2', compact('data'));

        }else{
            return view('main.phone_quote.carrier2.carrierlist2', compact('data'));
        }

    }

    public function carrier_add($id = null, Request $request)
    {
        if (!empty($id) && !is_null($id)) {
            $orderid = $id;
        } else {
            $orderid = $request->orderid;
        }
        $carrier = AutoOrder::find($orderid);
        if ($carrier == '') {
            Session::flash('flash_message', 'Order Id is not exist');
            return redirect()->back();
        } else {
            return view('main.phone_quote.carrier.index', compact('orderid'));
        }


    }

    public function store_carrier(Request $request)
    {

        //   dd($request);
        $carrier = new carrier();
        $carrier->orderId = $request->orderid;
        $carrier->companyname = $request->company_name;
        $carrier->location = $request->location;
        $carrier->mcno = $request->mc_no;
        $carrier->companyphoneno = $request->companyphone;
        $carrier->driverphoneno = $request->driverphone;
        $carrier->est_pickupdate = date('Y-m-d', strtotime($request->pickupdate));
        $carrier->est_deliverydate = date('Y-m-d', strtotime($request->deliverydate));
        $carrier->askprice = $request->askprice;
        if (isset($request->askinsurance) && $request->askinsurance == '1') {
            $carrier->opt_insurance = $request->askinsurance;
        } else {
            $carrier->opt_insurance = '0';
        }
        if (isset($request->negative) && $request->negative == '1') {
            $carrier->opt_negative = $request->negative;
        } else {
            $carrier->opt_negative = '0';
        }

        if (!empty($request->negativenovalue)) {
            $carrier->negative_no = $request->negativenovalue;
        } else {
            $carrier->negative_no = null;
        }

        $carrier->comments = $request->comments;

        $carrier->save();

        return redirect('/dashboard');
    }

    public function get_carrier(Request $request)
    {

        $data = carrier::where('orderId', $request->order_id)->select('*')->get();

        return response()->json($data, 200);

    }

    public function get_carrier_name(Request $request)
    {

        $data = array();
        $searchOrigin = $request->term;
        $data = DB::select("select companyname from carriers where companyname LIKE '" . $searchOrigin . "%'  ORDER BY id desc");
        if ($data) {
            foreach ($data as $val) {
                array_push($data, $val->companyname);
            }
        }
        return $data;

    }

    public function get_carrier_detail(Request $request)
    {
        $data = carrier::where('companyname', $request->carriername)->first();
        return $data;
    }

    public function carrier_add_new()
    {
        return view('main.phone_quote.carrier2.add_carrier');
    }

    public function store_carrier222(Request $request)
    {

        //   dd($request);
        $carrier = new carriers_company();
        $carrier->typev = $request->typev;
        $carrier->company_name = $request->company_name;
        $carrier->address = $request->location;
        $carrier->main_number = $request->companyphone;
        $carrier->local_number = $request->localphone;
        $carrier->truck = $request->truck;
        $carrier->equipment = $request->equipments;
        $carrier->route_description = $request->routedescription;

        $carrier->save();

        return redirect('/carrier_list2');
    }

}
