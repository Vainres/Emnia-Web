$(document).ready(function() {
    if (getCookie('Authorization') != "") {
        $.ajax({
            type: "GET",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: '/api' + window.location.pathname + '/favorite',
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.length == 1) {
                    $('#unFavorite').attr('action', '/api/deleteFavorite/' + data[0].id);
                    $("#unfavorite").attr('class', 'submit');
                } else {
                    $("#follow").attr('class', 'submit');

                }
            }
        });
    }

    $('#addFavorite').submit(function(e) {
        e.preventDefault();
        url = $(this).attr('action');
        $.ajax({
            type: "GET",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: url,
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Đã yêu thích");
                $('#resetpage').click();

            },

        });
    });

    $('#unFavorite').submit(function(e) {
        e.preventDefault();
        url = $(this).attr('action');
        $.ajax({
            type: "GET",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: url,
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Đã hủy yêu thích");
                $('#resetpage').click();
            }
        });
    });

    $('#commentForm').submit(function(e) {
        e.preventDefault();
        const data = new FormData(this);
        console.log(data);
        url = $(this).attr('action');
        $.ajax({
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: url,
            data: data, // serializes the form's elements.
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Comment thành công");
                $('#resetpage').click();
            }
        });
    })

    $('.deleteComment').submit(function(e) {
        e.preventDefault();
        url = $(this).attr('action');
        console.log(url);
        $.ajax({
            type: "GET",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", getCookie('Authorization'));
            },
            url: url,
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Xóa comment thành công");
                $('#resetpage').click();
            }
        });
    });
});