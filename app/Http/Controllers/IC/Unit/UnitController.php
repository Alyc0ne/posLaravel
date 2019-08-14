<?php

namespace App\Http\Controllers\IC\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\BaseSystem;
use Illuminate\Support\Facades\DB;
use App\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Unit = Unit::paginate(8);
        $SystemName = "Unit";

        return view('IC/Unit/index', compact('Unit','SystemName'));
    }

    public function BindSave(Request $request)
    {
        $IsSuccess = false;
        if ($request->ajax()) {
            try {
                $Unit = new Unit();
                $Unit->UnitID = substr(uniqid(), 3);
                $Unit->UnitNo = $request->input('UnitNo');
                $Unit->UnitName = $request->input('UnitName');
                $Unit->CreatedByID = Auth::user()->UserID;
                $Unit->ModifiedByID = null;
                $Unit->ModifiedDate = null;
                $Unit->IsDelete = false;
                $Unit->IsInactive = false;
                $Unit->save();

                $IsSuccess = true;
                return Response()->json($IsSuccess);
            } catch (\Throwable $th) {
                return Response()->json($IsSuccess);
            }
        }
    }

    public function refreshUnit(Request $request)
    {
        if ($request->ajax()) {
            $BaseSystem = new BaseSystem();
            $where = $BaseSystem->defaultWhere();
            $Unit = Unit::paginate(8);
            return view('IC.Unit.UnitContent', compact('Unit'))->render();
        }
    }
}
