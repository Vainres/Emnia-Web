<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="component.css">
</head>

<body>
    <div class="top">MENU TITLE</div>
    <DIV class="left">LEFT SIDE BAR</DIV>
    <DIV class="main">MAIN CONTENT
        <div class="container">
            <p></p>
        @foreach($pagedata->data as $image)
            <div class="scalebox">
                <div class="movie" style="background-image: url({{$image->image}});">
                    <div class="Overlay">
                        <DIV class="img"></DIV>
                    </div>
                </div>
            </div>
        @endforeach

        </div>

    </DIV>
    <DIV class="right">RIGHT SIDE BAR</DIV>
</body>

</html>