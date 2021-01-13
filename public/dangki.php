<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng kí</title>
  <style>
    /* * * * * General CSS * * * * */
*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  font-weight: 400;
  color: #666666;
  background: #eaeff4;
}

.wrapper {
  margin: 0 auto;
  width: 100%;
  max-width: 1140px;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.container {
  position: relative;
  width: 100%;
  max-width: 600px;
  height: auto;
  display: flex;
  background: #ffffff;
  box-shadow: 0 0 15px rgba(0, 0, 0, .1);
}

.credit {
  position: relative;
  margin: 25px auto 0 auto;
  width: 100%;
  text-align: center;
  color: #666666;
  font-size: 16px;
  font-weight: 400;
}

.credit a {
  color: #222222;
  font-size: 16px;
  font-weight: 600;
}

/* * * * * Login Form CSS * * * * */
h2 {
  margin: 0 0 15px 0;
  font-size: 30px;
  font-weight: 700;
}

h2 img {
  width: 120px;
}

p {
  margin: 0 0 20px 0;
  font-size: 16px;
  font-weight: 500;
  line-height: 22px;
}

.btn {
  display: inline-block;
  padding: 7px 20px;
  font-size: 16px;
  letter-spacing: 1px;
  text-decoration: none;
  border-radius: 5px;
  color: #ffffff;
  outline: none;
  border: 1px solid #ffffff;
  transition: .3s;
  -webkit-transition: .3s;
}

.btn:hover {
  color: #4CAF50;
  background: #ffffff;
}

.col-left,
.col-right {
  width: 55%;
  padding: 45px 35px;
  display: flex;
}

.col-left {
  width: 45%;
  background: #c81f34;
  -webkit-clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
  clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
}

@media(max-width: 575.98px) {
  .container {
    flex-direction: column;
    box-shadow: none;
  }

  .col-left,
  .col-right {
    width: 100%;
    margin: 0;
    padding: 30px;
    -webkit-clip-path: none;
    clip-path: none;
  }
}

.login-text {
  position: relative;
  width: 100%;
  color: #ffffff;
  text-align: center;
}

.login-form {
  position: relative;
  width: 100%;
  color: #666666;
}

.login-form p:last-child {
  margin: 0;
}

.login-form p a {
  color: #4CAF50;
  font-size: 14px;
  text-decoration: none;
}

.login-form p:last-child a:last-child {
  float: right;
}

.login-form label {
  display: block;
  width: 100%;
  margin-bottom: 2px;
  letter-spacing: .5px;
}

.login-form p:last-child label {
  width: 60%;
  float: left;
}

.login-form label span {
  color: #ff574e;
  padding-left: 2px;
}

.login-form input {
  display: block;
  width: 100%;
  height: 40px;
  padding: 0 10px;
  font-size: 16px;
  letter-spacing: 1px;
  outline: none;
  border: 1px solid #cccccc;
  border-radius: 5px;
}

.login-form input:focus {
  border-color: #ff574e;
}

.login-form input.btn {
  color: #ffffff;
  background: #c81f34;
  border-color: #4CAF50;
  outline: none;
  cursor: pointer;
}

.login-form input.btn:hover {
  color: #4CAF50;
  background: #ffffff;
}
  </style>
</head>
<body>
  <div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <a style="text-decoration: none;color: white;" href="../index.php"><h2>Bảnh Food</h2></a>
        <img src="../upload/logo1.png" alt="">
      </div>
    </div>
    
    <div class="col-right">
      <div class="login-form">
        <h2>Đăng kí</h2>
        <form action="dangki.php" method="POST">
          <p>
            <input type="text" placeholder="Nhập tên" name="name">
          </p>
          <p>
            <input type="text" placeholder="Nhập số điện thoại" name="soDienThoai">
          </p>
          <p>
            <input type="text" placeholder="Nhập email" name="email">
          </p>
          <p>
            <input type="password" placeholder="Nhập mật khẩu" name="password">
          </p>
          <p>
            <input type="password" placeholder="Nhập lại mật khẩu" name="repassword">
          </p>
          <p>
            <input type="hidden" value="1" name="trangthai">
          </p>
          <p>
            <input class="btn" type="submit" name="btn" value="Đăng kí" />
          </p>
          <p>
            <a href="login.php">Trở lại</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  include_once'connect.php';
  if (isset($_POST["btn"])) {

    $name = $_POST["name"];
    $password = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);
    $email = $_POST["email"];
    $sdt = $_POST["soDienThoai"];
    $trangthai = $_POST["trangthai"];

    if($name=="" || $password=="" || $repassword=="" || $email=="" || $sdt==""){
      echo "<script>
        alert('Nhập đầy đủ thông tin');
      </script>";
    }elseif ($password!=$repassword) {  
        echo "<script>
        alert('Mật khẩu không trùng nhau');
      </script>";
    }else{

      $sql = "select * from tblkhachhang where soDienThoai = '$sdt'";
      $result = mysqli_query($conn,$sql);
      $num_rows = mysqli_num_rows($result);
      if ($num_rows>0) {
        echo "<script>
        alert('Số điện thoại đã tồn tại');
      </script>";
      }else{
        echo $sql="INSERT INTO `tblkhachhang` (`maKH`, `name`, `email`, `password`, `soDienThoai`, `trangThai`) VALUES (NULL, '$name', '$email', '$password', '$sdt', '1');";
        mysqli_query($conn,$sql);
        
      }
    }   
  }
?>
</body>
</html>
