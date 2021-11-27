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

$(document).ready(function() {
    $.ajax({
        type: "GET",
        beforeSend: function(request) {
            request.setRequestHeader("Authorization", getCookie('Authorization'));
        },
        url: 'https://emnia.test/api/user',
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