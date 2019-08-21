@extends('Dashboard.index')
@section('content')
<script type="text/javascript" src="js/system/SaleAutomation/Pos/PosSales.js"></script>
<script type="text/javascript" src="js/system/SaleAutomation/Pos/transac-SalesGoods.js"></script>
<script type="text/javascript" src="js/system/IC/Goods/NoGoodsBarcode.js"></script>
<link rel="stylesheet" href="css/extensions/content/Sales/Pos/pos.css">

<input type='hidden' id='SystemName' name='SystemName' value='<?php //echo $SystemName; ?>'>

<div class='block-content'>
    
</div>
@endsection
<div class='ExtendsModal'>
    @extends('Shared.Modal.Goods.NoGoodsBarcode')
</div>