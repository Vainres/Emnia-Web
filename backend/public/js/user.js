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
            $('#email').html(user.email);
            $('#name').html(user.name);
            $('#phone').html(user.phone);
        }
    });


    $("#updateAvatar").submit(function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        var files = $('#imageFile')[0].files;
        var url = $(this).attr('action');
        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);
        }
        console.log(fd);
        $.ajax({
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: url,
            data: fd, // serializes the form's elements.
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Update thành công");
                setCookie('avatar', data, 1);
            }
        });
    });
});

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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