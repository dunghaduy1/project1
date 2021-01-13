<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gà rán</title>
	<link rel="stylesheet" href="css/frontend.css">
		<link href="https://fonts.googleapis.com/css2?family=Literata:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
		include_once'connect.php';
	 ?>
	<?php
		include_once 'header.php';
	?>

	<div id="content">
		<?php
			$maKH=$_POST["maKH"];
			
			$ngay=$_POST["ngay"];
			
			$tenKH=$_POST["tenKH"];
			
			$diaChiNhan=$_POST["diaChiNhan"];
			
			$soDienThoai=$_POST["soDienThoai"];
			
			$thanhToan=$_POST["thanhToan"];
			
			$totalBill=$_SESSION["totalBill"];


			if (isset($_POST["submit"])) {
				$sql = "INSERT INTO `tblhoadon`(`maKH`,`ngay`,`tenNguoiNhan`, `diaChiNhan`,`soDienThoai`, `maPtThanhToan`,`tongTien`) VALUES (?,?,?,?,?,?,?)";

				$stmt = mysqli_prepare($conn, $sql);

				
				mysqli_stmt_bind_param($stmt,'isssisd',$maKH,$ngay,$tenKH,$diaChiNhan,$soDienThoai,$thanhToan,$totalBill);

				if (mysqli_stmt_execute($stmt)) {

					echo "<h1 style='text-align:center'>Đặt hàng thành công</h1>";
					$idhd = mysqli_stmt_insert_id($stmt); // Lấy id hóa đơn sau khi thêm >>> đổ lên Hóa Đơn Chi Tiết

					$arrCart = $_SESSION["cart"]; // Biến mảng (từ session) chứa các sản phẩm trong giỏ hàng
					$sql = ""; // Lệnh truy vấn		
					foreach ($arrCart as $key => $value) {
						$sql .= "INSERT INTO `tblhoadonchitiet`(`maHoaDon`, `maDoAn`, `soLuong`, `giaTien`) VALUES (".$idhd.",".$key.",".$value.",(SELECT`giaDoAn` FROM `tbldoan` WHERE `maDoAn` = ".$key."));";
					}
				
					if (mysqli_multi_query($conn, $sql)) {
						echo "<h3 style='text-align:center'>Thêm chi tiết Hóa Đơn thành công</h3>";
					} else {
						echo "<span style='color:red'>Lỗi thêm Chi Tiết Hóa Đơn: ".mysqli_error($conn)."</span>";
					}

					// Làm sạch giỏ hàng sau khi thanh toán
					unset($_SESSION["cart"]);
					unset($_SESSION["totalBill"]);
				}			
			}
			
		?>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>