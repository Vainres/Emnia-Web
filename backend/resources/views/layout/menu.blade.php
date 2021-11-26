<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{URL::asset('/css/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/homepage.css')}}">
</head>
<div class="top">
        
        <div class="logo-box">
            <a href="{{env('APP_URL')}}" class="logo">EMNIA</a>
        </div>
        <ul>
            <li><a href="{{env('APP_URL')}}">TRANG CHỦ</a></li>
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
            @elseif(isset($user->avatar))
            <img src="{{$user->avatar }}" alt="">
            @endif
            </div>
            @if(isset($_COOKIE["name"]))
            <div class="user-name">{{ $_COOKIE["name"] }}</div>
            @elseif(isset($user->name))
            <div class="user-name">{{ $user->name }}</div>
            @endif
        </div>
        @endif
    <form action="/"><button id="GoToHref" style="display:none"></button></form>

    </div>
    <script src="{{URL::asset('/js/homepage.js')}}"></script>
