<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function GenRunningNumber(){
        $Year = date("Y");
        $Month = date("m");
        $System = $this->input->post("System");

        if ($System == "Unit") {
            $FirstChar = "UN";$table = "smUnit";$coloumn = "UnitNo";
        } else if($System == "Goods") {
            $FirstChar = "GO";$table = "smGoods";$coloumn = "GoodsNo";
        } else if ($System == "Invoice") {
            $FirstChar = "IN";$table = "soInvoice";$coloumn = "InvoiceNo";
        }
        

        $RunningNumber = $this->db->order_by($coloumn, "DESC")->get($table)->row_array();

        if(empty($RunningNumber)){
            $RunningNumber = $FirstChar.date("Ym")."-01";
        }else {
            $Number = explode("-",$RunningNumber[$coloumn]);
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

        echo $RunningNumber;
    }

    public function GetDataJson(){
        $System = $this->input->post("System");
        $data = $this->BaseSystem->GenSystem($System);
        $result = $this->db->order_by('CreatedDate',"ASC")->get($data['$table'])->result_array();
        echo json_encode($result);
    }
}
