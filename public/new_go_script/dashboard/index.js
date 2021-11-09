
$('.radio').click(function () {
    if ($('#call_connect').is(':checked')) {

        $(".status").css("display", "block");
    }
    else if ($('#not_connect').is(':checked')) {
        $(".status").css("display", "none");
        $(".radio_value").checked = false;
        $(".radio_value").prop('checked', false);
        $(".SumoUnder").prop('selected', false);
        $(".opt").removeClass('selected');
        $(".CaptionCont").attr('title', 'Select Here');
        $('.placeholder').text("Select Here");
        $('.CaptionCont > span').empty();
        $('.CaptionCont > span').text("Select Here");
        $('#bookers  option').prop('selected', false);

    }

});

$('#lock_text').click(function () {
    $('#history_update').focus();
});


function selectRefresh() {
    $('.select2').select2({
        //-^^^^^^^^--- update here
        tags: true,
        placeholder: "Select an Option",
        allowClear: true,
        width: '100%'
    });
}


function get_data(get, header_menu, sub_menu) {


    $('#table_data').html('');
    $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
    $.ajax({

        url: "/get_data/" + get,
        type: "GET",
        success: function (data) {
            $('#table_data').html('');
            $('#table_data').html(data);


        },
        complete: function (data) {
            $('#p_status').val(get);
            $('#ldss').hide();
            $('#search_form').show();
            regain();
            popup_update(get);
        }

    });

    $.ajax({
        url: "/menu_setting/" + header_menu + "/" + sub_menu,
        type: "GET",
        success: function (data) {

        },
    });


}


function get_requested_quotes() {


    $('#table_data').html('');
    $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
    $.ajax({

        url: "/get_requested_quotes",
        type: "GET",
        success: function (data) {
            $('#table_data').html('');
            $('#table_data').html(data);


        },
        complete: function (data) {
            $('#p_status').val(get);
            $('#ldss').hide();
            $('#search_form').show();
            regain();
        }

    });

}

$('#trashmodal').on('show.bs.modal', function (e) {

    var orderId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="orderid"]').val(orderId);

});


