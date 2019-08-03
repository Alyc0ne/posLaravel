$(document).ready(function () {
    $(".sidebar-top-level-items>li").each(function() {
        var navItem = $(this);
        if (navItem.find("a").attr("href") == location.href) {
          navItem.addClass("active");
        }
    });
});

$(document).on("click", ".toggle-mobile-nav", function () {
    $(".nav-sidebar").addClass('navbar-open');
    $('.mobile-overlay').addClass('mobile-nav-open');
});

$(document).on("click", ".mobile-overlay", function () {
    $(".nav-sidebar").removeClass('navbar-open');
    $('.mobile-overlay').removeClass('mobile-nav-open');
});

// $(document).on("click", "ul.sidebar-top-level-items li", function () {
//     $(this).closest("ul").find("li.active").removeClass("active");
//     $(this).addClass("active");
// });

function setCookieOneYear(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getDate() + 1);
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}

function GetLastPath(url) {
    var n = url.lastIndexOf('/');
    return result = url.substring(n + 1);
}