<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    require('../../../carbon/autoload.php');
    include "../../config/connect.php";

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_giohang SET cart_status=0 WHERE code_cart='".$code_cart."'";
		$query = mysqli_query($connect,$sql_update);
        
        //Thống kê doanh thu
        $sql_lietke_dh = "SELECT * FROM tbl_cart_detail,tbl_sanpham WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_detail.code_cart='$code_cart' ORDER BY tbl_cart_detail.id_cart_detail DESC";
        $query_lietke_dh = mysqli_query($connect,$sql_lietke_dh);

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat = '$now'";
        $query_thongke = mysqli_query($connect,$sql_thongke);

        $i = 0;
        $tongtien = 0;
        $doanhthu = 0;

        while ($row = mysqli_fetch_array($query_lietke_dh)) {
            $i++;
            $thanhtien = $row['giasanpham'] * $row['soluongmua'];
            $tongtien += $thanhtien;
        }

        if (mysqli_num_rows($query_thongke) == 0) {
            $doanhthu = $tongtien; // Giả sử bạn muốn đặt doanhthu thành tổng số tiền trong ngày
            $sql_update_thongke = mysqli_query($connect, "INSERT INTO tbl_thongke(ngaydat,doanhthu) VALUES('$now','$doanhthu')");
        } else {
            // Tổng hợp doanhthu từ tất cả các hàng
            while ($row_tk = mysqli_fetch_array($query_thongke)) {
            $doanhthu += $row_tk['doanhthu'];
            }
            $doanhthu += $tongtien; // Thêm giá trị doanhthu mới
            $sql_update_thongke = mysqli_query($connect, "UPDATE tbl_thongke SET doanhthu='$doanhthu' WHERE ngaydat='$now'");
        }

        header('Location:../../index.php?action=quanlydonhang&query=them');
	}
    if(isset($_GET['iddonhang'])){
        $id=$_GET['iddonhang'];
        $sql_delete="DELETE FROM tbl_giohang WHERE  code_cart='$id'";
        mysqli_query($connect,$sql_delete);
        $sql_delete_cart_detail="DELETE FROM tbl_cart_detail WHERE  code_cart='$id'";
        mysqli_query($connect,$sql_delete_cart_detail);
        header('Location:../../index.php?action=quanlydonhang&query=them');
    }
?>