function popup_update(get) {

    var temp = "";

    $('#changestatusform').attr('action', '/call_history_post');

    $('#popup_data').html('');
    if (get == 0) {
        $('#popup_data').html(`<input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
              `);

    } else if (get == 1) {
        $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;
                 <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
                 <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
    }
    else if (get == 2) {
        $('#popup_data').html(`
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;

               <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
               <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
    }
    else if (get == 4) {
        $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
    }
    else if (get == 5) {
        $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='6'>Time Quote
                 `);
    }
    else if (get == 6) {
        $('#popup_data').html(`
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='1'>Intersted &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value'  name='pstatus' value='2'>Follow More &nbsp;&nbsp;&nbsp;

            <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;
            <input type='radio' class='option-input radio radio_value' name='pstatus' value='5'>Not Respond &nbsp;                                                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='4'>Not Interested &nbsp;&nbsp;&nbsp;

                 `);
    }

    else if (get == 7) {
        $('#popup_data').html(`
                <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Booked </h6>
                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='8'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Bookers</h6>
                    <select  required id='bookers'  multiple='multiple' name='bookers[]'>

                        <option value='' >Select Bookers</option>
                    </select>
                 </div>

               </div>

                 `);
    }

    else if (get == 8) {
        $('#popup_data').html(`


               <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Listed </h6>

                     <input type='radio' class='option-input radio radio_value' name='pstatus' value='9'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Listed Price</h6>
                    <input type='text' class='form-control'  required id='listed_price'   name='listed_price'/>
                 </div>

               </div>


                 `);
    }

    else if (get == 9) {

        $('#changestatusform').attr('action', '/call_history_post_relist');

        $('#popup_data').html(`
                 <div class='row mb-5 pb-5' >
                      <div class='col-md-2 relist_hide'>
                         <label style="display: block;">Dispatch</label>
                        <input type='radio' class='option-input radio radio_value' name='pstatus' value='10'>
                      </div>
                      <div class='col-md-2 relist_hide' style=" margin-left: -13px; text-align: center; ">
                        <label style="display: block;">Cancel Order  </label>
                        <input type='radio' class='option-input radio radio_value' name='pstatus' value='14'>
                      </div>
                      <div class='col-md-4 relist_hide'>

                         <div class='form-group'>
                             <label class='form-label mb-4'>Select Carrier
                                 <a href='javascript:;'
                                    onclick="this.href='/carrier_add/'+$('#order_id1').val()"
                                    type='button' target='_blank'
                                    class='btn btn-sm' style='background-color: rgb(112 94 200); color: white; border-radius: 5px; '>UPDATE CARRIER</a>

                             </label>
                             <select id='current_carrier' class='form-control'
                                     name='current_carrier' required style=' height: auto; '
                                     data-validation-required-message='This field is required'>
                                 <option value=''>Please Add Carrier</option>
                             </select>
                         </div>
                     </div>
                     <div class='col-md-4'>
                         <div class='row '>
                             <div class='col-sm-2 col-md-2' style=' text-align: center; '>
                                 <div class='form-group'>
                                     <label class='form-label mb-4'>Relist</label>
                                     <input style='margin-top: -14px;' onclick='showprice()' type='checkbox' name='relist' id='relist' class='option-input radio'>
                                 </div>
                             </div>

                             <div class='col-sm-10 col-md-10 mt-2' id='r1' style='display: none'>
                                 <div class='form-group'>
                                     <label class='form-label'>	&nbsp;</label>
                                     <input type='number' name='listed_price'
                                            id='relist_id' class='form-control' placeholder='New Relist Price'>
                                 </div>
                             </div>
                         </div>

                     </div>


                 </div>


                 `);
    }
    else if (get == 10) {


        $('#popup_data').html(`
                    <div class="row">
                         <div class="col-sm-2 col-md-2">
                         <label class="form-label">Pickup</label>
                         <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='11'>
                         </div>

                          <div class="col-sm-2 col-md-2">
                            <div class="form-group" style=" text-align: center; ">
                            <label class="form-label ">Mark As Approved</label>
                            <input type='checkbox' class='option-input radio radio_value' name='approvalpickup' value='1'>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3 col-md-3">
                                    <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Pickup Date 	&nbsp;</label>
                                        <input type="date" name="pickup_date" value='{{date("Y-m-d")}}' id='pickup_date' required class="form-control">

                                    </div>
                         </div>
                    </div>

                 `);


    }

    else if (get == 11) {
        $('#popup_data').html(`


               <div class='row' >
                         <div class="col-sm-2 col-md-2">
                                 <label class="form-label">Deliverd</label>
                                 <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='12'>
                         </div>

                          <div class="col-sm-2 col-md-2">
                                    <div class="form-group" style=" text-align: center; ">
                                        <label class="form-label ">Mark As Deliver</label>
                                        <input type='checkbox' class='option-input radio radio_value' name='approvaldeliver' value='1'>
                                    </div>
                          </div>


                         <div class="col-sm-3 col-md-3">
                                   <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Pickup Date 	&nbsp;</label>
                                        <input type="date" readonly name="pickup_date" value='{{date("Y-m-d")}}' id='pickup_date' required class="form-control">
                                    </div>
                         </div>

                         <div class="col-sm-3 col-md-3">
                                   <div class="form-group mt-4" >
                                        <label class="form-label mb-4">Deliver Date &nbsp;</label>
                                        <input type="date" name="deliver_date" value='{{date("Y-m-d")}}' id='deliver_date' required class="form-control">
                                    </div>
                         </div>

               </div>

                 `);
    }

    else if (get == 12) {
        $('#popup_data').html(`


               <div class='row mb-5 pb-5' >
                 <div class="col-sm-2 col-md-2">
                                 <label class="form-label">Completed</label>
                                 <input type='checkbox' class='option-input radio radio_value' name='pstatus' value='13'>
                  </div>
               
               </div>


                 `);
    }

    else if (get == 19) {
        $('#popup_data').html(`
               <div class='row mb-5 pb-5' >
                <div class='col-md-2'>
                   <h6>Booked </h6>
                    <input type='radio' class='option-input radio radio_value' name='pstatus' value='8'>

                 </div>
                 <div class='col-md-3'>
                  <h6 style=" margin-left: 10%; padding-bottom:11px; ">Bookers</h6>
                    <select  required id='bookers'  multiple='multiple' name='bookers[]'>

                        <option value='' >Select Bookers</option>
                    </select>
                 </div>

               </div>

                 `);
    }
}

