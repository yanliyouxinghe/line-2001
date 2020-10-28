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

// Route::get('/', function () {
//     return view('welcome');
// });

// use Illuminate\Routing\Route;

Route::get('/','Index\IndexController@index');
Route::get('/login','Index\LoginController@login');
Route::get('/reg','Index\LoginController@reg');
Route::post('/regdo','Index\LoginController@regdo');
Route::any('/putcode','Index\LoginController@putcode');
Route::post('/logindo','Index\LoginController@logindo');
Route::get('/logout','Index\LoginController@logout');
Route::get('/particulars/{id}','Index\PartController@particulars');
Route::get('/getattrprice','Index\PartController@getattrprice');
Route::get('/list/{id}','Index\ListController@index');
Route::post('/cart','Index\CartController@addcart');
Route::get('/getheadcart','Index\IndexController@getheadcart');


Route::post('/getxiaoji','Index\CartController@getxiaoji');

Route::post('/getgoodsattrnum','Index\PartController@getgoodsattrnum');
Route::post('/getgoodsnum','Index\PartController@getgoodsnum');
Route::post('/addcart','Index\CartController@addcart');
Route::get('/cartlist','Index\CartController@cartlist');
Route::post('/delcart','Index\CartController@delcart');
Route::post('/delcartall','Index\CartController@delcartall');

Route::get('/getendprice','Index\CartController@getendprice');
Route::get('/address','Index\AddressController@address');
Route::get('/getsondata','Index\AddressController@getsondata');
Route::post('/add_ress','Index\AddressController@profile');

Route::post('/addorder','Index\OrderController@addorder');
Route::get('/pay/{id}','Index\PayController@pay');
Route::get('/return_url','Index\PayController@return_url');

Route::get('/paysuccess','Index\PayController@paysuccess');
Route::get('/myorder','Index\HomeController@myorder');

Route::post('/notify_url','Index\PayController@notify_url');

Route::get('/seckill','Index\SeckillController@index');
Route::get('/seckill_tow/{id}','Index\SeckillController@seckill_tow');
Route::post('/seckill_order','Index\SeckillController@seckill_order');






Route::post('/notify_url','Index\PayController@notify_url');


Route::get('/text','Index\IndexController@text');




?>
















