<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{env('APP_URL').'css/user.css'}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    @include('layout.menu')
    <div class="content-box">
            <div class="content">
                <!-- <p style="margin-left: 20px;">Cập nhật Avatar</p> -->
                <div class="user-avatar-box">
                    
                    <div class="user-avatar">
                            <img src="{{env('URL').$author->avatar}}" alt="" id="image" width="170" height="170" >
                        
                        
                    </div>
                </div>
                

                <div class="info-box">
                    <div class="info">
                        
                        <div class="user-info-box">
                            <ul class="user-info-detail">
                            <p class="user-info">Thông tin người dùng : </p>
                                <li class="info-detail" >Email :<b><span id="email">{{$author->email}}</span></b></li>
                                <li class="info-detail" >Họ và tên :<b><span id="name">{{$author->name}}</span></b></li>
                                <li class="info-detail" >Số điện thoại :<b><span id="phone">{{$author->phone}}</span></b></li>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
</body>
</html>