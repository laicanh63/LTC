<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
	AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($connect,$sql_pro);
	
?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
	<ul class="product_list1">
		<?php
		while($row = mysqli_fetch_array($query_pro)){ 
		?>
		<div class="product-frame1">
        <ul class="product_list1">
            <li class="image-frame1">
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                    <h5 class="title_product"> <?php echo $row['tensanpham'] ?></h5>
                    <h5 class="price_product">Giá: <?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></h5>
                    <h5 style="text-align: center;color:black;"><?php echo $row['tendanhmuc'] ?></h5>
                </a>
            </li>
        </ul>
    </div>         
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