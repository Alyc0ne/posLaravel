$(document).on("click", "#IsBarcode", function () {
    var IsBarcode = $("#IsBarcode:checkbox:checked").length;
    if (IsBarcode > 0) {
        $("#GoodsBarcode").prop("disabled",false);
        $("input[name=IsBarcode]").val('1');
        $("#GoodsBarcode").closest("div.form-group").find("span.text-red").html("*");
    }else{
        $("#GoodsBarcode").prop("disabled",true);
        $("input[name=IsBarcode]").val('0');
        $("#GoodsBarcode").closest("div.form-group").find("span.text-red").html("");
    }
});

$(document).on('click', '.pagination a', function(event){  
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_Goods(page)
});  

function fetch_Goods(page) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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