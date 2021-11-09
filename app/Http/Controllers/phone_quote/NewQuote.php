<?php

namespace App\Http\Controllers\phone_quote;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\role;
use App\Mail\SendOrderMail;
use App\Mail\SendEmailEditor;
use App\zipcodes;
use App\AutoOrder;
use App\report;
use App\singlereport;
use App\orderpayment;
use App\order_count;
use App\general_setting;
use App\general_settings;
use App\creditcard;
use App\WPPricePerm;
use App\UserOld;
use App\VehicleExtra;
use App\WPVehicleListing;
use App\WPGeneralException;
use App\Rules;
use App\order_assign;
use App\call_history;
use App\request_quote;
use App\count_day;
use App\order_history;
use App\carrier;
use App\payment_log;
use App\menu_setting;
use App\count_click2;
use App\profit;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;

use DB;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;
use App\Mail\SendEmailPriceCustomer;

class NewQuote extends Controller
{

    public function calling()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.phone_quote.new_quote.calling', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }


    public function shipment()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.phone_quote.new_quote.shipment', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function heavy()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.phone_quote.new_quote.heavy', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function heavy_car()
    {
        return view('main.phone_quote.new_quote.heavy_car');
    }

    public function heavy_equipment()
    {
        return view('main.phone_quote.new_quote.heavy_equipment');
    }

    public function calling_edit()
    {
        return view('main.phone_quote.new_quote.calling_edit');
    }

    public function shipment_edit()
    {
        return view('main.phone_quote.new_quote.shipment_edit');
    }

    public function heavy_edit()
    {
        return view('main.phone_quote.new_quote.heavy_edit');
    }


    public function get_assign_users(Request $request)
    {

        $checkinassignorder = DB::table('order_assign')
            ->select('order_assign.*', 'users.name')
            ->where('order_assign.order_id', $request->id)
            ->where('order_assign.assign_type', 2)
            ->join('users', 'order_assign.assign_user_id', '=', 'users.id')
            ->get();
        if (count($checkinassignorder) > 0) {

            return response()->json($checkinassignorder, 200);
        } else {
            return [];
        }


    }

    public function get_assign_users2(Request $request)
    {

        $checkinassignorder = DB::table('order_assign')
            ->select('order_assign.*', 'users.name')
            ->where('order_assign.order_id', $request->id)
            ->where('order_assign.assign_type', 3)
            ->join('users', 'order_assign.assign_user_id', '=', 'users.id')
            ->get();
        if (count($checkinassignorder) > 0) {

            return response()->json($checkinassignorder, 200);
        } else {
            return [];
        }


    }


    public function generate_order(Request $request)
    {
        $autoorder = new AutoOrder();
        $autoorder->pstatus = 0;
        $autoorder->paynal_type = $request->paynal_type;
        $autoorder->save();


        if (Auth::user()->role == 2) {

            $checkinassignorder = order_assign::where('order_id', $autoorder->id)
                ->first();
            if (empty($checkinassignorder)) {

                $orderassign = new order_assign();
                $orderassign->order_id = $autoorder->id;
                $orderassign->assign_user_id = Auth::user()->id;
                $orderassign->assign_type = 2;
                $orderassign->monthv = date('Y-m-d');
                $orderassign->save();


                $autoorder->assign_ordertaker_id = Auth::user()->id;
                $autoorder->save();

            }


        } else {

            //Auto assign loop

            $check_order = order_assign::where('order_id', $autoorder->id)
                ->first();
            if (empty($check_order)) {

                $month = date('m');
                $year = date('Y');


                $users = User::where('status', '1')
                    ->where('role', 2)///role order taker
                    ->get();
                $array = array();
                foreach ($users as $key => $user) {
                    $checkinassignorder = order_assign::
                    where('assign_user_id', $user->id)
                        ->whereMonth('monthv', '=', $month)
                        ->whereYear('monthv', '=', $year)
                        ->where('assign_type', '=', 2)
                        ->count();
                    $array2['user_id'] = $user->id;
                    $array2['current_orders'] = $checkinassignorder;

                    array_push($array, $array2);

                }

                if (count($array) > 0) {

                    $find_lowest_row_in_array = array_column($array, 'current_orders');
                    $min_array = $array[array_search(min($find_lowest_row_in_array), $find_lowest_row_in_array)];
                    $lowest_user = $min_array['user_id'];


                    $orderassign = new order_assign();
                    $orderassign->order_id = $autoorder->id;
                    $orderassign->assign_user_id = $lowest_user;
                    $orderassign->assign_type = 2;
                    $orderassign->monthv = date('Y-m-d');
                    $orderassign->save();

                    $autoorder->assign_ordertaker_id = $lowest_user;
                    $autoorder->save();

                }
            }

            //Auto assign loop end

        }


        return $autoorder->id;
    }

