<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/system/IC/Goods/NoGoodsBarcode.js"></script>

<div class="modal fade" id="NoGoodsBarcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">NoGoodsBarcode (สินค้าไม่มีบาร์โค้ด)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group m_b10">
          <input class="form-control py-2" type="search" value="search" id="SearchNoGoodsBarcode" name='SearchNoGoodsBarcode' placeholder='ค้นหา'>
          <span class="input-group-append">
            <button class="btn btn-outline-secondary border-left-0 border" id='btn-SearchNoGoodsBarcode' class='btn-SearchNoGoodsBarcode' type="button">
                <i class="fa fa-search"></i>
            </button>
          </span>
        </div>

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
            <tbody>

              @foreach ($Goods as $_Goods)
              {{ $_Goods }}
                {{-- {{ "<tr id='uid' data-goodsid='.$_Goods['GoodsID'].'>" }}
                {{ 
                  "<th>
                    <label class='customcheckbox'>
                    <input type='checkbox' class='chkNoGoodsBarcode' />
                    <span class='checkmark'></span>
                    </label>
                  </th>" 
                }} --}}
                {{-- {{ "<td id='NoGoodsBarcode_QtyBarcode'><input type='number' style='height:5%;' class='text-center w_100' id='QtyBarcode' name='QtyBarcode' min='1' max='99' value='1'></td>" }}
                {{ "<td id='NoGoodsBarcode_GoodsName'>'. $data['GoodsName'] .'</td>"}} --}}
                {{-- {{ "<td id='NoGoodsBarcode_GoodsPrice' class='text-right'>'.number_format((float)$data['GoodsPrice'], 2, '.', '').'</td>" }} --}}
                @endforeach
            </tr>
            </tbody>
          </table>
        </div>
        <div class="page">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-Select-NoGoodsBarcode">Select</button>
      </div>
    </div>
  </div>
</div>