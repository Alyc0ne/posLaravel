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
        $BaseSystem = new BaseSystem();
        $where = $BaseSystem->defaultWhere();
        $OrderBy = 'CreatedDate';
        //$Goods = Goods::where($where)->orderBy('CreatedDate', 'desc')->paginate(20);
        $Goods = $BaseSystem->sqlQueryWithPagination('smGoods', $where, $OrderBy, 20);
        $SystemName = "Goods";

        return view('IC/Goods/index', compact('Goods','SystemName'));
    }

    public function getNoGoodsBarcode()
    {
        $GoodsModel = new Goods();
        $Goods = $GoodsModel::paginate(7);
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
            $Goods = Goods::select('GoodsID','GoodsName','GoodsPrice')::where($where)::paginate(20);
            return view('Shared.Modal.Goods.NoGoodsBarcodeContent', compact('Goods'))->render();
        }
    }

    public function GetGoodsByBarcode(Request $request)
    {
        if ($request->ajax()) {
            $Content = json_decode($request->getContent());
            $GoodsBarcode = $Content->GoodsBarcode;
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $where = array_merge($where, array('GoodsBarcode' => $GoodsBarcode));
            $fields = array('GoodsID','GoodsName','GoodsPrice');
            $Goods = $BaseSystem->sqlQuerySomeFields('smGoods', $where, $fields, true);
            return Response()->json($Goods);
        }
    }

    public function refreshGoods(Request $request)
    {
        if ($request->ajax()) {
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $Goods = Goods::where($where)->orderBy('CreatedDate', 'desc')->paginate(20);
            return view('IC.Goods.GoodsContent', compact('Goods'))->render();
        }
    }

    //Use when pagination work.
    public function fetchGoods(Request $request)
    {
        if ($request->ajax()) {
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $Goods = Goods::where($where)::paginate(7);
            return view('IC.Goods.GoodsContent', compact('Goods'))->render();
        }
    }

    public function BindSave(Request $request)
    {
        $IsSuccess = false;
        if ($request->ajax()) {
            try {
                $BaseSystem = new BaseSystem();
                $UnitID = $request->input('unitGoods');
                $where = $BaseSystem->defaultWhere();
                //array_push($where, 'UnitID');
                $where['UnitID'] = $UnitID;
                $fields = array('UnitName');
                $UnitData = $BaseSystem->sqlQuerySomeFields('smUnit', $where, $fields, true);

                $Goods = new Goods();
                $IsBarcode = boolval($request->input('IsBarcode'));
                $Goods->GoodsID = substr(uniqid(), 3);
                $Goods->GoodsNo = $request->input('GoodsNo');
                $Goods->GoodsBarcode = $IsBarcode ? $request->input('GoodsBarcode') : null;
                $Goods->GoodsName = $request->input('GoodsName');
                $Goods->GoodsQty = 1;
                $Goods->GoodsPrice = $request->input('GoodsPrice');
                $Goods->GoodsCost = $request->input('GoodsCost') != null ? $request->input('GoodsCost') : 0;
                $Goods->GoodsUnitID = $UnitID;
                $Goods->GoodsUnitName = $UnitData->UnitName;
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

    public function BindEdit(Request $request)
    {
        $IsSuccess = false;
        if ($request->ajax()) {
            try {
                $Content = json_decode($request->getContent());
                $GoodsID = $Content->GoodsID;

                $BaseSystem = new BaseSystem();
                $UnitID = $request->input('unitGoods');
                $where = $BaseSystem->defaultWhere();
                $where['UnitID'] = $UnitID;
                $fields = array('UnitName');
                $UnitData = $BaseSystem->sqlQuerySomeFields('smUnit', $where, $fields, true);

                $Goods = Goods::find($GoodsID);
                $IsBarcode = boolval($request->input('IsBarcode'));
                $Goods->GoodsBarcode = $IsBarcode ? $request->input('GoodsBarcode') : null;
                $Goods->GoodsName = $request->input('GoodsName');
                $Goods->GoodsPrice = $request->input('GoodsPrice');
                $Goods->GoodsCost = $request->input('GoodsCost') != null ? $request->input('GoodsCost') : 0;
                $Goods->GoodsUnitID = $UnitID;
                $Goods->GoodsUnitName = $UnitData->UnitName;
                $ID = Auth::user()->UserID;
                $Goods->CreatedByID = strval($ID);
                $Goods->ModifiedByID = null;
                $Goods->ModifiedDate = null;
                $Goods->IsBarcode = boolval($IsBarcode);
                $Goods->save();

                $IsSuccess = true;
                return Response()->json($IsSuccess);
            } catch (\Throwable $th) {
                //throw $th;
                return Response()->json($IsSuccess);
            }
        }
    }

    
    public function GetGoodsByID(Request $request)
    {
        if ($request->ajax()) {
            $Content = json_decode($request->getContent());
            $GoodsID = $Content->GoodsID;
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $whereGoods = array_merge($where, array('GoodsID' => strval($GoodsID)));
            $fieldsGoods = array('GoodsID','GoodsNo','GoodsName','GoodsUnitID','GoodsPrice','IsBarcode','GoodsBarcode');
            $fieldsUnit = array('UnitID','UnitName');
            $Goods = $BaseSystem->sqlQuerySomeFields('smGoods', $whereGoods, $fieldsGoods, true);
            $Unit = $BaseSystem->sqlQuerySomeFields('smUnit', $where, $fieldsUnit);
            return Response()->json(array('Goods' => $Goods, 'Unit' => $Unit));
        }
    }
}
