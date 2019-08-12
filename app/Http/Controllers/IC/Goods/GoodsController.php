<?php

namespace App\Http\Controllers\IC\Goods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $Goods = Goods::paginate(8);
        $SystemName = "Goods";

        return view('IC/Goods/index', compact('Goods','SystemName'));
    }

    public function getNoGoodsBarcode()
    {
        $GoodsModel = new Goods();
        $Goods = $GoodsModel::paginate(8);
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

    public function refreshGoods(Request $request)
    {
        if ($request->ajax()) {
            $Goods = Goods::paginate(8);
            return view('IC.Goods.GoodsContent', compact('Goods'))->render();
            //return View::make("IC.Goods.GoodsContent", ["Goods" => $Goods]);
        }
    }

    public function BindSave(Request $request)
    {
        $IsSuccess = false;
        if ($request->ajax()) {
            try {
                $Goods = new Goods();
                $IsBarcode = boolval($request->input('IsBarcode'));
                $Goods->GoodsID = substr(uniqid(), 3);
                $Goods->GoodsNo = $request->input('GoodsNo');
                $Goods->GoodsBarcode = $IsBarcode ? $request->input('GoodsBarcode') : null;
                $Goods->GoodsName = $request->input('GoodsName');
                $Goods->GoodsQty = 1;
                $Goods->GoodsPrice = $request->input('GoodsPrice');
                $Goods->GoodsCost = $request->input('GoodsCost') != null ? $request->input('GoodsCost') : 0;
                $ID = Auth::user()->UserID;
                $Goods->CreatedByID = "1";
                $Goods->ModifiedByID = null;
                $Goods->ModifiedDate = null;
                $Goods->IsBarcode = boolval($IsBarcode);
                $Goods->IsDelete = false;
                $Goods->IsInactive = false;
                $Goods->save();

                $IsSuccess = true;
                return Response()->json($IsSuccess);
            } catch (\Throwable $th) {
                //throw $th;
                return Response()->json($IsSuccess);
            }
        }
    }
}
