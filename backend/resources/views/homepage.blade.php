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
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/component.css')}}">
    <title>Document</title>
    
    
</head>

<body>
    @include('layout.menu')
    <div class="container">
        <DIV class="left">LEFT SIDE BAR</DIV>
        <DIV class="main">MAIN CONTENT
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

        </DIV>
        <DIV class="right">RIGHT SIDE BAR</DIV>
    </div>
</body>

</html>