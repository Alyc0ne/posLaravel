var IsFirst = 0;
let numClick = 0;
let TempGoodsID = new Array();

function ShowModalNoGoodsBarcode() {
    //GetNoGoodsBarcode(function (callback) {
        //if (!!callback) {
            $("#NoGoodsBarcodeModal").modal();
        //}
    //});
}

function GetNoGoodsBarcode(page,txtSearch) {
    openloading(true);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: './PaginateGoodsNoBarcode?page=' + page,
        success: function (e) {
            if (e != null) {
                $("#SearchNoGoodsBarcode").val("");
                TempGoodsIDNoGoodsBarcode = [];
                //TempDataNoGoodsBarcode = e.GoodsData;
                $("#table_data").html(e);

                openloading(false);
            }
        },
        error: function (e) {
            openloading(false);
        }
    });
}

$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var txtSearch = $("#SearchNoGoodsBarcode").val();
    GetNoGoodsBarcode(page,txtSearch); 
  });


$(document).on('click', '.NoBarcode_Page-link', function(){  
    var page = $(this).attr("id");  
    var txtSearch = $("#SearchNoGoodsBarcode").val();
    GetNoGoodsBarcode(null,page,txtSearch);  
});  

$(document).on("click", ".chkNoGoodsBarcode", function (e) {
    var GoodsID = $(this).closest('tr').data("goodsid"); //GoodsID for rowGoods
    if($(".chkNoGoodsBarcode:checkbox:checked").length > numClick){
        TempGoodsID.push(GoodsID);
        numClick++;
    }else{
        var index = TempGoodsID.map(x => {
            return x.GoodsID;
        }).indexOf(GoodsID);
        TempGoodsID.splice(index,1);
        numClick--;
    }
});

function manageSelectGoods(QtyBarcode,DataGoods,TransactionGoods) {
    var index = null;
    if(TransactionGoods.length >= 1){
        index = TransactionGoods.find((x => x.GoodsID == DataGoods.GoodsID));
    }

    if(index == null){
        var GoodsPrice = transacSalesGoods.gridControl.addData(DataGoods,QtyBarcode);
        transacSalesGoods.gridControl.calSummary(true,parseFloat(GoodsPrice));
    }else{
        transacSalesGoods.gridControl.updateGoodsByIndex(index.uid,DataGoods.GoodsPrice,QtyBarcode);
    } 
}

//#region Select Goods By Barcode
$(document).on("change", "#GoodsBarcodeSearch", function() {
    openloading(true);
    var QtyBarcode = $("#QtyBarcode").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: './GetGoodsByBarcode',
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify({GoodsBarcode: $("#GoodsBarcodeSearch").val()}),
        contentType: 'application/json; charset=utf-8',
        async: false,
        success: function(e) {
            if(e != null){
                var GridGoods = transacSalesGoods.gridControl.selectDataGrid();
                manageSelectGoods(QtyBarcode,e,GridGoods,GridGoods);
            }
        },
        error: function(e) {
            openloading(false);
        }
    });
    $("#GoodsBarcodeSearch").val("");
    openloading(false);
});
//#endregion

//#region Select NoGoodsBarcode
$(document).on("click", "#btn-Select-NoGoodsBarcode", function (e) {
    numClick =0;
    var arrResult = new Array();
    if (TempGoodsID != null && TempGoodsID.length > 0) {
        for (let c = 0; c < TempGoodsID.length; c++) {
            var result = dataGoods.data.find(x => x.GoodsID == TempGoodsID[c]);
            arrResult.push(result);
        }
        
        var GridGoods = transacSalesGoods.gridControl.selectDataGrid();
        if (arrResult != null && arrResult.length > 0) {
            for (let a = 0; a < arrResult.length; a++) {
                var QtyBarcode = $(".NoGoodsBarcode_Body").find('tr[data-goodsid=' + arrResult[a].GoodsID + '] td#NoGoodsBarcode_QtyBarcode input#QtyBarcode').val();
                manageSelectGoods(QtyBarcode,arrResult[a],GridGoods);
            }
        }
    }
    $('#NoGoodsBarcodeModal').modal('toggle');
});
//#endregion






$(document).on('keypress', '#SearchNoGoodsBarcode',function(e) {
    if(e.which == 13) {
        var txtSearch = $("#SearchNoGoodsBarcode").val();
        GetNoGoodsBarcode(null,null,txtSearch);
    }
});

$(document).on("click", "#btn-SearchNoGoodsBarcode", function () {
    var txtSearch = $("#SearchNoGoodsBarcode").val();
    GetNoGoodsBarcode(null,null,txtSearch);
});