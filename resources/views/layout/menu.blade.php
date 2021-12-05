<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{env('APP_URL').'css/menu.css'}}">
    <link rel="stylesheet" href="{{env('APP_URL').'css/homepage.css'}}">
    <meta http-equiv="Content-Security-Policy" content="default-src https://emnia.test/ ajax.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<div class="top">
        <div class="logo-box">
            <a href="{{env('APP_URL')}}" class="logo">EMNIA</a>
        </div>
        <ul>
            <li><a href="{{env('APP_URL')}}">TRANG CHỦ</a></li>
            @if(isset($_COOKIE["Authorization"])||isset($Authorization))
            
            @else 
            <li><a href="{{env('APP_URL').'login'}}">ĐĂNG NHẬP</a></li>
            <li><a href="{{env('APP_URL').'register'}}">ĐĂNG KÍ</a></li>
            @endif

        </ul>
        <div id="searchBar">
            <form action="{{env('APP_URL').'search/'}}" method='GET' id='searchForm'>
                <input type="search" placeholder="Search images" id='search' >
            </form>
        </div>
        @if(isset($_COOKIE["Authorization"])||isset($Authorization))
        <div class="user-box">
            <div class="avatar">
                @if(isset($_COOKIE["avatar"]))
                    <img src="{{$_COOKIE['avatar'] }}" id="menuImage"alt="">
                    <div class="funtion-box">
                        <a href="{{env('APP_URL').'user'}}">NGƯỜI DÙNG</a>
                        <a href="{{env('APP_URL').'post'}}">POST ẢNH</a>
                        <a href="{{env('APP_URL').'favorite/'.$_COOKIE['id']}}" id="favorite">ẢNH ĐÃ YÊU THÍCH</a>
                        <a href="{{env('APP_URL').'postedImage/'.$_COOKIE['id']}}" id="posted">ẢNH ĐÃ ĐĂNG</a>
                        <a href="#null" onclick="javascript:triggerMe()">ĐĂNG XUẤT</a>
                </div>
                @elseif(isset($user->avatar))
                    <img src="{{$user->avatar }}" id="menuImage"alt="">
                    <div class="funtion-box">
                        <a href="{{env('APP_URL').'user'}}">NGƯỜI DÙNG</a>
                        <a href="{{env('APP_URL').'post'}}">POST ẢNH</a>
                        <a href="{{env('APP_URL').'favorite/'.$user->id}}" id="favorite">ẢNH ĐÃ YÊU THÍCH</a>
                        <a href="{{env('APP_URL').'postedImage/'.$user->id}}" id="posted">ẢNH ĐÃ ĐĂNG</a>
                        <a href="#null" onclick="javascript:triggerMe()">ĐĂNG XUẤT</a>
                    </div>
                @endif
                
            </div>
            @if(isset($_COOKIE["name"]))
            <!-- <div class="user-name" id="menuName">{{ $_COOKIE["name"] }}</div> -->
                <a class="user-name" href="{{env('APP_URL').'user'}}" id="menuName">{{ $_COOKIE["name"] }}</a>
            @elseif(isset($user->name))
            <!-- <div class="user-name" id="menuName">{{ $user->name }}</div> -->
                <a class="user-name"  href="{{env('APP_URL').'user'}}" id="menuName">{{ $user->name }}</a>
                
            @endif
        </div>
        @endif
    <form action="{{env('APP_URL')}}"><button id="GoToHref" style="display:none"></button></form>

    </div>
    <script src="{{URL::asset('/js/menu.js')}}"></script>
