var navLink_Click = "";
var path_link = "";

$(document).ready(function () {
    var SystemName = CheckSystemName();
    genMenuRight(SystemName); 
});

function genMenuRight(SystemName) {
    var contentHtml = "";

    switch (SystemName) {
        case "Goods":
            contentHtml += "<button type='button' class='btn btn-success' onclick='javascript:ShowModalGoods();'>New Goods</button>"
            break;
    
        default:
            break;
    }
    
    $("#menuRight").html(contentHtml);
}

function GetPath() {
    var pathArray = window.location.pathname.split('/');
    return pathArray;
}

function CheckSystemName() {
    return $("#SystemName").val();
}

$(document).ready(function () {
   var getHeight = $(window).height();
   //Set posRightBox
   $(".posRightBox").css('height', (getHeight - 100) + 'px');
});

$(document).on("keypress", "._number", function(e) {
    // data length validate
    // Length | Num | Decimal | Comma | Dot
    //   14   |  9  |    2    |   2   | 1
    //   22   |  15 |    2    |   4   | 1

    var t = $(this);
    var value = t.val();
    if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode == 46) {
        return true;
    } else {
        if ($(this).hasClass("_numzero") && e.keyCode == 45) {
            return true;
        } else {
            return false;
        }
    }
    if ((e.shiftKey || (e.keyCode < 46 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode != 110) {
        return false;
        e.preventDefault();
    }
});

// $(document).on('keypress', function(e) {
//     if ( e.key == 122) 
//         alert(Kuy);
// });

// document.body.addEventListener("keydown",function(e){
//     e = e || window.event;
//     var key = e.which || e.keyCode; // keyCode detection
//     var ctrl = e.ctrlKey ? e.ctrlKey : ((key === 17) ? true : false); // ctrl detection

//     if ( key == 122 ) {
//         console.log("F11 !");
//     } else if ( key == 67 && ctrl ) {
//         console.log("Ctrl + C Pressed !");
//     }

// },false);

function doc_keyUp(e) {
    e.preventDefault;
    // this would test for whichever key is 40 and the ctrl key at the same time
    if (e.keyCode == 122) {
        // call your function to do the thing
        alert("key");
        
    }
}
// register the handler 
document.addEventListener('keyup', function (e) {
    // this would test for whichever key is 40 and the ctrl key at the same time
    if (CheckSystemName() == "POS") {
        if (e.keyCode == 122) {
            // call your function to do the thing
            //alert("key");
            return false;
            
        }
    } 
}, false);

$(document).on("keydown",function(e){
    if(e.keyCode===112) return false
    
    //Stop Helper Chorme (F1)
})

document.addEventListener('keyup', function (e) {
    if (CheckSystemName() == "POS") {
        if (e.keyCode == 112) {
            // call your function to do the thing
            Confirm_POS();

            return false;
        }
    }
}, false);

document.addEventListener('keyup', function (e) {
    if (CheckSystemName() == "POS") {
        if (e.keyCode == 113) {
            // call your function to do the thing
            SaveInvoice(true);

            return false;
        }
    }
}, false);

$(document).on("keydown",function(e){
    if(e.keyCode===122) return false
    
    //Stop FullScreen (F12)
})

// $(document).on("click", ".nav-link", function () {
//     openloading(true);
//     var ID = this.getAttribute('aria-controls');
//     setTimeout(function(){ 
//         $("#right-page #v-pills-tabContent").find("div.active").removeClass("show active");
//         $("#right-page #v-pills-tabContent").find("div#" + ID).addClass("show active");
//         openloading(false);
//     }, 1000);         
// });

$(document).on("blur", "._number", function(e) {
    var t = $(this);
    var value = t.val();
    if (value != "") {
        var nDecimal = parseFloat(value).toFixed(2);
        var form_id = this.id;
        $('#' + form_id).val(nDecimal);
    }
});

function openloading(isLoad) {
    if (isLoad != null && isLoad != undefined) {
        if (isLoad) {
            $(".window-overlay").css('display','block');
        } else {
            $(".window-overlay").css('display','none');
        }
    }
}

function bindValidate(frm) {
    var IsResult = true;
    if ($(frm).length > 0) {
        $(frm).find("div.ErrorValidate").remove();
        $(frm).find("input.border_red").removeClass("border_red");
        var tab = [];
        var frmControl = $(frm + " .require").parent();
        $.each(frmControl, function(i, e) {
            var valResult = true;
            var el = $(e).find("input[type=text],input[type=password], select, textarea");
            if (($(frm).closest(".modal").length == 0 && el.closest(".modal").length == 0) || $(frm).closest(".modal").length > 0) { //check is form = modal

                if (el.length > 0) {
                    el.each(function() {
                        if (!!$(this).attr("name") && $(this).attr("name") != "TitleNameEnumID") {
                            var dis = $(this).prop('disabled');
                            var visible = $(this).is(":visible");
                            if (!dis) {
                                if (visible) {
                                    var textsVal = $(this).val();
                                    if (!textsVal) {
                                        valResult = false;
                                    }
                                }
                            }
                            if (visible) {
                                var textsVal = $(this).val();
                                if (!dis) {
                                    if (!textsVal) {
                                        valResult = false;
                                    }
                                }
                            } else {
                                var textsVal = $(this).val();
                                if (!dis) {
                                    if (!textsVal) {
                                        valResult = false;
                                    }
                                }
                            }
                        }
                    });
                }
                if (!valResult) {
                    $(this).find("input[type=text],input[type=password], select, textarea").eq(0).addClass("border_red");
                    $(this).find("input[type=text],input[type=password], select, textarea").eq(0).parent().find("div.ErrorValidate").remove();
                    $(this).find("input[type=text],input[type=password], select:not('#TitleNameEnumID'), textarea").eq(0).parent().append("<div class='ErrorValidate'><label class='ErrorValidate'>กรุณากรอกข้อมูล</label></div>");
                }
            }
        });

        var checkError = $(frm).find("div.ErrorValidate").length;
        if (checkError > 0) {
            var IsResult = false;
        }
    }
    return IsResult;

}
/*---------------Messenger Alert----------------*/
// Messenger.options = {
//     extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
//     theme: 'air'
// }

// function HideMsg() {
//     Messenger().hideAll();
// }

// function PostMsgSuccess(msg) {
//     Messenger().hideAll();
//     Messenger().post({
//         //     id: 'success-post-msg',
//         message: msg,
//         //     type: 'success',
//         hideAfter: 2,
//         //     hideOnNavigate: true
//     });
// }

function GenData(system) {
    var Running = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "./GenData",
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify({System: "Goods"}),
        contentType: 'application/json; charset=utf-8',
        //async: false,
        success: function(e) {
            Running = e.RunningNumber;
            switch (system) {
                case "Goods":
                    $("#GoodsNo").val(Running);
                    $("#tempGoodsNo").val(Running);
                    $("#GoodsName").focus();
                    $("#GoodsModal").modal();
                    break;
                default:
                    break;
            }
            openloading(false);
        },
        error: function(e) {
            //openloading(false);
        }
    });
    return Running;
}

