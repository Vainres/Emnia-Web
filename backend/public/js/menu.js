function hrefCall() {
    document.getElementById('GoToHref').click();
}
$(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
        return false;
    }
});
$(document).on("contextmenu", function(e) {
    e.preventDefault();
});

// set debugger
setInterval(function() {
    debugger;
}, 50);

function triggerMe() {
    var DelayhrefCall;
    var cookies = document.cookie.split(";");
    console.log(cookies);
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT" + "; path=/";
    }
    DelayhrefCall = window.setTimeout(hrefCall, 2000);
    //500 millisecond delay, change time as desired
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
$(document).ready(function() {
    $('#searchForm').one('submit', function(e) {
        e.preventDefault();
        const Value = $('#searchForm').attr('action');
        const inputNow = $('#search').val();
        const searchValue = Value + inputNow + "/1";
        $('#searchForm').attr('action', searchValue);
        $(this).submit();
    })
    $.ajax({
        type: "GET",
        beforeSend: function(request) {
            request.setRequestHeader("Authorization", getCookie('Authorization'));
        },
        url: '/api/user',
        processData: false,
        contentType: false,
        success: function(user) {
            // const d = new Date();
            // d.setTime(d.getTime() + (60 * 60 * 1000));
            // let expires = "expires=" + d.toUTCString();
            $('#menuImage').attr('src', user.avatar);
            // document.cookie = '"avatar=' + user.avatar + ";" + expires + ";path=/";
            $('#menuName').html(user.name);
            // document.cookie = '"name=' + user.name + ";" + expires + ";path=/";

        }
    });
});