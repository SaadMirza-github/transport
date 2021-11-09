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
                                    <li><a href="#history_tab" data-toggle="tab">VIEW HISTORY</a></li>
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
                                                        <textarea required  name="history_update"
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
                                                        <textarea required  name="history_update"
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>