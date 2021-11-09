<?php

namespace App\Http\Controllers\phone_quote\global_chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\chat;
use App\role;
use App\zipcodes;
use Session;
use Redirect;
use Hash;
use Mail;
use Auth;
use DB;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class ChatController extends Controller
{
    public function index()
    {
        $data = User::where('id', '!=', auth()->id())->get();
        return view('main.phone_quote.global_chat.index', compact('data'));

    }

    public function get_chat(Request $request)
    {
//        $data = chat::where([
//            ['fromuserId', '=', $request->touserId]])->orwhere([
//            ['touserId', '=', $request->touserId]])->join('users', 'chats.fromuserId', '=', 'users.id')
//            ->select('chats.*', 'users.name as name')
//            ->orderby('chats.created_at')
//            ->get();

        $carbon = Carbon::today()->subDays(2);
        $data = chat::where([
            ['fromuserId', '=', $request->touserId]])->orwhere([
            ['touserId', '=', $request->touserId]])->where('chats.created_at', '>=', $carbon)->join('users', 'chats.fromuserId', '=', 'users.id')
            ->select('chats.*', 'users.name as name')
            ->orderby('chats.created_at')
            ->get();


        return view('main.phone_quote.global_chat.show_chat', compact('data'));
    }


    public function get_chat2(Request $request)
    {
        $uid = auth()->id();
        $data = chat::where('touserId', '=', auth()->id())->where('chat_view', '=', 0)->orderby('created_at', 'desc')->get();
        return view('main.phone_quote.global_chat.show_chat', compact('data'));

    }


    public function view_chat(Request $request)
    {
        $uid = auth()->id();
        $data = chat::where('touserId', '=', auth()->id())->where('chat_view', '=', 0)->orderby('created_at', 'desc')->get();
        if (!empty($data)) {
            $data2 = DB::update("update chats set chat_view = 1 where touserId = $uid");

        }
    }


    public function view_chat_timer(Request $request)
    {
        $uid = auth()->id();
        $data = chat::where('touserId', '=', auth()->id())->where('chat_view', '=', 0)->orderby('created_at', 'desc')->count();
        return $data;

    }

    public function save_chat(Request $request)
    {


        $chat = new chat();
        $chat->touserId = $request->to_user_id;
        $chat->fromuserId = Auth::user()->id;
        $chat->description = $request->description;
        $chat->save();
        redirect('/chats');
        return "SUCCESS";
    }

    public function get_name($id)
    {
        $user = User::find($id);
        return $user->name;
    }

    public function get_chat_unread(Request $request)
    {

        $uid = auth()->id();

        $data['alldata'] = DB::SELECT("SELECT COUNT(fromuserId) as total_count,fromuserId,touserId,description,created_at FROM chats WHERE chat_view = 0 and touserId = '$uid' GROUP by fromuserId");


        foreach ($data['alldata'] as $item) {
            $item->fromuserId = $this->get_name($item->fromuserId);
        }

        return json_encode($data);
    }
}
