@include('partials.mainsite_pages.return_function')
@extends('layouts.mainsite')

@section('template_title')
    Dashboard
@endsection

@section('content')
    <style>
        .card {
            border: 1px solid #9E9E9E;
            box-shadow: 3px 3px #9E9E9E;
        }

        .card:hover {
            box-shadow: -3px -3px #9E9E9E;
        }

        .card-header {
            justify-content: center;
            border-bottom: 1px solid;
        }

        .card-title {
            font-size: 24px;
            font-family: 'FontAwesome';
        }

        body {
            background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185));
            box-shadow: 2px 2px #9E9E9E;
        }

        .side-badge {
            font-size: 21px;
            background-color: transparent;
            color: red;
            font-weight: 800;
        }

        .panel-tabs {
            display: flex;
            flex-wrap: wrap
        }

        .tabs-menu ul li a {
            padding: 10px 20px 11px 20px;
            display: block;
            border: 1px solid #645959;
            margin: 3px;
            border-radius: 4px;
            box-shadow: 5px 5px #9E9E9E;

        }

        .tabs-menu ul li a:hover {
            padding: 10px 20px 11px 20px;
            display: block;
            border: 1px solid #645959;
            margin: 3px;
            border-radius: 4px;
            box-shadow: -2px -2px #9E9E9E;
        }

        .tabs-menu ul li .active {
            background: #705ec8;
            box-shadow: -2px -2px #9E9E9E;
            color: white

        }

        .tab-menu-heading {
            padding: 0px !important;
        }

        .panel-body {
            padding: 0px !important;

        }

        .tab_style {
            box-shadow: 5px 5px #888888;
            margin-right: 11px;
        }

        .btn:hover {
            text-decoration: none;
        }

        ul > li > a > .fa {
            color: white !important;
            text-shadow: -3px 0 #000, 0 1px #000, 2px 0 #000, 0 2px #000
        }

        /*btn_background*/
        .effect01 {
            color: #FFF;
            border: 4px solid #000;
            box-shadow: 0px 0px 3px 0px #000 inset;
            background-image: -webkit-radial-gradient(50% 0%, 8% 50%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(50% 100%, 12% 50%, hsla(0, 0%, 100%, .6) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(0% 50%, 50% 7%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-radial-gradient(100% 50%, 50% 5%, hsla(0, 0%, 100%, .5) 0%, hsla(0, 0%, 100%, 0) 100%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 3%, hsla(0, 0%, 0%, .1) 3.5%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 6%, hsla(0, 0%, 100%, .1) 7.5%), -webkit-repeating-radial-gradient(50% 50%, 100% 100%, hsla(0, 0%, 100%, 0) 0%, hsla(0, 0%, 100%, 0) 1.2%, hsla(0, 0%, 100%, .2) 2.2%), -webkit-radial-gradient(50% 50%, 200% 50%, hsla(0, 0%, 90%, 1) 5%, hsla(0, 0%, 85%, 1) 30%, hsla(0, 0%, 60%, 1) 100%);
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
            font-size: 21px;
            height: 34px;
            width: 100px;
            padding: 0px !important;
            margin: 6px !important;
        }

        .effect01:hover {
            border: 4px solid #666;
            background-color: #FFF;
            box-shadow: 0px 0px 0px 4px #EEE inset;
        }

        .blue {
            background-color: #1fd1f9;
            background-image: linear-gradient(to right, rgb(41, 128, 185), rgb(109, 213, 250), rgb(255, 255, 255));
            box-shadow: 2px 2px #9E9E9E;
        }

        .green {
            background-color: #378b29;
            background-image: linear-gradient(315deg, #378b29 0%, #74d680 74%);
            box-shadow: 2px 2px #9E9E9E;
        }

        .purple {

            background-image: linear-gradient(315deg, #fc9842 0%, #fe5f75 74%);
            box-shadow: 2px 2px #9E9E9E;

        }

        .red {

            background-image: linear-gradient(to right, rgb(128, 0, 128), rgb(255, 192, 203));
            box-shadow: 2px 2px #9E9E9E;

        }

        .rainbow {
            background-image: linear-gradient(to right, rgb(0, 242, 96), rgb(5, 117, 230));
            box-shadow: 2px 2px #9E9E9E;
        }

        .orange {
            background-image: linear-gradient(to right, rgb(252, 74, 26), rgb(247, 183, 51));
            box-shadow: 2px 2px #9E9E9E;
        }

        .darkblue {
            background-image: linear-gradient(to right, rgb(57, 106, 252), rgb(41, 72, 255));
            box-shadow: 2px 2px #9E9E9E;
        }

        /*btn_text*/
        .effect01 span {
            transition: all 0.2s ease-out;
            z-index: 2;
        }

        .effect01:hover span {
            letter-spacing: 0.13em;
            color: #333;
        }

        .header_show {
            cursor: pointer;
        }

        /*highlight*/
        .effect01:after {
            background: #FFF;
            border: 0px solid #000;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
            width: 50px;
            transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1); /*easeOutCirc*/
            z-index: 1;
        }

        .effect01:hover:after {
            background: #FFF;
            border: 20px solid #000;
            opacity: 0;
            left: 120%;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
        }
    </style>

    <div class="header_show ">
        <center>
            <i class="fa fa-caret-down " style="font-size: 56px;"></i>
        </center>
    </div>
    
    <div class="modal fade" id="largemodal" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largemodal1">HISTORY/STATUS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading p-0 bg-light">
                                <div class="tabs-menu1 ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab1" class="active" data-toggle="tab">HISTORY/STATUS</a>
                                        </li>
                                        <li><a href="#tab2" data-toggle="tab">VIEW HISTORY</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab1">

                                        @if(\Request::is('new'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">New HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="3">AskingLow</option>
                                                                <option value="4">NotInterested</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('followup'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">FollowUp HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="3">AskingLow</option>
                                                                <option value="4">NotInterested</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('interested'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">INTERESTED HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="3">AskingLow</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('asking_low'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">ASKING LOW HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="4">NotInterested</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('not_interested'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">NOT-INTERESTED HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="3">AskingLow</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('not_responding'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">Not Responding HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="3">AskingLow</option>
                                                                <option value="4">NotInterested</option>
                                                                <option value="5">NoResponse</option>
                                                                <option value="6">TimeQuote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('time_quote'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">TimeQuote HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="1">Interested</option>
                                                                <option value="2">FollowMore</option>
                                                                <option value="3">AskingLow</option>
                                                                <option value="4">NotInterested</option>
                                                                <option value="5">NoResponse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('payment_missing'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">Payment Missing HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('booked'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">BOOKED HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="9">LISTED</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">LISTED PRICE</label>
                                                            <input type="number" required name="listed_price"
                                                                   id='listed_price'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif
                                        @if(\Request::is('listed'))
                                            <form id="listedform" method="post"
                                                  action="{{route('call_history_post_relist')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">LISTED HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row" id="row1">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select required type="date" name="pstatus" id='pstatus'
                                                                    class="form-control select2 getcarrier">
                                                                <option value="">Select</option>
                                                                <option value="10">DISPATCH</option>
                                                                <option value="14">CANCEL ORDER</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Carrier
                                                                <a href="javascript:;"
                                                                   onclick="this.href='/carrier_add/'+ document.getElementById('order_id1').value"
                                                                   type="button" target="_blank"
                                                                   class="btn btn-info btn-sm">UPDATE CARRIER</a>

                                                            </label>
                                                            <select id="current_carrier" class="form-control select2"
                                                                    name="current_carrier" required
                                                                    data-validation-required-message="This field is required">
                                                                <option value="">Please Add Carrier
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE / PICKUP
                                                                DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="row2">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Relist</label>
                                                            <input style="width: 20px;height: 20px"
                                                                   onclick="showprice()" type="checkbox"
                                                                   name="relist" id='relist'>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6" id="r1" style="display: none">
                                                        <div class="form-group">
                                                            <label class="form-label">New Relist Price</label>
                                                            <input type="number" name="listed_price"
                                                                   id='relist_id' class="form-control">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-sm-6 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">HISTORY</label>
                                                        <textarea required maxlength="99" name="history_update"
                                                                  id='history_update'
                                                                  class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('dispatch'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">Dispatch HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row" id="dipatchpickup">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2 getpickupdate">
                                                                <option value="11">Pickup</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE / DELIVER
                                                                DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 pickupdatediv">

                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('picked_up'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">PickedUp HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">

                                                                <option value="12">Deliver</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 pickupdatediv2">

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 deliverdate">

                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('delivered'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">Delivered HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="13">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('completed'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">Completed HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif

                                        @if(\Request::is('owns_money'))
                                            <form method="post" action="{{route('call_history_post')}}">
                                                @csrf
                                                <div class="card-title font-weight-bold">INTERESTED HISTORY/CHANGE
                                                    STATUS:
                                                </div>
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="order_id1"
                                                           id='order_id1' placeholder="" readonly>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">CHANGE STATUS</label>
                                                            <select type="date" name="pstatus" id='pstatus' required
                                                                    class="form-control select2">
                                                                <option value="">Do Change Status from here</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">EXPECTED DATE</label>
                                                            <input type="date" required name="expected_date"
                                                                   id='expected_date'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">HISTORY</label>
                                                            <textarea required maxlength="99" name="history_update"
                                                                      id='history_update'
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        @endif


                                    </div>
                                    <div class="tab-pane" id="tab2">

                                        <div class="chat-body-style ChatBody" id="calhistory"
                                             style="overflow:scroll; height:300px;">
                                            <div class="message-feed media">
                                                <div class="media-body">
                                                    <div class="mf-content">
                                                        hi
                                                    </div>
                                                    <small class="mf-date"><i class="fa fa-clock-o"></i>2021-01-19
                                                        15:53:42
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Yearly Orders</div>
                </div>
                <div class="card-body">
                    <div class="chartjs-wrapper-demo">
                        <div id="chart3" class="h-300 mh-300"></div>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-sm-12 col-lg-6">
            <div class="card" style=" height: 94%; ">
                <div class="card-header">
                    <div class="card-title">Monthly Orders</div>
                </div>
                <div class="btn-group p-0">
                    <select class="btn  btn-sm btn-info w-25" style="padding: 3px;" name="panel_type2" id="panel_type2">

                        <option selected="selected" value="">All</option>
                        <option value="0">Penal Type 1</option>
                        <option value="1">Penal Type 2</option>
                        <option value="2">Penal Type 3</option>
                    </select>
                    <select class="btn  btn-sm btn-info w-25" style="padding: 3px;" type="text" id="yearid">
                        <option value="{{$date1 =  date('Y')}}">{{$date2 = date('Y')}}</option>
                        <option value="{{$date1 =  $date1 -1}}">{{$date2 =$date2 - 1}}</option>
                        <option value="{{$date1 =  $date1 -1}}">{{$date2 =$date2 - 1}}</option>
                        <option value="{{$date1 =  $date1 -1}}">{{$date2 =$date2 - 1}}</option>
                        <option value="{{$date1 =  $date1 -1}}">{{$date2 =$date2 - 1}}</option>
                        <option value="{{$date1 =  $date1 -1}}">{{$date2 =$date2 - 1}}</option>
                    </select>
                    <select class="btn  btn-sm btn-info w-25" style="padding: 3px;" type="text" id="monthid">
                        <option value="{{date('m')}}" selected="selected">{{date('M')}}</option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>

                    </select>
                    <input value="View" type="button" onclick="chart_view();"
                           class="btn btn-outline-dark btn-submit btn-sm w-25">

                </div>
                <div class="card-body">
                    <div class="chartjs-wrapper-demo">
                        <div id="chart5" class="h-300 mh-300">

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
        {{--<div class="col-sm-12 col-lg-6">--}}
        {{--<div class="card">--}}
        {{--<div class="card-header">--}}
        {{--<div class="card-title">Daily Orders</div>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
        {{--<div class="chartjs-wrapper-demo">--}}
        {{--<div id="chart9" class="h-300 mh-300"></div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
        <div class="row">
        <div class="col-sm-12 col-lg-6">
        <div class="card">

            <div class="card-header" style=" justify-content: center; ">
                <h2 style=" font-size: 32px; font-family: initial;  ">Performance Of The Month</h2>
            </div>


            <div class="card-body">
                <form action="#" id="form_data" class="form-inline" method="get">

                    <label style=" font-size: 17px; " class="radio-inline">
                        <input type="radio" checked="checked" name="ordertaker_dispatcher"
                               value="1"/>
                        &nbsp;Order Taker &nbsp;&nbsp; </label>
                    <label style=" font-size: 17px; " class="radio-inline">
                        <input type="radio" name="ordertaker_dispatcher" value="2"/>&nbsp;Dispatcher</label>
                    <input type="month" name="monthv" value="{{date('Y-m')}}" class="form-control w-30"
                           style=" float: right; margin-left: auto; ">

                    <input type="button" onclick="get_permormance()" name="view" value="View" class="btn btn-primary ml-3"/>
                </form>
                <br>

                <!--  <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->

                <div id="chart_data2" >

                </div>
               


            </div>

        </div>
        </div>

            <div class="col-sm-12 col-lg-6">
                <div class="card">

                    <div class="card-header" style=" justify-content: center; ">
                        <h2 style=" font-size: 32px; font-family: initial;  ">User Rating</h2>
                    </div>


                    <div class="card-body">
                        <form action="#" id="form_data_user_rating" class="form-inline" method="get">

                            <label style=" font-size: 17px; " class="radio-inline">
                                <input type="radio" checked="checked" name="ordertaker_dispatcher"
                                       value="1"/>
                                &nbsp;Order Taker &nbsp;&nbsp; </label>
                            <label style=" font-size: 17px; " class="radio-inline">
                                <input type="radio" name="ordertaker_dispatcher" value="2"/>&nbsp;Dispatcher</label>
                            <input type="month" name="monthv" value="{{date('Y-m')}}" class="form-control w-30"
                                   style=" float: right; margin-left: auto; ">

                            <input type="button" onclick="get_rating()" name="view" value="View" class="btn btn-primary ml-3"/>
                        </form>
                        <br>

                        <!--  <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->

                        <div id="chart_data_rating" >

                        </div>

                    </div>

                </div>
            </div>

    </div>
@endsection

@section('extraScript')
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        window.onload = function () {

            var options = {
                animationEnabled: true,
                title: {
                    text: ""
                },
                axisY: {
                    title: "",
                    suffix: ""
                },
                axisX: {
                    title: "Salary"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#" % "",
                    dataPoints: [
                        {label: "employee", y: 10.09},
                        {label: "employee & Caicos Islands", y: 9.40},
                        {label: "employee", y: 8.50},
                        {label: "employee", y: 7.96},
                        {label: "employee", y: 7.80}


                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

        }
    </script>




    <script>

        $(document).ready(function(){
            get_permormance();
            get_rating();
        });
        function get_permormance() {

            $('#chart_data2').html('');
            $('#chart_data2').append(`<div class="lds-hourglass" id='ldss'></div>`);
            var form_data = $("#form_data").serialize();
            $.ajax({
                type: 'get',
                url: '/performance_load',
                data: form_data,
                success: function (data) {

                    $('#chart_data2').html(data);
                }
            });
        }
        function get_rating() {

            $('#chart_data_rating').html('');
            $('#chart_data_rating').append(`<div class="lds-hourglass" id='ldss'></div>`);
            var form_data = $("#form_data_user_rating").serialize();
            $.ajax({
                type: 'get',
                url: '/rating_load',
                data: form_data,
                success: function (data) {

                    $('#chart_data_rating').html(data);
                }
            });
        }
    </script>

    <script>

            <?php $datee = date('Y'); ?>
        var options3 = {
                series: [{
                    name: 'New Order',
                    data: [
                        <?php
                        for ($a = 0; $a < 5; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>

                    ]
                }, {
                    name: 'Interested',
                    data: [
                        <?php
                        for ($a = 5; $a < 10; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>

                    ]
                }, {
                    name: 'Payment Missing',
                    data: [
                        <?php
                        for ($a = 10; $a < 15; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }, {
                    name: 'Listed',
                    data: [
                        <?php
                        for ($a = 15; $a < 20; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }, {
                    name: 'completed',
                    data: [
                        <?php
                        for ($a = 20; $a < 25; $a++) {
                            echo $chart[$a] . ',';
                        }
                        ?>
                    ]
                }],
                colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
                chart: {
                    type: 'bar',
                    height: 340,
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                    },
                },
                stroke: {
                    width: 2,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: ['{{$datee}}',{{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}, {{$datee =  $datee- 1}}],
                    labels: {
                        formatter: function (val) {
                            return val + ""
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: undefined
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " ORDERS"
                        }
                    }
                },
                fill: {
                    opacity: 2
                },
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: 10
                }
            };
        var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
        chart3.render();


        var options5 = {
            series: [{{$new}}, {{$interested}}, {{$paymissing}}, {{$listed}}, {{$completed}}],
            colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
            chart: {
                height: 300,
                type: 'pie',
            },
            labels: ['New', 'Interested', 'Payment Missing', 'Listed', 'Completed'],
            legend: {
                show: false,
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: false,
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
        chart5.render();


        var options9 = {
            series: [44, 55, 67, 83],
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: false,
                            label: 'Total',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            labels: ['Manager', 'QA', 'Dispatcher', 'Order Taker'],
            colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
        };
        var chart9 = new ApexCharts(document.querySelector("#chart9"), options9);
        chart9.render();

    </script>


    <script>

        document.body.style.zoom = "95%";

    </script>

    <script>

        $(".panel-tabs").click(function () {

            $('#search_form').hide();
            $('#table_data').html('');

        });

    </script>

    <script>
        $(document).ready(function () {
            $(".header_show").trigger('click');
            $(".fa-caret-down").css("visibility", "hidden");
        });


        function chart_view() {
            ////$('#chart5').html('');
            //var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
            //chart5.render();

            var monthv = $('#monthid').val();
            var yearv = $('#yearid').val();
            var panel_type2 = $('#panel_type2').val();


            $.ajax({
                type: 'get',
                url: '/get_chart_1',
                data: {yearv: yearv, monthv: monthv, panel_type2: panel_type2},
                success: function (data) {
                    //alert(data[0]);
                    newv = data[0];
                    interested = data[1];
                    paymissing = data[2];
                    listed = data[3];
                    completed = data[4];


                    $('#chart5').html('');
                    var options5 = {
                        series: [newv, interested, paymissing, listed, completed],
                        colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
                        chart: {
                            height: 300,
                            type: 'pie',
                        },
                        labels: ['New', 'Interested', 'Payment Missing', 'Listed', 'Completed'],
                        legend: {
                            show: false,
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    show: false,
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
                    chart5.render();


                },

            });


        }


    </script>



@endsection

