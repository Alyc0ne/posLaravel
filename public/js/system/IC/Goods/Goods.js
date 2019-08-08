// var TempDataNoGoodsBarcode = null;
// let TempGoodsIDNoGoodsBarcode = new Array();
// var TempTableData = null;
// let numClick = 0;

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


// // $(document).ready(function() {
// //     $('.js-example-basic-single').select2();

// //     $("#GoodsUnitName").change(function () {
        
// //     });

// //     if (CheckPage() == "ListGoods") {
// //         //ListGoods();
// //     }   
// // });

// function ListGoods(page) {
//     $.ajax({
//         type: 'POST',
//         url: base_url + "Goods/GoodsController/ListGoods",
//         data: {
//             page : page,
//         },
//         dataType: "json",
//         traditional: true,
//         success: function (e) {
//             TempDataNoGoodsBarcode = e.GoodsData;
//             TempTableData = e.TableData;
//             $(".ListGoods_body").html("");
//             $(".ListGoods_body").append(e.TableData);
//             $(".pageListGood").html("");
//             var pagination = "";
//             if (page > 1) 
//                 pagination += "<a href='#' class='page-item' id=" + ($i - 1) + ">Previous</a>";

//             for ($i=0; $i < e.PageData; $i++) { 
//                 if (($i+1) == page) {
//                     pagination += "<a href='#' class='page-item page-item_hover' id=" + ($i + 1) + ">" + ($i + 1) + "</a>";
//                 }else{
//                     if ($i == 0) {
//                         if (typeof page == 'undefined') {
//                             pagination += "<a href='#' class='page-item page-item_hover' id=" + ($i + 1) + ">" + ($i + 1) + "</a>";
//                         }else{
//                             pagination += "<a href='#' class='page-item' id=" + ($i + 1) + ">" + ($i + 1) + "</a>";
//                         }
//                     }else{
//                         pagination += "<a href='#' class='page-item' id=" + ($i + 1) + ">" + ($i + 1) + "</a>";
//                     }
//                 }

//                 if (e.PageData > 1) 
//                     if ($i == (e.PageData - 1)) 
//                         if (page != e.PageData) 
//                             pagination += "<a href='#' class='page-item' id=" + ($i + 1) + ">Next</a>";
//             }

//             if (page == null) {
//                 $(".page-item#1").addClass('page-item_hover');
//             }

//             $('.pageListGood').append(pagination);
//         },
//         error: function (e) {
//             //openloading(false);
//         }
//     });
// }

// $(document).on('click', '.page-item', function(){  
//     var page = $(this).attr("id");  
//     ListGoods(page);  
// });  

// function GetGoods(page) {
//     $.ajax({
//         type: 'POST',
//         url: base_url + "Goods/GoodsController/index",
//         data: {
//             page : page,
//         },
//         dataType: "json",
//         traditional: true,
//         success: function (e) {
//             TempDataNoGoodsBarcode = e.GoodsData;
//             $(".table-responsive").html("");
//             $(".page").html("");
//             $(".table-responsive").append(e.TableData);

//             var pagination = '<nav aria-label="...">';
//             pagination += '<ul class="pagination  justify-content-center">';
//             pagination += '<li class="page-item disabled">';
//             pagination += '<a class="page-link" href="#" tabindex="-1">Previous</a>';
//             pagination += '</li>';

//             for (let c = 0; c < e.PageData; c++) {
//                 var numPage = c+1;
//                 pagination += '<li class="page-item"><a class="NoBarcode_Page-link" id=' + numPage + ' href="#">' + numPage + '</a></li>';
//             }
            
//             if (e.PageData > page) {
//                 pagination += '<li class="page-item">';
//                 pagination += '<a class="page-link" href="#" id=' + page + 1 + '>Next</a>';
//                 pagination += '</li>';
//             }
            
//             pagination += ' </nav>';
//             $('.page').append(pagination);
//         },
//         error: function (e) {
//             //openloading(false);
//         }
//     });
// }

// function EditGoods($id) {
//     $.ajax({
//         type: 'POST',
//         url: base_url + "Goods/GoodsController/GetGoodsDetail",
//         data: {
//             page : page,
//         },
//         dataType: "json",
//         traditional: true,
//         success: function (e) {
//             $("#GoodsModal").modal();
            
//         },
//         error: function (e) {
//             //openloading(false);
//         }
//     });
// }