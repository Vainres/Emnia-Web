$(document).ready(function() {
    $('#resetform').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: data,
            processData: false,
            contentType: false,
            success: function(data) {
                alert(data);
            }
        });
    })
})