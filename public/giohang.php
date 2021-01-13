<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
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
		<h2>Giỏ hàng</h2>
		<?php 
			if (isset($_SESSION["cart"])) {
				echo "<hr>Số sản phẩm trong giỏ hàng là: " . count($_SESSION["cart"]);
				$arrCart = $_SESSION["cart"];
				$item = array();

				foreach ($arrCart as $key => $value) {
					$item[] = $key;
				}
				$paramIN = implode(",", $item);
				$sql = "SELECT * FROM tbldoan WHERE maDoAn IN (".$paramIN.")";
				$result = mysqli_query($conn, $sql);
				echo "<br>";
			
		 ?>
		 <form action="updatehang.php" method="post">
			<!-- In bảng dữ liệu -->
			<table border="1" width="100%">
				<tr>
					<th>Mã</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th>Xóa</th>
				</tr>
		<?php
			// Duyệt in dòng dữ liệu
			$totalBill = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td width='15'>".$row["maDoAn"]."</td>";
				echo "<td>".$row["tenDoAn"]."</td>";
				echo "<td style='text-align: center'><img width='50' height='50' src='../upload/doan/".$row["anhDoAn"]."' alt='Lỗi hiển thị ảnh'></td>";
				// Cài đặt số lượng sản phẩm tối thiểu là 1
				echo "<td class='box-num-count'><input type='number' name='soluong[".$row["maDoAn"]."]' min='1' value=".$arrCart[$row["maDoAn"]]."></td>";
				echo "<td>".formatCurrency($row["giaDoAn"])."</td>";
				$totalBill += ($arrCart[$row["maDoAn"]] * $row["giaDoAn"]);
				$_SESSION["totalBill"]=$totalBill;
				echo "<td>".formatCurrency($arrCart[$row["maDoAn"]] * $row["giaDoAn"])."</td>";
				echo "<td style='width: 50px; text-align: center;'><a href='xoahang.php?id=".$row["maDoAn"]."'><img src='public/images/ic_delete.png' alt='Xóa'></a></td>";
				echo "</tr>";
			}
		?>
			<tr>
				<td colspan="7" style="" class="box-num-count">
					<span style="font-weight: bold;">Tổng giá trị đơn hàng: <?php echo formatCurrency($totalBill);?></span>
					<input type="submit" name="submit" value="Cập nhật giỏ hàng">					
				</td>
			</tr>			
			</table>
			</form>
			<a href="thanhtoan.php" style="float: right; margin-top: 5px;"><button>Thanh toán</button></a>
		<?php

			} else {
				echo "Không có sản phẩm trong GIỎ HÀNG!";
			}
		?>		
	</div>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>