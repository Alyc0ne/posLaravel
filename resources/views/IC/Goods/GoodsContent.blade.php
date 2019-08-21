<div class="row m_a0 bordered-box pane">
    <div class="pane-hScroll">
        <table class="table" style="margin-bottom:0px;">
        <thead>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th style="text-align:center;">หน่วยนับสินค้า</th>
            <th style="text-align:right;">ราคาต้นทุน</th>
            <th style="text-align:right;">ราคาขาย</th>
            <th style="text-align:center;">#</th>
        </thead>
        </table>
    
        <div class="pane-vScroll" style="max-height:380px;">
        <table class="table">
            <tbody>
            @foreach ($Goods as $_Goods)
                <tr>
                    <td>{{ $_Goods->GoodsBarcode }}</td>
                    <td>{{ $_Goods->GoodsName }}</td>
                    <td style="text-align:center;">{{ $_Goods->GoodsUnitName }}</td>
                    <td class='text-right'>{{ number_format($_Goods->GoodsCost,2) }}</td>
                    <td class='text-right'>{{ number_format($_Goods->GoodsPrice,2) }}</td>
                    <td style="text-align:center;">
                        <button class="btn btn-default p_a0" id="btn-editGoods" data-id="{{ $_Goods->GoodsID }}"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-default p_a0" id="btn-deleteGoods"><i class="fas fa-trash-alt"></i></button>
                    </td>
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