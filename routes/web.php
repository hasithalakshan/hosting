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

Route::get('/', 'UserController@loadPage');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/checkout', function () {
    return view('checkout');
});


Route::get('/viewUploadTestImage','FileController@viewUploadTestImage');
Route::post('/uploadTestImage','FileController@uploadTestImage');




Route::get('/logout', 'UserController@logout');

Route::get('/plans', 'UserController@plans');

Route::get('/register', 'UserController@register');

Route::get('/directLogin', 'UserController@directLogin');

Route::get('/checkout', 'UserController@checkout');

Route::get('/checkoutStart', ['uses' => 'UserController@checkoutStart', 'as' => 'checkoutStart']);



Route::get('/myProfile','UserController@myProfile');

Route::post('/updateMyProfile','UserController@updateMyProfile');



Route::get('/termsAndCondition', 'UserController@termsAndCondition');

Route::get('invoice', 'UserController@invoice');


//login and register
Route::post('accountCreate', 'UserController@accountCreate');
Route::post('directLoginCreate', 'UserController@directLoginCreate');


Route::get('resOfCheckout','HostController@resOfCheckout');

Route::get('yearlyPaymentSuccess','UserController@yearlyPaymentSuccess');
Route::get('hostDepSuccess','UserController@hostDepSuccess');
Route::get('finishCheckout','HostController@finishCheckout');


Route::post('sendUserMessage','UserController@sendUserMessage');


//reset password routes...
Route::get('passwordEmail','UserController@passwordEmail');
Route::get('passwordReset/{key}','UserController@passwordReset');

Route::get('viewPasswordReset','UserController@viewPasswordReset');
Route::post('emailCheckToResetPwd','UserController@emailCheckToResetPwd');
Route::post('passwordUpdate','UserController@passwordUpdate');



//service controller routes
Route::get('webHosting','ServiceController@webHosting');
Route::get('fileExchange','ServiceController@fileExchange');
Route::get('performanceOptimization','ServiceController@performanceOptimization');
Route::get('sslCertification','ServiceController@sslCertification');
Route::get('technicalServices','ServiceController@technicalServices');
Route::get('vpsServer','ServiceController@vpsServer');



Route::get('paymentInvoice','UserController@paymentInvoice');


Route::post('/payment-status',[
    'uses'=>'PaymentController@updatePaymentStatus'
]);

Route::get('/payment-confirm/{order_id}',[
    'uses'=>'PaymentController@confirmPayment'
]);

Route::get('/payment-fail/{order_id}',[
    'uses'=>'PaymentController@errorPayment'
]);


Route::get('downloadInvoice','FileController@downloadInvoice');

Route::get('clientArea','FileController@clientArea');

Route::get('viewInvoicesFromClientArea','FileController@viewInvoicesFromClientArea');

//blade for convert to pdf...
Route::post('invoicePdf','FileController@invoicePdf');


Route::post('uploadDepositInfo','FileController@uploadDepositInfo');

Route::get('goToClientArea','UserController@goToClientArea');

Route::get('/test', function(){
    return abort(404);
});