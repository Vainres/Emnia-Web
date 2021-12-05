$(document).ready(function() {
    $.ajax({
        type: "GET",
        beforeSend: function(request) {
            request.setRequestHeader("Authorization", getCookie('Authorization'));
        },
        url: '/api/favorite',
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data);
            for (i = 0; i < data.length; i++) {
                const scalebox = $(document.createElement('div')).addClass('scalebox');
                $('.main').append(scalebox);
            }
        },

    });
});