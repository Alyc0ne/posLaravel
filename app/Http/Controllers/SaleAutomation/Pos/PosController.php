<?php

namespace App\Http\Controllers\SaleAutomation\Pos;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        return view('SaleAutomation/Pos/index');
    }
}
