<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseSystem;

class BaseController extends Controller
{
    public function GenRunningNumber($System){
        $BaseSystem = new BaseSystem();
        $Year = date("Y");
        $Month = date("m");

        if ($System == "Unit") {
            $FirstChar = "UN";$table = "smUnit";$coloumn = "UnitNo";
        } else if($System == "Goods") {
            $FirstChar = "GO";$table = "smGoods";$coloumn = "GoodsNo";
        } else if ($System == "Invoice") {
            $FirstChar = "IN";$table = "soInvoice";$coloumn = "InvoiceNo";
        }
        
        $RunningNumber = $BaseSystem->sqlQueryOneRowDesc($table, $coloumn);

        if(empty($RunningNumber)){
            $RunningNumber = $FirstChar.date("Ym")."-01";
        }else {
            $Number = explode("-",$RunningNumber->$coloumn);
            $chkYear = substr($Number[0],2,-2);
            $chkMonth = substr($Number[0],6);
            $StartRuning = "";
            if($chkYear != $Year){
                $StartRuning = $FirstChar.date("Ym");
            }
                
            if($chkMonth != $Month){
                $StartRuning = $FirstChar.date("Ym");
            }else{
                $StartRuning = $Number[0];
            }

            $LastRunning = $Number[count($Number) - 1 ] + 1;
            $LastRunning = $LastRunning < 10 ? "0".$LastRunning : $LastRunning;
            $RunningNumber = $StartRuning."-".$LastRunning;
        }
        return $RunningNumber;
        //return Response()->json($RunningNumber);
    }


    public function GenData(Request $request)
    {
        $BaseSystem = new BaseSystem();
        //$Result = array();
        if ($request->ajax()) {
            $Content = json_decode($request->getContent());
            $System = $Content->System;
            // $defaultWhere = $BaseSystem->defaultWhere();
            $defaultWhere = array('IsDelete' => false);
            $RunningNumber = $this->GenRunningNumber($System);
            //array_push($Result, $RunningNumber);
            
            switch ($System) {
                case 'Goods':
                    // $UnitData = $BaseSystem->sqlQuery('smGoods', $defaultWhere);
                    // $Unit = json_decode($UnitData);
                    //array_push($Result, $Unit[0]);
                    break;
                
                default:
                    break;
            }
            $Result = array(
                'RunningNumber' => $RunningNumber,
                // 'Unit' => $Unit
            );
            return Response()->json($Result);
        }
    }

    public function GetDataJson(){
        $System = $this->input->post("System");
        $data = $this->BaseSystem->GenSystem($System);
        $result = $this->db->order_by('CreatedDate',"ASC")->get($data['$table'])->result_array();
        echo json_encode($result);
    }
}