function showprice() {

    if ($('#relist').is(":checked")) {

        $('.relist_hide').hide();
        $('#row1').hide();
        $('#r1').show();
        $('#r2').show();
        $('#r3').show();
        $(".getcarrier").removeAttr("required");
        $("#r1").attr("required", true);
        $("#relist_id").attr("required", true);
        $("#expected_date").removeAttr("required");
        $("#current_carrier").removeAttr("required");

    } else {
        $('.relist_hide').show();
        $('#row1').show();
        $('#r1').hide();
        $('#r2').hide();
        $('#r3').hide();
        $(".getcarrier").attr("required", true);
        $("#r1").removeAttr("required");
        $("#expected_date").attr("required", true);
        $("#current_carrier").attr("required", true);
        $("#relist_id").removeAttr("required");

    }
}


$(".updatee").click(function () {

    var routelink = $(this).closest('tr').find('.link').val();
    $("#getlink").attr("src", routelink);

    $("#largemodal").modal("show");


    var order_id = $(this).closest('tr').find('.order_idd').val();
    var client_name = $(this).closest('tr').find('.client_name').val();
    var client_email = $(this).closest('tr').find('.client_email').val();
    var phoneno = $(this).closest('tr').find('.phoneno').val();
    var pstatus = $(this).closest('tr').find('.pstatus').val();
    var driver_pickup_date = $(this).closest('tr').find('.driver_pickup_date').val();
    var driver_deliver_date = $(this).closest('tr').find('.driver_deliver_date').val();
    var count_no = 0;


    $("#order_id1").val(order_id);
    $("#customername").val(client_name);
    $("#customeremail").val(client_email);
    $("#pstatus2").val(pstatus);
    $("#phoneno").val(phoneno);

    $("#phoneno2").html('');
    $("#smscount").html('');
    $("#emailcount").html('');

    var title = $('#p_status').val();
    //get_count(order_id, phoneno);


    $.ajax({

        url: "/show_call_history",
        type: "GET",
        data: {id: order_id},
        success: function (data) {
            if (data.length > 0) {
                $('#calhistory').html('');
                $('#calhistory').html(data);
                setTimeout(function () {
                    $("#calhistory").animate({scrollTop: 20000}, "slow");

                }, 200);
            } else {
                $('#calhistory').html('NO HISTORY FOUND');
            }
        }, complete: function () {

        }

    });

    if (title == 7 || title == 19) {

        setTimeout(function () {


            $.ajax({

                url: "/get_assign_users",
                type: "GET",
                data: {id: order_id},
                dataType: "json",
                beforeSend: function () {

                    $('#bookers').empty();

                },
                success: function (data) {
                    var options = "";
                    $.each(data, function (i, item) {

                        if (item.id) {
                            options = options + `<option value='` + item.assign_user_id + `'>` + item.name + `</option>`;

                        }
                    });
                    $("#bookers").append(options);
                    $('#bookers').SumoSelect();

                }

            });

        }, 500);
    }

    if (title == 9) {

        $("#current_carrier").empty();

        var options = "<option selected value=''>Select Carrier</option>";
        $.ajax({

            type: "GET",
            url: "/get_carrier",
            data: {'order_id': order_id},
            dataType: "json",

            success: function (data) {
                $.each(data, function (i, item) {

                    if (item.id) {
                        options = options + `<option value='` + item.id + `'>` + item.companyname + `</option>`;

                    }
                });
                //$("#current_carrier").remove();
                $("#current_carrier").append(options);
            },
            error: function (e) {
                alert("error");
            }

        });

    }

    if(title == 11){
        $('#pickup_date').val(driver_pickup_date);
        $('#deliver_date').val(driver_deliver_date);
    }

    get_count(order_id, phoneno);


});

