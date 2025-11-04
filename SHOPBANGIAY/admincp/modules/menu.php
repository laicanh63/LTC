<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/style_menu.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7a115cf93e.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container_menu">
<ul>
    <?php
        if(isset($_SESSION['dangnhap'])){
            if($_SESSION['dangnhap']=='admin'){
    ?>
       <li style="height: 70px;">
       <i class="fa-solid fa-bag-shopping" style="float: left; color: white; padding-right: 10px; flex: 1;"></i>
            <h3 style="color: white; flex: 10;">Quản lý sản phẩm</h3>
       </li>
       <a href="index.php?action=quanlysanpham&query=them"><li style="height: 50px; color: white; padding-left: 10px; background-color: #444444;"><h3>Thêm sản phẩm</h3></li></a>
       <a href="index.php?action=quanlysanpham&query=lietke"><li style="height: 50px; color: white; padding-left: 10px; background-color: #444444;"><h3>Liệt kê danh sách sản phẩm</h3></li></a>
       <li style="height: 70px;">
            <i class="fa-solid fa-bars-staggered" style="float: left; color: white; padding-right: 10px; flex: 1;"></i>
            <h3 style="color: white; flex: 10;">Quản lý danh mục sản phẩm</h3>
       </li>
       <a href="index.php?action=quanlydanhmucsanpham&query=them"><li style="height: 50px; color: white; padding-left: 10px; background-color: #444444;"><h3>Thêm danh mục sản phẩm</h3></li></a>
       <a href="index.php?action=quanlydanhmucsanpham&query=lietke"><li style="height: 50px; color: white; padding-left: 10px; background-color: #444444;"><h3>Liệt kê danh mục sản phẩm</h3></li></a>
       <a href="index.php?action=quanlynguoidung&query=them">
       <li style="height: 70px;">
            <i class="fa-regular fa-user" style="float: left; color: white; padding-right: 10px; flex: 1;"></i>
            <h3 style="color: white; flex: 10;">Quản lý người dùng</h3>
         </li>
       </a>
       <a href="index.php?action=quanlydonhang&query=them">
       <li style="height: 70px;">
            <i class="fa-solid fa-basket-shopping" style="float: left; color: white; padding-right: 10px; flex: 1;"></i>
            <h3 style="color: white; flex: 10;">Quản lý đơn hàng</h3>
         </li>
       </a>
       <a href="index.php?action=thongkedoanhthu&query=thongke">
         <li style="height: 70px;">
            <i class="fa-solid fa-database" style="float: left; color: white; padding-right: 10px; flex: 1;"></i>
            <h3 style="color: white; flex: 10;">Thống kê doanh thu</h3>
         </li>
       </a>
    <?php

            }
       }
    
    ?>
</ul>
</div>
</body>
</html>