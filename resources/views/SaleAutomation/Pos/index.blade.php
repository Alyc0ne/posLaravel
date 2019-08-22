@extends('Dashboard.index')
@section('content')
<script type="text/javascript" src="js/system/SaleAutomation/Pos/PosSales.js"></script>
<script type="text/javascript" src="js/system/SaleAutomation/Pos/transac-SalesGoods.js"></script>
<script type="text/javascript" src="js/system/IC/Goods/NoGoodsBarcode.js"></script>
<link rel="stylesheet" href="css/extensions/content/Sales/Pos/pos.css">

<input type='hidden' id='SystemName' name='SystemName' value='<?php //echo $SystemName; ?>'>

<div class='block-content'>
    <div class="row" style="height:300px;">
        <div class="col-7" style="border:solid 1px black;">

        </div>
        <div class="col-5">
            <div class="row" style="margin:8px 8px;">
                <div class="col-2" style="padding:0px;">
                    <input type='number' class="form-control" id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1' style="text-align:center;">
                </div>
                <div class="col-10"  style="padding:0px;">
                        <input list='Goods' class="form-control" id='GoodsBarcodeSearch' autofocus>
                </div>
            </div>
            <div id='posDetail' style="height:200px;border:solid 1px black;">

            </div>
        </div>
    </div>
</div>

@endsection
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.NoGoodsBarcode')
</div>