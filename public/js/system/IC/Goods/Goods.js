// #region Action Manage Goods

// #region Call Modal
function ShowModalGoods() {
    openloading(true);
    GenData("Goods");
}

$(document).on('click', '#btn-editGoods', function () {
    var GoodsID = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: "GetGoods",
        datatype: "json",
        data: JSON.stringify({GoodsID: GoodsID}),
        contentType: 'application/json; charset=utf-8',
        traditional: true,
        beforeSend : function () {
            openloading(true);
        },
        success: function (Response) {
            if (Response != null) {
                $('#edithidGoodsID').val(Response.Goods.GoodsID);
                $('#editGoodsNo').val(Response.Goods.GoodsNo);
                $('#edittempGoodsNo').val(Response.Goods.GoodsNo);
                if (Boolean(parseInt(Response.Goods.IsBarcode))) {
                    $('#editIsBarcode').trigger('click');
                    $('#editGoodsBarcode').val(Response.Goods.GoodsBarcode);
                }
                $('#editGoodsName').val(Response.Goods.GoodsName);
                $('#editGoodsCost').val(Response.Goods.GoodsCost);
                $('#editGoodsPrice').val(Response.Goods.GoodsPrice);
                SetDataSelect2(Response.Unit, "editunitGoods")
                $("#EditGoodsModal").modal();
                openloading(false);
            }
        },
        error: function (e) {
            openloading(false);
        }
    });
});
// #endregion 

// #region Save & Edit Goods
$(document).on('submit', "#formGoods", function (e) {
    e.preventDefault();
    if (bindValidate("#frmGoods")){
        openloading(true);
        var GoodsID = 0;
        var url = './BindSaveGoods';
        var IsEdit = false;
        var idModal = "GoodsModal";
        if ($(this).data('type') != "new") {
            GoodsID = $('#hidGoodsID').val();
            url = 'BindEditGoods';
            IsEdit = true;
            idModal = "EditGoodsModal";
        }
        $.ajax({
            type: "POST",
            url: url,
            data : !IsEdit ? $("#formGoods").serialize() : JSON.stringify({GoodsID: GoodsID,dataForm: $("#formGoods").serialize()}),
            success: function (response) {
                console.log(response);
                if (response[0]) {
                    refreshListData('Goods');
                    AlertStatus('success','บันทึกข้อมูลสินค้าเรียบร้อย !');
                    $("#" + idModal).modal('toggle');
                    clearModal(idModal);
                }else{
                    if (response[1]) {
                        alert('รหัส Barcode ซ้ำกรุณาตรวจสอบ');
                    }else{

                    }
                    openloading(false);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});
// #endregion

// #region Use Barcode
$(document).on("click", "#IsBarcode", function () {
    var IsBarcode = $("#IsBarcode:checkbox:checked").length;
    if (IsBarcode > 0) {
        $("#GoodsBarcode").prop("disabled",false);
        $("#GoodsBarcode").trigger('focus');
        $("input[name=IsBarcode]").val('1');
        $("#GoodsBarcode").closest("div.form-group").find("span.text-red").html("*");
    }else{
        $("#GoodsBarcode").prop("disabled",true);
        $("input[name=IsBarcode]").val('0');
        $("#GoodsBarcode").closest("div.form-group").find("span.text-red").html("");
    }
});
// #endregion

// #region ReloadPage
$(document).on('click', '.pagination a', function(event){  
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_Goods(page)
});  

function fetch_Goods(page) {
    $.ajax({
        type: 'POST',
        url: "refreshGoods?page="+page,
        datatype: "json",
        traditional: true,
        beforeSend : function () {
            openloading(true);
        },
        success: function (e) {
            if (e != null) {
                $(".contentGoods").html(e);
                openloading(false);
            }
        },
        error: function (e) {
            openloading(false);
        }
    });
}
// #endregion

// #endregion



