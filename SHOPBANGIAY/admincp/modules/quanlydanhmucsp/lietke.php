
<?php
    $sql_lietke="SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $result_lietke= mysqli_query($connect,$sql_lietke);
?>
<p style="font-size:30px;"><b>Liệt kê danh mục sản phẩm</b></p>
<hr style="margin-top:-20px;">

 <table border="1" style="width: 100%;" style="border-collapse:collapse;"> 
     <tr style="text-align: center;">
         <td>ID</td>
         <td>Tên danh mục</td>
         <td>Thứ tự</td>
         <td>Chức năng</td>
     </tr>
     <?php
    $i=0;
    while($row=mysqli_fetch_array($result_lietke)){
        $i++;
    
     ?>
     <tr style="border-top:2px orange solid">
         <td style="text-align: center;"><?php echo $i ?></td>
         <td style="text-align: center;"><?php echo $row['tendanhmuc'] ?></td>
         <td style="text-align: center;"><?php echo $row['thutu']?></td>
         <td style="text-align: center;">
            <div class="xoasua">
            <button style="background-color: #DCDCDC;"><a style="color: black;" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>" class="xoa">Xóa</a></button>
            <button style="background-color: #DCDCDC; pointer: cursor";><a style="color: black;" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>"class="sua">Sửa</a></button>
            </div>
         </td>
         <style type="text/css">
             .xoasua:hover{
                color: gray;
             }
         </style>
     </tr>
     <?php
    }
    ?>
 </table>