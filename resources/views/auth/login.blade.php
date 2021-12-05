<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{env('APP_URL').'css/register-login.css'}}">
    <title>Đăng nhập</title>
</head>

<body>
@include('layout.menu')
    <div class="main">
        <form action="{{env('APP_URL').'api/login'}}" method="POST" class="form" id="form-2">
            @if(isset($message))
            <p class="error">{{$message}}</p>
            @endif
            <h3 class="heading">Đăng nhập</h3>
            <p class="desc">378138 361233 360196 313043 ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>

            <button class="form-submit">Đăng nhập</button>
            <a href="{{env('APP_URL').'register'}}" class="register-link">Chưa có tài khoản</a>
            <a href="{{env('APP_URL').'forgotPassword'}}" class="register-link">Quên mật khẩu</a>
            <a href="{{ URL::to('api/auth/google') }}" class="register-link gg-login">Google Login</a>
        </form>

    </div>
</body>

</html>