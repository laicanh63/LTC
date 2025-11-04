<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Kí</title>
    <link rel="stylesheet" href="sign_up.css" />
    <!-- font roboto -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- form signup -->
    <div class="signup">
      <div class="signup__container">
        <h1>Sign up</h1>
        <form action="" method="POST" class="form" id="form-1">
          <h5>Full Name</h5>
          <input type="text" class="input-signup-username" id="fullname" name="hovaten" placeholder="VD: To Trung Dung">
          <h5>Telephone</h5>
          <input type="number"class="input-signup-username" id="telephone" name="dienthoai" placeholder="Số điện thoại">
          <h5>Address</h5>
          <input type="text" class="input-signup-username" id="address" name="diachi" placeholder="Địa chỉ">
          <h5>Username</h5>
          <input type="text" class="input-signup-username" id="username" name="taikhoan" placeholder="VD: Slygel"/>
          <h5>Email</h5>
          <input type="email" class="input-signup-username" id="email" name="email" placeholder="VD:email@domain.com"/>
          <h5>Password</h5>
          <input type="password" class="input-signup-password" id="password" name="matkhau" placeholder="Nhập mật khẩu"/>
          <h5>Re-enter password</h5>
          <input type="password" class="input-signup-password" id="password_confirmation" name="rematkhau" placeholder="Nhập lại mật khẩu"/>
          <h5>Role</h5>
          <select name="chucvu" class="input-signup-role">
              <option value="0">Customer</option>
              <option value="1">Landlord</option>
          </select>
          <button type="submit" name="dangky" class="signup__signInButton">Sign up</button>
        </form>
        <a href="../user/loginuser.php" class="signup__registerButton">Login</a>
      </div>

      <div>
      <?php
session_start();
include('../admincp/config/connect.php');

if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['matkhau']);
    $rematkhau = md5($_POST['rematkhau']);
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $chucvu = $_POST['chucvu']; // Lấy giá trị của chức vụ

    // Kiểm tra nếu có bất kỳ trường nào trống
    if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$email || !$dienthoai || !$diachi) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
    } elseif ($matkhau != $rematkhau) {
        echo '<script>alert("Mật khẩu nhập lại không trùng khớp!")</script>';
    } else {
        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $sql_dangky = "INSERT INTO tbl_dangky (hovaten, taikhoan, matkhau, sodienthoai, email, diachi, chucvu) 
                       VALUE ('".$tenkhachhang."', '".$taikhoan."', '".$matkhau."', '".$dienthoai."', '".$email."', '".$diachi."', '".$chucvu."')";
        
        $query_dangky = mysqli_query($connect, $sql_dangky);

        if ($query_dangky) {
            // Đăng ký thành công
            $_SESSION['dangky'] = $taikhoan;
            $_SESSION['email'] = $email;
            $_SESSION['id_khachhang'] = mysqli_insert_id($connect);

            // Hiển thị thông báo thành công và chuyển hướng đến trang đăng nhập
            echo '<script>alert("Đăng ký thành công!");</script>';
            header('Location: ../user/loginuser.php');
            exit(); // Đảm bảo không tiếp tục xử lý sau khi chuyển hướng
        } else {
            echo '<script>alert("Đăng ký không thành công, vui lòng thử lại sau.")</script>';
        }
    }
}
?>

      </div>
    </div>
  </body>
</html>
