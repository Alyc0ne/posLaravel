var update = false;
$(document).ready(function() {
    //setTimeout(function(){ $("#GoodsBarcode").focus(); }, 500);
    $('#GoodsBarcode').trigger('focus');
});

$("#discountCash").change(function(e) {
    $subTotal = $("#subTotal").val();
    $discount = $("#discountCash").val();

});

$(document).on("click","#RemoveGoods", function(e){
    var uid = $(this).closest("#GoodDetail").data("uid");
    bootbox.confirm(
        "ต้องการลบสินค้าชิ้นนี้ ใช่หรือไม่ ?"
    , function(result){ 
        if (result) {
            transacSalesGoods.gridControl.removeGoods(uid);
        }
    });
});

$(document).on("change","#discount", function () {
   var dis = $("#discount").val();
   var sdis = dis.split('%');
   var txtDiscount = 0;
   if (sdis.length > 1) {
        txtDiscount = sdis[0] + "%";
   }else{
        txtDiscount = numberWithCommas(parseFloat(sdis[0]).toFixed(2));
   }
   if(transacSalesGoods.gridControl.countGoodsTransac() > 0){
        $("#discount").val(txtDiscount);
   }else{
        $("#discount").val("");
   }

   transacSalesGoods.gridControl.calSummary("","",txtDiscount);
});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(document).on("click","#SaveInvoice", function () {
    Confirm_POS();
})

function SaveInvoice(draft = false) {
    openloading(true);
    var GridGoods = transacSalesGoods.gridControl.selectDataGrid();
    var InvoiceData = {
        InvoiceNo : GenRunningNumber("Invoice"),
        TotalAmnt : $("#TotalAmnt").val(),
        CashAmnt : $("#CashAmnt").val(),
        BlueFlagAmnt : $("#BlueFlagAmnt").val(),
        ChangeAmnt : $("#ChangeAmnt").val(),
        Discount : null,
        DiscountAmnt : null,
        NetAmnt : $("#TotalAmnt").val()
    };
    if (GridGoods.length > 0) {
        $.ajax({
            type: 'POST',
            url: base_url + "Invoice/InvoiceController/SaveInvoice",
            dataType: 'json',
            data: {
                "GoodsData" : JSON.stringify(GridGoods),
                "InvoiceData" : JSON.stringify(InvoiceData),
                "Type" : draft
            },
            async: false,
            traditional: true,
            success: function (e) {
                if (e) {
                    if (!draft) {
                        PrintSlip();
                    }
                    ClearPOS();
                    openloading(true);
                }
            },
            error: function (e) {
                openloading(false);
            }
        });
    }else{
        var txtAlert = "<h3 class='text-center text-red float-left'>กรุณาเลือกสินค้า !</h3>";
        AlertModal(txtAlert);
        openloading(false);
    }
}

function PrintSlip(DocID) {
    //var myWindow = window.open(base_url + "Invoice/InvoiceController/PaymentSlip?id" + DocID, "width=200,height=100");
    var myWindow = window.open(base_url + "Invoice/InvoiceController/PaymentSlip", "width=200,height=100");
    //myWindow.document.write("<p>This is 'myWindow'</p>");
  }

function ClearPOS() {
    $("#Confrim_POS").modal('hide');
    transacSalesGoods.gridControl.clearData();
    //openloading(true);
}