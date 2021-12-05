<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{env('APP_URL').'css/register-login.css'}}">
    <title>Khôi phục mật khẩu</title>
</head>

<body>
@include('layout.menu')
    <div class="main">
        <form action="{{env('APP_URL').'api/request-reset-password'}}" method="POST" class="form" id="resetform">
            <h3 class="heading">Nhập email cần khôi phục mật khẩu</h3>

            <div class="spacer"></div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit">Gửi email</button>
            <a href="{{env('APP_URL').'register'}}" class="register-link">Chưa có tài khoản</a>
            <a href="{{env('APP_URL').'login'}}" class="register-link">Đã có tài khoản</a>
            <a href="{{ URL::to('api/auth/google') }}" class="register-link gg-login">Google Login</a>
        </form>
        <script src="{{env('APP_URL').'js/resetpassword.js'}}"></script>
    </div>
</body>

</html>