<!-- Modal -->
<div class="modal fade modalInsert" id="EditGoodsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Goods (แก้ไขสินค้า)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='formGoods' data-type='edit'>
        <div class="modal-body">
            <div id='frmGoods'>
                <div class="form-group row">
                    <label for="GoodsNo" class="col-sm-2 col-form-label">รหัสสินค้า : </label>
                    <div class="frm-content col-sm-10">
                        <input type="text" class="form-control" id="editGoodsNo" data-maxlength='10' disabled>
                        <input type="hidden" class="form-control" id="edittempGoodsNo" name="editGoodsNo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GoodsBarcode" class="col-sm-2 col-form-label require"><span class='text-red'> </span>Barcode : </label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="editIsBarcode">
                            <input type="hidden" name="editIsBarcode" value="0"/>
                            <label class="custom-control-label" for="IsBarcode">ใช้งาน Barcode</label>
                        </div>
                        <input type="text" class="form-control" id="editoodsBarcode" name="editGoodsBarcode" data-maxlength='10' disabled autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GoodsName" class="col-sm-2 col-form-label require"><span class='text-red'>* </span>ชื่อสินค้า : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control inputFocus" id="editGoodsName" name="editGoodsName" data-maxlength='250' autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GoodsCost" class="col-sm-2 col-form-label">ต้นทุนสินค้า : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control _number" id="editGoodsCost" name="editGoodsCost" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GoodsPrice" class="col-sm-2 col-form-label require"><span class='text-red'>* </span>ราคาสินค้า : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control _number" id="editGoodsPrice" name="editGoodsPrice" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GoodsUnit" class="col-sm-2 col-form-label">หน่วยนับ : </label>
                    <div class="col-sm-10">
                        <select class="editunitGoods" name="editunitGoods" style="width: 50%">
                        </select>
                    </div>
                </div>
                <input type='hidden' id='edithidGoodsID' name='edithidGoodsID'>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-Edit-Goods">Update changes</button>
        </div>
       </form>
    </div>
  </div>
</div>