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
//Frontend


Route::get('/', 'HomeController@index');

Route::get('/trang-chu','HomeController@index');


Route::get('/danh-muc-san-pham{category_product_id}','CategoryProduct@product_category_home');

//Backend
Route::get('/admin','AdminController@index');
Route::get('dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::get('/');

Route::post('admin-dashboard','AdminController@dashboard');

//Category-Product

Route::get('/add-category-product','CategoryProduct@add_product_category');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_product_category');

Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Product

Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');

Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::get('/all-product','ProductController@all_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

//Account
Route::get('/all-account','AccountController@all_account');



//Manage_order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');



//Search product
Route::post('/search-product','ProductController@search');


Route::get('/dangxuly/{order_id}','CheckoutController@dangxuly');
Route::get('/chuaxuly/{order_id}','CheckoutController@chuaxuly');