$("#not_connect").click(function () {
    $('#history_update').val("call not connected");
});
$("#call_connect").click(function () {
    $('#history_update').val("");
});

function regain_status() {
    $(".updatee").click(function () {


        var routelink = $(this).closest('tr').find('.link').val();


        $("#getlink").attr("src", routelink);

        $("#largemodal").modal("show");
        var order_id = $(this).closest('tr').find('.order_idd').val();
        var client_name = $(this).closest('tr').find('.client_name').val();
        var client_email = $(this).closest('tr').find('.client_email').val();
        var phoneno = $(this).closest('tr').find('.phoneno').val();
        var pstatus = $(this).closest('tr').find('.pstatus').val();
        var count_no = 0;
        var driver_pickup_date = $(this).closest('tr').find('.driver_pickup_date').val();
        var driver_deliver_date = $(this).closest('tr').find('.driver_deliver_date').val();


        $("#order_id1").val(order_id);
        $("#customername").val(client_name);
        $("#customeremail").val(client_email);
        $("#pstatus2").val(pstatus);
        $("#phoneno").val(phoneno);

        $("#phoneno2").html('');
        $("#smscount").html('');
        $("#emailcount").html('');


        var title = $('#p_status').val();
        //get_count(order_id, phoneno);


        $.ajax({

            url: "/show_call_history",
            type: "GET",
            data: {id: order_id},
            success: function (data) {
                if (data.length > 0) {
                    $('#calhistory').html('');
                    $('#calhistory').html(data);
                    setTimeout(function () {
                        $("#calhistory").animate({scrollTop: 20000}, "slow");

                    }, 200);
                } else {
                    $('#calhistory').html('NO HISTORY FOUND');
                }
            }, complete: function () {

            }

        });

        if (title == 7 || title == 19) {

            setTimeout(function () {


                $.ajax({

                    url: "/get_assign_users",
                    type: "GET",
                    data: {id: order_id},
                    dataType: "json",
                    beforeSend: function () {

                        $('#bookers').empty();

                    },
                    success: function (data) {
                        var options = "";
                        $.each(data, function (i, item) {

                            if (item.id) {
                                options = options + `<option value='` + item.assign_user_id + `'>` + item.name + `</option>`;

                            }
                        });
                        $("#bookers").append(options);
                        $('#bookers').SumoSelect();

                    }

                });

            }, 500);
        }

        if (title == 9) {

            $("#current_carrier").empty();
            var options = "<option selected value=''>Select Carrier</option>";
            $.ajax({

                type: "GET",
                url: "/get_carrier",
                data: {'order_id': order_id},
                dataType: "json",

                success: function (data) {
                    $.each(data, function (i, item) {

                        if (item.id) {
                            options = options + `<option value='` + item.id + `'>` + item.companyname + `</option>`;

                        }
                    });
                    //$("#current_carrier").remove();
                    $("#current_carrier").append(options);
                },
                error: function (e) {
                    alert("error");
                }

            });

        }

        if(title == 11){
            $('#pickup_date').val(driver_pickup_date);
            $('#deliver_date').val(driver_deliver_date);
        }


        get_count(order_id, phoneno);

    });

}

