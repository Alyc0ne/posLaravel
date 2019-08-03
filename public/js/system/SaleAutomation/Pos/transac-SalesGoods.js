var transacSalesGoods = new setTransac();

$(document).ready(function () {
    transacSalesGoods.init();
});

var GrandTotal = 0;
var sub_total = 0;
var arr_Data = new Array();
function setTransac() {
    var _t = this;
    _t.Name = "Sell-PageRight";
    _t.Element = null;
    _t.init = function(){
        _t.htmlControl.getElement();
        _t.htmlControl.genGrid();
        //11
    };

    _t.htmlControl = {
        getElement: function () {
            _t.Element = $("#" + _t.Name);
            return _t.Element;
        },
        genGrid: function () {
            var Rightbox = $('<div class="row" style="height:100%!important;"></div>');
            var gridStart = $('<div id="gridStart" style="width:100%;"></div>');
            //gridStart.append("<div class='col-12 transacgrid_h box_shadow'><i class='m-r-10 mdi mdi-cart-outline text_white'></i><span class='text_white'>สินค้าในตะกร้า</span></div>");  
            
            var transac_d = "<div class='col-12 p_a5 transacgrid_d' id='transac-body'>";
            transac_d += "<table class='table'>";
            transac_d += "<thead style='background-color: #fafafa;'>";
            transac_d += "<tr><th>Name</th><th>Qty</th><th>Price</th></tr>";
            transac_d += "</thead>";
            transac_d += "<tbody></tbody>";
            transac_d += "</table>";
            transac_d += "</div>";

            gridStart.append(transac_d);

            var gridEnd = $('<div id="gridEnd" style="width:100%;border-top:solid 1px #e3e6f0; padding:4px;"></div>');
            // var TotalSummary = "<div style='height:20%;width:100%'>";
            // TotalSummary += "<input type='text' class='wh100 text-center p_a15' id='sub_total' name='sub_total' disabled>";
            // TotalSummary += "</div>"
            //var table = "<table style='width:100%;margin:7px;color:black;'>";
            //table += "<tr style='width:100%;'><td class='transacgrid_f' style='width:30%;'>รวมเงิน</td><td style='width:65%;'><input type='text' class='w-100 float-right text-right m_r15' id='sub_total' name='sub_total' value='' disabled></td></tr>";
            //table += "<tr style='width:100%;'><td class='transacgrid_f'>ส่วนลด</td><td><input type='text' class='w-100 float-right text-right _number m_r15' id='discount' name='discount' value=''></td></tr>";  
            //table += "<tr style='width:100%;'><td class='transacgrid_f'>จำนวนเงินทั้งสิ้น</td><td><input type='text' class='w-100 float-right text-right m_r15' id='totalPrice' name='totalPrice' value='' disabled></td></tr>";  
            //table += "</table>";
            //gridEnd.append(TotalSummary);
            
            // gridEnd.append("<div class='w-100></div>");
            // gridEnd.append("<button class='btn btn-success w_60 p-3 m_r10' id='SaveInvoice'>จ่ายชำระ (F1)</button>");
            // gridEnd.append("<button class='btn btn btn-warning w_37 p-3' onclick='javascript:SaveInvoice();'>แบบร่าง (F2)</button>");
            
            // gridStart.append(gridEnd);
            // Rightbox.append(gridStart);
            // _t.Element.append(Rightbox);
            //$("#Sell-PageLeft").append(LeftBox);
        }
    };
    _t.gridControl = {
        getData_uid: function (uid){
            if(uid != null || uid != ""){
                var GoodDetail = _t.Element.find("#transac-body #GoodDetail[data-uid='" + uid +  "']");
                var GoodsQty = GoodDetail.children()[0].textContent;
                if (GoodsQty > 1) {
                    var GoodsPrce = GoodDetail.children()[3].textContent;
                    var obj = {
                        GoodsQty: GoodsQty,
                        GoodsName:GoodDetail.children()[1].textContent,
                        GoodsPrice:GoodsPrce/GoodsQty,
                    }
                }else{
                    var obj = {
                        GoodsQty: GoodsQty,
                        GoodsName:GoodDetail.children()[1].textContent,
                        GoodsPrice:GoodDetail.children()[3].textContent,
                    }
                }

                return obj;
            }
        },
        addData: function (DataGoods,QtyBarcode) { //QtyBarcode : Number Of Goods
            var _t_body = _t.Element.find('#transac-body');
            var uid = RandomMath();
            var TotalAmnt = DataGoods.GoodsPrice * QtyBarcode;
            //var PricePerGoods = QtyBarcode > 1 ? "@" + String(numberWithCommas(parseFloat(DataGoods.GoodsPrice).toFixed(2))) : "";
            var Goods = $('<tr id="GoodDetail" data-uid="' + uid + '"></tr>');
            Goods.append('<td>' + DataGoods.GoodsName + '</td>');
            Goods.append('<td>' + QtyBarcode + '</td>');
            Goods.append('<td>' + numberWithCommas(parseFloat(TotalAmnt).toFixed(2)) + '</td>');
            // var PricePerGoods = "@" + String(numberWithCommas(parseFloat(DataGoods.GoodsPrice).toFixed(2)));
            // var Goods = $('<div class="transacgrid_data box_shadow" id="GoodDetail" data-uid="' + uid + '"></div>');
            // Goods.append("<div class='w_60 float-left text-left text-ellipsis' alt = '" + DataGoods.GoodsName + "'><span>" + DataGoods.GoodsName + "</span></div>");
            // Goods.append("<div class='w_10 float-left text-center box-highlight'><span class='w_100 h_0 text-center' name='GoodsQty'>"  + QtyBarcode + "</span></div>");
            
            //Goods.append("<div class='w_20 float-left text-right'><span id='PricePerGoods' style='display:inline-block;'>"  + PricePerGoods + "</span></div>");
            // Goods.append("<div class='w_20 float-left text-right'><span id='TotalAmnt'>" + numberWithCommas(parseFloat(TotalAmnt).toFixed(2)) + "</span></div>");
            // Goods.append("<div class='w_10 float-left text-right'><button type='button' class='btn btn-danger' style='font-size:4px;'>Delete</button><input type='hidden' value='" + uid + "'></div>");
            //Goods.append("<div class='w_10 float-left text-right'><img id='RemoveGoods' src='" + base_url + "extensions/images/icon/delete_16_red.png' class='p_b2 pointer'><input type='hidden' value='" + uid + "'></div>");
            _t_body.append(Goods);
            arr_Data.push({
                uid : uid,
                GoodsBarcode : DataGoods.GoodsBarcode,
                GoodsID : DataGoods.GoodsID,
                GoodsNo : DataGoods.GoodsNo,
                GoodsName : DataGoods.GoodsName,
                GoodsQty : QtyBarcode,
                GoodsPrice : DataGoods.GoodsPrice,
                TotalAmnt : TotalAmnt
            });
            var sumPrice = QtyBarcode * DataGoods.GoodsPrice;
            return sumPrice;
        },
        clearData: function () {
            arr_Data = [];
            var _t_body = _t.Element.find('#transac-body')
            _t_body.html("");

            $("#sub_total").val("");
        },
        calSummary: function (plus,GoodsPrice,Discount) {
            if (GoodsPrice != null || GoodsPrice != "" || GoodsPrice != 0 || typeof GoodsPrice == "undefined") {
                if(plus){
                    GrandTotal += GoodsPrice;
                    sub_total += GoodsPrice;
                }else{
                    GrandTotal -= GoodsPrice;
                    sub_total -= GoodsPrice;
                }
            }
        
            if (Discount != null && Discount != "" && Discount != 0 && typeof Discount != "undefined") {
                if (Discount.indexOf('%') >= 0) {
                    var dis = Discount.split('%');
                    var sumDis = (GrandTotal * dis) / 100;
                    GrandTotal = sumDis;
                }else{
                    GrandTotal -= Discount;
                }
            }else{
                $("#totalPrice").val(); 
            }

            $("#sub_total").val(numberWithCommas(sub_total.toFixed(2)));
            $("#totalPrice").val(numberWithCommas(GrandTotal.toFixed(2))); 
            
        },
        removeGoods: function (uid){
            var index = arr_Data.map(x => {
                return x.uid;
            }).indexOf(uid);
            arr_Data.splice(index,1);

            var GoodDetail = _t.Element.find("#transac-body #GoodDetail[data-uid='" + uid +  "']");
            var dataOneRow = _t.gridControl.getData_uid(uid);
            var GoodsPrice = parseFloat(dataOneRow.GoodsQty) * parseFloat(dataOneRow.GoodsPrice.toString().replace(/,/g, ''));
            _t.gridControl.calSummary(false,GoodsPrice);
            GoodDetail.remove();
        },
        countGoodsTransac: function () {
            var tGrid = _t.Element.find("#transac-body #GoodDetail");
            return tGrid.length;
        },
        selectDataGrid: function (){
            return arr_Data;
        },
        updateGoodsByIndex: function (uid,GoodsPrice,GoodsBarcode) {
            var Goods = _t.gridControl.selectDataGrid();
            if (Goods.length != 0) {
                var index = Goods.findIndex((x => x.uid == uid));
                if (index != null) {
                    var Old_qty = Goods[index].GoodsQty;
                    Goods[index].GoodsQty = parseFloat(Old_qty) + parseFloat(GoodsBarcode);
                    var ThisGoodsPrice = GoodsPrice * GoodsBarcode; //Goods Price This Goods!!
                    var PricePerGoods = "@" + String(numberWithCommas(parseFloat(GoodsPrice).toFixed(2)));
                    Goods[index].GoodsPrice = parseFloat(ThisGoodsPrice) + parseFloat(Goods[index].GoodsPrice); //Last GoodsPrice Atfer Update

                    _t.Element.find("#transac-body #GoodDetail[data-uid='" + uid +  "']").children().eq(0).html("<span class='w_100 h_0 text-center box-highlight' name='GoodsQty'>"  + Goods[index].GoodsQty + "</span>");
                    _t.Element.find("#transac-body #GoodDetail[data-uid='" + uid +  "']").children().eq(2).html("<span id='PricePerGoods' style='display:inline-block;'>"  + PricePerGoods + "</span>");
                    _t.Element.find("#transac-body #GoodDetail[data-uid='" + uid +  "']").children().eq(3).html("<span id='GoodsPrice'>" + numberWithCommas(Goods[index].GoodsPrice.toFixed(2)) + "</span>");
                    _t.gridControl.calSummary(true,ThisGoodsPrice);
                }
            }
        }
    };
};