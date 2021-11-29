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
        <DIV class="left">
        </DIV>
        <DIV class="main">
        <h1>Ảnh đã đăng</h1>
            @foreach($images as $image)
                    <div class="scalebox">
                        <div class="img-info-box">
                                    <p class="img-info">{{$image->name}}  </p>
                                </div>   
                        <div class="movie" style="background-image: url({{$image->image}});">
                            <div class="Overlay">
                                <div class="img">
                                    <a href="{{env('APP_URL').'image/'.$image->id}}">
                                        <img src="{{$image->image}}" alt="">
                                    </a>                           
                                </div>
                                   
                            </div>

                        </div>
                    </div>
                @endforeach
        </DIV>
        <DIV class="right"></DIV>
    </div>
</body>

</html>