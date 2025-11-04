<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_qlsp_them.css">
</head>
<body>
<?php
        $sql_lietke_nguoidung="SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
        $result_lietke_nguoidung= mysqli_query($connect,$sql_lietke_nguoidung);
    ?>
       

    <p style="font-size:30px;"><b>Danh sách người dùng</b></p>
<hr style="margin-top:-20px;">
    <table border="1" style="width:100%">
        <tr>
            <th>ID</th>
            <th>Name </th>
            <th>Account</th>
            <th>Email</th>
            <th>Number phone</th>
            <th>Address</th>
            <th colspan="2">Chức năng</th>
            <th>Chức vụ</th>
            

            
        </tr>
            <?php
                $i=0;
                while($row=mysqli_fetch_array($result_lietke_nguoidung)){
                $i++;
                
            ?>
        
        <tr>
            <td style="height:50px;" > <?php echo $i ?></td>
            <td> <?php echo $row ['hovaten']?></td>
            <td> <?php echo $row ['taikhoan']?></td>
            <td> <?php echo $row ['email']?></td>
            <td> <?php echo $row ['sodienthoai']?></td>
            <td style="width:10 0px;"> <?php echo $row ['diachi']?></td>
            <td>
                    <a style="color: black;" href="?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['id_khachhang'] ?>"> Sửa </a>
            </td>
            <td>
                    <a style="color: black;" href="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $row['id_khachhang']?>">Xóa</a>
            </td>
            <td><?php if($row['chucvu']==1){
                echo "Bán hàng";
         }else{
                echo "Không";
         }?>
         </td>
        </tr>


            <?php
                }
            ?>
    </table>
    
</body>
</html>