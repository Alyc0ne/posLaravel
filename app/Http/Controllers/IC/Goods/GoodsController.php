<?php

namespace App\Http\Controllers\IC\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseSystem;

class GoodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNoGoodsBarcode()
    {
        $BaseSystem = new BaseSystem();
        $where = $BaseSystem->defaultWhere();
        $w = array('IsDelete' => false);
        $fields = array('GoodsNo','GoodsName');
        $Goods = $BaseSystem->sqlQuerySomeFields('smGoods',$w,$fields)->toArray();
        //$e = dd($Goods);
        //return Response()->json( $result );
        $tt = View::make('Shared.Modal.Goods.NoGoodsBarcode')->with(compact('Goods'));
        return Response()->json( $result );

        //https://www.youtube.com/watch?v=nfDMTzmGi9Q
        //https://www.youtube.com/watch?v=xME6uHYTcLU Debug PHP
        //https://medium.com/@jaythedeveloper/ultimate-guide-debug-php-iis-in-visual-studio-code-using-xdebug-14fced013f22 Debug PHP IIS
    }
}
