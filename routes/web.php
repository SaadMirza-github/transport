<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('profile', function () {


})->middleware('auth');



Route::get('/clear_cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});


//welcome

Route::get('/', 'WelcomeController@loginn');
Route::get('/loginn', 'WelcomeController@loginn');
Route::post('/getlogin2', 'WelcomeController@getlogin2')->name('getlogin2');
Route::get('verify/{id}/{id2}/{id3}', 'WelcomeController@getVerification');
Route::post('/code_verify', 'WelcomeController@codeVerify')->name('code_verify');
Route::post('/resend_verify', 'WelcomeController@resend_verify')->name('resend_verify');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@getDashboard');
Route::get('/dashboard2', 'DashboardController@getDashboard2');
Route::get('/logout', 'WelcomeController@logout');

Route::get('/dashboard_admin', 'phone_quote\management\ManagementController@dashboard_admin');

//Admin_Portal
Route::get('/admin_portal', 'phone_quote\management\ManagementController@admin_portal');

//Earning
Route::get('/earning', 'phone_quote\management\ManagementController@earning');
Route::get('/get_earning_chart', 'phone_quote\management\ManagementController@get_earning_chart');




//Quotes
Route::get('/quotes', 'phone_quote\management\ManagementController@quotes');
//Review
Route::get('/review', 'phone_quote\management\ManagementController@review');
//Performance
Route::get('/performance', 'phone_quote\management\ManagementController@performance');
Route::get('/performance_load', 'phone_quote\management\ManagementController@performance_load');
///rating
Route::get('/rating_load', 'phone_quote\management\ManagementController@rating_load');
//QA_Portal
Route::get('/qa_portal', 'phone_quote\management\ManagementController@qa_portal');
Route::post('/qa_submit', 'phone_quote\management\ManagementController@qa_submit');
Route::get('/show_payment_logs', 'phone_quote\management\ManagementController@show_payment_logs');



//Employee
Route::get('/add_employee', 'DashboardController@add_employee');
Route::post('/save_employee', 'DashboardController@save_employee')->name('save_employee');
Route::get('/view_employee', 'DashboardController@view_employee');
Route::get('/user_active/{id}', 'DashboardController@user_active');
Route::get('/user_deactive/{id}', 'DashboardController@user_deactive');
Route::get('/edit_employee/{id}', 'DashboardController@edit_employee');
Route::post('/update_employee', 'DashboardController@update_employee')->name('update_employee');

//Quote
Route::get('/add_new', 'phone_quote\NewQuote@add_new');
Route::get('/get_zip', 'phone_quote\NewQuote@get_zip');
Route::get('/check_phone', 'phone_quote\NewQuote@check_phone');
Route::get('/getmake', 'phone_quote\NewQuote@getmake');
Route::get('/getmodel', 'phone_quote\NewQuote@getmodel');
Route::get('/getvin', 'phone_quote\NewQuote@getvin');

//new order
Route::get('/new', 'phone_quote\NewQuote@new');

//ichat
Route::get('/chats', 'phone_quote\global_chat\ChatController@index');
Route::post('/save_chat', 'phone_quote\global_chat\ChatController@save_chat')->name('save_chat');
Route::get('/get_chat', 'phone_quote\global_chat\ChatController@get_chat')->name('get_chat');
Route::get('/get_chat2', 'phone_quote\global_chat\ChatController@get_chat2')->name('get_chat2');
Route::get('/view_chat_timer', 'phone_quote\global_chat\ChatController@view_chat_timer')->name('view_chat_timer');
Route::get('/view_chat', 'phone_quote\global_chat\ChatController@view_chat')->name('view_chat');



Route::get('/get_chat_unread', 'phone_quote\global_chat\ChatController@get_chat_unread')->name('get_chat_unread');
//issue

Route::get('/issues_add', 'issues\IssuesController@issues_add')->name('issues_add');
Route::post('/save_issue', 'issues\IssuesController@save_issue')->name('save_issue');
Route::get('/my_issues', 'issues\IssuesController@my_issues')->name('my_issues');
Route::get('admin_issues', 'issues\IssuesController@admin_issues')->name('admin_issues');
Route::get('issue_approve/{id}', 'issues\IssuesController@issue_approve')->name('issue_approve');
Route::get('issue_reject/{id}', 'issues\IssuesController@issue_reject')->name('issue_reject');
Route::get('get_notification', 'issues\IssuesController@get_notification')->name('get_notification');
Route::get('issue_comments_list', 'issues\IssuesController@issue_comments_list')->name('issue_comments_list');
Route::get('issue_comments_add/{id}', 'issues\IssuesController@issue_comments_add')->name('issue_comments_add');
Route::post('/issue_comments_store', 'issues\IssuesController@issue_comments_store')->name('issue_comments_store');
Route::get('issue_comments_done/{id}', 'issues\IssuesController@issue_comments_done')->name('issue_comments_done');
Route::get('issue_view_admin/{id}', 'issues\IssuesController@issue_view_admin')->name('issue_view_admin');
Route::post('/issue_penalty_store', 'issues\IssuesController@issue_penalty_store')->name('issue_penalty_store');


////////////////////////  Go Auto Transport

Route::get('/calling', 'phone_quote\NewQuote@calling');
Route::get('/shipment', 'phone_quote\NewQuote@shipment');
Route::get('/heavy', 'phone_quote\NewQuote@heavy');

Route::get('/calling_edit', 'phone_quote\NewQuote@calling_edit');//
Route::get('/shipment_edit', 'phone_quote\NewQuote@shipment_edit');//
Route::get('/heavy_edit', 'phone_quote\NewQuote@heavy_edit');//


Route::get('/heavy_car', 'phone_quote\NewQuote@heavy_car');
Route::get('/heavy_equipment', 'phone_quote\NewQuote@heavy_equipment');


Route::get('/generate_order', 'phone_quote\NewQuote@generate_order');

Route::post('/save_new_quote', 'phone_quote\NewQuote@save_new_quote');
Route::get('/get_data/{id}', 'phone_quote\NewQuote@get_data');
Route::get('/get_data2/{id}', 'phone_quote\NewQuote@get_data2');
Route::get('/return_data', 'phone_quote\NewQuote@return_data');

Route::post('/send_price_email', 'phone_quote\NewQuote@send_price_email');

Route::get('/save_page', 'phone_quote\NewQuote@save_page');

Route::get('/new_edit/{id}', 'phone_quote\NewQuote@new_edit');

Route::get('/email_order/{id}/{userid}', 'phone_quote\NewQuote@email_order')->name('email_order');


Route::post('/order_payment', 'phone_quote\NewQuote@order_payment');
Route::post('/order_payment_card', 'phone_quote\NewQuote@order_payment_card')->name('order_payment_card');
Route::get('/order_payment_card_us/{id}', 'phone_quote\NewQuote@order_payment_card_us')->name('order_payment_card_us');


Route::post('/save_price', 'phone_quote\NewQuote@save_price');

Route::get('/owes_money_update/{id}', 'phone_quote\NewQuote@owes_money_update');
Route::post('/store_payment_confirmed', 'phone_quote\NewQuote@store_payment_confirmed');
Route::post('/store_payment_status', 'phone_quote\NewQuote@store_payment_status');



Route::post('/call_history_post', 'phone_quote\callhistory\CallHistory@call_history_post');
Route::get('/show_call_history', 'phone_quote\callhistory\CallHistory@show_call_history');
Route::get('/show_count_click', 'phone_quote\callhistory\CallHistory@show_count_click');
Route::post('/call_history_post_relist', 'phone_quote\callhistory\CallHistory@call_history_post_relist');

//click to count
Route::get('/count_user', 'phone_quote\callhistory\CallHistory@count_user');
Route::get('/click_to_count', 'phone_quote\callhistory\CallHistory@click_to_count');
Route::get('/get_count', 'phone_quote\callhistory\CallHistory@get_count');
Route::get('/fetch_count', 'phone_quote\callhistory\CallHistory@fetch_count');

///day count
Route::get('/day_count', 'phone_quote\callhistory\CallHistory@day_count');
Route::get('/fetch_day', 'phone_quote\callhistory\CallHistory@fetch_day');
Route::get('/fetch_day2', 'phone_quote\callhistory\CallHistory@fetch_day2');
Route::get('/fetch_day22', 'phone_quote\callhistory\CallHistory@fetch_day22');
Route::get('/quote_listing', 'phone_quote\callhistory\CallHistory@quote_listing');

Route::post('/assign_order', 'phone_quote\NewQuote@assign_order');
Route::post('/assign_order_dispatcher', 'phone_quote\NewQuote@assign_order_dispatcher');

Route::get('/get_assign_users', 'phone_quote\NewQuote@get_assign_users');
Route::get('/get_assign_users2', 'phone_quote\NewQuote@get_assign_users2');

Route::post('/send_email_editor', 'phone_quote\NewQuote@send_email_editor');

Route::get('/print_summary/{id}', 'phone_quote\NewQuote@print_summary')->name('print_summary');
Route::get('/print_report/{id}', 'phone_quote\NewQuote@print_report')->name('print_report');

// Reports

Route::get('/user_report', 'phone_quote\management\ManagementController@user_report')->name('user_report');
Route::get('/user_performance', 'phone_quote\management\ManagementController@user_performance')->name('user_performance');


Route::post('/send_order_link', 'phone_quote\NewQuote@send_order_link')->name('send_order_link');


Route::get('/request_to_assign/{id}', 'phone_quote\NewQuote@request_to_assign');

Route::get('/get_requested_quotes', 'phone_quote\NewQuote@get_requested_quotes');

Route::get('/cancel_request/{id}', 'phone_quote\NewQuote@cancel_request');

Route::get('/menu_setting/{main}/{sub}', 'phone_quote\NewQuote@menu_setting');

Route::get('/get_menu_setting', 'phone_quote\NewQuote@get_menu_setting');

Route::get('/old_go', 'phone_quote\NewQuote@old_go');

Route::get('/move_to_new/{id}/{penal_type}/{table}/', 'phone_quote\NewQuote@move_to_new');


///update carrier
Route::get('/carrier_add/{id?}', 'phone_quote\carrier\CarrierController@carrier_add');
Route::post('/store_carrier', 'phone_quote\carrier\CarrierController@store_carrier');
Route::get('/get_carrier', 'phone_quote\carrier\CarrierController@get_carrier');

Route::get('/carrier_add_new', 'phone_quote\carrier\CarrierController@carrier_add_new');
Route::post('/store_carrier222', 'phone_quote\carrier\CarrierController@store_carrier222');


//click carrier

Route::get('/count_carrier', 'phone_quote\carrier\CarrierController@count_carrier');
Route::get('/carrier_history', 'phone_quote\carrier\CarrierController@carrier_history');
Route::post('/carrier_history_post', 'phone_quote\carrier\CarrierController@carrier_history_post');



Route::get('/get_carrier_by_location', 'phone_quote\carrier\CarrierController@get_carrier_by_location')->name('get_carrier_by_location');
Route::get('/find_carrier', 'phone_quote\carrier\CarrierController@find_carrier')->name('find_carrier');
Route::get('/assign_find_carrier', 'phone_quote\carrier\CarrierController@assign_find_carrier')->name('assign_find_carrier');
Route::get('/get_carrier_name', 'phone_quote\carrier\CarrierController@get_carrier_name');
Route::get('/get_carrier_detail', 'phone_quote\carrier\CarrierController@get_carrier_detail');


//carrier end

///chart
Route::get('/get_chart_1', 'phone_quote\management\ManagementController@get_chart_1');


Route::get('/get_user_by_role', 'phone_quote\management\ManagementController@get_user_by_role');

Route::get('/get_assign_data', 'phone_quote\management\ManagementController@get_assign_data');

Route::get('/get_assign_data2', 'phone_quote\management\ManagementController@get_assign_data2');

Route::get('/global_search', 'phone_quote\NewQuote@global_search');


Route::get('/listing_profit', 'phone_quote\management\ManagementController@listing_profit');
Route::get('/all_completed_orders_list', 'phone_quote\management\ManagementController@all_completed_orders_list');

Route::get('/payment/{id}', 'phone_quote\management\ManagementController@payment');
Route::post('/store_profit', 'phone_quote\management\ManagementController@store_profit');

Route::get('/get_completed_orders', 'phone_quote\management\ManagementController@get_completed_orders');
Route::get('/get_profit', 'phone_quote\management\ManagementController@get_profit');

Route::get('/payment_received_list', 'phone_quote\management\ManagementController@payment_received_list');
Route::get('/get_payment_received', 'phone_quote\management\ManagementController@get_payment_received');



Route::get('/get_payment/{val}','phone_quote\NewQuote@get_payment');

Route::get('/employee_order', 'phone_quote\management\ManagementController@employee_order');
Route::get('/fetch_employee_order', 'phone_quote\management\ManagementController@fetch_employee_order');

Route::get('/all_bookers_list', 'phone_quote\management\ManagementController@all_bookers_list');
Route::get('/get_all_bookers', 'phone_quote\management\ManagementController@get_all_bookers');



Route::get('/general_setting', 'phone_quote\settings\SettingController@general_setting');
Route::post('/general_setting_save', 'phone_quote\settings\SettingController@general_setting_save');



Route::post('/trash_order', 'phone_quote\NewQuote@trash_order');


Route::get('/renew_order/{id}', 'phone_quote\NewQuote@renew_order');


Route::get('/get_ordertaker_dispatcher', 'phone_quote\management\ManagementController@get_ordertaker_dispatcher');
Route::get('/get_orders_qa', 'phone_quote\management\ManagementController@get_orders_qa');
Route::get('/get_orders_qa2', 'phone_quote\management\ManagementController@get_orders_qa2');
