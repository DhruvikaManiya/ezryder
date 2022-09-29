<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\AssignOp\Mod;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cartcontroller;



// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |

// use Illuminate\Support\Facades\Route;

route::resource('cart', 'Cartcontroller');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// prefix

// Route::prefix('/mobile')->group(function () {
    Route::group(['prefix' => '/mobile', 'middleware' => ['mobile']], function () {
    // login
    route::get('login', 'MobileController@login')->name('mobile.login');
    Route::post('/login', 'MobileController@login_check')->name('mobile.login_check');
    route::get('register', 'MobileController@register')->name('mobile.register');
    Route::post('register', 'MobileController@registerStore')->name('mobile.registerStore');
    Route::get('logout', 'MobileController@logout')->name('mobile.logout');
    Route::get('/', 'MobileController@home')->name('mobile.home');
    
    // profile edit
    Route::get('profile1', 'MobileController@profile1')->name('mobileprofile');
    Route::post('profile_edit', 'MobileController@profile_edit')->name('mobile.profileedit');
    

    Route::get('/product-list/{id}', 'MobileController@productList')->name('mobile.productlist');
    route::get('categoriesList', 'MobileController@categoriesList')->name('mobile.categorieslist');
    Route::get('grocery', 'MobileController@grocery')->name('mobile.grocery');

    //ForgotPassword//
    Route::get('forgotPassword', 'MobileController@forgotPassword')->name('mobile.forgotPassword');
    Route::post('forgotPassword', 'MobileController@postEmail')->name('mobile.postEmail');
    Route::post('verify_otp', 'MobileController@verifyotp')->name('mobile.verifyotp');
    Route::post('reset', 'MobileController@reset')->name('mobile.passupdate');

    Route::post('reset', 'MobileController@reset')->name('mobile.passwordupdate');

    //grocery payment
    
  


    //Add Cart// 
    Route::get('cart', 'MobileController@cart')->name('mobile.cart');
    Route::get('plus-to-cart', 'MobileController@plustocart')->name('mobile.plustocart');
    Route::get('mis-to-cart', 'MobileController@mistocart')->name('mobile.mistocart');


    //search
    Route::get('search', 'MobileController@search')->name('mobile.search');
    Route::post('search', 'MobileController@search_qry')->name('mobile.search_qry');
    Route::get('store/{id}', 'MobileController@store')->name('mobile.store');



    route::get('/orderdeatil','MobileController@orderdetail')->name('mobile.orderhistory');
    route::get('/orderdetailp/{id}','MobileController@orderdetailp')->name('mobile.orderdetailp');
    route::get('/order', 'MobileController@order')->name('mobile.order');
    Route::get('/product-details/{id}', 'MobileController@productDetails')->name('mobile.productdetails');
    Route::get('/checkout', 'MobileController@checkout')->name('mobile.checkout');

    route::get('/category', 'MobileController@category')->name('mobile.category');
    Route::post('orderAddress', 'MobileController@orderAddress')->name('mobile.orderAddress');
    route::post('payment', 'MobileController@payment')->name('mobile.payment');
    route::get('/payment_method', 'MobileController@payment_method')->name('mobile.payment_method');

    //ratting
    Route::Post('/orderdetailp/{id}','MobileController@ratting')->name('ratting-insert');

    Route::get('/profile', 'MobileController@profile')->name('mobile.profile');

    



    Route::get('/rental-home', 'DriverController@rental_home')->name('mobile.rental-driver.rentalhome');
    Route::get('/ride-details', 'DriverController@ride_details')->name('mobile.rental-driver.ridedetails');
    Route::get('/verify-otp', 'DriverController@verify_otp')->name('mobile.rental-driver.verifyotp');



    // food
    route::get('/food', 'FoodController@food')->name('mobile.food');
    route::get('/foodcategory', 'FoodController@foodcategory')->name('mobile.food.category');
    Route::get('/food-category/{id}', 'FoodController@food_category')->name('mobile.food.foodcategory');

    route::get('/food-orderdeatil','FoodController@orderdetail')->name('mobile.food.orderhistory');
    route::get('/food-orderdetailp/{id}','FoodController@orderdetailp')->name('mobile.food.orderdetailp');

    Route::get('/food-store/{id}', 'FoodController@food_store')->name('mobile.food.foodstore'); 
    Route::get('/food-checkout', 'FoodController@checkout')->name('mobile.food.foodcheckout');


       // food profile edit
    Route::get('/foodprofile', 'FoodController@profile')->name('mobile.food.profile1');
       Route::get('food-profile1', 'FoodController@profile1')->name('mobile.food.profile');
       Route::post('food-profile_edit', 'FoodController@profile_edit')->name('mobile.food.profileedit');

       
    //food Add Cart// 
    Route::get('food-cart', 'FoodController@cart')->name('mobile.food.cart');
    Route::get('food-plus-to-cart', 'FoodController@plustocart')->name('mobile.food.plustocart');
    Route::get('food-mis-to-cart', 'FoodController@mistocart')->name('mobile.food.mistocart');
    Route::post('food-orderAddress', 'FoodController@orderAddress')->name('mobile.food.orderAddress');
    route::post('food-payment', 'FoodController@payment')->name('mobile.food.payment');
    route::get('/food-order', 'FoodController@order')->name('mobile.food.order');


   //food-search
   Route::get('food-search', 'FoodController@search')->name('mobile.food.search');
   Route::post('food-search', 'FoodController@search_qry')->name('mobile.food.search_qry');
   Route::get('food-store/{id}', 'FoodController@store')->name('mobile.food.store');

  


    // pharmacies 
    
    Route::get('/pharmacies-home', 'PharmaController@pharmacies_home')->name('mobile.pharmacies.pharmacieshome');

    Route::get('/pharmacies-stores/{id}', 'PharmaController@pharmacies_stores')->name('mobile.pharmacies.pharmaciesstores');

    Route::get('/pharmacies-list/{id}', 'PharmaController@pharmacies_list')->name('mobile.pharmacies.pharmacieslist');
    Route::get('/pharma-checkout', 'PharmaController@checkout')->name('mobile.pharma.pharmacheckout');

    //pharma Add Cart// 
    Route::get('pharma-cart', 'PharmaController@cart')->name('mobile.pharma.cart');
    Route::get('pharma-plus-to-cart', 'PharmaController@plustocart')->name('mobile.pharma.plustocart');
    Route::get('pharma-mis-to-cart', 'PharmaController@mistocart')->name('mobile.pharma.mistocart');
    Route::post('pharma-orderAddress', 'PharmaController@orderAddress')->name('mobile.pharma.orderAddress');
    route::post('pharma-payment', 'PharmaController@payment')->name('mobile.pharma.payment');
    route::get('/pharma-order', 'PharmaController@order')->name('mobile.pharma.order');

    route::get('/pharma-orderdeatil','PharmaController@orderdetail')->name('mobile.pharma.orderhistory');
    route::get('/pharma-orderdetailp/{id}','PharmaController@orderdetailp')->name('mobile.pharma.orderdetailp');
    route::get('/pharmacategory', 'PharmaController@pharmacategory')->name('mobile.pharma.category');

    //pharma-search
    Route::get('pharma-search', 'PharmaController@search')->name('mobile.pharma.search');
    Route::post('pharma-search', 'PharmaController@search_qry')->name('mobile.pharma.search_qry');
    Route::get('pharma-store/{id}', 'PharmaController@store')->name('mobile.pharma.store');

  
       // pharmacies profile edit
       Route::get('/pharmaprofile', 'PharmaController@profile')->name('mobile.pharma.profile1');
       Route::get('pharma-profile1', 'PharmaController@profile1')->name('mobile.pharma.profile');
       Route::post('pharma-profile_edit', 'PharmaController@profile_edit')->name('mobile.pharma.profileedit');


       // rental
    Route::get('/rental-hours', 'MobileController@rental_hours')->name('mobile.rental.rentalhours');
    Route::get('/rental-plans', 'MobileController@rental_plans')->name('mobile.rental.rentalplans');
    Route::get('/rental-pickup', 'MobileController@rental_pickup')->name('mobile.rental.rentalpickup');
    Route::get('/rental-payment', 'MobileController@rental_payment')->name('mobile.rental.rentalpayment');
    


});


