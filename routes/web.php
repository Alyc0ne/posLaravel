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

Route::get('/dashboard', 'DashboardController@index');

Route::get('pos', 'SaleAutomation\Pos\PosController@index')->name('pos');

//Route::get('/GetNoGoodsBarcode', 'IC\Goods\GoodsController@GetNoGoodsBarcode');

Route::post('/PaginateGoodsNoBarcode', 'IC\Goods\GoodsController@PaginateGoodsNoBarcode');

Route::post('/GetGoodsByBarcode', 'IC\Goods\GoodsController@GetGoodsByBarcode');

// Route::post('/GetNoGoodsBarcode', function ()
// {
//     $Goods = Goods::paginate(5);
//     return View::make('Shared.Modal.Goods.NoGoodsBarcode')->with('Goods', $Goods);
// });

// Route::post('/PaginateGodsNoBarcode', function ()
// {
//     $Goods = Goods::paginate(5);
//     return View::make('Shared.Modal.Goods.NoGoodsBarcodeContent')->with('Goods')->render();
// });