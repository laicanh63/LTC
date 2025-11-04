<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style_lietke.css">
</head>
<body>
<?php
    $sql_lietke_dh="SELECT * FROM tbl_giohang ,tbl_dangky  WHERE tbl_giohang.id_khachhang=tbl_dangky.id_khachhang ORDER BY id_cart DESC";
    $result_lietke_dh= mysqli_query($connect,$sql_lietke_dh);
?>
<div style="display:flex; width:1000px;"><div style="width:500px;"></div><div style="width:215px;"></div><div style="width:160px;"></div><div style="width:100px; text-align:center;font-size:30px;"></div></div>
<p style="font-size:30px;"><b>Danh sách đơn hàng của người dùng</b></p>
<hr style="margin-top:-20px;">
 <table id="lietketable" style="width: 100%;" border="1" style="border-collapse:collapse;"> 
     <tr class="row1">
         <td><b>ID</b></td>
         <td><b>Mã đơn hàng</b></td>
         <td><b>Tên khách hàng</b></td>
         <td><b>Địa chỉ</b></td>
         <td><b>Tài khoản</b></td>
         <td><b>Hình thức thanh toán</b></td>
         <td ><b >Điện thoại</b></td>
         <td><b>Ngày đặt hàng</b></td>
         <td><b>Tinh Trạng </b></td>
         <td colspan="2"><b>Quản lý </b></td>
     </tr>
     <?php
    $i=0;
    while($row=mysqli_fetch_array($result_lietke_dh)){
        $i++;
    
     ?>
     <tr class="row">
         <td style="font-size: 20px; text-align: center;"><b><?php echo $i ?></b></td>
         <td style="text-align: center;"><?php echo $row['code_cart'] ?></td>
         <td style="text-align: center;"><?php echo $row['hovaten']?></td>
         <td style="text-align: center;"><?php echo $row['diachi']?></td>
         <td style="text-align: center;"><?php echo $row['taikhoan']?></td>
         <td style="text-align: center;"><?php echo $row['cart_payment']?></td>
         <td  style="text-align: center;"><?php echo $row['sodienthoai']?></td>
         <td style="text-align: center;"><?php echo $row['cart_date']?></td>
         <td style="text-align: center;">
    	<?php if($row['cart_status']==1){
    		echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xử lý';
    	}
    	?>
    </td>
         <td style="text-align: center;">
            <button><a style="text-align: center; color: black;" href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem</a></button>
            <button><a style="text-align: center; color: black;" href="modules/quanlydonhang/xuly.php?iddonhang=<?php echo $row['code_cart']?>">Xóa</a></button>
         </td>
     </tr>
     
     <?php
    }
    ?>
 </table>
</body>
</html>