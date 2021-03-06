<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{env('APP_URL').'css/style.css'}}">
    <link rel="stylesheet" href="{{env('APP_URL').'css/component.css'}}">
    <title>Document</title>
    
    
</head>

<body>
    @include('layout.menu')
    <div class="container">
        <DIV class="left">
        </DIV>
        <DIV class="main">
        <h1>Ảnh đã yêu thích</h1>
            @foreach($favorites as $favorite)
                    <div class="scalebox">
                        <div class="img-info-box">
                                    <p class="img-info">{{$favorite->image->name}}  </p>
                                </div>   
                        <div class="movie" style="background-image: url({{$favorite->image->image}});">
                            <div class="Overlay">
                                <div class="img">
                                    <a href="{{env('APP_URL').'image/'.$favorite->image->id}}">
                                        <img src="{{$favorite->image->image}}" alt="">
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