function GetDataJson(system, idSelect2 = null) {
    var Result = "";
    $.ajax({
        type: 'POST',
        url: base_url + "Base/BaseController/GetDataJson",
        data: { "System": system },
        dataType: "json",
        traditional: true,
        async: false,
        success: function(e) {
            //Result = JSON.parse(e);
            if (idSelect2 != null) { SetDataSelect2(e, idSelect2) }
        },
        error: function(e) {
            //openloading(false);
        }
    });
    return Result;
}

function setUnitGoods(Unit) {
    SetDataSelect2(Unit, "#GoodsUnit")
}

function SetDataSelect2(arr, name) {
    var data = [];
    var item = {};
    for (var i = 0; i < arr.length; i++) {
        item = {
            id: arr[i].UnitID,
            text: arr[i].UnitName
        };
        data.push(item);
    }

    var ID = $(name);
    ID.select2({
        data: data
    })
}

function checkDataTable(system) {
    var result = false;
    $.ajax({
        type: 'POST',
        url: base_url + "Base/BaseController/checkDataTable",
        data: {
            "System": system
        },
        datatype: "json",
        traditional: true,
        async: false,
        success: function(e) {
            var txtAlert = "";
            if (e > 0) {
                result = true;
            } else {
                switch (system) {
                    case "Unit":
                        txtAlert = "<img src='" + base_url + "extensions/images/icon/trolley.png'><h3 class='text-center text-red'>กรุณากำหนดหน่วยนับสินค้าก่อน!</h3>";
                    break;
                    default:
                        break;
                }
                AlertModal(txtAlert);
                openloading(false);
            }
        },
        error: function(e) {
            openloading(false);
        }
    });
    return result;
}

