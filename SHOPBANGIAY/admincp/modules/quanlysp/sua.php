
<?php
    $sql_sua_sp="SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $result_sua_sp= mysqli_query($connect,$sql_sua_sp);
?>
<script>
        function validateForm() {
            var tensanpham = document.forms["myForm"]["tensanpham"].value;
            var masp= document.forms["myForm"]["masp"].value;
            var giasp= document.forms["myForm"]["giasp"].value;
            var soluong= document.forms["myForm"]["soluong"].value;
            var hinhanh= document.forms["myForm"]["hinhanh"].value;
            var tomtat= document.forms["myForm"]["tomtat"].value;

            if (tensanpham == ""|| masp== ""|| soluong==""||tomtat=="") {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
        }
    </script>
 <p>Sửa sản phẩm</p>
 <table border="1" width="50%" style="border-collapse: collapse;">
    <form name="myForm" onsubmit="return validateForm()" method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham']?>" enctype="multipart/form-data">
 <?php
    while($row =mysqli_fetch_array($result_sua_sp)){
        

?>
   
    <tr>
        <th colspan="2">Điền sản phẩm</th>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text"  value="<?php echo $row['tensanpham']?>" name="tensanpham" ></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp" value="<?php echo $row['masanpham']?>" ></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="number" name="giasp" value="<?php echo $row['giasanpham']?>"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" value="<?php echo $row['soluong']?>"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh" >
        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="150px" >
    </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td> <textarea name="tomtat"  rows="5" cols="50" style="resize: none;"><?php echo $row['tomtat']?></textarea> </td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td> <textarea name="noidung" rows="5"  cols="50" style="resize: none;"><?php echo $row['noidung']?></textarea> </td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc">
                <?php
                    $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc=mysqli_query($connect,$sql_danhmuc);
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                        if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                ?>
                <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                <option value="<?php echo $row_danhmuc['id_danhmuc']?>" selected><?php echo $row_danhmuc['tendanhmuc']?></option>
                <?php
                        }else{
                        
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                <?php
                        }
                    }
                ?>
          </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng </td>
        <td>
          <select name="hienthi">
              <?php
                if($row['trangthai']==1){
              ?>
                <option value="1" selected>Mới</option>
                <option value="0">Cũ</option>
                <?php
                }else{
                ?>
                <option value="1" >Mới</option>
                <option value="0" selected>Cũ</option>
                <?php
                }
                ?>
          </select>
        </td>
    </tr>
    <tr>

        <td colspan="2"  style="text-align: center;"><input type="submit" value="Sửa sản phẩm" name="suasanpham"></td>
    </tr>
</form>
<?php
}
?>
 </table>