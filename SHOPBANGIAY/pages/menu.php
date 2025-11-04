<?php
     $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc=mysqli_query($connect,$sql_danhmuc);   
?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="menu">
            <div class="menu_list">
                <ul class="menu_list-left">
                    <li><a href="index.php"><img
                                src="https://purepng.com/public/uploads/large/purepng.com-nike-logologobrand-logoiconslogos-251519940082eoxxs.png"></a>
                    </li>
                    <li><a href="index.php?quanly=giohang">Giỏ hàng</a>
                    </li>
                        <?php
                                while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){

                                ?>
                                <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>

                                <?php
                                    }

                                ?>
                    <li><a href="index.php?quanly=contact">Liên hệ</a></li>
                    <li>
                        <form action="index.php?quanly=timkiem" method="post" class="search-container">
                            <input type="text" id="search-box" placeholder=" Tìm kiếm " name="tukhoa">
                            <button type="submit" id="search-button" name="timkiem"></button>
                        </form>
                    </li>
                </ul>
                <ul style="float: right;" class="menu_list-right">
                    <?php
                if(isset($_SESSION['dangky'])){
                ?>
                   
                    <li><a href="index.php?quanly=thongtin"> Thông tin</a></li>
                    <li> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
                <?php
                    }else{
                ?>
                     <li> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                     <li> <a href="index.php?quanly=dangky">Đăng ký</a></li>
                <?php
                    }
            ?>
                </ul>
            </div>
        </div>
</body>
</html>