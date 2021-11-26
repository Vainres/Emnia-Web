@if(isset($Authorization))
        {{$a=setcookie("Authorization", $Authorization, time()+3600)}}
            {{$a=setcookie("name", $user->name, time()+3600)}}
            {{$a=setcookie("avatar", $user->avatar, time()+3600)}}
    @endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/component.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/homepage.css')}}">
    
</head>

<body>
    
    <div class="top">
        
        <div class="logo-box">
            <a href="homepage.html" class="logo">EMNIA</a>
        </div>
        <ul>
            <li><a href="homepage.html">TRANG CHỦ</a></li>
            @if(isset($_COOKIE["Authorization"])||isset($Authorization))
            <li class="dropdown">
                <a class="funtion">THÊM</a>
                <div class="funtion-box">
                    <a href="{{env('APP_URL').'post'}}">POST ẢNH</a>
                    <a href="#null" onclick="javascript:triggerMe()">ĐĂNG XUẤT</a>
                    <a href="#">NGƯỜI DÙNG</a>
                </div>
            </li>
            @else 
            <li><a href="./login">ĐĂNG NHẬP</a></li>
            <li><a href="./register">ĐĂNG KÍ</a></li>
            @endif
        </ul>
        @if(isset($_COOKIE["Authorization"])||isset($Authorization))
        <div class="user-box">
            <div class="avatar">
            @if(isset($_COOKIE["avatar"]))
            <img src="{{$_COOKIE['avatar'] }}" alt="">
            @endif
            @if(isset($user->avatar))
            <img src="{{$user->avatar }}" alt="">
            @endif
            </div>
            @if(isset($_COOKIE["name"]))
            <div class="user-name">{{ $_COOKIE["name"] }}</div>
            @endif
            @if(isset($user->name))
            <div class="user-name">{{ $user->name }}</div>
            @endif
        </div>
        @endif
    </div>
    <DIV class="left">LEFT SIDE BAR</DIV>
    <DIV class="main">MAIN CONTENT
        <div class="container">
            <p>ẢNH ĐĂNG GẦN ĐÂY</p>
            @foreach($pagedata->data as $image)
            <div class="scalebox">
                <div class="movie" style="background-image: url({{$image->image}});">
                    <div class="Overlay">
                        <div class="img">
                            <a href="comment-page.html"><img src="{{$image->image}}" alt=""></a>                           
                        </div>
                        <div class="img-info-box">
                            <p class="img-info">Tiêu để : Army girl  </p>
                            <p class="img-info">Kích thước : 192x134 </p>
                            <p class="img-info">Độ phân giải : 256 dpi</p>
                            <p class="img-info">Nguồn gốc : otakusan.com</p>
                        </div>      
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </DIV>
    <DIV class="right">RIGHT SIDE BAR</DIV>
    <form action="/"><button id="GoToHref" style="display:none"></button></form>
    
    <script src="{{URL::asset('/js/homepage.js')}}"></script>
</body>

</html>