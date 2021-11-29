<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/register-login.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Thay đổi mật khẩu</title>
</head>
<body>
  
    
    <div class="main">
     
        <form action="{{$url}}" method="POST" class="form" id="resetform">
          <h3 class="heading">Thay đổi mật khẩu</h3>
  
          <div class="spacer"></div>
  
          <div class="form-group">
            <label for="pass" class="form-label">Mật khẩu</label>
            <input id="pass" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="repass" class="form-label">Nhập lại mật khẩu</label>
            <input id="repass" name="repass" type="password" placeholder="Nhập lại mật khẩu"  class="form-control">
            <span class="form-message"></span>
          </div>
          <input type="hidden" name="token" id="token" value="{{$token}}">

          <button class="form-submit">Thay đổi mật khẩu</button>
        </form>
      </div>
      <script src="{{URL::asset('/js/resetpassword.js')}}"></script>

</body>
</html>