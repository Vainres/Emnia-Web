<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/user.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function chooseFile(fileInput){
            if(fileInput.files && fileInput.files[0]){
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</head>
<body>
    @include('layout.menu')
    <div class="content-box">
            <div class="content">
                <!-- <p style="margin-left: 20px;">Cập nhật Avatar</p> -->
                <div class="user-avatar-box">
                    
                    <div class="user-avatar">
                        <form action="{{env('APP_URL').'api/uploadAvatar'}}" id="updateAvatar" method="POST">
                            <img src="{{$_COOKIE['avatar'] }}" alt="" id="image" width="170" height="170" >
                            <input type="file" name="image" id="imageFile" onchange="chooseFile(this)"
                            accept="image/gif,image/jpeg,image/png"> 
                            <input type="submit" value="Cập nhật">
                        </form>
                        
                    </div>
                </div>
                

                <div class="info-box">
                    <div class="info">
                        
                        <div class="user-info-box">
                            <ul class="user-info-detail">
                            <p class="user-info">Thông tin người dùng : </p>
                                <li class="info-detail" >Email :<b><span id="email"></span></b></li>
                                <li class="info-detail" >Họ và tên :<b><span id="name"></span></b></li>
                                <li class="info-detail" >Số điện thoại :<b><span id="phone"></span></b></li>
                                <li class="info-detail" >Đã xác nhận email :<b><span id="active"></span></b></li>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
    <script src="{{URL::asset('/js/user.js')}}"></script>
</body>
</html>