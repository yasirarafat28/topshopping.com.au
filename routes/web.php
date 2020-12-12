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
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search/{keyword?}', 'SearchController@index')->name('product_serach');
Route::post('/search-submit', 'SearchController@searchSubmit')->name('searchSubmit');

Route::get('information/{type}', 'InformationController@information');
Route::post('inquery/submit', 'InqueryController@submit');
Route::post('newsletter/submit', 'NewsLetterController@submit')->name('newsletterSubmit');
Route::post('ProductRedirect', 'RedirectController@redirect')->name('ProductRedirect');


//Merchant
Route::get('/merchant/login', function () {
    return view('front.merchant-login');
});

//Merchant
Route::get('/merchant/register', function () {
    return view('front.merchant-register');
});


Route::get('/database-export', function () {
    
    $sql = base_path('u889238613_ausp.sql');
    
    //collect contents and pass to DB::unprepared
    DB::unprepared(file_get_contents($sql));
    return 'imported';
});

Route::post('/merchant/register', 'MerchantController@merchant_registration_submit')->name('merchant-registration-submit');
Route::post('/GetCategoryImage', 'CategoryController@GetCategoryImage')->name('GetCategoryImage');




Route::group(['middleware' => ['auth','role:admin']], function (){
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/merchants', 'MerchantController');
    Route::resource('admin/products', 'ProductController');
    Route::get('admin/feed-insert', 'FeedController@insert');
    Route::post('admin/feed-insert', 'FeedController@Submit');
    Route::resource('admin/keywords', 'KeywordController');
    Route::resource('admin/carousels', 'CarouselController');
    Route::resource('admin/sliders', 'SliderController');


    Route::get('admin/content/{type}', 'ContentController@index');
    Route::post('admin/content/store', 'ContentController@store');


    Route::get('admin/inquery', 'InqueryController@index');
    Route::get('admin/redirection_record', 'RedirectController@index');


    Route::get('admin/category/{type}/{level?}/{parent_id?}', 'CategoryController@CategoryIndex');
    Route::post('admin/category/store', 'CategoryController@CategoryStore');
    Route::post('admin/category/update', 'CategoryController@CategoryUpdate');
    Route::get('admin/category_entry/delete/{id}', 'CategoryController@CategoryDelete');


});



Route::group(['middleware' => ['auth','role:merchant']], function (){
    Route::get('/merchant/account', 'MerchantController@account')->name('merchant-dashboard');
    Route::get('/merchant/edit-information', 'MerchantController@SelfEdit')->name('merchant-edit');
    Route::post('/merchant/edit-information-submit', 'MerchantController@SelfEditSubmit')->name('merchant-edit-submit');
    Route::get('/merchant/products', 'MerchantController@products')->name('merchant-products');
    Route::get('/merchant/add-product', 'MerchantController@AddProduct')->name('add-product');
    Route::post('/merchant/add-product', 'MerchantController@AddProductSubmit')->name('add-product-submit');
    Route::get('/merchant/edit-product/{id}', 'MerchantController@EditProduct')->name('edit-product');
    Route::post('/merchant/edit-product', 'MerchantController@EditProductSubmit')->name('edit-product-submit');
    Route::get('/merchant/delete-product/{id}', 'MerchantController@DeleteProduct')->name('delete-product');

});


