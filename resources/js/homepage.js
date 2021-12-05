function hrefCall() {
    document.getElementById('GoToHref').click();
}

function triggerMe() {
    var DelayhrefCall;
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
    DelayhrefCall = window.setTimeout(hrefCall, 2000);
    //500 millisecond delay, change time as desired
}