@extends('Dashboard.index')
@section('content')
<script src="js/system/IC/Goods/Goods.js"></script>
<div class="block-content">
    <input type="hidden" id='SystemName' value='{{ $SystemName }}'>
    <div class='block-menu' style="border-bottom:none;">
        <div class='row'>
            <div class="col-md-12 col-lg-6 d-flex"> 
               {{-- //// --}}
            </div>
            <div class="col-md-12 col-lg-6 d-inline-flex flex-wrap justify-content-lg-end">
                <div class="col-9 p_lr0">
                    <input type="text" class="form-control" id="frmGoods-Search" placeholder="Not Ready">
                </div>
                
                <div class="col-3 p_r0">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle w_100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                            Filter Search Button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <select name="" id="">
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contentGoods">
        <div class="row m_a0 bordered-box pane">
            <div class="pane-hScroll">
                <table class="table" style="margin-bottom:0px;">
                <thead>
                    <th class='w_10 text-center'>#</th>
                    <th class='w_15'>รหัสสินค้า</th>
                    <th class='w_50'>ชื่อสินค้า</th>
                    <th class='w20 text-center' style="text-align:center;">หน่วยนับสินค้า</th>
                    <th class='w20 text-right'>ราคาต้นทุน</th>
                    <th class='w20 text-right'>ราคาขาย</th>
                </thead>
                </table>
            
                <div class="pane-vScroll" style="max-height:380px;">
                <table class="table">
                    <tbody>
                    @foreach ($Goods as $_Goods)
                        <tr>
                            <td class='w_10 text-center'>
                                <button class="btn btn-default p_a0" id="btn-editGoods" data-id="{{ $_Goods->GoodsID }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-default p_a0" id="btn-deleteGoods"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class='w_15'>{{ $_Goods->GoodsBarcode }}</td>
                            <td class='w_50'>{{ $_Goods->GoodsName }}</td>
                            <td class='w20 text-center'>{{ $_Goods->GoodsUnitName }}</td>
                            <td class='w15 text-right'>{{ number_format($_Goods->GoodsCost,2) }}</td>
                            <td class='w15 text-right'>{{ number_format($_Goods->GoodsPrice,2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
                {!! $Goods->links() !!}
        </div>
    </div>
</div>
@endsection