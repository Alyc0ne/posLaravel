<div class="table-responsive">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th class="w_5">
                    <label class="customcheckbox m_b20">
                        <input type="checkbox" id="mainCheckbox" />
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th scope="col" class="w_10 text-center">#</th>
                <th scope="col" class="w_70">ชื่อสินค้า</th>
                <th scope="col" class="w_15 text-right">ราคาสินค้า</th>
            </tr>
        </thead>
        <tbody class='NoGoodsBarcode_Body'>
            {{-- @if (is_array($Goods)) --}}
            @foreach ($Goods as $_Goods)
                <tr id='uid' data-goodsid="{{ $_Goods->GoodsID }}">
                <th><label class='customcheckbox'><input type='checkbox' class='chkNoGoodsBarcode' /><span class='checkmark'></span></label></th>
                <td id='NoGoodsBarcode_QtyBarcode'><input type='number' style='height:5%;' class='text-center w_100' id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1'></td>
                <td id='NoGoodsBarcode_GoodsName'>{{ $_Goods->GoodsName }}</td>
                <td id='NoGoodsBarcode_GoodsPrice' class='text-right'>{{ number_format((float)$_Goods->GoodsPrice, 2, '.', '') }}</td>
                </tr>
            @endforeach
            {{-- @endif --}}
        </tbody>
    </table>
    <div class="text-xs-center">
            {!! $Goods->links() !!}
    </div>
</div>