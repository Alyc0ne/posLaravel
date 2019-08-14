<?php
use App\Goods;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('pos', 'SaleAutomation\Pos\PosController@index')->name('pos');

Route::get('goods', 'IC\Goods\GoodsController@index')->name('goods');

//Route::get('/GetNoGoodsBarcode', 'IC\Goods\GoodsController@GetNoGoodsBarcode');

Route::post('/PaginateGoodsNoBarcode', 'IC\Goods\GoodsController@PaginateGoodsNoBarcode');

Route::post('/GetGoodsByBarcode', 'IC\Goods\GoodsController@GetGoodsByBarcode');

Route::post('/GenData', 'BaseController@GenData');

Route::post('/BindSaveGoods', 'IC\Goods\GoodsController@BindSave');

Route::post('refreshGoods', 'IC\Goods\GoodsController@refreshGoods');

Route::post('fetchGoods', 'IC\Goods\GoodsController@fetchGoods');

//Unit
Route::get('unit', 'IC\Unit\UnitController@index')->name('unit');
Route::post('/BindSaveUnit', 'IC\Unit\UnitController@BindSave');
Route::post('refreshUnit', 'IC\Unit\UnitController@refreshUnit');

//Route::prefix('unit')->group(function () {
    //Route::get('', 'IC\Unit\UnitController@index')->name('unit');
    //Route::post('/BindSaveUnit', 'IC\Unit\UnitController@BindSave');
    //Route::put('{id}', 'productController@update');
    //Route::delete('{id}', 'productController@destroy');
//});