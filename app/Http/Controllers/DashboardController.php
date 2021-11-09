<?php

namespace App\Http\Controllers;

use App\Mail\SendCodeMail;
use Illuminate\Http\Request;
use App\User;
use App\role;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use App\AutoOrder;
use App\order_assign;
use Vinkla\Hashids\Facades\Hashids;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        if (Auth::check()) {
            $rolelist = role::all();
            $data_array = array();

            $new = 0;
            $active = 0;
            $book = 0;
            $listed = 0;
            $dispatch = 0;
            $picked_up= 0;
            $deliver = 0;
            $total_orders = 0;

            if (Auth::user()->role == 2) {

                $user_id = Auth::user()->id;
                $get_user_orders = order_assign::where('assign_type',2)->where('assign_user_id',$user_id)->get();

                foreach ($get_user_orders as  $val){
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id',$val->order_id)->first();
                    if(!empty($auto_orders)){
                        $pstatus =    $auto_orders->pstatus;
                        if($pstatus == 0){
                            $new++;
                        }else if($pstatus == 19){
                            $active++;
                        }else if($pstatus == 8){
                            $book++;
                        }else if($pstatus == 9){
                            $listed++;
                        }else if($pstatus == 10){
                            $dispatch++;
                        }else if($pstatus == 11){
                            $picked_up++;
                        }else if($pstatus == 12){
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

            }else if(Auth::user()->role == 3){

                $user_id = Auth::user()->id;
                $current_month = date('m');

                $get_user_orders = order_assign::whereMonth('created_at', '=', date('m'))->where('assign_type',3)->where('assign_user_id',$user_id)->get();
                foreach ($get_user_orders as  $val){
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id',$val->order_id)->first();
                    if(!empty($auto_orders)){
                        $pstatus =    $auto_orders->pstatus;
                        if($pstatus == 0){
                            $new++;
                        }else if($pstatus == 19){
                            $active++;
                        }else if($pstatus == 8){
                            $book++;
                        }else if($pstatus == 9){
                            $listed++;
                        }else if($pstatus == 10){
                            $dispatch++;
                        }else if($pstatus == 11){
                            $picked_up++;
                        }else if($pstatus == 12){
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

            $total_orders=$new+$active+$book+$listed+$dispatch+$picked_up+$deliver;
            return view('main.dashboard.index', compact('role', 'rolelist','data_array','total_orders'));
        } else {
            return redirect('/loginn/');
        }
    }


    public function getDashboard2()
    {
        if (Auth::check()) {
            $rolelist = role::all();
            $data_array = array();

            $new = 0;
            $active = 0;
            $book = 0;
            $listed = 0;
            $dispatch = 0;
            $picked_up= 0;
            $deliver = 0;
            $total_orders = 0;

            if (Auth::user()->role == 2) {

                $user_id = Auth::user()->id;
                $get_user_orders = order_assign::where('assign_type',2)->where('assign_user_id',$user_id)->get();

                foreach ($get_user_orders as  $val){
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id',$val->order_id)->first();
                    if(!empty($auto_orders)){
                        $pstatus =    $auto_orders->pstatus;
                        if($pstatus == 0){
                            $new++;
                        }else if($pstatus == 19){
                            $active++;
                        }else if($pstatus == 8){
                            $book++;
                        }else if($pstatus == 9){
                            $listed++;
                        }else if($pstatus == 10){
                            $dispatch++;
                        }else if($pstatus == 11){
                            $picked_up++;
                        }else if($pstatus == 12){
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

            }else if(Auth::user()->role == 3){

                $user_id = Auth::user()->id;
                $current_month = date('m');

                $get_user_orders = order_assign::whereMonth('created_at', '=', date('m'))->where('assign_type',3)->where('assign_user_id',$user_id)->get();
                foreach ($get_user_orders as  $val){
                    $pstatus = 0;
                    $auto_orders = AutoOrder::where('id',$val->order_id)->first();
                    if(!empty($auto_orders)){
                        $pstatus =    $auto_orders->pstatus;
                        if($pstatus == 0){
                            $new++;
                        }else if($pstatus == 19){
                            $active++;
                        }else if($pstatus == 8){
                            $book++;
                        }else if($pstatus == 9){
                            $listed++;
                        }else if($pstatus == 10){
                            $dispatch++;
                        }else if($pstatus == 11){
                            $picked_up++;
                        }else if($pstatus == 12){
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

            $total_orders=$new+$active+$book+$listed+$dispatch+$picked_up+$deliver;
            return view('main.dashboard.index2', compact('role', 'rolelist','data_array','total_orders'));
        } else {
            return redirect('/loginn/');
        }
    }


    public function add_employee()
    {

        $data = role::all();

        if (Auth::check()) {
            return view('main.register.index', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function view_employee()
    {

        $data = User::orderBy('id', 'desc')->get();
        if (Auth::check()) {
            return view('main.register.view_register', compact('data'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function edit_employee($id)
    {

        $data2 = User::where('id', $id)->first();

        $data = role::all();

        if (Auth::check()) {
            return view('main.register.edit_employee', compact('data', 'data2'));
        } else {
            return redirect('/loginn/');
        }
    }

    public function user_active($id)
    {


        if (Auth::check()) {

            $modal = User::find($id);
            $modal->status = 1;
            $modal->save();
            Session::flash('flash_message', 'Employee Data Successfully Saved');

            return redirect('/view_employee/');

        } else {
            return redirect('/loginn/');
        }

    }

    public function user_deactive($id)
    {

        if (Auth::check()) {

            $modal = User::find($id);
            $modal->status = 0;
            $modal->save();
            Session::flash('flash_message', 'Employee Data Successfully Saved');
            return redirect('/view_employee/');

        } else {
            return redirect('/loginn/');
        }

    }

    public function save_employee(Request $request)
    {


        $total_emp_access_phone = "";
        $total_emp_access_web = "";

        $emp_access_phone = $request->emp_access_phone;
        $emp_access_web = $request->emp_access_web;

        // dd($request->emp_access_phone);

        if ($request->emp_access_phone <> null) {
            $total_emp_access_phone = implode(",", $emp_access_phone);
        }


        if ($request->emp_access_web <> null) {
            $total_emp_access_web = implode(",", $emp_access_web);
        }
        $usrChk = User::where('email', $request->email)->first();
        if ($usrChk == '') {
            $full_name = $request->first_name;
            $emp = new User();
            $emp->name = $full_name;
            $emp->email = $request->email;
            $emp->password = Hash::make($request->password);
            $emp->role = $request->job_type;
            $emp->phone = $request->phone_number;
            $emp->address = $request->address;
            $emp->status = 1;
            $emp->emp_access_phone = $total_emp_access_phone;
            $emp->emp_access_web = $total_emp_access_web;
            if ($request->targetapply == 1) {
                $emp->target_apply = 1;
                $emp->target = $request->target;
            }
            $emp->save();

            redirect('/view_employee/');

            Session::flash('flash_message', 'Employee Data Successfully Saved');

            return "SUCCESS";
        } else {
            Session::flash('flash_message2', 'Email Already Exist');
            return "ALREADY EXIST";
        }

    }

    public function update_employee(Request $request)
    {

        //dd($request->emp_access_phone);


        $total_emp_access_phone = "";
        $total_emp_access_web = "";

        $emp_access_phone = $request->emp_access_phone;
        $emp_access_web = $request->emp_access_web;

        if ($request->emp_access_phone <> null) {
            $total_emp_access_phone = implode(",", $emp_access_phone);
        } else {
            $total_emp_access_phone = "";
        }


        if ($request->emp_access_web <> null) {
            $total_emp_access_web = implode(",", $emp_access_web);
        } else {
            $total_emp_access_web = "";
        }

        //echo $total_emp_access_phone;die();


        $emp = User::find($request->user_id);
        $emp->name = $request->first_name;
        $emp->email = $request->email;
        if ($request->password) {
            $emp->password = Hash::make($request->password);
        }
        $emp->role = $request->job_type;
        $emp->phone = $request->phone_number;
        $emp->address = $request->address;
        $emp->status = 1;
        $emp->emp_access_phone = $total_emp_access_phone;
        $emp->emp_access_web = $total_emp_access_web;
        if ($request->targetapply == 1) {
            $emp->target_apply = 1;
            $emp->target = $request->target;
        } else {
            $emp->target_apply = 0;
            $emp->target = 0;
        }

        $emp->save();

        redirect('/view_employee/');

        Session::flash('flash_message', 'Employee Data Successfully Saved');

        return "SUCCESS";


    }


}
