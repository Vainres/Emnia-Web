<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">

    <link rel="stylesheet" href="{{URL::asset('/css/cmt.css')}}">
    <title>Picture page</title>
</head>
<body>

    @include('layout.menu')


    <div class="content-box">
        <div class="content">
       <h2 style="color:black; text-align:center;">{{$image->name}}</h2>
       <p style="color:black; text-align:center;">Ngày đăng:{{$image->created_at}}</p>
        @if($image->created_at!=$image->updated_at)
            <p style="color:black; text-align:center;">Sửa chữa lần cuối:{{$image->updated_at}}</p>
        @endif
            <div class="picture">
                <img src="{{env('URL').$image->image}}" alt="">
            </div>
            <p style="color:black; text-align:center;">{{$image->detail}}</p>

            <div class="author">
                <img src="{{env('URL').$author->avatar}}" class="avatar" alt="">
                <a href="{{env('URL').'/user/'.$author->id}}"><b>{{$author->name}}</b></a>
                @if(isset($_COOKIE['Authorization']))
                    @if($_COOKIE['id']==$author->id)
                        <a href="{{env('URL').'/image/'.$image->id.'/edit'}}" class="edit" ><b>Edit</b></a>
                    @endif
                @endif
                @if(isset($_COOKIE['Authorization']))

                    <form action="{{env('URL').'/api/images/'.$image->id.'/addFavorite'}}" method="GET" id="addFavorite">
                        <button class="submit none" id="follow">Yêu thích</button>
                    </form>

                    <form action="" method="GET" id="unFavorite">
                        <button class="submit none" id="unfavorite">Đã yêu thích</button>
                    </form>
                @endif
            </div>
            @if(isset($_COOKIE['Authorization']))
            <div class="comment-box">
                <div class="comment-form">
                    
                    <form action="{{env('URL').'/api/images/'.$image->id.'/addComment'}}" id="commentForm" method="POST">
                        <label for="cmt" class="label">Bình luận</label>
                        <textarea type="text" name="content" id="cmt"  placeholder="Nhập bình luận" class="comment"></textarea>
                        <button class="submit" id="submit">Bình luận</button>
                    </form>
                    <form action="{{env('URL').'/image/'.$image->id}}" ><button id="resetpage" style="display:none"></button></form>
                </div>
            </div>
            @endif
            <div class="commentSection">
            @if($comments!="[]")
                <h3>Các bình luận</h3>
                @foreach($comments as $comment)
                    <form action="{{env('URL').'/api/deleteComment/'.$comment->id}}" class="deleteComment" method="GET">
                        <div class="commentUser">
                            <div class="commentUserInfo">
                                    <img src="{{env('URL').$comment->user->avatar}}" class="avatar" alt="">
                                    <a href="{{env('URL').'/user/'.$comment->user_id}}" class="commentUserName"><b>{{$comment->user->name}}</b></a>
                                    <p class="time">{{$comment->created_at}}</p>
                                    @if(isset($_COOKIE['Authorization']))
                                        @if($comment->user_id==$_COOKIE['id'])
                                        <div class="deleteButon">
                                            <input type="submit" value="Xóa bình luận" class="inputDelete" >
                                        </div>
                                        @endif
                                    @endif
                            </div>
                            <p class="commentDetail"> {{$comment->content}}</p>
                        </div>
                    </form>
                @endforeach
            @else
                <h3>Không có bình luận nào</h3>
            @endif
            </div>
        </div>
        <script src="{{URL::asset('/js/image.js')}}"></script>
    </div>
    

        
</body>
</html>