function getFirstPath() {
    var first = $(location).attr('pathname');

    first.indexOf(1);

    first.toLowerCase();

    first = first.split("/")[1];

    return first;
}

function clearModal(name) {
    var ID = $(name);
    ID.on('hidden.bs.modal', function(e) {
        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    })
}

function PathLink(system) {
    var url = "";
    switch (system) {
        case "Goods":
            url = "Goods/GoodsController/index";
            break;
    }
    $.ajax({
        type: 'POST',
        url: base_url + url,
        data: {
            "System": system
        },
        datatype: "json",
        traditional: true,
        async: false,
        success: function(e) {
            console.log("KIKI");
        },
        error: function(e) {

        }
    })
}

function RandomMath() {
    function s4() {
      return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

function AlertModal(AlertText) {
    $("#AlertModal").modal();
    //$("#Alert-body-img").html(AlertIcon);
    $("#Alert-body").html(AlertText);
}

function Confirm_POS() {
    openloading(true);
    var GridGoods = transacSalesGoods.gridControl.selectDataGrid().length;
    if (GridGoods > 0) {
        $("#Confrim_POS").modal();
        var TotalAmnt = $("#sub_total").val();
        $("#Confrim_POS").find("#TotalAmnt").val(TotalAmnt)
    }else{
        var txtAlert = "<h3 class='text-center text-red float-left'>กรุณาเลือกสินค้า !</h3>";
        AlertModal(txtAlert);
    }
    openloading(false);
}

function callImages(type) {
    switch (type) {
        case cart: base_url + "";
            
            break;
    
        default:
            break;
    }
}

function CheckPage() {
    return $("#PageSystem").val();
}


/*############################# Modal #############################*/

//Goods
function ShowModalGoods() {
    openloading(true);
    GenData("Goods");
    //setUnitGoods(result.Unit[0]);
}

function SaveGoodsModal() {
    if (bindValidate("#frmGoods")){
        openloading(true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "./BindSaveGoods",
            data: 
            JSON.stringify({
                "GoodsNo" : $("#GoodsNo").val(),
                "IsBarcode" : $("#IsBarcode:checkbox:checked").length,
                "GoodsBarcode" : $("#GoodsBarcode").val(),
                "GoodsName" : $("#GoodsName").val(),
                "GoodsPrice" : $("#GoodsPrice").val(),
                "GoodsCost" : $("#GoodsCost").val(),
                "GoodsUnitID" : $("#GoodsUnit").val()
            }),
            datatype: "json",
            traditional: true,
            success: function (e) {
                if (e) {
                    openloading(false);
                    clearModal("#frmGoods");
                    $("#GoodsModal").modal('toggle');
                }
            },
            error: function (e) {
                openloading(false);
            }
        });
    }
}

$("#formGoods").on('submit', function (e) {
    e.preventDefault();
    openloading(true);
    $.ajax({
        type: "POST",
        url: "./BindSaveGoods",
        data: $("#formGoods").serialize(),
        success: function (response) {
            console.log(response);
            if (response) {
                refreshListData('Goods');
                $("#GoodsModal").modal('toggle');
                clearModal("#frmGoods");
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

function refreshListData(system) {
    var urlPath = "";
    switch (system) {
        case "Goods":
            urlPath = "refreshGoods";
            break;
    
        default:
            break;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: urlPath,
        datatype: "json",
        traditional: true,
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

$('#GoodsModal').on('hidden.bs.modal', function (e) {
    console.log("kuy");
});

// $('#GoodsModal').modal({backdrop: 'static', keyboard: false}) ;

