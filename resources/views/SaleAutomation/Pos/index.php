<script type="text/javascript" src="js/system/SaleAutomation/Pos/PosSales.js"></script>
<script type="text/javascript" src="js/system/SaleAutomation/Pos/transac-SalesGoods.js"></script>

<input type='hidden' id='SystemName' name='SystemName' value='<?php echo $SystemName; ?>'>
<div class="col-lg-8">
    <!-- Project Card Example -->
    <div class="card shadow mb-4 h_detail_pos" id="left_SellGoods">
        <div class="card-header py-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-info" onclick="javascript:waitPayment();">
                    <i class="fa fa-search"></i> รอชำระ
                </button>
            </div>
        </div>
    
        <div class="card-body" style="height:100%!important;">
            <div class="col-12" id="Sell-PageLeft" style="height:100%!important;">  
                <div class="row POS_Header">
                    <span>(จำนวน) : </span>
                    <input type='number' id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1'>
                    <input list='Goods' id='GoodsBarcodeSearch'>
                    <datalist id='Goods'></datalist>
                </div>
                <div class="row m_t5">
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card mb-4 py-3 border-left-primary pointer p_tb4" onclick="javascript:ShowModalNoGoodsBarcode();">
                            <div class="card-body p_tb4">
                                <img class='img_responsive' src='<?php echo base_url(); ?>extensions/images/icon/789.png'>
                            </div>
                        </div>
                        <!-- <div class="card pointer" onclick="javascript:ShowModalNoGoodsBarcode();">
                            <div class="box bg-cyan text-center">
                            <i class="fas fa-barcode"></i>

                                <h1 class="font-light text-white"><i class="m-r-10 mdi mdi-barcode-scan"></i></h1>
                                <h6 class="text-white">สินค้าไม่มีบาร์โค้ด</h6>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card shadow mb-4 h_detail_pos" id="Right_SellGoods">
        <div class="card-header">
            <div style='height:100%;width:100%'>
                <input type='text' class='wh100 text-center p_a15' style='font-size:36pt;' id='sub_total' name='sub_total' disabled>
            </div>
        </div>
        <div class="card-body p_a0" style="height:100%!important;">
            <div class="col-12" id="Sell-PageRight" style="height:100%!important;">
                <!-- GEN BY TRANSACGRID -->
            </div>
        </div>
    </div>
</div>