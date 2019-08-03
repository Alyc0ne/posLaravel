@extends('Dashboard.index')
{{-- @extends('Shared.Modal.Goods.NoGoodsBarcode') --}}
@section('content')
<script type="text/javascript" src="js/system/SaleAutomation/Pos/PosSales.js"></script>
<script type="text/javascript" src="js/system/SaleAutomation/Pos/transac-SalesGoods.js"></script>
<script type="text/javascript" src="js/system/IC/Goods/NoGoodsBarcode.js"></script>
<link rel="stylesheet" href="css/extensions/content/Sales/Pos/pos.css">

<input type='hidden' id='SystemName' name='SystemName' value='<?php //echo $SystemName; ?>'>

<div class='block-menu'>
    <button type="button" class="btn btn-primary" onclick="javascript:waitPayment();">
        <i class="fa fa-search"></i> รอชำระ
    </button>
</div>

<div class='block-content'>
    <div class="row">
        <div class="col-8" id="Sell-PageLeft" style="height:100%!important;">
            <div class="row POS_Header block-group">
                <input type='number' class="form-control" id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1'>
                <input list='Goods' class="form-control" id='GoodsBarcodeSearch' autofocus>
                <datalist id='Goods'></datalist>
            </div>

            <div class="row m_t5">
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card mb-4 py-3 border-left-primary pointer p_tb4" onclick="javascript:ShowModalNoGoodsBarcode();">
                        <div class="card-body p_tb4">
                            <img class='img_responsive' src='<?php //echo base_url(); ?>extensions/images/icon/789.png'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow posRightBox" id="Right_SellGoods">
                    <div class="card-header h_20">
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
            {{-- <div class="posRightBox" id="Right_SellGoods">
                <div class="card-header">

                </div>
                {{-- <div class="block-group">
                    <div class="col-4 block-group-content">
                        <div>
                            <span><b>TOTAL</b></span>
                        </div>
                        <div style="text-align:right;">
                            <span>0.00</span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="card-header h_20">
                    <div style='height:100%;width:100%'>
                        <input type='text' class='wh100 text-center p_a15' style='font-size:36pt;' id='sub_total' name='sub_total' disabled>
                    </div>
                </div> --}}
                {{-- <div class="card-body p_a0 p_t10" style="height:20%!important;">
                    
                </div>
                <div class="card-body p_a0" style="height:60%!important;">
                    <div class="col-12" id="Sell-PageRight" style="height:100%!important;">
                        <!-- GEN BY TRANSACGRID -->
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.NoGoodsBarcode')
</div>