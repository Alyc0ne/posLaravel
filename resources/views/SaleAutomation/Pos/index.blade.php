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
        <div class="col-5" style="border:solid 1px black;">
                <div class="col-4">
                    <input type='number' class="form-control" id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1'>
                </div>
                <div class="8">
                        <input list='Goods' class="form-control" id='GoodsBarcodeSearch' autofocus>
                </div>
        </div>
    </div>
</div>

@endsection
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.NoGoodsBarcode')
</div>