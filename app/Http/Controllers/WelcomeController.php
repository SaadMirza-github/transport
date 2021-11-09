<?php

namespace App\Http\Controllers;
use App\Mail\SendCodeMail;
use Illuminate\Http\Request;
use App\User;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use Vinkla\Hashids\Facades\Hashids;

class WelcomeController extends Controller
{
    public function welcome()
    {
        if(Auth::check()) {
            return redirect('home');
        } else {
            return redirect('register');
        }
    }

    public function loginn()
    {
        if(Auth::check()) {

           return redirect('dashboard_admin');
        }else{
            return view('main.auth.login2');

        }

    }

    function getLocationAddress($ip) {
        if($ip == "::1") {
            $ip = json_decode(file_get_contents("http://ipinfo.io/182.176.178.43/json?token=33e3eebd365bd9"));
        } else {
            $ip = json_decode(file_get_contents("https://ipinfo.io/{$ip}/json?token=33e3eebd365bd9"));
        }
        return $ip;
    }

    public  function logout(){

        Auth::logout();
        return redirect('/loginn/');
    }



    public function getlogin2(Request $request) {
        //$loc = get_object_vars($this->getLocationAddress($request->ip()));
        //$locChk = DeveloperSetting::get();

        $userLogin = User::where('email',$request->email)->first();

        if(!empty($userLogin)) {

            if (Hash::check($request->password, $userLogin->password) && $userLogin->status == 1) {
                $this->validate($request, [
                    'email' => 'email|required',
                    'password' => 'required|min:4'
                ]);

                $verify_url = '/verify/' . Hashids::encode($userLogin->id) . '/' . encrypt($request->email) . '/' . encrypt($request->password);

                $modal = User::find($userLogin->id);

                $modal->code = str_random(6);
                $namee = $modal->name;
                $modal->save();


                Mail::to(config('custom.SEND_MAIL'))->send(new SendCodeMail($modal->code));
                return redirect($verify_url);

            } else {
                Session::flash('flash_message', 'The email or the password is invalid. Please try again or check you are active user');
                return redirect()->back();
            }
        }else{
            Session::flash('flash_message', 'The email or the password is invalid. Please try again or check you are active user');
            return redirect()->back();
        }

    }

    public function resend_verify(Request $request) {


        $request->email =  decrypt($request->email);
        $request->password =  decrypt($request->password);

        $userLogin = User::where('email',$request->email)->first();


        if(!empty($userLogin)) {

            if (Hash::check($request->password, $userLogin->password)) {

                $verify_url = '/verify/' . Hashids::encode($userLogin->id) . '/' . encrypt($request->email) . '/' . encrypt($request->password);

                $modal = User::find($userLogin->id);

                $modal->code = str_random(6);
                $namee = $modal->name;
                $modal->save();


                Mail::to(config('custom.SEND_MAIL'))->send(new SendCodeMail($modal->code));
                return redirect($verify_url);

            } else {
                Session::flash('flash_message', 'The email or the password is invalid. Please try again.');
                return redirect()->back();
            }
        }else{
            Session::flash('flash_message', 'The email or the password is invalid. Please try again.');
            return redirect()->back();
        }

    }

    public function getVerification($id, $email, $password) {
        return view('main.verify.index')->with('id',$id)->with('email',$email)->with('password',$password);
    }

    public function codeVerify(Request $request) {

        $user = User::where('code',$request->verified)->where('email',decrypt($request->email))->first();
        if($user) {

            if(Auth::attempt(['email' => decrypt($request->email),'password' => decrypt($request->password)])) {

                $modal = User::find($user->id);
                $modal->verify = 1;
                $modal->save();
                return redirect('/dashboard_admin/');
            }

        } else {
            return redirect::back();
        }
    }


}
