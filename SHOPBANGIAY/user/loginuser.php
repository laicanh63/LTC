<?php
    session_start();
	include('../admincp/config/connect.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='".$taikhoan."' AND tbl_dangky.matkhau='".$matkhau."'  LIMIT 1";
		$row = mysqli_query($connect,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['taikhoan'];
			$_SESSION['email'] = $row_data['email'];
      $_SESSION['id_khachhang']= $row_data['id_khachhang'];
			header("Location:../index.php");
		}elseif($taikhoan=='admin'){
            header("Location:../admincp/login.php");
        }else{
			$message = "Tài khoản mật khẩu không đúng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
	} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="LOGIN.CSS" />
    <!-- font roboto -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- from login -->
    <div class="login">
      <div class="login__container">
        <h1>LOGIN</h1>
        <form action="" method="POST">
          <h5>Username</h5>
          <input type="text" name="taikhoan" class="input-login-username" />
          <h5>Password</h5>
          <input type="password" name="password" class="input-login-password" />
          <button type="submit" name="dangnhap" class="login__signInButton">Sign in</button>
        </form>
        <a href="../signup/signup.php" class="login__registerButton"
          >Sign up</a
        >
      </div>
    </div>
  </body>
</html>