Route::group(['prefix' => 'vendor', 'middleware' => ['vendor']], function () {

    //login
    Route::get('/', 'VendorController@login')->name('vendor.login');
    Route::post('/login', 'VendorController@loginCheck')->name('vendor.login_check');
    Route::get('register', 'VendorController@register')->name('vendor.register');
    Route::post('register', 'VendorController@registerStore')->name('vendor.registerStore');
    Route::get('logout', 'VendorController@logout')->name('vendor.logout');
    //forgot password
    Route::get('forgotpassword', 'VendorController@forgotpassword')->name('vendor.forgotpassword');
    Route::post('forgotPassword', 'VendorController@postEmail')->name('vendor.postEmail');
    Route::post('verify_otp', 'VendorController@verifyotp')->name('vendor.verifyotp');
    Route::post('reset', 'VendorController@reset')->name('vendor.passupdate');

    Route::post('reset', 'VendorController@reset')->name('vendor.passwordupdate');


    // Dashboard
    Route::get('home', 'VendorController@home')->name('vendor.home');
    Route::get('dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
    Route::get('pendingorders', 'VendorController@pendingorders')->name('vendor.pendingorders');
    Route::get('completeorders', 'VendorController@completeorders')->name('vendor.completeorders');
    Route::get('order_hostory', 'VendorController@order_hostory')->name('vendor.order_hostory');

    //profile
    Route::get('profile', 'VendorController@profile')->name('vendor.profile');
    Route::post('profile_edit', 'VendorController@profile_edit')->name('vendor.profile.edit');

    // analytics
    Route::get('analytics', 'VendorController@analytics')->name('vendor.analytics');
    // account
    Route::get('account', 'VendorController@account')->name('vendor.account');

    // products
    Route::get('products', 'VendorController@products')->name('vendor.products');
    Route::post('products/store', 'VendorController@product_store')->name('vendor.products.store');
    Route::get('changeStatus', 'VendorController@changeStatus')->name('vendor.prodcuts.status');
    Route::get('active_product', 'VendorController@active_product')->name('vendor.prodcuts.active');

    Route::get('wallet', 'VendorController@wallet')->name('vendor.wallet');
    Route::get('addproducts', 'VendorController@addproducts')->name('vendor.addproducts');
    //bank details
    Route::get('bankdetail', 'VendorController@bankdetail')->name('vendor.bankdetail');
    Route::post('bankdetail_store', 'VendorController@bankdetail_store')->name('vendor.bankdetail.store');
    Route::get('bankdetail_edit/{id}', 'VendorController@bankdetail_edit')->name('vendor.bankdetail.edit');
    Route::post('bankdetail_update', 'VendorController@bankdetail_update')->name('vendor.bankdetail.update');



    Route::get('review', 'VendorController@review')->name('vendor.review');
    //order 
    Route::get('orders', 'VendorController@orders')->name('vendor.orders');
    Route::get('/order-detail', 'VendorController@order_detail')->name('vendor.order-detail');
    Route::get('/order-detail-p/{id}', 'VendorController@order_detail_p')->name('vendor.order-detail-p');
    Route::get('/order-detail-p_accpeted/{id}', 'VendorController@order_detail_p_accepted')->name('vendor.order-detail-p_accepted');
    Route::get('/order-detail-p_deny/{id}', 'VendorController@order_detail_p_deny')->name('vendor.order-detail-p_deny');

});



Route::prefix('delivery')->group(function () {
    Route::get('/', 'DeliveryController@login')->name('delivery.login');
    Route::get('register', 'DeliveryController@register')->name('delivery.register');
    Route::get('/order', 'DeliveryController@order')->name('delivery.order');
    Route::get('/order-detail', 'DeliveryController@order_detail')->name('delivery.order-detail');
    // account
    Route::get('account', 'DeliveryController@account')->name('delivery.account');
    // wallet
    Route::get('wallet', 'DeliveryController@wallet')->name('delivery.wallet');
    // bankdetail
    Route::get('bankdetail', 'DeliveryController@bankdetail')->name('delivery.bankdetail');
});





// vendor food

Route::prefix('vendor-food')->group(function () {

    Route::get('/', 'vendorfoodcontroller@login')->name('vendorfood.login');
    Route::get('register', 'vendorfoodcontroller@register')->name('vendorfood.register');
    // Dashboard
    Route::get('home', 'vendorfoodcontroller@home')->name('vendorfood.home');
    // analytics
    Route::get('analytics', 'vendorfoodcontroller@analytics')->name('vendorfood.analytics');
    // account
    Route::get('account', 'vendorfoodcontroller@account')->name('vendorfood.account');

    // products
    Route::get('products', 'vendorfoodcontroller@products')->name('vendorfood.products');

    // wallet
    Route::get('wallet', 'vendorfoodcontroller@wallet')->name('vendorfood.wallet');


    Route::get('addproducts', 'vendorfoodcontroller@addproducts')->name('vendorfood.addproducts');
    Route::get('bankdetail', 'vendorfoodcontroller@bankdetail')->name('vendorfood.bankdetail');
    Route::get('review', 'vendorfoodcontroller@review')->name('vendorfood.review');
    Route::get('orders', 'vendorfoodcontroller@orders')->name('vendorfood.orders');
    Route::get('/order-detail', 'vendorfoodcontroller@order_detail')->name('vendorfood.order-detail');
});

Auth::routes();
Route::group(['prefix' => 'delivery', 'middleware' => ['delivery']], function () {
    
    Route::get('/', 'DeliveryController@login')->name('mobile.delivery.login');
    route::post('/login', 'DeliveryController@loginCheck')->name('mobile.delivery.loginCheck');
    Route::get('register', 'DeliveryController@register')->name('mobile.delivery.register');
    Route::post('register', 'DeliveryController@registerStore')->name('mobile.delivery.registerStore');

    Route::get('forgotPassword', 'DeliveryController@forgotPassword')->name('mobile.delivery.forgotPassword');
    Route::post('forgotPassword', 'DeliveryController@postEmail')->name('mobile.delivery.postEmail');
    Route::post('verify_otp', 'DeliveryController@verifyotp')->name('mobile.delivery.verifyotp');
    Route::post('reset', 'DeliveryController@reset')->name('mobile.delivery.passupdate');

    Route::post('reset', 'DeliveryController@reset')->name('mobile.delivery.passwordupdate');

    Route::get('/current_order', 'DeliveryController@current_order')->name('mobile.delivery.current_order');
    Route::get('/delivery_acount', 'DeliveryController@delivery_acount')->name('mobile.delivery.delivery_acount');
    Route::post('delivery_acount','DeliveryController@profilepic')->name('mobile.delivery.profilepic');
    
    Route::get('/profile', 'DeliveryController@profile')->name('mobile.delivery.profile');
    Route::post('profile_edit', 'DeliveryController@profile_edit')->name('mobile.delivery.profile.edit');
    Route::get('/order_history', 'DeliveryController@order_history')->name('mobile.delivery.order_history');

    Route::get('/document', 'DeliveryController@document')->name('mobile.delivery.document');
    Route::post('/document', 'DeliveryController@documentdocs')->name('mobile.delivery.documentdocs');

    Route::get('/complete_delivery/{id}', 'DeliveryController@complete_delivery')->name('mobile.delivery.complete_delivery');
    Route::get('/delivered/{id}', 'DeliveryController@delivered')->name('mobile.delivery.delivered');
    Route::get('/final_order', 'DeliveryController@final_order')->name('mobile.delivery.final_order');


  




    Route::get('/order', 'DeliveryController@order')->name('mobile.delivery.order');
    Route::get('/order-detail/{id}', 'DeliveryController@order_detail')->name('mobile.delivery.order-detail');
    Route::get('/d_accpeted/{id}', 'DeliveryController@d_accepted')->name('mobile.delivery.d_accepted');
    Route::get('/reject/{id}', 'DeliveryController@reject')->name('mobile.delivery.reject');

    // account
    Route::get('account', 'DeliveryController@account')->name('mobile.delivery.account');
    // wallet
    Route::get('wallet', 'DeliveryController@wallet')->name('mobile.delivery.wallet');
    // bankdetail
    Route::get('bankdetail', 'DeliveryController@bankdetail')->name('mobile.delivery.bankdetail');
});






Route::prefix('food-delivery')->group(function () {
    Route::get('/', 'FoodDeliveryController@login')->name('food.delivery.login');
    Route::get('/home', 'FoodDeliveryController@home')->name('food.delivery.home');
    Route::get('register', 'FoodDeliveryController@register')->name('food.delivery.register');
    Route::get('/history', 'FoodDeliveryController@history')->name('food.delivery.history');
    Route::get('/order-detail', 'FoodDeliveryController@order_detail')->name('food.delivery.order-detail');
    // account
    Route::get('account', 'FoodDeliveryController@account')->name('food.delivery.account');
    // wallet
    Route::get('wallet', 'FoodDeliveryController@wallet')->name('food.delivery.wallet');
    // bankdetail
    Route::get('bankdetail', 'FoodDeliveryController@bankdetail')->name('food.delivery.bankdetail');
});



Route::get('/home', 'HomeController@index')->name('home');




//-------------------ADMIN ROUTES--------------------------------
Route::prefix('admin')->group(function () {
    route::get('/', 'AdminController@index')->name('dashboard');
    route::get('/login', 'AdminController@login')->name('admin.login');
    route::post('/login', 'AdminController@loginCheck')->name('admin.loginCheck');


    // category
    route::get('/category', 'AdminController@category')->name('admin.category');
    route::get('/category/add', 'AdminController@category_add')->name('admin.category.add');
    route::post('/category/add', 'AdminController@category_store')->name('admin.category.store');
    route::get('/category/edit/{id}', 'AdminController@category_edit')->name('admin.category.edit');
    route::post('/category/edit', 'AdminController@category_update')->name('admin.category.update');
    route::get('/category/delete/{id}', 'AdminController@category_delete')->name('admin.category.delete');


    //subcategory
    route::get('/subcategory', 'AdminController@subcategory')->name('admin.subcategory');
    route::get('/subcategory/add', 'AdminController@subcategory_add')->name('admin.subcategory.add');
    route::post('/subcategory/add', 'AdminController@subcategory_store')->name('admin.subcategory.store');
    route::get('/subcategory/edit/{id}', 'AdminController@subcategory_edit')->name('admin.subcategory.edit');
    route::post('/subcategory/edit', 'AdminController@subcategory_update')->name('admin.subcategory.update');
    route::get('/subcategory/delete/{id}', 'AdminController@subcategory_delete')->name('admin.subcategory.delete');

    Route::get('get/subcategory', 'AdminController@get_subcategory')->name('admin.get.subcategory');

    //product
    route::get('/product', 'AdminController@product')->name('admin.product');
    route::get('/product/add', 'AdminController@product_add')->name('admin.product.add');
    route::post('/product/add', 'AdminController@product_store')->name('admin.product.store');
    route::get('/product/edit/{id}', 'AdminController@product_edit')->name('admin.product.edit');
    route::post('/product/edit', 'AdminController@product_update')->name('admin.product.update');
    route::get('/product/delete/{id}', 'AdminController@product_delete')->name('admin.product.delete');

    //user list
    route::get('/user', 'AdminController@user')->name('admin.user');
    route::get('/user/delete/{id}', 'AdminController@user_delete')->name('admin.user.delete');
    route::get('/user/view/{id}', 'AdminController@user_view')->name('admin.user.view');

    //brand
    route::get('/brand', 'AdminController@brand')->name('admin.brand');
    route::post('/brand_add', 'AdminController@brand_store')->name('admin.brand.add');
    route::get('/brand/view', 'AdminController@brandview')->name('admin.brand.view');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout')->name('custome.logout');





// driver rider app

Route::group(['prefix' => 'rider-service', 'middleware' => ['rider']], function () {


    route::get('/', 'Ridercontroller@login')->name('mobile.rider.login');
    route::post('/login', 'Ridercontroller@loginCheck')->name('mobile.rider.loginCheck');
    route::get('/register', 'Ridercontroller@register')->name('mobile.rider.register');
    route::post('/register', 'Ridercontroller@registerStore')->name('mobile.rider.registerStore');
    Route::get('/book-now', 'Ridercontroller@book_now')->name('mobile.rider.book-now');
    Route::get('/booking-details', 'Ridercontroller@booking_details')->name('mobile.rider.bookingdetails');
    Route::get('/accept', 'Ridercontroller@accept')->name('mobile.rider.accept');
    Route::get('/driver_3', 'Ridercontroller@driver_mybooking')->name('mobile.rider.driver_mybook');
    Route::get('/home', 'Ridercontroller@home')->name('mobile.rider.home');
    Route::get('/otp', 'Ridercontroller@otp')->name('mobile.rider.otp');
    Route::get('/drop', 'Ridercontroller@drop')->name('mobile.rider.drop');
    Route::get('/collect', 'Ridercontroller@collect')->name('mobile.rider.collect');
    Route::get('/collect2', 'Ridercontroller@collect2')->name('mobile.rider.collect2');
    Route::get('/account', 'Ridercontroller@account')->name('mobile.rider.account');


    Route::group(['prefix' => 'document'], function () {
        Route::get('/', 'Ridercontroller@document')->name('mobile.rider.document');

        Route::post('/', 'Ridercontroller@document_store')->name('mobile.rider.add_document');
    });

    Route::get('wallet', 'Ridercontroller@wallet')->name('mobile.rider.wallet');
    Route::get('vehicle', 'Ridercontroller@vehicle')->name('mobile.rider.vehicle');
    Route::get('profile', 'Ridercontroller@profile')->name('mobile.rider.profile');

    Route::get('direction', 'Ridercontroller@direction')->name('mobile.rider.direction');

    Route::get('logout', 'Ridercontroller@logout')->name('mobile.rider.logout');


});





 
// user rider app 
Route::get('/rider', 'MobileController@rider')->name('mobile.rider');

Route::get('/home-now', 'MobileController@homenow')->name('mobile.homenow');

Route::get('/rider-payment', 'MobileController@rider_payment')->name('mobile.rider.payment');

Route::get('/my-booking', 'MobileController@my_booking')->name('mobile.rider.booking');

route::get('/rider-details','MobileController@riderdetails')->name('mobile.rider.details');
