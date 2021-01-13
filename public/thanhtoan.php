<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đặt hàng</title>
	<link rel="stylesheet" href="css/frontend.css">
	
</head>
<body>
	<?php 
		include_once'connect.php';
	 ?>
	<?php
		include_once 'header.php';
	?>

	<div id="content">
		<legend><h2>Thông tin giao hàng</h2></legend>
		<form name="#" action="xlthanhtoan.php" method="POST" style="width: 100%">
					<table style="width: 100%" cellspacing="6" cellpadding="6">
						<!-- Mã khách đặt hàng -->
						<input type="hidden" name="maKH" id="MaKH" value="<?php echo $_SESSION["maKH"]?>">		
						<tr>
							<td>Tên người nhận</td>
							<td><input type="text" name="tenKH" id="TenKH" value="<?php echo $_SESSION["name"]?>"> <span style="color: red">*</span></td>
						</tr>
						
						<input type="date"  value="<?php echo date("Y-m-d");?>" name="ngay" hidden="">
						<tr>
							<td>Điện thoại</td>
							<td><input type="text" name="soDienThoai" id="soDienThoai" required="" value="<?php echo $_SESSION["soDienThoai"]?>"> <span style="color: red">*</span></td>
						</tr>
						<tr>
							<td>Địa chỉ</td>
							<td><input type="text" name="diaChiNhan" id="Dia_chi" value=""></td>
						</tr>
						<tr>
							<td>Thanh toán</td>
							<td>
								<select name="thanhToan" id="">
									<option value="1">Thanh toán khi nhận hàng</option>
									<option value="2">Chuyển khoản</option>
									
								</select>
							</td>
						</tr>												
						<tr>	
							<td></td>						
							<td>
								<input type="submit" name="submit" value="Đặt hàng" onclick="" />
								<input type="reset" value="Làm lại">
							</td>
						</tr>
						<tr>
							<td colspan="2"><span id="msg_error" style="color: red"></span></td>
						</tr>
					</table>
				</form>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>