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
            
            @else 
            <li><a href="{{env('APP_URL').'login'}}">ĐĂNG NHẬP</a></li>
            <li><a href="{{env('APP_URL').'post'}}">ĐĂNG KÍ</a></li>
            @endif
        </ul>
        @if(isset($_COOKIE["Authorization"])||isset($Authorization))
        <div class="user-box">
            <div class="avatar">
            @if(isset($_COOKIE["avatar"]))
            <img src="{{$_COOKIE['avatar'] }}" id="menuImage"alt="">
            @elseif(isset($user->avatar))
            <img src="{{$user->avatar }}" id="menuImage"alt="">
            @endif
            </div>
            @if(isset($_COOKIE["name"]))
            <!-- <div class="user-name" id="menuName">{{ $_COOKIE["name"] }}</div> -->
            <li class="dropdown">
                <a class="user-name" id="menuName">{{ $_COOKIE["name"] }}</a>
                <div class="funtion-box">
                    <a href="{{env('APP_URL').'post'}}">POST ẢNH</a>
                    <a href="#null" onclick="javascript:triggerMe()">ĐĂNG XUẤT</a>
                    <a href="{{env('APP_URL').'user'}}">NGƯỜI DÙNG</a>
                </div>
            </li>
            @elseif(isset($user->name))
            <!-- <div class="user-name" id="menuName">{{ $user->name }}</div> -->
            <li class="dropdown">
                <a class="user-name" id="menuName">{{ $user->name }}</a>
                <div class="funtion-box">
                    <a href="{{env('APP_URL').'post'}}">POST ẢNH</a>
                    <a href="#null" onclick="javascript:triggerMe()">ĐĂNG XUẤT</a>
                    <a href="{{env('APP_URL').'user'}}">NGƯỜI DÙNG</a>
                </div>
            </li>
            @endif
        </div>
        @endif
    <form action="{{env('APP_URL')}}"><button id="GoToHref" style="display:none"></button></form>

    </div>
    <script src="{{URL::asset('/js/menu.js')}}"></script>
