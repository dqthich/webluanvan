<?php

use Illuminate\Support\Facades\Route;

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
#Frontend
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');
#Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', 'CategoryProduct@show_category_home');
#Thuong hieu san pham trang chu
Route::get('/thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home');
#Chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@details_product');



#Backend
Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/log_out', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

#Bệnh nhân
Route::get('/them-benhnhan', 'BenhnhanController@them_benhnhan');
Route::post('/luu-benhnhan', 'BenhnhanController@luu_benhnhan');
Route::get('/all-benhnhan', 'BenhnhanController@all_benhnhan');
Route::get('/edit-benhnhan/{benhnhan_id}', 'BenhnhanController@edit_benhnhan');
Route::get('/delete-benhnhan/{benhnhan_id}', 'BenhnhanController@delete_benhnhan');
Route::post('/update-benhnhan/{benhnhan_id}', 'BenhnhanController@update_benhnhan');

#Ảnh bệnh nhân
Route::get('/them-anh', 'AnhController@them_anh');
Route::post('/luu-anh', 'AnhController@luu_anh');
Route::get('/all-anh', 'AnhController@all_anh');
Route::get('/edit-anh/{anh_id}', 'AnhController@edit_anh');
Route::get('/delete-anh/{anh_id}', 'AnhController@delete_anh');
Route::post('/update-anh/{anh_id}', 'AnhController@update_anh');

#Category Product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

#Brand Product
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

#Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

#cart
Route::post('/save-cart', 'CartController@save_cart');