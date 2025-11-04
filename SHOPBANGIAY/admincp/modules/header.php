<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<p><a style="  text-decoration: none;color:black; font-size: 18px; margin-right: 10px; font-weight: bold; color: white;" href="index.php?dangxuat=1"><b>Đăng xuất :</b> <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>