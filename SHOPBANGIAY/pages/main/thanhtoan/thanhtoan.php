
 <?php
	
	session_start();
	include('../../../admincp/config/connect.php');
	require('../../../carbon/autoload.php');
	require('../../../mail/sendmail.php');
	require('config_vnpay.php');
	
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	$now=Carbon::now('Asia/Ho_Chi_Minh');
	if(isset($_POST['redirect'])){
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_order = rand(0,9999);// random tuwf 0 den 4 so
	$cart_pay=$_POST['payment'];
	
	$tongtien = 0;
	foreach($_SESSION['cart'] as $key => $value){
		$thanhtien = $value['soluong'] * $value['giasanpham'];
        $tongtien += $thanhtien;
	}

	if($cart_pay == 'Tiền Mặt' || $cart_pay == 'Chuyển Khoản') {
	//insert vao don hang		
	$insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,cart_payment,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$cart_pay."','".$now."')";
	$cart_query = mysqli_query($connect,$insert_cart);
	// if($cart_query){
		//thêm giỏ hàng chi tiết
		foreach($_SESSION['cart'] as $key => $value){
			$id_sanpham=$value['id'];
			$soluong=$value['soluong'];
			$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
			mysqli_query($connect,$insert_order_details);
		// }
	}
} elseif ($cart_pay == 'vnpay') {
	//thanh toan bang vnpay
	$vnp_TxnRef = $code_order;
	$vnp_OrderInfo = 'Thanh toán đơn hàng';
	$vnp_OrderType = 'billpayment';
	$vnp_Amount = $tongtien * 100;
	$vnp_Locale = 'vn';
	$vnp_BankCode = 'NCB';
	$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

	$vnp_ExpireDate = $expire;

	$inputData = array(
    	"vnp_Version" => "2.1.0",
    	"vnp_TmnCode" => $vnp_TmnCode,
    	"vnp_Amount" => $vnp_Amount,
    	"vnp_Command" => "pay",
    	"vnp_CreateDate" => date('YmdHis'),
    	"vnp_CurrCode" => "VND",
    	"vnp_IpAddr" => $vnp_IpAddr,
    	"vnp_Locale" => $vnp_Locale,
    	"vnp_OrderInfo" => $vnp_OrderInfo,
    	"vnp_OrderType" => $vnp_OrderType,
    	"vnp_ReturnUrl" => $vnp_Returnurl,
    	"vnp_TxnRef" => $vnp_TxnRef,
    	"vnp_ExpireDate"=>$vnp_ExpireDate,
	);

	if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    	$inputData['vnp_BankCode'] = $vnp_BankCode;
	}

	ksort($inputData);
	$query = "";
	$i = 0;
	$hashdata = "";
	foreach ($inputData as $key => $value) {
    	if ($i == 1) {
    		$hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    	} else {
        	$hashdata .= urlencode($key) . "=" . urlencode($value);
        	$i = 1;
    	}
    	$query .= urlencode($key) . "=" . urlencode($value) . '&';
	}

	$vnp_Url = $vnp_Url . "?" . $query;
	if (isset($vnp_HashSecret)) {
    	$vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    	$vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
	}
	$returnData = array('code' => '00'
	    , 'message' => 'success'
	    , 'data' => $vnp_Url);
	    if (isset($_POST['redirect'])) {
			$_SESSION['code_cart'] = $code_order;

			// $insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,cart_payment,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$cart_pay."','".$now."')";
			// $cart_query = mysqli_query($connect,$insert_cart);
			// 	//thêm giỏ hàng chi tiết
			// 	foreach($_SESSION['cart'] as $key => $value){
			// 		$id_sanpham=$value['id'];
			// 		$soluong=$value['soluong'];
			// 		$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
			// 		mysqli_query($connect,$insert_order_details);
			// }
			header('Location: ' . $vnp_Url);
			die();
		} else {
	        echo json_encode($returnData);
	    }
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
	
		$_GET['xoatatca'] == 'xoahet';
		// unset($_SESSION['cart']);
	}
	
	if ($cart_pay == 'Tiền Mặt') {
        header('Location:bill.php');
    } elseif ($cart_pay == 'Chuyển Khoản') {
        header('Location: thanhtoanqr/thanhtoanqr.php');
    } else {
         // Default redirection if payment method is not recognized
         header('Location: default_page.php');
    }
}	


?>