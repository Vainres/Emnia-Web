<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/register-login.css')}}">
    <title>ĐĂNG KÍ</title>
</head>
<body>
  
    
    <div class="main">
     
        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Thành viên đăng ký</h3>
          <p class="desc">Tui muốn thoát khỏi NNN , khổ vãi lồn ❤️</p>
  
          <div class="spacer"></div>
  
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="Điền email của Bạn" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="name" class="form-label">Tên đầy đủ</label>
            <input id="name" name="name" type="text" placeholder="Nhập tên đầy đủ của bạn" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="phone" class="form-label">Tên đầy đủ</label>
            <input id="phone" name="phone" type="text" placeholder="Nhập SĐt của bạn" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="pass" class="form-label">Mật khẩu</label>
            <input id="pass" name="pass" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="repass" class="form-label">Nhập lại mật khẩu</label>
            <input id="repass" name="repass" type="password" placeholder="Nhập lại mật khẩu"  class="form-control">
            <span class="form-message"></span>
          </div>
  
          <button class="form-submit">Đăng ký</button>
          <a href="./login" class="login-link">Đã có tài khoản</a>
        </form>

      </div>
    
      
      
      <!-- <script>
  
        document.addEventListener('DOMContentLoaded', function () {
          // Mong muốn của chúng ta
          Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
              Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
              Validator.isEmail('#email'),
              Validator.minLength('#password', 6),
              Validator.isRequired('#password_confirmation'),
              Validator.isConfirmed('#password_confirmation', function () {
                return document.querySelector('#form-1 #password').value;
              }, 'Mật khẩu nhập lại không chính xác')
            ],
            onSubmit: function (data) {
              // Call API
              console.log(data);
            }
          });
  
  
          Validator({
            form: '#form-2',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
              Validator.isEmail('#email'),
              Validator.minLength('#password', 6),
            ],
            onSubmit: function (data) {
              // Call API
              console.log(data);
            }
          });
        });
  
      </script> -->
</body>
</html>