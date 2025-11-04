       
<p><?php
        if(isset($_SESSION['dangky'])){      
        } 
?></p>

    
<?php
        if(isset($_SESSION['cart'])){

            
        }

?>
<hr/>
<table border="0" style="width:95%; padding: 0; margin: 0 auto">
    <tr>
        <th>Sản phẩm đã thêm</th>
    </tr>
</table>

<table border="1" style="width:95%; padding: 0; margin: 0 auto ;"> 
<tr style="text-align:center;">
        <td></td>
        <td><b>Mã sản phẩm</b></td>
        <td><b>Hình ảnh</b></td>
        <td><b>Số Lượng</b></td>
        <td><b>Đơn giá</b></td>
        <td><b>Thành tiền</b></td>
        <td><b>Xử lí</b></td>
    </tr>
    <?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
            $tongtien+=$thanhtien;
            $i++;
    ?>
    
    <tr style="text-align:center;">
        <td></td>
        <td><b><?php echo $cart_item['tensanpham'] ?></b></td>
        <td><img class="img-cart" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"></td>
        <td>
            <div class="soluong-sp-dem">
                    <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                    <input class="soluong-sp-input" type="text" name="soluong" value="<?php echo $cart_item['soluong'] ?>">
                    <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
            </div>
        </td>
        <td><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
        <td class="giasp-cart"><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
        <td style="text-align: center" class="xoa"><a style="text-decoration: none; color: black;" href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>">Xóa sản phẩm</a></td>
    </tr>
    <?php 
        }
        echo "<hr/>";
    ?>
    <tr >
        <td colspan="6" >
            <p style="float: left; color: black;font-weight: bold;font-size: 16px;"> Tổng tiền : </p> <p style="padding-left:5px ; float: left; color: red;font-weight: bold;font-size: 16px;"><?php  echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
            <div style="clear:both;"> </div>
                <?php
                        if(isset($_SESSION['dangky'])){
                            
                ?>
                        <p class="btn-dathang"><a class="btn-dathang-a" href="pages/main/thanhtoan/index.php?quanly=vanchuyen">Đặt hàng</a></p>
                <?php
                }else{
                
                ?>
                        <p><a href="index.php?quanly=dangnhap" style="text-decoration: none;color: red;">Đăng nhập đặt hàng</a></p>
                <?php
                    }

                ?>
        </td>
        <td><p style="text-align: center" class="xoa"><a style="text-decoration: none; color: black; " href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet">Xóa hết</a></p></td>
    </tr>
    <?php
        }else{
    ?>
    <hr>
    <tr>
        <td colspan="6">Hiện tại giỏ hàng trống</td>
    </tr>
    <?php
        }
    ?>
</table>
<style type="text/css">
    .btn-dathang-a{
        text-decoration: none;
    }
</style>
<p></p>