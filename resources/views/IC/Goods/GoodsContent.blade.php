<div class="row m_a0 bordered-box table-scroll">
    <table class="table" style="margin-bottom:0px;  overflow-x: auto;">
        <thead style="background-color:#fafafa;">
            <tr>
                <th class="mw_120">รหัสสินค้า</th>
                <th class="mw_500">ชื่อสินค้า</th>
                <th class="mw_200">หน่วยนับสินค้า</th>
                <th class='mw_100 text-right'>ราคาต้นทุน</th>
                <th class='mw_100 text-right'>ราคาขาย</th>
                <th class="mw_150" style="text-align:center;">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Goods as $_Goods)
                <tr>
                    <td scope="row">{{ $_Goods->GoodsBarcode }}</td>
                    <td>{{ $_Goods->GoodsName }}</td>
                    <td>{{ $_Goods->UnitName }}</td>
                    <td class="text-right">{{ number_format($_Goods->GoodsCost,2) }}</td>
                    <td class="text-right">{{ number_format($_Goods->GoodsPrice,2) }}</td>
                    <td style="text-align:center;"><button class="btn btn-default p_a0"><i class="fas fa-edit"></i></button><button class="btn btn-default p_a0"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row" style="margin-top:10px;">
        {!! $Goods->links() !!}
</div>