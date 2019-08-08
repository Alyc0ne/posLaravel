<div class="row m_a0 bordered-box table-scoller">
    <table class="table" style="margin-bottom:0px;">
        <thead style="background-color:#fafafa;">
            <tr>
                <th class="w_10">รหัสสินค้า</th>
                <th class="w_60">ชื่อสินค้า</th>
                <th class='w_20 text-right'>ราคาสินค้า</th>
                <th class='w_10' style="text-align:center;">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Goods as $_Goods)
                <tr>
                    <td scope="row">{{ $_Goods->GoodsBarcode }}</td>
                    <td>{{ $_Goods->GoodsName }}</td>
                    <td class="text-right">{{ number_format($_Goods->GoodsPrice,2) }}</td>
                    <td style="text-align:center;"><button class="btn btn-default p_a0"><i class="fas fa-edit"></i></button><button class="btn btn-default p_a0"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
        {!! $Goods->links() !!}
</div>