function get_count(order_id, phoneno) {

    $.ajax({

        url: "/get_count",
        type: "GET",
        data: {order_id: order_id},
        contentType: "application/json",
        dataType: "json",
        async: false,
        success: function (data) {

            $("#phoneno2").html("Call + " + phoneno + "-XX(" + data.phone + ")");
            $("#smscount").html("SMS (" + data.sms + ")");
            $("#emailcount").html("Email (" + data.email + ")");

            $("#order_id1").val(order_id);

        }

    });

    $.ajax({

        url: "/show_count_click",
        type: "GET",
        data: {id: order_id},
        success: function (data) {
            if (data.length > 0) {
                $('#lock_text').html('');
                $('#lock_text').html(data.trim());

            } else {
                $('#lock_text').html('NO Data FOUND');
            }

        }, complete: function () {
            $('#largemodal').modal('show');
        }

    });
}


function count_user(type) {

    var order_id = $('#order_id1').val();
    var client_name = $('#customername').val();
    var client_email = $('#customeremail').val();
    var pstatus = $('#pstatus2').val();
    var client_phone = $('#phoneno').val();
    var email_text = $('#editor').html();
    var data = {
        order_id: order_id,
        pstatus: pstatus,
        client_email: client_email,
        client_name: client_name,
        type: type,

    };

    $.ajax({
        type: "GET",
        url: '/count_user',
        dataType: "json",
        data: data,
        beforeSend: function () {

        },
        success: function (response) {
            if (response) {

                //var lock_text = $('#lock_text').val();

                if (type == '1') {
                    $("#phoneno2").html('');
                    $("#phoneno2").html("Call + " + client_phone + "-XX(" + response + ")\n");
                }
                if (type == '2') {
                    $("#smscount").html('');
                    $("#smscount").html("SMS (" + response + ")");
                }
                if (type == '3') {
                    $("#emailcount").html('');
                    $("#emailcount").html("Email (" + response + ")");

                    $.ajax({
                        url: '/send_email_editor',
                        type: 'post',
                        data: {
                            '_token': '{{csrf_token()}}',
                            client_email: client_email,
                            email_text: email_text
                        },
                        success: function (data) {
                            //alert("Email has been sent");
                            $('#largemodal').modal('hide');
                            return $.growl.notice({
                                message: "Email send Successfully"
                            });

                        }

                    });

                }


                //window.location.href = "rcmobile://call?number=" + client_phone;


            }

        },
    });

    $.ajax({

        url: "/show_count_click",
        type: "GET",
        data: {id: order_id},
        success: function (data) {
            if (data.length > 0) {
                $('#lock_text').html('');
                $('#lock_text').html(data.trim());

            } else {
                $('#lock_text').html('NO Data FOUND');
            }

        }, complete: function () {
            $('#largemodal').modal('show');
        }

    });
}


function regain_count() {
    function count_user(type) {

        var order_id = $('#order_id1').val();
        var client_name = $('#customername').val();
        var client_email = $('#customeremail').val();
        var pstatus = $('#pstatus2').val();
        var client_phone = $('#phoneno').val();
        var email_text = $('#editor').html();
        var data = {
            order_id: order_id,
            pstatus: pstatus,
            client_email: client_email,
            client_name: client_name,
            type: type,

        };

        $.ajax({
            type: "GET",
            url: '/count_user',
            dataType: "json",
            data: data,
            beforeSend: function () {

            },
            success: function (response) {
                if (response) {

                    //var lock_text = $('#lock_text').val();

                    if (type == '1') {
                        $("#phoneno2").html('');
                        $("#phoneno2").html("Call + " + client_phone + "-XX(" + response + ")\n");
                    }
                    if (type == '2') {
                        $("#smscount").html('');
                        $("#smscount").html("SMS (" + response + ")");
                    }
                    if (type == '3') {
                        $("#emailcount").html('');
                        $("#emailcount").html("Email (" + response + ")");

                        $.ajax({
                            url: '/send_email_editor',
                            type: 'post',
                            data: {
                                '_token': '{{csrf_token()}}',
                                client_email: client_email,
                                email_text: email_text
                            },
                            success: function (data) {
                                //alert("Email has been sent");
                                $('#largemodal').modal('hide');
                                return $.growl.notice({
                                    message: "Email send Successfully"
                                });

                            }

                        });

                    }


                    //window.location.href = "rcmobile://call?number=" + client_phone;


                }

            },
        });

        $.ajax({

            url: "/show_count_click",
            type: "GET",
            data: {id: order_id},
            success: function (data) {
                if (data.length > 0) {
                    $('#lock_text').html('');
                    $('#lock_text').html(data.trim());

                } else {
                    $('#lock_text').html('NO Data FOUND');
                }

            }, complete: function () {
                $('#largemodal').modal('show');
            }

        });
    }

}


