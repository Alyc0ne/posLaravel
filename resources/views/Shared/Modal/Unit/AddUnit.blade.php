<!-- Modal -->
<div class="modal fade modalInsert" id="UnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Unit (เพิ่มหน่วยนับ)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='formUnit'>
        <div class="modal-body">
            <div id='frmUnit'>
                <div class="form-group row">
                    <label for="UnitNo" class="col-sm-2 col-form-label">รหัสหน่วยนับ : </label>
                    <div class="frm-content col-sm-10">
                        <input type="text" class="form-control" id="UnitNo" data-maxlength='10' disabled>
                        <input type="hidden" class="form-control" id="tempUnitNo" name="UnitNo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="UnitName" class="col-sm-2 col-form-label require"><span class='text-red'>* </span>ชื่อหน่วยนับ : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control inputFocus" id="UnitName" name="UnitName" data-maxlength='250' autofocus autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"  id="btn-Save-Unit">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>