<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('component.css')}}">
</head>

<body>
    <div class="top">
        @csrf
        {{setcookie("Authorization", session('Authorization',""), time()+3600)}}
        
        <h1>{{$Authorization}}</h1>

    </div>
    <DIV class="left">LEFT SIDE BAR</DIV>
    <DIV class="main">
        <div class="container">
        @foreach($pagedata->data as $image)
            <div class="scalebox">
                <div class="movie" style="background-image: url({{$image->image}});">
                    <a href="./login">
                        <div class="Overlay">
                            <DIV class="img">
                                <a href="./"></a>
                            </DIV>
                        </div>
                    </a>
                    
                </div>
            </div>
        @endforeach

        </div>

    </DIV>
    <DIV class="right">RIGHT SIDE BAR</DIV>
</body>

</html>