$("#form").on('submit', (function (e) {
    e.preventDefault();
    $.ajax({
        url: "/send_order_link",
        type: "POST",
        data: new FormData(this),

        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {

        },
        success: function (data) {

            let test = data.toString();

            let test2 = $.trim(test);
            let text = "SUCCESS";
            if (test2 == text) {

                $('#success').html(data);
                $('#modaldemo4').modal('show');
                $('#reportmodal').modal('hide');

            } else {
                $('#not_success').html(data);
                $('#modaldemo5').modal('show');
            }
        },
        error: function (e) {
            $("#err").html(e).fadeIn();
        }
    });
}));


$(".panel-tabs").click(function () {

    $('#search_form').hide();
    $('#table_data').html('');

});


$("body").delegate("#keywords", "click", function () {
    setTimeout(function () {
        $('input[name="keywords"]').focus()
    }, 100);
});

$("body").delegate("#search_by", "change", function () {

    var search_by = $('#search_by').val();
    if (search_by == "ophone") {

        $("#keywords").mask("(999) 999-9999");
        setTimeout(function () {
            $('input[name="keywords"]').focus()
        }, 100);
    } else {
        $("#keywords").unmask();
        setTimeout(function () {
            $('input[name="keywords"]').focus()
        }, 100);

    }
});


function return_data() {

    var search_by = $('#search_by').val();
    var val = $('#keywords').val();
    var p_status = $('#p_status').val();
    var paynal_type = $('#paynal_type').val();

    if (val.length > 0) {

        $('#table_data').html('');
        $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
        $.ajax({

            url: "/return_data",
            type: "GET",
            data: {val: val, search_by: search_by, p_status: p_status, paynal_type: paynal_type},
            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);
            },
            complete: function (data) {
                $('#ldss').hide();
                regain();
            }

        });
    }
}


$(document).ready(function () {


    $('#paynal_type').SumoSelect();
    $('#search_by').SumoSelect();

    $(document).on('click', '.pagination a', function (event) {

        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data3(page);

    });


    function fetch_data3(page) {
        var pstatus = $('#pstatus').val();

        $('#table_data').html('');
        $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);

        $.ajax({

            url: "get_data/" + pstatus + "/?page=" + page,
            success: function (data) {
                $('#table_data').html('');
                $('#table_data').html(data);

            },
            complete: function (data) {
                $('#ldss').hide();
                regain();
            }

        })

    }


    $.ajax({

        url: "/get_menu_setting",
        type: "get",
        dataType: "json",
        success: function (data) {
            var header = data["header_menu"];
            var sub_header = data["sub_menu"];
            $("#" + header).trigger('click');
            $("#" + sub_header).trigger('click');
        },
    });
});



$('#reportmodal').on('show.bs.modal', function (e) {

    //get data-id attribute of the clicked element
    var orderId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    var encryptvuserid = btoa({{Auth::user()->id}});
    var encryptvoderid = btoa(orderId);
    var linkv = "{{url('/email_order/')}}" + '/' + encryptvoderid + '/' + encryptvuserid;
    $(e.currentTarget).find('input[name="orderid"]').val(orderId);
    $(e.currentTarget).find('input[name="link"]').val(linkv);
});