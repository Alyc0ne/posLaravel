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
        case "Unit":
            contentHtml += "<button type='button' class='btn btn-success' onclick='javascript:ShowModalUnit();'>New Unit</button>"
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

$(document).on('blur', 'input[type=text]' ,function () {
    $(this).removeClass();
});

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
        data: JSON.stringify({System: system}),
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
                    SetDataSelect2(e.Unit, "unitGoods")
                    break;
                case "Unit":
                    $("#UnitNo").val(Running);
                    $("#tempUnitNo").val(Running);
                    $("#UnitName").focus();
                    $("#UnitModal").modal();
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

function SetDataSelect2(arr, className) {
    var data = [];
    var item = {};
    for (var i = 0; i < arr.length; i++) {
        item = {
            id: arr[i].UnitID,
            text: arr[i].UnitName
        };
        data.push(item);
    }

    var className = $('.' + className);
    className.select2({
        data: data
    })
}

function getFirstPath() {
    var first = $(location).attr('pathname');

    first.indexOf(1);

    first.toLowerCase();

    first = first.split("/")[1];

    return first;
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

function refreshListData(system) {
    var urlPath = "";
    var classContent = "";
    switch (system) {
        case "Goods":
            urlPath = "refreshGoods";classContent = "contentGoods";
            break;
        case "Unit":
            urlPath = "refreshUnit";classContent = "contentUnit";
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
                $("." + classContent).html(e);
                openloading(false);
            }
        },
        error: function (e) {
            openloading(false);
        }
    });
}

/*############################# Modal #############################*/
$(document).on('shown.bs.modal', '.modalInsert', function() {
    $(this).find('input.inputFocus').trigger('focus');
});

$(document).on('hidden.bs.modal', '.modalInsert', function (e) {
    var ID = $(this).attr('id');
    clearModal(ID);
});

function clearModal(modalID) {
    $(modalID)
        .find("input,textarea,select")
            .val('')
            .end()
        .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
}


//Goods
function ShowModalGoods() {
    openloading(true);
    GenData("Goods");
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

$(document).on('submit', "#formGoods", function (e) {
    e.preventDefault();
    if (bindValidate("#frmGoods")){
        openloading(true);
        $.ajax({
            type: "POST",
            url: "./BindSaveGoods",
            data: $("#formGoods").serialize(),
            success: function (response) {
                console.log(response);
                if (response) {
                    refreshListData('Goods');
                    AlertStatus('success','บันทึกข้อมูลสินค้าเรียบร้อย !');
                    $("#GoodsModal").modal('toggle');
                    clearModal("#GoodsModal");
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});

//Unit
function ShowModalUnit() {
    openloading(true);
    GenData("Unit");
}

$(document).on('submit', "#formUnit", function (e) {
    e.preventDefault();
    openloading(true);
    $.ajax({
        type: "POST",
        url: "./BindSaveUnit",
        data: $("#formUnit").serialize(),
        success: function (response) {
            console.log(response);
            if (response) {
                refreshListData('Unit');
                $("#UnitModal").modal('toggle');
                clearModal("#UnitModal");
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

function AlertStatus(status,txt) {
    /*
        status : success,error
    */

   var type = 'bottom-right';

   //$('.notify').removeClass().addClass('notify hide');
   
   $('.notify')
     .removeClass()
     .attr('data-notification-status', status)
     .addClass(type + ' notify')
     .addClass('do-show')
     .html(txt); 

    setTimeout(function(){ 
        $('.notify').removeClass().addClass('notify hide');
    }, 4000);
}