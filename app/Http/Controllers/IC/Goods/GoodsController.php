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

    public function index()
    {
        $Goods = Goods::paginate(10);
        return view('IC/Goods/index', compact('Goods','Goods'));
    }

    public function getNoGoodsBarcode()
    {
        $GoodsModel = new Goods();
        $Goods = $GoodsModel::paginate(10);
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
    
    public function PaginateGoodsNoBarcode(Request $request)
    {
        if ($request->ajax()) {
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $Goods = Goods::select('GoodsID','GoodsName','GoodsPrice')::where($where)::paginate(10);
            return view('Shared.Modal.Goods.NoGoodsBarcodeContent', compact('Goods'))->render();
        }
    }

    public function GetGoodsByBarcode(Request $request)
    {
        if ($request->ajax()) {
            $Content = json_decode($request->getContent());
            $GoodsBarcode = $Content->GoodsBarcode;
            $BaseSystem = new BaseSystem();
            //$where = $BaseSystem->defaultWhere();
            $where = array('IsDelete' => false);
            $where = array_merge($where, array('GoodsBarcode' => $GoodsBarcode));
            $fields = array('GoodsID','GoodsName','GoodsPrice');
            $Goods = $BaseSystem->sqlQuerySomeFields('smGoods', $where, $fields, true);
            //DB::table('smGoods')->select('GoodsID','GoodsName','GoodsPrice')->where($where)->first();
            return Response()->json($Goods);
        }
    }

    public function BindSave(Request $request)
    {
        if ($request->ajax()) {
            try {
                $Goods = new Gooods();
                $IsBarcode = boolval($request->input('IsBarcode'));
                $Goods->GoodsID = substr(uniqid(), 3);
                $Goods->GoodsNo = $request->input('GoodsNo');
                $Goods->GoodsBarcode = $IsBarcode ? $request->input('GoodsBarcode') : null;
                // $Content = $request->all(); 
                // $IsBarcode = $request->get('IsBarcode');
                // $model=array(
                //     "GoodsID"=>substr(uniqid(), 3), //10 หลัก
                //     "GoodsNo"=>$Conten->GoodsNo,
                //     "GoodsBarcode"=>boolval($IsBarcode) != false ? $Content->GoodsBarcode : null,
                //     "GoodsName"=>$Content->GoodsName,
                //     "GoodsQty"=>1,
                //     "GoodsPrice"=>$Content->GoodsPrice,
                //     "GoodsCost"=>$Content->GoodsPrice,
                //     "GoodsUnitID"=>"Null", //$unit['UnitID'],
                //     "GoodsUnitName"=>"Null", //$unit['UnitName'],
                //     "GoodsLocationID"=>"Null",
                //     "GoodsLocationName"=>"Null",
                //     "CreatedBy"=>null,
                //     "CreatedDate"=>date("Y-m-d H:i:s"),
                //     "ModifiedBy"=>null,
                //     "ModifiedDate"=>date("Y-m-d H:i:s"),
                //     "IsDelete"=>false,
                //     "IsBarcode"=>boolval($IsBarcode)
                // );
                // dd(model);
                //DB::table('smGoods')->insert($model);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
