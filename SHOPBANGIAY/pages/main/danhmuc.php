<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham ASC";
    $query_show =mysqli_query($connect,$sql_show);
   
    //get ten danh muc
    $sql_cate ="SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate =mysqli_query($connect,$sql_cate);
    $row_title =mysqli_fetch_array($query_cate);
?>

<p></p>

<h5> Danh mục |  
    <?php 
            if(isset($row_title['tendanhmuc'])){
                echo $row_title['tendanhmuc'];
            }else{
                echo "lỗi không lấy được data";
            }
    ?>

</h5>
<ul class="product1">
    <?php
        while ($row=mysqli_fetch_array($query_show)){
    ?>
    <div class="product-frame1">
        <ul class="product_list1">
            <li class="image-frame1">
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                    <h5 class="title_product"> <?php echo $row['tensanpham'] ?></h5>
                    <h5 class="price_product">Giá: <?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></h5>

                </a>
            </li>
        </ul>
    </div>            
    <!-- <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p></p>
            <h5 class="title_product"> <?php echo $row['tensanpham'] ?></h5>
            <h5 class="price_product">Giá: <?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></h5>
            <p style="text-align: center;"><?php echo "Xem chi tiết"?></p>
        </a>

    </li> -->

    <?php
        }
    ?>
</ul>
<style type="text/css">
   .product1 {
    list-style-type: none;
    padding: 0;
    display: grid; /* Sử dụng Grid để xếp hàng ngang */
    grid-template-columns: repeat(5, 1fr); /* Hiển thị 2 sản phẩm trên mỗi dòng */
}
.product_list1 {
    
    margin: 9px;
    list-style: none; /* Loại bỏ dấu đầu dòng của danh sách */
    display: flex; /* Sử dụng flexbox để xếp hàng ngang */
    padding: 0; /* Loại bỏ padding mặc định của danh sách */
    flex-wrap: wrap; /* Cho phép các thẻ li xuống dòng khi không đủ không gian */
}
.image-frame1 {
    border: 2px solid #ccc;
    padding: 10px;
    text-align: center;
    background-color: #EEE;
    box-sizing: border-box;
    margin-top: 17px;
    box-sizing: border-box; /* Để tính padding và border vào kích thước tổng */
}

.image-frame1 a {
    text-decoration: none;
    color: black;
}

.image-frame1 img {
    display: block;
    margin: 0 auto;
    transition: transform 0.3s ease;
    height: 300px;
}

.image-frame1:hover img {
    transform: scale(1.039);
}

.price_product1:hover {
    color: red;
}

.title_product1 {
    margin-top: px;
}

</style>