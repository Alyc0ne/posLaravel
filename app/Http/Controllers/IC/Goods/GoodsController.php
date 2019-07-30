<?php

namespace App\Http\Controllers\IC\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseSystem;
use Illuminate\Support\Facades\DB;
use App\Goods;

class GoodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNoGoodsBarcode()
    {
        $GoodsModel = new Goods();
        $Goods = $GoodsModel::paginate(5);
        return view('Shared.Modal.Goods.NoGoodsBarcode', compact('Goods','GoodsPaginate'))->render();
        //view('Shared.Modal.Goods.NoGoodsBarcode', compact('Goods'));


        // $BaseSystem = new BaseSystem();
        // $GoodsModel = new Goods();
        // $where = $BaseSystem->defaultWhere();
        // $w = array('IsDelete' => false);
        // $fields = array('GoodsID','GoodsNo','GoodsName','GoodsPrice');
        // $Goods = $GoodsModel::paginate(5);
        //$tt = view('Shared.Modal.Goods.NoGoodsBarcode', compact('Goods','GoodsPaginate'))->render();
        //return Response()->json($tt);

        //https://www.youtube.com/watch?v=nfDMTzmGi9Q
        //https://www.youtube.com/watch?v=xME6uHYTcLU Debug PHP
        //https://medium.com/@jaythedeveloper/ultimate-guide-debug-php-iis-in-visual-studio-code-using-xdebug-14fced013f22 Debug PHP IIS
    }
}
