<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

 <?php
    $sql_chitiet ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet=mysqli_query($connect,$sql_chitiet);
    while ($row_chitiet=mysqli_fetch_array($query_chitiet)){
 ?>
 <div class="warpper_deital">
 <div class="hinhanh_sanpham">
        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
 </div>
    <form class="form-sp" action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
        <div class="chitiet_sanpham">
            <h3 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <div class="rating">
               <span class="review-no">4.8</span>
               <div class="stars">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
               </div>
            </div>
            <div class="price">
               <?php $salerandom=rand(10,70) ?>         
               <p class="gia-cu"><?php echo number_format($row_chitiet['giasanpham']*($salerandom/100)+ $row_chitiet['giasanpham'],0,',','.')?> VNĐ</p>
               <h5 class="gia-now"><?php echo number_format($row_chitiet['giasanpham'],0,',','.') ?> VNĐ</h5>
               <span class="slae"><?php echo  $salerandom ?>% GIẢM</span>
            </div>
            <div class="soluong-sp">
               <p class="soluong-sp-p"><b>Số lượng:</b></p>
               <div class="soluong-sp-dem">
                  <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                  <input class="soluong-sp-input" type="text" name="soluong" value="1">
                  <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
               </div>
               <p class="soluong-sp-cosan"><?php echo $row_chitiet['soluong'] ?></p><span class="soluong-sp-cosan-text">sản phẩm còn sẵn</span>
            </div>
            <div>
                <label for="shoe-size" style="font-weight: bold;">Size:</label>
                       <select class="size">
                        <option value="">Size</option>
                        <option value="size-35">Size 35</option>
                        <option value="Size-36">Size 36</option>
                        <option value="Size-37">Size 37</option>
                        <option value="Size 38">Size 38</option>
                        <option value="Size-39">Size 39</option>
                        <option value="Size-40">Size 40</option>
                        <option value="Size-41">Size 41</option>
                        <option value="Size-42">Size 42</option>
                        <option value="Size-43">Size 43</option>
                       </select>
            </div>
            <div class="mota">
                  <p class="mota-text"><b>Danh mục:</b> <?php echo $row_chitiet['tendanhmuc']?> </p>
            </div>
            
            <div class="mota">
               <p class="mota-text"><b>Mô tả:</b> <?php echo $row_chitiet['tomtat']?> </p>
            </div>
            <div style="border-radius:10px ;" class="input-themcart">
               <i class="fa-solid fa-cart-plus"></i>
               <input style="border-radius:10px ;" class="themgiohang" type="submit" name="themgiohang" value="Thêm Giỏ Hàng">
            </div>
        </div>
    </form>
 </div>
 <?php
    }
 ?>
 <script type="text/javascript">
      var soluong = document.querySelector('.soluong-sp-input');
      var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
      var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
      var soluongMax = document.querySelector('.soluong-sp-cosan').innerHTML;
      console.log(soluongMax);
      
      demPlus.addEventListener('click',function(){
         // console.log("hi");
         // soluong.value++;
         if(soluong.value>=soluongMax){
            alert("Số lượng sản phẩm còn lại chỉ còn: "+soluongMax);
            soluong.value=soluongMax;
         } else {
            soluong.value++;
         }
      })
      demMins.addEventListener('click', function(){
          if(soluong.value<=1){
            alert('Số lượng sản phẩm phải lớn hơn bằng 1');
            soluong.value=1;
          } else {
            soluong.value--;
          }
      })

 </script>

 <!-- Tesst -->
 <?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show_new ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.trangthai=0 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 5";
    $query_show_new =mysqli_query($connect,$sql_show_new);
?>
 <h3 style="text-align:center">SẢN PHẨM KHÁC</h3>
<ul class="product1" >
    <?php
        while ($row=mysqli_fetch_array($query_show_new)){
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