    public function save_new_quote(Request $request)
    {
        if (!empty($request->placeorder)) {
            $request->orderid = $request->placeorder;
        }

        $exist = AutoOrder::find($request->orderid);
        if (empty($exist)) {
            $autoorder = new AutoOrder();
        } else {
            $autoorder = AutoOrder::find($request->orderid);
        }

        if (!empty($request->customer_or_dealer)) {
            $autoorder->customer_or_delear = $request->customer_or_dealer;
        }
        if (!empty($request->customer_type)) {
            $autoorder->customer_or_delear = $request->customer_type;
        }


        $autoorder->site_value = $request->sitevalue;
        if (strpos($request->o_zip, ",") !== false) {

            $oozip = explode(',', $request->o_zip);
            $autoorder->originzip = $oozip[2];
            $autoorder->originstate = $oozip[1];
            $autoorder->origincity = $oozip[0];
            $autoorder->originzsc = $request->o_zip;
        }


        if (strpos($request->d_zip, ",") !== false) {

            $dozip = explode(',', $request->d_zip);
            $autoorder->destinationzip = $dozip[2];
            $autoorder->destinationstate = $dozip[1];
            $autoorder->destinationcity = $dozip[0];
            $autoorder->destinationzsc = $request->d_zip;
        }


        if (!empty($request->vyear)) {
            if (count($request->vyear) > 1) {

                $autoorder->year = implode('*^', $request->vyear);
            } else {
                $autoorder->year = $request->vyear[0];
            }

        } else {
            $autoorder->year = '';
        }
        if (!empty($request->vmake)) {

            if (count($request->vmake) > 1) {
                $autoorder->make = implode('*^', $request->vmake);
            } else {
                $autoorder->make = $request->vmake[0];
            }

        } else {
            $autoorder->make = '';
        }


        if (!empty($request->vmodel)) {

            if (count($request->vmodel) > 1) {

                $autoorder->model = implode('*^', $request->vmodel);
            } else {
                $autoorder->model = $request->vmodel[0];
            }

        } else {
            $autoorder->model = '';
        }


        $heading = NULL;


        ///for heavy
        if (!empty($request->year_make_model)) {

            if (count($request->year_make_model) > 1) {
                $autoorder->ymk = implode('*^-', $request->year_make_model);
            } else {

                $autoorder->ymk = $request->year_make_model[0];
            }

        } else {

            if (isset($request->count)) {
                if (count($request->count) > 0) {
                    $numItems = count($request->count);
                    $i = 0;
                    $j = 0;
                    $k = 0;
                    for ($vnM = 0; $vnM <= count($request->count); $vnM++) {
                        if (isset($request->vyear[$vnM]) && isset($request->vmake[$vnM]) && isset($request->vmodel[$vnM])) {
                            if (count($request->count) > 1) {
                                if (isset($request->vyear[$vnM])) {
                                    if (++$i === $numItems) {
                                        $heading .= $request->vyear[$vnM] . ' ';
                                    } else {
                                        $heading .= $request->vyear[$vnM] . ' ';
                                    }
                                }
                                if (isset($request->vmake[$vnM])) {
                                    if (++$j === $numItems) {
                                        $heading .= $request->vmake[$vnM] . ' ';
                                    } else {
                                        $heading .= $request->vmake[$vnM] . ' ';
                                    }
                                }
                                if (isset($request->vmodel[$vnM])) {
                                    if (++$k === $numItems) {
                                        $heading .= $request->vmodel[$vnM];
                                    } else {
                                        $heading .= $request->vmodel[$vnM] . '*^-';
                                    }
                                }
                            } else {
                                if (isset($request->vyear[$vnM]) && $request->vmake[$vnM] && $request->vmodel[$vnM]) {
                                    $heading .= $request->vyear[$vnM] . ' ' . $request->vmake[$vnM] . ' ' . $request->vmodel[$vnM];
                                }
                            }
                        }
                    }
                }
            }
            if ($heading) {
                $autoorder->ymk = $heading;
            } else {
                $autoorder->ymk = '';
            }


        }

        if (!empty($request->vehType)) {

            if (count($request->vehType) > 1) {
                $autoorder->type = implode('*^', $request->vehType);
            } else {

                $autoorder->type = $request->vehType[0];
            }

        } else {
            $autoorder->type = '';
        }

        if (!empty($request->condition)) {
            if (count($request->condition) > 1) {

                $autoorder->condition = implode('*^', $request->condition);

            } else {
                $autoorder->condition = $request->condition[0];
            }

        } else {
            $autoorder->condition = '';
        }


        if (!empty($request->auction)) {
            if (count($request->auction) > 1) {

                $autoorder->is_auction = implode('*^', $request->auction);

            } else {
                $autoorder->is_auction = $request->auction[0];
            }

        } else {
            $autoorder->is_auction = '';
        }

        if (!empty($request->vbrakes)) {
            if (count($request->vbrakes) > 1) {

                $autoorder->brakes = implode('*^', $request->vbrakes);

            } else {
                $autoorder->brakes = $request->vbrakes[0];
            }

        } else {
            $autoorder->brakes = '';
        }

        if (!empty($request->vrolls)) {
            if (count($request->vrolls) > 1) {

                $autoorder->rolls = implode('*^', $request->vrolls);

            } else {
                $autoorder->rolls = $request->vrolls[0];
            }

        } else {
            $autoorder->rolls = '';
        }

        if (!empty($request->vcolor)) {
            if (count($request->vcolor) > 1) {

                $autoorder->color = implode('*^', $request->vcolor);

            } else {
                $autoorder->color = $request->vcolor[0];
            }

        } else {
            $autoorder->color = '';
        }



        if (isset($request->dateavailable)) {
            if ($request->dateavailable != '') {
                $autoorder->available_date = addslashes($request->dateavailable);
            } else {
                $autoorder->available_date = NULL;
            }
        } else {
            $autoorder->available_date = NULL;
        }

        if (!empty($request->trailer_type)) {
            if (count($request->trailer_type) > 1) {
                $autoorder->transport = implode('*^', $request->trailer_type);
            } else {
                $autoorder->transport = $request->trailer_type[0];
            }

        } else {
            $autoorder->transport = '';
        }


        if (isset($request->oname)) {
            if ($request->oname != '') {
                $autoorder->oname = addslashes($request->oname);
            } else {
                $autoorder->oname = NULL;
            }
        } else {
            $autoorder->oname = NULL;
        }


        if (isset($request->oemail)) {
            if ($request->oemail != '') {
                $autoorder->oemail = addslashes($request->oemail);
            } else {
                $autoorder->oemail = NULL;
            }
        } else {
            $autoorder->oemail = NULL;
        }


        if (isset($request->oaddress)) {
            if ($request->oaddress != '') {
                $autoorder->oaddress = addslashes($request->oaddress);
            } else {
                $autoorder->oaddress = NULL;
            }
        } else {
            $autoorder->oaddress = NULL;
        }

        if (isset($request->daddress)) {
            if ($request->daddress != '') {
                $autoorder->daddress = addslashes($request->daddress);
            } else {
                $autoorder->daddress = NULL;
            }
        } else {
            $autoorder->daddress = NULL;
        }

        if (isset($request->additionalinfo)) {
            if ($request->additionalinfo != '') {
                $autoorder->additional_info = addslashes($request->additionalinfo);
            } else {
                $autoorder->additional_info = NULL;
            }
        } else {
            $autoorder->additional_info = NULL;
        }

        if (isset($request->ophone)) {
            if ($request->ophone != '') {
                $autoorder->ophone = addslashes($request->ophone);
            } else {
                $autoorder->ophone = NULL;
            }
        } else {
            $autoorder->ophone = NULL;
        }

        if (!empty($request->price)) {
            $autoorder->price = implode('*^', $request->price);
        }
        if (!empty($request->price)) {
            $autoorder->price = implode('*^', $request->price);
        }

        if (!empty($request->service)) {
            if (count($request->service) > 1) {
                $autoorder->service_type = implode('*^', $request->service);
            } else {
                $autoorder->service_type = $request->service[0];
            }

        } else {
            $autoorder->service_type = '';
        }
        if (!empty($request->lengthft)) {
            $autoorder->length_ft = implode('*^', $request->lengthft);
        }

        if (!empty($request->lengthin)) {
            $autoorder->length_in = implode('*^', $request->lengthin);
        }

        if (!empty($request->widthft)) {
            $autoorder->width_ft = implode('*^', $request->widthft);
        }

        if (!empty($request->widthin)) {
            $autoorder->width_in = implode('*^', $request->widthin);
        }
        if (!empty($request->heightft)) {

            $autoorder->height_ft = implode('*^', $request->heightft);
        }
        if (!empty($request->heightin)) {

            $autoorder->height_in = implode('*^', $request->heightin);
        }

        if (!empty($request->weight)) {
            $autoorder->weight = implode('*^', $request->weight);
        }


        $autoorder->paynal_type = $request->panel_type;

        if (isset($request->orderType)) {
            if ($request->orderType != '') {
                $autoorder->order_type = $request->orderType;
            } else {
                $autoorder->order_type = NULL;
            }
        } else {
            $autoorder->order_type = NULL;
        }

        if (isset($request->customer_type)) {
            if ($request->customer_type != '') {
                $autoorder->customer_type = $request->customer_type;
            } else {
                $autoorder->customer_type = NULL;
            }
        } else {
            $autoorder->customer_type = NULL;
        }


        $uid = Auth::user()->id;

        $dzip = $autoorder->destinationzip;
        $dstate = $autoorder->destinationstate;
        $carrier = $request->trailer_type[0];


        if ($autoorder->pstatus == 0 && empty($autoorder->payment)) {
            $distance = 0;
            $Price = 0;
            if (!empty($autoorder->origincity) && !empty($autoorder->originstate) && !empty($autoorder->originzip) && !empty($autoorder->destinationcity) && !empty($autoorder->destinationstate) && !empty($autoorder->destinationzip) && !empty($carrier)) {


                $selectorigin = zipcodes::where('city', $autoorder->origincity)->where('state', $autoorder->originstate)->where('zipcode', $autoorder->originzip)->first();
                $selectDest = zipcodes::where('city', $autoorder->destinationcity)->where('state', $autoorder->destinationstate)->where('zipcode', $autoorder->destinationzip)->first();

                $distance = '';

                $mydata = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $selectorigin->latitude . ',' . $selectorigin->longitude . '&destinations=' . $selectDest->latitude . ',' . $selectDest->longitude . '&key=AIzaSyAsvXyIoaweH4Q6LKe9De1seJtUYfjdFvs');
                $mydata1 = json_decode($mydata);

                if ($mydata1->status == 'OK') {
                    $distance = ceil(($mydata1->rows['0']->elements['0']->distance->value) / 1000) * 0.621371;
                }
                $distance = ceil($distance);


                if (!empty($distance)) {
                    $selectpermprice = WPPricePerm::where('maxvalue', '>=', round($distance))->where('minvalue', '<=', round($distance))->where('userId', $uid)->first();
                    $selectdomain = UserOld::where('Id', $uid)->first();

                    if ($selectdomain->domain_name != '') {
                        $domainname = $selectdomain->domain_name;
                    } else {
                        $domainname = 'autoquote.com';
                    }
                    $replytoemail = $selectdomain->replytoemail;

                    // mileage cost
                    $basepricehi = $distance * $selectpermprice->mivalue;
                    $basepricenonhi = $distance * $selectpermprice->mavalue;
                    $basepricehi1 = $basepricehi;
                    $basepricenonhi1 = $basepricenonhi;
                    $dposite = 0;

                    //for vehicle1
                    $make1 = $request->vmake[0];

                    $model1 = $request->vmodel[0];
                    $running1 = $request->condition[0];


                    //quote for vehicle1
                    if (!empty($make1) && ($make1 != '') && !empty($model1) && ($model1 != '')) {
                        // value from vehicle size with calculation
                        $selectvehicle = WPVehicleListing::where('make', $make1)->where('model', $model1)->where('UserId', $uid)->first();

                        if ($selectvehicle != '') {
                            $selectvehiclepriceval = VehicleExtra::where('vehicletype', $selectvehicle->size)->where('UserId', $uid)->first();

                            if ($selectvehiclepriceval != '') {

                                if ($selectvehiclepriceval->pervalue) {
                                    $baseprice11 = ($basepricehi1 * $selectvehiclepriceval->pervalue) / 100;//highway
                                    $basepricehi1 = $basepricehi1 + $baseprice11;

                                    $basepricen1 = ($basepricenonhi1 * $selectvehiclepriceval->pervalue) / 100;//nonhighway
                                    $basepricenonhi1 = $basepricenonhi1 + $basepricen1;
                                } else {
                                    if ($selectvehiclepriceval->fixvalue < 0) {
                                        $basepricehi1 = $basepricehi1 - abs($selectvehiclepriceval->fixvalue);

                                        $basepricenonhi1 = $basepricenonhi1 - abs($selectvehiclepriceval->fixvalue);
                                    } else {
                                        $basepricehi1 = $basepricehi1 + abs($selectvehiclepriceval->fixvalue);

                                        $basepricenonhi1 = $basepricenonhi1 + abs($selectvehiclepriceval->fixvalue);
                                    }
                                }

                            }

                        } else {
                            $basepricehi1 = $basepricehi1;
                            $basepricenonhi1 = $basepricenonhi1;
                        }

                        if ($running1 == 1) {
                            $VehicleRunning1 = '1';
                            $VehicleRunning11 = 'Yes';


                            $selectinopprice = WPGeneralException::where('UserId', $uid)->first();
                            $dposite = 0;
                            if ($selectinopprice->isDeposit == 'Yes') {
                                $dposite = $selectinopprice->isDeposit;
                            }


                        } else {
                            // disable vehicle price
                            $selectinopprice = WPGeneralException::where('UserId', $uid)->first();

                            $selectinoppriceval = $selectinopprice->dvprice;
                            $dposite = 0;
                            if ($selectinopprice->isDeposit == 'Yes') {
                                $dposite = $selectinopprice->Deposit;
                            }

                            $basepricenonhi1 = $basepricenonhi1 + $selectinoppriceval;

                            $basepricehi1 = $basepricehi1 + $selectinoppriceval;

                            $VehicleRunning1 = '0';
                            $VehicleRunning11 = 'No';

                        }
                        //echo $basepricehi1.'<br>'.$basepricenonhi1.'<br>';

                        $VehicleMake1 = $make1;
                        $VehicleModel1 = $model1;
                        $dquota = 0;


                        // value from zip and state exception with calculation
                        $zipQuery = Rules::where('Origin', $autoorder->originzip)->where('isZip', 1)->where('UserId', $uid);
                        $zipQuery->where(function ($zipQuery) use ($dzip) {
                            $zipQuery->orWhere('Dest', $dzip);
                            $zipQuery->orWhere('Dest', 'any');
                            $zipQuery->orWhere('Dest', 'origin');
                            $zipQuery->orWhere('Dest', '');
                        });
                        $zipexception1 = $zipQuery->get();

                        if ($zipexception1 != '') {


                            foreach ($zipexception1 as $zipexceptionrec1) {
                                if ($zipexceptionrec1->Quota != "Don't Quota" && ($zipexceptionrec1->Type == "origin" || $zipexceptionrec1->Type == "any" || $zipexceptionrec1->Type == "route")) {
                                    if ($zipexceptionrec1->addorsub == "add") {

                                        $basepricehi1 = $basepricehi1 + $zipexceptionrec1->Quota;
                                        //nonhi
                                        $basepricenonhi1 = $basepricenonhi1 + $zipexceptionrec1->Quota;
                                    }
                                    if ($zipexceptionrec1->addorsub == "sub") {
                                        $basepricehi1 = $basepricehi1 - $zipexceptionrec1->Quota;
                                        //nonhi
                                        $basepricenonhi1 = $basepricenonhi1 - $zipexceptionrec1->Quota;
                                    }
                                    if (!empty($zipexceptionrec1->Quota_in_per) && $zipexceptionrec1->addorsub == "add" && $zipexceptionrec1->Quota == '') {
                                        $basepricehi1 += (($zipexceptionrec1->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 += (($zipexceptionrec1->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if (!empty($zipexceptionrec1->Quota_in_per) && $zipexceptionrec1->addorsub == "sub" && $zipexceptionrec1->Quota == '') {
                                        $basepricehi1 -= (($zipexceptionrec1->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 -= (($zipexceptionrec1->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if ($zipexceptionrec1->addorsub == "") {
                                        $basepricehi1 = $basepricehi1 + ($zipexceptionrec1->Quota);
                                        //nonhi
                                        $basepricenonhi1 = $basepricenonhi1 + ($zipexceptionrec1->Quota);
                                    }
                                }
                            }
                        }


                        $stateQuery = Rules::where('Origin', $autoorder->originstate)->where('isZip', 0)->where('UserId', $uid);
                        $stateQuery->where(function ($stateQuery) use ($dstate) {
                            $stateQuery->orWhere('Dest', $dstate);
                            $stateQuery->orWhere('Dest', 'any');
                            $stateQuery->orWhere('Dest', 'origin');
                            $stateQuery->orWhere('Dest', '');
                        });
                        $stateexception1 = $stateQuery->get();

                        if ($stateexception1 != '') {
                            foreach ($stateexception1 as $stateexceptionrec1) {
                                if ($stateexceptionrec1->Quota != "Don't Quota" && ($stateexceptionrec1->Type == "origin" || $stateexceptionrec1->Type == "any" || $stateexceptionrec1->Type == "route")) {
                                    if ($stateexceptionrec1->addorsub == "add") {
                                        $basepricehi1 += $stateexceptionrec1->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $stateexceptionrec1->Quota;
                                    }
                                    if ($stateexceptionrec1->addorsub == "sub") {
                                        $basepricehi1 -= $stateexceptionrec1->Quota;
                                        //nonhi
                                        $basepricenonhi1 -= $stateexceptionrec1->Quota;
                                    }
                                    if (!empty($stateexceptionrec1->Quota_in_per) && $stateexceptionrec1->addorsub == "add" && $stateexceptionrec1->Quota == '') {

                                        $basepricehi1 += (($stateexceptionrec1->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 += (($stateexceptionrec1->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if (!empty($stateexceptionrec1->Quota_in_per) && $stateexceptionrec1->addorsub == "sub" && $stateexceptionrec1->Quota == '') {
                                        $basepricehi1 -= (($stateexceptionrec1->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 -= (($stateexceptionrec1->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if ($stateexceptionrec1->addorsub == "") {
                                        $basepricehi1 += $stateexceptionrec1->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $stateexceptionrec1->Quota;
                                    }
                                }

                            }

                        }

                        $zipExQuery = Rules::where('Dest', $dzip)->where('isZip', 1)->where('UserId', $uid);
                        $zipExQuery->where(function ($zipExQuery) use ($dzip) {
                            $zipExQuery->orWhere('Dest', 'any');
                            $zipExQuery->orWhere('Dest', '');
                        });
                        $zipexception = $zipExQuery->get();

                        if ($zipexception != '') {
                            foreach ($zipexception as $zipexceptionrec) {
                                if (($zipexceptionrec->Type == "destination" || $zipexceptionrec->Type == "any") && $zipexceptionrec->Quota != "Don't Quota" || $zipexceptionrec->Type == "route") {
                                    if ($zipexceptionrec->addorsub == "add") {
                                        $basepricehi1 += $zipexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $zipexceptionrec->Quota;
                                    }
                                    if ($zipexceptionrec->addorsub == "sub") {
                                        $basepricehi1 -= $zipexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 -= $zipexceptionrec->Quota;
                                    }
                                    if (!empty($zipexceptionrec->Quota_in_per) && $zipexceptionrec->addorsub == "add" && $zipexceptionrec->Quota == '') {
                                        $basepricehi1 += (($zipexceptionrec->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 += (($zipexceptionrec->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if (!empty($zipexceptionrec->Quota_in_per) && $zipexceptionrec->addorsub == "sub" && $zipexceptionrec->Quota == '') {
                                        $basepricehi1 -= (($zipexceptionrec->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 -= (($zipexceptionrec->Quota_in_per * $basepricenonhi1) / 100);
                                    }

                                    if ($zipexceptionrec->addorsub == "") {
                                        $basepricehi1 += $zipexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $zipexceptionrec->Quota;
                                    }
                                } else {
                                    $basepricehi1 = 0;
                                    $dquota = 1;        //nonhi
                                    $basepricenonhi1 = 0;
                                }
                            }
                        }

                        $stateExQuery = Rules::where('Dest', $dstate)->where('isZip', 0)->where('UserId', $uid);
                        $stateExQuery->where(function ($stateExQuery) use ($dstate) {
                            $stateExQuery->orWhere('Dest', 'any');
                            $stateExQuery->orWhere('Dest', 'origin');
                        });
                        $stateexception = $stateExQuery->get();

                        if ($stateexception != '') {
                            foreach ($stateexception as $stateexceptionrec) {
                                if ($stateexceptionrec->Type == "destination" || $stateexceptionrec->type == "any") {
                                    if ($stateexceptionrec->addorsub == "add" && $stateexceptionrec->Quota != "Don't Quota") {
                                        $basepricehi1 += $stateexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $stateexceptionrec->Quota;
                                    }
                                    if ($stateexceptionrec->addorsub == "sub" && $stateexceptionrec->Quota != "Don't Quota") {
                                        $basepricehi1 -= $stateexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 -= $stateexceptionrec->Quota;
                                    }
                                    if (!empty($stateexceptionrec->Quota_in_per) && $stateexceptionrec->addorsub == "add" && $stateexceptionrec->Quota == '') {
                                        $basepricehi1 += (($stateexceptionrec->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 += (($stateexceptionrec->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if (!empty($stateexceptionrec->Quota_in_per) && $stateexceptionrec->addorsub == "sub" && $stateexceptionrec->Quota == '') {
                                        $basepricehi1 -= (($stateexceptionrec->Quota_in_per * $basepricehi1) / 100);
                                        $basepricenonhi1 -= (($stateexceptionrec->Quota_in_per * $basepricenonhi1) / 100);
                                    }
                                    if ($stateexceptionrec->addorsub == "" && $stateexceptionrec->Quota != "Don't Quota") {
                                        $basepricehi1 += $stateexceptionrec->Quota;
                                        //nonhi
                                        $basepricenonhi1 += $stateexceptionrec->Quota;
                                    }
                                }
                            }
                        }


                        // value for enclosed vehicle
                        if ($carrier == 'enclosed') {
                            $selectencprice = WPGeneralException::where('UserId', $uid)->first();
                            $selectencpriceval = $selectencprice->etransport;

                            $basepricehi1 = $basepricehi1 * $selectencpriceval;
                            $basepricenonhi1 = $basepricenonhi1 * $selectencpriceval;
                        }

                        $Price = ceil($basepricehi1);
                        $Price = $Price;

                        if ($Price != 0 && $Price > 0) {

                            //record end

                        }
                    }

                }

            }

            $autoorder->distance = $distance;
            $autoorder->payment = $Price;
        }


        if (!empty($request->oemail2)) {
            if (isset($request->oemail2)) {
                if ($request->oemail2 != '') {
                    $autoorder->oemail = addslashes($request->oemail2);
                } else {
                    $autoorder->oemail = NULL;
                }
            } else {
                $autoorder->oemail = NULL;
            }
        }


        $this->createOrderHistory($autoorder->id, 'originzip', 'Origin Zip', $autoorder->originzip);
        $this->createOrderHistory($autoorder->id, 'originstate', 'Origin State', $autoorder->originstate);
        $this->createOrderHistory($autoorder->id, 'origincity', 'Origin City', $autoorder->origincity);
        $this->createOrderHistory($autoorder->id, 'originzsc', 'Origin Zip State City', $autoorder->originzsc);

        $this->createOrderHistory($autoorder->id, 'destinationzip', 'Destination Zip', $autoorder->destinationzip);
        $this->createOrderHistory($autoorder->id, 'destinationstate', 'Destination State', $autoorder->destinationstate);
        $this->createOrderHistory($autoorder->id, 'destinationcity', 'Destination City', $autoorder->destinationcity);
        $this->createOrderHistory($autoorder->id, 'destinationzsc', 'Destination Zip State City', $autoorder->destinationzsc);
        $this->createOrderHistory($autoorder->id, 'vin_num', 'Vin Nummber', $autoorder->vin_num);
        $this->createOrderHistory($autoorder->id, 'year', 'Vehicle  Year', $autoorder->year);
        $this->createOrderHistory($autoorder->id, 'make', 'Vehicle Make', $autoorder->make);
        $this->createOrderHistory($autoorder->id, 'model', 'Vehicle Model', $autoorder->model);
        $this->createOrderHistory($autoorder->id, 'ymk', 'Vehicle Year Make Model', $autoorder->ymk);
        $this->createOrderHistory($autoorder->id, 'type', 'Vehicle Type', $autoorder->type);
        $this->createOrderHistory($autoorder->id, 'condition', 'Vehicle Condition', $autoorder->condition);
        $this->createOrderHistory($autoorder->id, 'is_auction', 'Vehicle Auction', $autoorder->is_auction);
        $this->createOrderHistory($autoorder->id, 'brakes', 'Vehicle Brakes', $autoorder->brakes);
        $this->createOrderHistory($autoorder->id, 'rolls', 'Rolls', $autoorder->rolls);
        $this->createOrderHistory($autoorder->id, 'color', 'Color', $autoorder->color);
        $this->createOrderHistory($autoorder->id, 'available_date', 'Vehicle Avaialable Date', $autoorder->available_date);
        $this->createOrderHistory($autoorder->id, 'transport', 'Transport', $autoorder->transport);


        $this->createOrderHistory($autoorder->id, 'oname', 'O Name', $autoorder->oname);
        $this->createOrderHistory($autoorder->id, 'oemail', 'O Email', $autoorder->oemail);
        $this->createOrderHistory($autoorder->id, 'oaddress', 'O Address', $autoorder->oaddress);
        $this->createOrderHistory($autoorder->id, 'ophone', 'O Phone', $autoorder->ophone);
        $this->createOrderHistory($autoorder->id, 'additional_info', 'Additional Informationg', $autoorder->additional_info);

        $this->createOrderHistory($autoorder->id, 'length_ft', 'Lenght in Feet', $autoorder->length_ft);
        $this->createOrderHistory($autoorder->id, 'length_in', 'Length Inche', $autoorder->length_in);
        $this->createOrderHistory($autoorder->id, 'width_ft', 'Width in Feet', $autoorder->width_ft);
        $this->createOrderHistory($autoorder->id, 'width_in', 'Width Inche', $autoorder->width_in);
        $this->createOrderHistory($autoorder->id, 'height_ft', 'Height in Feet', $autoorder->height_ft);
        $this->createOrderHistory($autoorder->id, 'height_in', 'Height in Inche', $autoorder->height_in);
        $this->createOrderHistory($autoorder->id, 'weight', 'Vehicle Weight', $autoorder->weight);


        $autoorder->save();

        $reportstatus = report::where('orderId', '=', $request->orderid)->first();
        if (empty($reportstatus)) {
            $autoorderreport = new report();
            $autoorderreport->userId = Auth::user()->id;
            $autoorderreport->orderId = $autoorder->id;
            $autoorderreport->pstatus = 0;
            $autoorderreport->save();
        }
        $singlerreportexist = singlereport::where('orderId', '=', $request->orderid)->first();
        if (empty($singlerreportexist)) {
            $singlerreportadd = new singlereport();
            $singlerreportadd->userId = Auth::user()->id;
            $singlerreportadd->orderId = $autoorder->id;
            $singlerreportadd->pstatus = 0;
            $singlerreportadd->save();
        }

        $paymentexist = orderpayment::where('orderId', '=', $request->orderid)->first();
        if (empty($paymentexist)) {
            $payment = new orderpayment();
            $payment->orderId = $autoorder->id;
            $payment->payment_status = 1;
            $payment->save();
        }

        if (isset($request->pay_cond)) {

            // dd($request->orderid);
            $sendemail = 'yes';
            $payment1 = orderpayment::where('orderId', '=', $request->orderid)->first();
            //dd($payment1);
            //$autoorder = AutoOrder::find($request->orderid);
            $payment1->paycondition = $request->pay_cond;
            $payment1->payconfirm = $request->pay_confirm;
            if (isset($request->confirm1)) {
                $payment1->sendemail = $request->confirm1;
                if ($request->confirm1 == 0) {
                    $sendemail = 'no';
                }

            } else {
                $payment1->sendemail = null;
            }

            $payment1->save();
            //update pstatus


            if ($request->pay_cond == 4 || $sendemail == 'no') {
                $autoorderstatus = AutoOrder::find($request->orderid);
                $autoorderstatus->pstatus = 7;  ///payment missing
                $autoorderstatus->save();

                $reportstatus = report::where('orderId', '=', $request->orderid)->where('pstatus', '=', $autoorderstatus->pstatus)->first();
                if (empty($reportstatus)) {
                    $reportstatus = new report();
                    $reportstatus->userId = Auth::user()->id;
                    $reportstatus->orderId = $request->orderid;
                    $reportstatus->pstatus = 7; ///payment missing
                    $reportstatus->save();
                }
                $singlereport = singlereport::where('orderId', '=', $request->orderid)->first();
                if (empty($singlereport)) {
                    $singlereport = new singlereport();
                    $singlereport->userId = Auth::user()->id;
                    $singlereport->orderId = $request->orderid;
                    $singlereport->pstatus = 7; ///payment missing
                    $singlereport->save();
                } else {
                    $singlereport->userId = Auth::user()->id;
                    $singlereport->orderId = $request->orderid;
                    $singlereport->pstatus = 7; ///payment missing
                    $singlereport->save();
                }

                $this->expected_date($request->orderid, Auth::user()->id, $autoorderstatus->pstatus, date('Y-m-d'));


            } elseif ($request->pay_cond != 4) {

//                $autoorderstatus = AutoOrder::find($request->orderid);
//                $autoorderstatus->pstatus = 0;  ///payment missing
//                $autoorderstatus->save();

//                    $reportstatus = report::where('orderId', '=', $request->orderid)->first();
//                    $reportstatus->pstatus = 0; ///payment missing
//                    $reportstatus->save();
//                    $singlereport = singlereport::where('orderId', '=', $request->orderid)->first();
//                    $singlereport->pstatus = 0; ///payment missing
//                    $singlereport->save();

            }


            ///send email
            if ($request->pay_cond <> 3 && $request->pay_cond <> 4 && $sendemail == 'yes') {

                if (isset($request->neworderpay_btn)) {
                    if ($request->neworderpay_btn == "1") {


                        $orderid = base64_encode($request->orderid);
                        $userid = base64_encode(Auth::user()->id);
                        $link1 = url("/email_order/{$orderid}/{$userid}");

                        // Mail::to(config('custom.SEND_MAIL'))->send(new SendOrderMail($test));
                        Mail::to($request->oemail2)->send(new SendOrderMail($link1));
                    }
                }
            }


            //Dispatch Auto Assign

            $autoorderstatus = AutoOrder::find($request->orderid);
            if ($autoorderstatus->pstatus == 7) {
                $autoorder = AutoOrder::find($request->orderid);
                if (Auth::user()->role == 3) {


                    $checkinassignorder = order_assign::where('order_id', $autoorder->id)
                        ->where('assign_type', 3)
                        ->first();
                    if (empty($checkinassignorder)) {

                        $orderassign = new order_assign();
                        $orderassign->order_id = $autoorder->id;
                        $orderassign->assign_user_id = Auth::user()->id;
                        $orderassign->assign_type = 3;
                        $orderassign->monthv = date('Y-m-d');
                        $orderassign->save();


                        $autoorder->assign_orderdispatcher_id = Auth::user()->id;
                        $autoorder->save();

                    }


                } else {

                    //Auto assign loop

                    $check_order = order_assign::where('order_id', $autoorder->id)
                        ->where('assign_type', 3)
                        ->first();
                    if (empty($check_order)) {

                        $month = date('m');
                        $year = date('Y');


                        $users = User::where('status', '1')
                            ->where('role', 3)///role order taker
                            ->get();
                        $array = array();
                        foreach ($users as $key => $user) {
                            $checkinassignorder = order_assign::
                            where('assign_user_id', $user->id)
                                ->whereMonth('monthv', '=', $month)
                                ->whereYear('monthv', '=', $year)
                                ->where('assign_type', 3)
                                ->count();
                            $array2['user_id'] = $user->id;
                            $array2['current_orders'] = $checkinassignorder;

                            array_push($array, $array2);

                        }

                        if (count($array) > 0) {

                            $find_lowest_row_in_array = array_column($array, 'current_orders');
                            $min_array = $array[array_search(min($find_lowest_row_in_array), $find_lowest_row_in_array)];
                            $lowest_user = $min_array['user_id'];


                            $orderassign = new order_assign();
                            $orderassign->order_id = $autoorder->id;
                            $orderassign->assign_user_id = $lowest_user;
                            $orderassign->assign_type = 3;
                            $orderassign->monthv = date('Y-m-d');
                            $orderassign->save();

                            $autoorder->assign_orderdispatcher_id = $lowest_user;
                            $autoorder->save();

                        }
                    }

                    //Auto assign loop end

                }
            }


        }


        $ar['order_id'] = $autoorder->id;
        $ar['payment'] = $autoorder->payment;
        $ar['cod_cop'] = $autoorder->cod_cop;
        return json_encode($ar);


    }

    public function createOrderHistory($order_id, $column_name, $name, $new_val)
    {

        $old_val = "";

        $autoorder = AutoOrder::where('id', $order_id)->first([$column_name]);

        if ($autoorder) {

            $old_val = $autoorder->$column_name;

            if ($old_val != $new_val) {

                $order_history = new order_history();
                $order_history->order_id = $order_id;
                $order_history->column_name = "$column_name";
                $order_history->old_value = "$old_val";
                $order_history->new_value = "$new_val";
                $order_history->user_id = Auth::user()->id;
                $order_history->namee = $name;
                $order_history->save();
            }


        }


    }

    public function return_data(Request $request)
    {
        $ptype = $request->paynal_type;
        $get_payment = 'no';
        $setting = general_settings::orderby('id', 'desc')->first();


        if (isset($request->val)) {
            if (!empty($request->val)) {

                $val = $request->val;
                $search_by = $request->search_by;


                $data = AutoOrder::where('pstatus', '=', $request->p_status)
                    ->where($search_by, 'like', "%$val%")
                    ->where('paynal_type', '=', $ptype)
                    ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                    ->orderBy('id', 'DESC')->paginate(10);


            } else {
                $data = AutoOrder::where('pstatus', '=', $request->p_status)
                    ->where('paynal_type', '=', '0')
                    ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                    ->orderBy('id', 'DESC')->paginate(10);
            }

        } else {
            $data = AutoOrder::where('pstatus', '=', $request->p_status)
                ->where('paynal_type', '=', '0')
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))
                ->orderBy('id', 'DESC')->paginate(10);
        }

        return view('main.dashboard.show', compact('data', 'get_payment'));
    }


    public
    function get_data($status)
    {

        $get_payment = 'no';
        $setting = general_settings::orderby('id', 'desc')->first();

        if (Auth::user()->role == 6) {


            $data = AutoOrder::where('pstatus', '=', $status)
                // ->where('assign_manager_id', '=', Auth::user()->id)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);

        } else {

            $data = AutoOrder::where('pstatus', '=', $status)
                ->where('created_at', '>=', Carbon::today()
                    ->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);
        }
        //return json_encode($data);
        return view('main.dashboard.show', compact('data', 'get_payment'));


    }

    public
    function get_data2($status)
    {

        $get_payment = 'no';
        $setting = general_settings::orderby('id', 'desc')->first();

        if (Auth::user()->role == 6) {


            $data = AutoOrder::where('pstatus', '=', $status)
                // ->where('assign_manager_id', '=', Auth::user()->id)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);

        } else {

            $data = AutoOrder::where('pstatus', '=', $status)
                ->where('created_at', '>=', Carbon::today()
                    ->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);
        }
        //return json_encode($data);
        return view('main.dashboard.show2', compact('data', 'get_payment'));


    }

    public function get_payment($val)
    {

        $get_payment = 'yes';
        $setting = general_settings::orderby('id', 'desc')->first();

        if (Auth::user()->role == 6) {


            $data = AutoOrder::where('paid_status', '=', $val)
                ->wherein('pstatus', ['7', '8', '9', '10', '11', '12', '13', '19', '20', '21', '22', '23', '24'])
                // ->where('assign_manager_id', '=', Auth::user()->id)
                ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);

        } else {

            $data = AutoOrder::where('paid_status', '=', $val)
                ->wherein('pstatus', ['7', '8', '9', '10', '11', '12', '13', '19', '20', '21', '22', '23', '24'])
                ->where('created_at', '>=', Carbon::today()
                    ->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);
        }
        //return json_encode($data);
        return view('main.dashboard.show', compact('data', 'get_payment'));


    }

    public function store_payment_status(Request $request)
    {
        $paystatus = AutoOrder::find($request->orderid2);
        $paystatus->paid_status = $request->payment_status;
        $paystatus->save();

        $orderpayment = orderpayment::where('orderId', '=', $request->orderid2)->first();
        if (!empty($orderpayment)) {
            $orderpayment->payment_status = $request->payment_status;
            $orderpayment->save();
        }
        $profit = profit::where('order_id', '=', $request->orderid2)->first();
        if (!empty($profit)) {
            $profit->profit = $request->profit;
            $profit->save();
        } else {
            $addprofit = new profit();
            $addprofit->order_id = $request->orderid2;
            $addprofit->profit = $request->profit;
            $addprofit->save();
        }
        return redirect()->back();
    }

    public function global_search(Request $request)
    {


        $rolelist = role::all();

        $setting = general_settings::orderby('id', 'desc')->first();

        $data = AutoOrder::orderBy('created_at', 'DESC')
            ->where(function ($q) use ($setting) {

                $q->where('created_at', '>=', Carbon::today()->subDays($setting->no_days));
            })
            ->where(function ($q) use ($request) {

                $q->orWhere('id', 'like', '%' . $request->search . '%')
                    ->orWhere('oname', 'like', '%' . $request->search . '%')
                    ->orWhere('ophone', 'like', '%' . $request->search . '%')
                    ->orWhere('oemail', 'like', '%' . $request->c . '%')
                    ->orWhere('origincity', 'like', '%' . $request->search . '%')
                    ->orWhere('originstate', 'like', '%' . $request->search . '%')
                    ->orWhere('originzip', 'like', '%' . $request->search . '%')
                    ->orWhere('destinationcity', 'like', '%' . $request->search . '%')
                    ->orWhere('destinationstate', 'like', '%' . $request->search . '%')
                    ->orWhere('destinationzip', 'like', '%' . $request->search . '%');
            })
            ->paginate(50);



        if ($request->ajax()) {
            $get_payment = 'no';
            return view('main.dashboard.show', compact('data', 'rolelist', 'get_payment'))->render();
        }
    }

    public function send_price_email(Request $request)
    {
        Mail::to($request->custemail)->send(new SendEmailPriceCustomer($request->price));
    }

    public function send_email_editor(Request $request)
    {
        Mail::to($request->client_email)->send(new SendEmailEditor($request->email_text));
    }

    public function save_page()
    {
        return view('main.phone_quote.new_quote.save_page');
    }

    public function new_edit($id)
    {
        $data = AutoOrder::find($id);
        if ($data->paynal_type == '0') {
            return view('main.phone_quote.new_quote.calling_edit', compact('data'));
        }
        if ($data->paynal_type == '1') {
            return view('main.phone_quote.new_quote.shipment_edit', compact('data'));
        }
        if ($data->paynal_type == '2') {
            return view('main.phone_quote.new_quote.heavy_edit', compact('data'));
        }

    }

    public function email_order($id, $userid, Request $request)
    {
        $orderid = base64_decode($id);
        $userid = base64_decode($userid);
        //$orderid = $id;
        $userid = $userid;
        $data = AutoOrder::find($orderid);
        $ip = $request->ip();

        return view('main.phone_quote.new_quote.emailorder', compact('data', 'ip', 'userid'));
    }

    public function order_payment(Request $request)
    {

        $autoorder = AutoOrder::find($request->id);

        ///customer infof
        $autoorder->cname = $request->name;
        $autoorder->cphone1 = $request->phone;
        $autoorder->cphone2 = $request->phone2;
        $autoorder->caddress = $request->address;
        $autoorder->ip_address = $request->ip_address;
        $autoorder->cemail = $request->email;
        $autoorder->vin_no = $request->vin;


        if (isset($request->auction_name)) {
            if ($request->auction_name != '') {
                $autoorder->oauction = addslashes($request->auction_name);
            } else {
                $autoorder->oauction = NULL;
            }
        } else {
            $autoorder->oauction = NULL;
        }

        if (isset($request->buyer_num)) {
            if ($request->buyer_num != '') {
                $autoorder->obuyer_no = addslashes($request->buyer_num);
            } else {
                $autoorder->obuyer_no = NULL;
            }
        } else {
            $autoorder->obuyer_no = NULL;
        }

        $autoorder->key_has = $request->vkey;
        // $autoorder->vehicle_available_date = date('Y-m-d', strtotime($request->vehicledate));


        $autoorder->oname = $request->oname;
        $autoorder->oemail = $request->oemail;
        $autoorder->ophone = $request->ophone;
        $autoorder->oaddress = $request->oaddress;



        $autoorder->dname = $request->dname;
        $autoorder->demail = $request->demail;
        $autoorder->dphone=$request->dphone;
        $autoorder->daddress = $request->daddress;

        $autoorder->add_info = $request->add_info;


        $this->createOrderHistory($autoorder->id, 'oname', 'Name', $autoorder->oname);
        $this->createOrderHistory($autoorder->id, 'oemail', 'Email', $autoorder->oemail);
        $this->createOrderHistory($autoorder->id, 'ophone', 'Phone', $autoorder->ophone);
        $this->createOrderHistory($autoorder->id, 'oaddress', 'Address', $autoorder->oaddress);

        $this->createOrderHistory($autoorder->id, 'dname', 'D-Name', $autoorder->dname);
        $this->createOrderHistory($autoorder->id, 'demail', 'D-Email', $autoorder->demail);
        $this->createOrderHistory($autoorder->id, 'dphone', 'D-Phone', $autoorder->dphone);
        $this->createOrderHistory($autoorder->id, 'daddress', 'D-Address', $autoorder->daddress);

        $this->createOrderHistory($autoorder->id, 'add_info', 'Addtional Info', $autoorder->add_info);


        $autoorder->save();

        ////signature

        $payment = orderpayment::where('orderId', '=', $request->id)->first();
        $payment->your_name = $request->yourname;
        $payment->signature = $request->signature;
        $payment->save();

        $data = AutoOrder::find($request->id);
        $ip = $request->ip();

        $userid = $request->userid;



        return view('main.phone_quote.new_quote.emailorder2', compact('data', 'ip', 'userid'));
    }

    public function order_payment_card(Request $request)
    {

        $pstatuss = "";
        if ($request->save_but == 'save_with_pay') {

            $order = AutoOrder::find($request->id);
            $order->pstatus = 19; ///Active
            $order->paid_status = 1;
            $order->pay_comments = "Customer Card Updated";
            $order->save();

            $pstatuss = $order->pstatus;

            $report = report::where('orderId', '=', $request->id)->where('pstatus', '=', $order->pstatus)->first();
            if (empty($report)) {
                $report = new report();
                $report->userId = $request->userid;
                $report->orderId = $request->id;
                $report->pstatus = 19; ///Active
                $report->save();
            }

            $singlereport = singlereport::where('orderId', '=', $request->id)->first();
            $singlereport->userId = $request->userid;
            $singlereport->pstatus = 19; ///Active
            $singlereport->save();


            $payment = orderpayment::where('orderId', '=', $request->id)->first();
            $payment->card_first_name = addslashes($request->firstname);
            $payment->card_last_name = addslashes($request->lastname);
            $payment->billing_address = addslashes($request->billing_address);
            if (strpos($request->o_zip1, ",") !== false) {

                $ozip = explode(',', $request->o_zip1);
                $payment->b_zip = $ozip[2];
                $payment->b_state = $ozip[1];
                $payment->b_city = $ozip[0];
                $payment->b_zsc = $request->o_zip1;
            }
            $payment->card_no = $payment->card_no . '^*' . $request->card_number;
            $payment->card_expiry_date = $payment->card_expiry_date . '^*' . $request->cardexpirydate;
            $payment->card_security = $payment->card_security . '^*' . $request->csvno;
            $payment->payment_status = 1;
            $payment->card_type = $payment->card_type . '^*' . $request->card_type;

            $payment->save();


            $creditscard = creditcard::where('orderId', '=', $request->id)->first();
            if ($creditscard == '') {
                $creditscard = new creditcard();
            }

            $creditscard->orderId = $request->id;
            $creditscard->customer_email = $order->oemail;
            $creditscard->card_first_name = addslashes($request->firstname);
            $creditscard->card_last_name = addslashes($request->lastname);
            $creditscard->billing_address = addslashes($request->billing_address);
            $creditscard->b_city = $request->bcity;
            $creditscard->b_state = $request->bstate;
            $creditscard->b_zip = $request->bzip;
            $creditscard->b_zsc = $request->bcity . ',' . $request->bstate . ',' . $request->bzip;
            if ($creditscard <> '') {
                $creditscard->card_no = $creditscard->card_no . '*^' . $request->card_number;
                $creditscard->card_expiry_date = $creditscard->card_expiry_date . '*^' . $request->cardexpirydate;
                $creditscard->card_security = $creditscard->card_security . '*^' . $request->csvno;
                $creditscard->card_type = $creditscard->card_type . '*^' . $request->card_type;
            } else {
                $creditscard->card_no = $request->card_number;
                $creditscard->card_expiry_date = $request->cardexpirydate;
                $creditscard->card_security = $request->csvno;
                $creditscard->card_type = $request->card_type;
            }

            $creditscard->save();


        }
        if ($request->save_but == 'save_without_pay') {
            $order = AutoOrder::find($request->id);
            $order->pstatus = 7; ///missing payment
            $order->paid_status = 1;
            $order->save();

            $pstatuss = $order->pstatus;

            $report = report::where('orderId', '=', $request->id)->where('pstatus', '=', $order->pstatus)->first();
            if (empty($report)) {
                $report = new report();
                $report->userId = $request->userid;
                $report->orderId = $request->id;
                $report->pstatus = 7; ///missing payment
                $report->save();
            }

            $singlereport = singlereport::where('orderId', '=', $request->id)->first();
            $singlereport->userId = $request->userid;
            $singlereport->pstatus = 7; ///missing payment
            $singlereport->save();

            $payment = orderpayment::where('orderId', '=', $request->id)->first();

            if (!empty($payment)) {

                $payment->payment_status = 1;
                $payment->save();
            }
        }

        if (!empty($pstatuss)) {
            $this->expected_date($request->id, $request->userid, $pstatuss, date('Y-m-d'));
        }

        $autoorder = AutoOrder::find($request->id);


        //Auto assign loop

        $check_order = order_assign::where('order_id', $autoorder->id)
            ->where('assign_type', 3)
            ->first();
        if (empty($check_order)) {

            $month = date('m');
            $year = date('Y');


            $users = User::where('status', '1')
                ->where('role', 3)///role order taker
                ->get();
            $array = array();
            foreach ($users as $key => $user) {
                $checkinassignorder = order_assign::
                where('assign_user_id', $user->id)
                    ->whereMonth('monthv', '=', $month)
                    ->whereYear('monthv', '=', $year)
                    ->where('assign_type', 3)
                    ->count();
                $array2['user_id'] = $user->id;
                $array2['current_orders'] = $checkinassignorder;

                array_push($array, $array2);

            }

            if (count($array) > 0) {

                $find_lowest_row_in_array = array_column($array, 'current_orders');
                $min_array = $array[array_search(min($find_lowest_row_in_array), $find_lowest_row_in_array)];
                $lowest_user = $min_array['user_id'];


                $orderassign = new order_assign();
                $orderassign->order_id = $autoorder->id;
                $orderassign->assign_user_id = $lowest_user;
                $orderassign->assign_type = 3;
                $orderassign->monthv = date('Y-m-d');
                $orderassign->save();

                $autoorder->assign_orderdispatcher_id = $lowest_user;
                $autoorder->save();

            }
        }

        //Auto assign loop end


        return view('main.phone_quote.new_quote.emailordersuccess');
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


    public function order_payment_card_us($orderid)
    {
        $data = AutoOrder::find($orderid);
        $ip = '';
        $userid = Auth::user()->id;

        return view('main.phone_quote.new_quote.emailorder', compact('data', 'ip', 'userid'));
    }


    public function assign_order(Request $request)
    {

        $save_users = "";
        $order = Autoorder::find($request->orderid);


        $res = order_assign::where('order_id', $request->orderid)
            ->where('assign_user_id', '!=', $order->assign_ordertaker_id)
            ->where('assign_type', 2)
            ->delete();
        if (!isset($request->assing_to_id)) {
            $order->assign_other_ordertaker = null;
            $order->save();
        }

        if (isset($request->assing_to_id)) {


            if (isset($request->assing_to_id) && !empty($request->assing_to_id[0])) {


                if ($request->assigntype == 1) {
                    $order->assign_manager_id = $request->assing_to_id;
                }
                if ($request->assigntype == 2) {
                    $assing_to_id = $request->assing_to_id;

                    if (count($assing_to_id) > 1) {
                        $i = 0;
                        $count = count($assing_to_id);
                        while ($i < $count) {

                            $orderassign = order_assign::
                            where('assign_user_id', $request->assing_to_id[$i])
                                ->where('order_id', $request->orderid)
                                ->where('assign_type', 2)
                                ->first();
                            if (empty($orderassign)) {

                                $save_users = implode(",", $request->assing_to_id);
                                $order->assign_other_ordertaker = $save_users;

                                $orderassign = new order_assign();
                                $orderassign->order_id = $request->orderid;
                                $orderassign->assign_user_id = $request->assing_to_id[$i];
                                $orderassign->assign_type = $request->assigntype;
                                $orderassign->monthv = date('Y-m-d');
                                $orderassign->assign_other_ordertaker = $order->assign_ordertaker_id . ',' . $save_users;
                                $orderassign->save();

                                $order->assign_other_ordertaker = $order->assign_ordertaker_id . ',' . $save_users;;
                                $order->save();


                            }
                            $i++;
                        }


                    } else {


                        $orderassign = order_assign::
                        where('assign_user_id', $request->assing_to_id[0])
                            ->where('order_id', $request->orderid)
                            ->where('assign_type', 2)
                            ->first();
                        if (empty($orderassign)) {

                            $orderassign = new order_assign();
                            $orderassign->order_id = $request->orderid;
                            $orderassign->assign_user_id = $request->assing_to_id[0];
                            $orderassign->assign_type = $request->assigntype;
                            $orderassign->monthv = date('Y-m-d');
                            $orderassign->assign_other_ordertaker = $order->assign_ordertaker_id . "," . $request->assing_to_id[0];
                            $orderassign->save();


                            $order->assign_other_ordertaker = $order->assign_ordertaker_id . "," . $request->assing_to_id[0];
                            $order->save();

                        }

                    }


                }
            } else {
                $order->assign_other_ordertaker = null;
                $order->save();
            }
        }

    }

    public function assign_order_dispatcher(Request $request)
    {

        $save_users = "";
        $order = Autoorder::find($request->orderid);


        $res = order_assign::where('order_id', $request->orderid)
            ->where('assign_user_id', '!=', $order->assign_orderdispatcher_id)
            ->where('assign_type', 3)
            ->delete();
        if (!isset($request->assing_to_id)) {
            $order->assign_other_orderdispatcher = null;
            $order->save();
        }

        if (isset($request->assing_to_id)) {


            if (isset($request->assing_to_id) && !empty($request->assing_to_id[0])) {


                if ($request->assigntype == 1) {
                    $order->assign_manager_id = $request->assing_to_id;
                }
                if ($request->assigntype == 3) {
                    $assing_to_id = $request->assing_to_id;

                    if (count($assing_to_id) > 1) {
                        $i = 0;
                        $count = count($assing_to_id);
                        while ($i < $count) {

                            $orderassign = order_assign::
                            where('assign_user_id', $request->assing_to_id[$i])
                                ->where('order_id', $request->orderid)
                                ->where('assign_type', 3)
                                ->first();
                            if (empty($orderassign)) {

                                $save_users = implode(",", $request->assing_to_id);
                                $order->assign_other_orderdispatcher = $save_users;

                                $orderassign = new order_assign();
                                $orderassign->order_id = $request->orderid;
                                $orderassign->assign_user_id = $request->assing_to_id[$i];
                                $orderassign->assign_type = $request->assigntype;
                                $orderassign->monthv = date('Y-m-d');
                                $orderassign->assign_other_orderdispatcher = $order->assign_orderdispatcher_id . ',' . $save_users;;
                                $orderassign->save();

                                $order->assign_other_orderdispatcher = $order->assign_orderdispatcher_id . ',' . $save_users;
                                $order->save();


                            }
                            $i++;
                        }


                    } else {


                        $orderassign = order_assign::
                        where('assign_user_id', $request->assing_to_id[0])
                            ->where('order_id', $request->orderid)
                            ->where('assign_type', 3)
                            ->first();
                        if (empty($orderassign)) {

                            $orderassign = new order_assign();
                            $orderassign->order_id = $request->orderid;
                            $orderassign->assign_user_id = $request->assing_to_id[0];
                            $orderassign->assign_type = $request->assigntype;
                            $orderassign->monthv = date('Y-m-d');
                            $orderassign->assign_other_orderdispatcher = $order->assign_orderdispatcher_id . "," . $request->assing_to_id[0];
                            $orderassign->save();


                            $order->assign_other_orderdispatcher = $order->assign_orderdispatcher_id . "," . $request->assing_to_id[0];
                            $order->save();

                        }

                    }


                }
            }
        }

    }


    public
    function request_to_assign($id)
    {


        $autoorder = AutoOrder::find($id);
        $autoorder->is_requested = 1;
        $autoorder->save();

        $requestsave = new request_quote();
        $requestsave->order_id = $id;
        $requestsave->request_user_id = Auth::user()->id;
        $requestsave->save();


        return redirect('/dashboard');
    }

    public
    function get_requested_quotes()
    {
        $setting = general_setting::first();
        // $data = request_quote::all();
        $get_payment = 'no';

        $data = DB::table('auto_orders')
            ->select('auto_orders.*', 'request_quotes.request_user_id')
            ->join('request_quotes', 'request_quotes.order_id', '=', 'auto_orders.id')
            ->where('auto_orders.is_requested', '=', 1)
            ->paginate(20);

        /*
              if (Auth::user()->role == 6) {

                  $data = AutoOrder::where('is_requested', '=', 1)
                      ->where('assign_manager_id', '=', Auth::user()->id)
                      ->where('created_at', '>=', Carbon::today()->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);

              } else {

                  $data = AutoOrder::where('is_requested', '=', 1)
                      ->where('created_at', '>=', Carbon::today()
                          ->subDays($setting->no_days))->orderBy('id', 'DESC')->paginate(20);
              }
        */
        //return json_encode($data);
        return view('main.dashboard.show', compact('data', 'get_payment'));

    }

    public
    function cancel_request($id)
    {
        $request_remove = request_quote::where('order_id', '=', $id)
            ->where('request_user_id', '=', Auth::user()->id)
            ->delete();
        return redirect('/dashboard');
    }

    public
    function menu_setting($header_menu, $sub_menu)
    {
        $menu_setting = menu_setting::where('user_id', Auth::user()->id)->first();
        if (empty($menu_setting)) {
            ///if not exist
            $menu_save = new menu_setting();
            $menu_save->user_id = Auth::user()->id;
            $menu_save->main_header = $header_menu;
            $menu_save->sub_header = $sub_menu;
            $menu_save->save();
        } else {
            ///if exist
            $menu_setting->main_header = $header_menu;
            $menu_setting->sub_header = $sub_menu;
            $menu_setting->save();
        }
    }

    public
    function get_menu_setting()
    {
        $dt_ar = array();
        $menu_setting = menu_setting::where('user_id', Auth::user()->id)->first();
        if (!empty($menu_setting)) {
            $dt_ar['header_menu'] = $menu_setting->main_header;
            $dt_ar['sub_menu'] = $menu_setting->sub_header;
        }
        return json_encode($dt_ar);

    }

    public
    function add_new()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.phone_quote.new_quote.index', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }


    public
    function save_price(Request $request)
    {

        $autoorder_save_price = AutoOrder::find($request->orderid);
        if (!empty($autoorder_save_price)) {
            $autoorder_save_price->payment = $request->pricev;
            $autoorder_save_price->cod_cop = $request->cod_cop;


            $this->createOrderHistory($autoorder_save_price->id, 'payment', 'Book Price', $autoorder_save_price->payment);
            $this->createOrderHistory($autoorder_save_price->id, 'cod_cop', 'COD-COP', $autoorder_save_price->cod_cop);

            $autoorder_save_price->save();
        }
    }

    public
    function print_summary($orderid)
    {
        $data = AutoOrder::find($orderid);
        $data2 = orderpayment::where('orderId', '=', $orderid)->orderby('id', 'desc')->first();
        $ip = '';
        $userid = Auth::user()->id;

        $callhistory = call_history::where('orderId', '=', $orderid)->get();
        $users = user::all();
        $reports = report::where('orderId', '=', $orderid)->orderby('id')->get();

        $order_history = order_history::where('order_id', '=', $orderid)->orderby('id', 'desc')->get();

        return view('main.reports.summary', compact('data', 'ip', 'userid', 'callhistory', 'users', 'reports', 'data2', 'order_history'));
    }

    public
    function print_report($orderid)
    {
        $data = AutoOrder::find($orderid);
        $ip = '';
        $userid = Auth::user()->id;
        return view('main.reports.print_report', compact('data', 'ip', 'userid'));
    }

    public
    function send_order_link(Request $request)
    {
        $orderid = base64_encode($request->orderid);
        $userid = base64_encode(Auth::user()->id);
        $link1 = url("/email_order/{$orderid}/{$userid}");

        // Mail::to(config('custom.SEND_MAIL'))->send(new SendOrderMail($test));
        Mail::to($request->email)->send(new SendOrderMail($link1));

        //Session::flash('flash_message', 'Data Successfully Saved');
        return "SUCCESS";

        // return view('main.phone_quote.report.summary', compact('data', 'ip', 'userid'));
    }

    public
    function check_phone(Request $request)
    {
        $query = \App\Models\AutoOrder::
        where('datetime', 'like', '%' . $year . '%')
            ->where('penalty', '')
            ->where('tran_id', '!=', '')
            ->where('pstatus', 'delivery');

        $modal = $query->orderby('id', 'desc')->count();
        return $modal;

    }

    public
    function new()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.phone_quote.new.index', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function get_zip(Request $request)
    {

        $searchOrigin = $request->term;
        $origin = array();
        $selectOri = DB::select("select city,state,zipcode from zipcodes where zipcode LIKE '" . $searchOrigin . "%' OR city LIKE '" . $searchOrigin . "%' ");
        if ($selectOri) {
            foreach ($selectOri as $val) {
                array_push($origin, $val->city . "," . $val->state . "," . $val->zipcode);
            }
        }
        return $origin;
    }


    public function getmake(Request $request)
    {


        $searchOrigin = $request->term;
        $origin = array();
        $selectOri = DB::select("select make from wp_vehiclelistings where make LIKE '" . $searchOrigin . "%'  and UserId='14' and status='0' GROUP BY make ORDER BY make ASC");
        if (count($selectOri) > 0) {
            foreach ($selectOri as $val) {
                array_push($origin, $val->make);
            }
        }
        return $origin;
    }

    public function getmodel(Request $request)
    {
        $year = $request->year;
        $make = $request->make;
        $searchOrigin = $request->term;
        $origin = array();
        $selectOri = DB::select("select model from wp_vehiclelistings where model LIKE '" . $searchOrigin . "%' and make LIKE '" . $make . "%'   and UserId='14' and status='0' GROUP BY model ORDER BY model ASC");
        if (count($selectOri) > 0) {
            foreach ($selectOri as $val) {
                array_push($origin, $val->model);
            }
        }
        return $origin;
    }

    function object_to_array($data)
    {
        if (is_array($data) || is_object($data)) {
            $result = array();
            foreach ($data as $key => $value) {
                $result[$key] = $this->object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

    public function getvin(Request $request)
    {

        $vin_no = $request->term;

        $mydata = file_get_contents('https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/' . $vin_no . '?format=json');
        $mydata1 = json_decode($mydata);
        $vindata = $this->object_to_array($mydata1);

        $make = $vindata['Results'][6]['Value'];
        $model = $vindata['Results'][8]['Value'];
        $year = $vindata['Results'][9]['Value'];

        $json = array(array('field' => 'make',
            'value' => $make),
            array('field' => 'model',
                'value' => $model),
            array('field' => 'year',
                'value' => $year));
        echo json_encode($json);
    }

    public function owes_money_update($orderid)
    {
        $data = AutoOrder::find($orderid);
        $data2 = orderpayment::where('orderId', '=', $orderid)->get();
        $carrier = carrier::where('orderId', '=', $orderid)->first();
        $payment_log = payment_log::where('orderId', '=', $orderid)->get();
        $profit = profit::where('order_id', '=', $orderid)->first();
        return view('main.phone_quote.owesmoney.owesmoney_update', compact('data', 'carrier', 'payment_log', 'data2', 'profit'));
    }

    public function store_payment_confirmed(Request $request)
    {

        $save_payment_log = new payment_log();
        $save_payment_log->user_id = Auth::user()->id;
        $save_payment_log->orderId = $request->orderid;
        $save_payment_log->pay_type = $request->paytype;
        $save_payment_log->pay_location = $request->location;
        $save_payment_log->pay_method = $request->paymentmethod;
        if (!empty($request->cashstatus)) {
            $save_payment_log->cash_status = $request->cashstatus;
        } else {
            $save_payment_log->cash_status = null;
        }
        if (!empty($request->cardtype)) {
            $save_payment_log->card_type = $request->cardtype;
        } else {
            $save_payment_log->card_type = null;
        }

        if (!empty($request->cardno)) {
            $save_payment_log->card_number = $request->cardno;
        } else {
            $save_payment_log->card_number = null;
        }
        if (!empty($request->security)) {
            $save_payment_log->card_security = $request->security;
        } else {
            $save_payment_log->card_security = null;
        }
        if (!empty($request->expirydate)) {
            $save_payment_log->expiry_date = $request->expirydate;
        } else {
            $save_payment_log->expiry_date = null;
        }
        if (!empty($request->cheqno)) {
            $save_payment_log->certified_cheque_no = $request->cheqno;
        } else {
            $save_payment_log->certified_cheque_no = null;
        }
        if (!empty($request->paypalid)) {
            $save_payment_log->paypal_id = $request->paypalid;
        } else {
            $save_payment_log->paypal_id = null;
        }
        if (!empty($request->bankid)) {
            $save_payment_log->bank_id = $request->bankid;
        } else {
            $save_payment_log->bank_id = null;
        }


        if ($request->payconfirm == '1') {
            $save_payment_log->pay_confirmed = 'yes';
            $payconfirmedchange = AutoOrder::find($request->orderid);
            $payconfirmedchange->pay_confirmed = 'yes';
            $payconfirmedchange->save();


        } else {
            $save_payment_log->pay_confirmed = 'no';
        }
        $save_payment_log->amount = $request->amount;
        $save_payment_log->add_information = $request->additionalinfo;
        if ($request->owesmoney <> '1') {
            $save_payment_log->owes_money = 0;
        }
        $save_payment_log->save();

        if ($request->owesmoney <> '1') {
            $owesmoneystatuschange = AutoOrder::find($request->orderid);
            $owesmoneystatuschange->owes_money = 0;
            $owesmoneystatuschange->save();
        }
        return redirect()->back();
    }

    public function old_go(Request $request)
    {
        $tablev = 'order';
        $penaltype = "0";
        if (isset($_GET['car'])) {
            $tablev = 'order';
            $penaltype = "0";
        }
        if (isset($_GET['shipment'])) {
            $tablev = 'order_ship';
            $penaltype = "1";
        }
        if (isset($_GET['heavy'])) {
            $tablev = 'order_heavy';
            $penaltype = "2";
        }

        $data = DB::connection('mysql2')->table($tablev)->select('*')->orderBy('id', 'DESC')->paginate(50);
        if ($request->ajax()) {

            return view('main.old_go.show', compact('data', 'penaltype', 'tablev'));
        } else {
            return view('main.old_go.index', compact('data', 'penaltype', 'tablev'))->render();
        }
    }

    public function move_to_new($id, $penaltype, $tablev)
    {

        $data = DB::connection('mysql2')->table($tablev)->where('id', '=', $id)->first();

        $autoorder_save = new AutoOrder();

        $autoorder_save->old_code = $data->id;
        $autoorder_save->originzip = $data->ozip;
        $autoorder_save->originstate = $data->ostate;
        $autoorder_save->origincity = $data->ocity;
        $autoorder_save->originzsc = $data->ocity . ',' . $data->ozip . ',' . $data->ostate;
        $autoorder_save->destinationzip = $data->dzip;
        $autoorder_save->destinationstate = $data->dstate;
        $autoorder_save->destinationcity = $data->dcity;
        $autoorder_save->destinationzsc = $data->dcity . ',' . $data->dstate . ',' . $data->dzip;
        $autoorder_save->vin_num = $data->vin;
        $autoorder_save->year = $data->vyear;
        $autoorder_save->make = $data->vmake;
        $autoorder_save->model = $data->vmodel;
        //$autoorder_save->ymk =
        if (!empty($data->vtype)) {
            $autoorder_save->type = $data->vtype;
        }
        //$autoorder_save->condition =
        $autoorder_save->is_auction = $data->isaution;
        $autoorder_save->brakes = $data->vbrakes;
        $autoorder_save->rolls = $data->vrolls;
        $autoorder_save->color = $data->vcolor;
        //$autoorder_save->available_date =
        //$autoorder_save->transport =
        $autoorder_save->oname = $data->ocname;
        $autoorder_save->oemail = $data->oemail;
        $autoorder_save->oaddress = $data->oaddress;
        $autoorder_save->ophone = $data->ophone;
        if (!empty($data->add_info)) {
            $autoorder_save->additional_info = $data->add_info;
        }
        $autoorder_save->pstatus = 0;
        $autoorder_save->paynal_type = $penaltype;
        //$autoorder_save->order_type =
        //$autoorder_save->customer_type =
        //$autoorder_save->paycondition =
        //$autoorder_save->payconfirm =
        //$autoorder_save->payment_email =
        //$autoorder_save->sendemail =
        //$autoorder_save->site_value =
        if (!empty($data->lengthft)) {
            $autoorder_save->length_ft = $data->lengthft;
        }
        if (!empty($data->lengthin)) {
            $autoorder_save->length_in = $data->lengthin;
        }
        if (!empty($data->widthft)) {
            $autoorder_save->width_ft = $data->widthft;
        }
        if (!empty($data->widthin)) {
            $autoorder_save->width_in = $data->widthin;
        }
        if (!empty($data->heightft)) {
            $autoorder_save->height_ft = $data->heightft;
        }
        if (!empty($data->heightin)) {
            $autoorder_save->height_in = $data->heightin;
        }
        if (!empty($data->weight)) {
            $autoorder_save->weight = $data->weight;
        }
        $autoorder_save->price = $data->price;
        //$autoorder_save->service_type =
        $autoorder_save->cname = $data->cname;
        $autoorder_save->cphone1 = $data->cphone;
        $autoorder_save->cphone2 = $data->csphone;
        $autoorder_save->caddress = $data->caddress;
        $autoorder_save->czip = $data->czip;
        $autoorder_save->cstate = $data->cstate;
        $autoorder_save->ccity = $data->ccity;
        $autoorder_save->czsc = $data->ccity . '' . $data->cstate . '' . $data->czip;
        $autoorder_save->cemail = $data->cemail;
        // $autoorder_save->key_has =
        $autoorder_save->add_info = $data->addi;
        $autoorder_save->vin_no = $data->vin;
        $autoorder_save->distance = $data->distance;
        $autoorder_save->payment = $data->payment;
        $autoorder_save->save();


        ////order payment
        $orderpayment_save = new orderpayment();
        $orderpayment_save->orderId = $autoorder_save->id;
        $orderpayment_save->your_name = $data->yname;
        $orderpayment_save->signature = $data->ysign;
        //$orderpayment_save->payconfirm = $data->confirm;
        $orderpayment_save->card_first_name = $data->cardname;
        $orderpayment_save->card_last_name = $data->cardlname;
        $orderpayment_save->billing_address = $data->biladdress;
        $orderpayment_save->b_city = $data->bilcity;
        $orderpayment_save->b_state = $data->bilstate;
        $orderpayment_save->b_zip = $data->bilzip;
        $orderpayment_save->b_zsc = $data->bilcity . ',' . $data->bilstate . ',' . $data->bilzip;

        $orderpayment_save->card_no = str_replace("-", "", $data->cardno);
        $orderpayment_save->card_security = str_replace("-", "", $data->cardsec);
        $orderpayment_save->card_expiry_date = str_replace("-", "", $data->expdate);
        // $orderpayment_save->payment_status = 'Unpaid';
        //$orderpayment_save->ip_address = $data->ip;
        // $orderpayment_save->card_type = str_replace("-", "", $data->card_type);
        $orderpayment_save->save();


        $singlereport = new singlereport();
        $singlereport->userId = Auth::user()->id;
        $singlereport->orderId = $autoorder_save->id;
        $singlereport->pstatus = 0;
        $singlereport->save();

        $report = new report();
        $report->userId = Auth::user()->id;
        $report->orderId = $autoorder_save->id;
        $report->pstatus = 0;
        $report->save();

        // AUTO ASSIGN LOOP START
        $check_order = order_assign::where('order_id', $autoorder_save->id)
            ->first();
        if (empty($check_order)) {

            $month = date('m');
            $year = date('Y');


            $users = User::where('status', '1')
                ->where('role', 2)///role order taker
                ->get();
            $array = array();
            foreach ($users as $key => $user) {
                $checkinassignorder = order_assign::
                where('assign_user_id', $user->id)
                    ->whereMonth('monthv', '=', $month)
                    ->whereYear('monthv', '=', $year)
                    ->where('assign_type', '=', 2)
                    ->count();
                $array2['user_id'] = $user->id;
                $array2['current_orders'] = $checkinassignorder;

                array_push($array, $array2);

            }

            if (count($array) > 0) {

                $find_lowest_row_in_array = array_column($array, 'current_orders');
                $min_array = $array[array_search(min($find_lowest_row_in_array), $find_lowest_row_in_array)];
                $lowest_user = $min_array['user_id'];


                $orderassign = new order_assign();
                $orderassign->order_id = $autoorder_save->id;
                $orderassign->assign_user_id = $lowest_user;
                $orderassign->assign_type = 2;
                $orderassign->monthv = date('Y-m-d');
                $orderassign->save();

                $autoorder_save->assign_ordertaker_id = $lowest_user;
                $autoorder_save->save();

            }
        }
        // AUTO ASSIGN LOOP END


        return redirect()->back();

    }

    public function trash_order(Request $request)
    {

        $last_status = "";
        $pstatus_old = 0;
        $autoorder = AutoOrder::find($request->orderid);

        // last status for call hisorty
        $pstatus_old = $autoorder->pstatus;
        $last_status = $this->get_pstatuss($pstatus_old);

        $autoorder->pstatus = 15; //delete
        $autoorder->save();

        $callhistory = new call_history();
        $callhistory->userId = Auth::user()->id;
        $callhistory->orderId = $request->orderid;
        $callhistory->history = "<h6>LAST STATUS : $last_status</h6>" . "<h6>Remarks: Deleted<h6>";
        //$callhistory->is_connected = $request->pstatus1;
        $callhistory->save();

        $singlerreportexist = singlereport::where('orderId', '=', $request->orderid)->first();
        if (!empty($singlerreportexist)) {
            //$singlerreportadd = new singlereport();
            $singlerreportexist->userId = Auth::user()->id;
            $singlerreportexist->orderId = $request->orderid;
            $singlerreportexist->pstatus = 15;
            $singlerreportexist->save();
        }

        $autoorderreport = new report();
        $autoorderreport->userId = Auth::user()->id;
        $autoorderreport->orderId = $request->orderid;
        $autoorderreport->pstatus = 15;
        $autoorderreport->save();


        return redirect()->back();

    }

    public function renew_order($id)
    {

        $last_status = "";
        $pstatus_old = 0;
        $autoorder = AutoOrder::find($id);

        // last status for call hisorty
        $pstatus_old = $autoorder->pstatus;
        $last_status = $this->get_pstatuss($pstatus_old);

        $autoorder->pstatus = 0; //delete
        $autoorder->save();

        $callhistory = new call_history();
        $callhistory->userId = Auth::user()->id;
        $callhistory->orderId = $id;
        $callhistory->history = "<h6>LAST STATUS : $last_status</h6>" . "<h6>Remarks: Renew<h6>";
        //$callhistory->is_connected = $request->pstatus1;
        $callhistory->save();

        $singlerreportexist = singlereport::where('orderId', '=', $id)->first();
        if (!empty($singlerreportexist)) {
            //$singlerreportadd = new singlereport();
            $singlerreportexist->userId = Auth::user()->id;
            $singlerreportexist->orderId = $id;
            $singlerreportexist->pstatus = 0;
            $singlerreportexist->save();
        }

        $autoorderreport = new report();
        $autoorderreport->userId = Auth::user()->id;
        $autoorderreport->orderId = $id;
        $autoorderreport->pstatus = 0;
        $autoorderreport->save();


        return redirect()->back();

    }

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
        } elseif ($id == 20) {
            $ret = "Pickup Pending";
        } elseif ($id == 21) {
            $ret = "Pickup Rejected";
        } elseif ($id == 22) {
            $ret = "Delivery Pending";
        } elseif ($id == 23) {
            $ret = "Delivery Rejected";
        } elseif ($id == 24) {
            $ret = "Complete Pending";
        }
        return $ret;

    }
}
