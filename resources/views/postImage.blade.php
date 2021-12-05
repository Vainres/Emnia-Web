<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    @include('layout.menu')
    <div class="container">
    <form action="{{env('APP_URL'). 'api/uploadImage'}}" method="POST" id="form_post_product" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <div class='preview'>
                <img src="" id="img" width="100" height="100">
            </div>
            <input type="text" name="name">
            <input type="text" name="detail">
            <input type="submit" value="Đăng ảnh">
        </form>
    </div>

            <script>
                    $(document).ready(function(){
    $("#form_post_product").submit(function(e){
    e.preventDefault(); 
    var fd = new FormData(this);
    var files = $('#image')[0].files;
    var url = $(this).attr('action');
    // Check file selected or not
    if(files.length > 0 ){
       fd.append('file',files[0]);
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
            alert(data);
            const img='https://emnia.test'+data.image.image;
            // console.log(); // show response from the php script.
            $("#img").attr("src",img); 
            $(".preview img").show(); 
        }
    });
});

});
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
            </script>
</body>

</html>