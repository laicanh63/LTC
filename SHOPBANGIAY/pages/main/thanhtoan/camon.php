<?php 
    session_start();
    include('../../../admincp/config/connect.php');
    require('../../../carbon/autoload.php');
	require('../../../mail/sendmail.php');
	require('config_vnpay.php');
	
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	$now=Carbon::now('Asia/Ho_Chi_Minh');

    if(isset($_GET['vnp_Amount'])) {
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $code_cart = $_SESSION['code_cart'];
        $id_khachhang = $_SESSION['id_khachhang'];
        $code_order = rand(0,9999);// random tuwf 0 den 4 so
	    $cart_pay= 'vnpay';

        //insert database vnpay
        $insert_vnpay = "INSERT INTO tbl_vnpay(vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_transactionno, code_cart)
        VALUE('".$vnp_Amount."', '".$vnp_BankCode."', '". $vnp_BankTranNo."', '".$vnp_CardType."', '".$vnp_OrderInfo."', '".$vnp_PayDate."', '".$vnp_TmnCode."', '".$vnp_TransactionNo."', '".$code_cart."')";
        $cart_query = mysqli_query($connect, $insert_vnpay);
        $insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,cart_payment,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$cart_pay."','".$now."')";
		$cart_query = mysqli_query($connect,$insert_cart);
				//thêm giỏ hàng chi tiết
			foreach($_SESSION['cart'] as $key => $value){
				$id_sanpham=$value['id'];
				$soluong=$value['soluong'];
				$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
				mysqli_query($connect,$insert_order_details);
			}
            if ($cart_query) {
                // Gui mail
                $tieude = "Đặt hàng Nike thành công!";
                $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng: " . $code_order . "</p>";
                $noidung .= "<h4>Nội dung đơn hàng bao gồm: </h4>";
                $noidung .= "<table style='border-collapse: collapse; width: 100%;'>";
                $noidung .= "<tr>
                                <th style='border: 1px solid black; padding: 8px;'>Tên sản phẩm</th>
                                <th style='border: 1px solid black; padding: 8px;'>Mã sản phẩm</th>
                                <th style='border: 1px solid black; padding: 8px;'>Giá sản phẩm</th>
                                <th style='border: 1px solid black; padding: 8px;'>Số lượng</th>
                            </tr>";
            
                foreach ($_SESSION['cart'] as $key => $value) {
                    $noidung .= "<tr>
                                    <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$value['tensanpham']."</td>
                                    <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$value['masp']."</td>
                                    <td style='border: 1px solid black; padding: 8px; text-align: center;'>".number_format($value['giasanpham'], 0, ',', '.')."đ</td>
                                    <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$value['soluong']."</td>
                                </tr>";
                }
            
                $noidung .= "</table>";
            
                $maildathang = $_SESSION['email'];
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
            
                // $_GET['xoatatca'] == 'xoahet';
        if($cart_query) {
            echo '<h2>Giao dịch bằng VNPAY thành công!</h2>';
            echo '<h3>Cảm ơn bạn đã lựa chọn và tin tưởng sản phẩm của chúng tôi!</h>';
            echo '<br>';
            echo '<br>';
            echo '<a href="http://localhost/nike/pages/main/thanhtoan/bill.php"><button>In hóa đơn</button></a>';
        } else {
            echo '<h2>Giao dịch bằng VNPAY thất bại!</h2>';
            echo '<a href="http://localhost/nike/pages/main/thanhtoan/index.php?quanly=thongtinthanhtoan"><button>Quay về trang thanh toán</button></a>';
            echo '<a href="http://localhost/nike/index.php"><button>Quay về trang chủ</button></a>';
        }
    }
}
?>