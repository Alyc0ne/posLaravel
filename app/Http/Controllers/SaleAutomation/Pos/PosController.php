<?php

namespace App\Http\Controllers\SaleAutomation\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Goods = Goods::paginate(5);
        //return view('Shared.Modal.Goods.NoGoodsBarcode', compact('Goods'));
        return view('SaleAutomation/Pos/index', compact('Goods'));
    }
}
