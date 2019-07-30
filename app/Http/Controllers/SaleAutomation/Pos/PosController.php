<?php

namespace App\Http\Controllers\SaleAutomation\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('SaleAutomation/Pos/index');
    }
}
