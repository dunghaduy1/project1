<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buger và cơm</title>
	<link rel="stylesheet" href="css/frontend.css">
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
		<div class="grid-container">
			<?php 
			$sql='select * from tbldoan where maLoaiDoAn=3 and trangThai=1';
			$result=mysqli_query($conn,$sql);
			while ($row= mysqli_fetch_assoc($result)) {
			?>
				<div style="width: 250px  " class="con grid-item">
					<img src="../upload/doan/<?php echo $row['anhDoAn']; ?>" width="250"/>
					<p class="tt"><?php echo $row['tenDoAn']; ?></p>
					<p class=" gia tt" ><?php echo formatCurrency($row['giaDoAn']); ?></p>
					<a href="themhang.php?id=<?php echo $row['maDoAn'];?>"><span onClick = "alert('Thêm thành công');" class="btn">Thêm vào giỏ</span></a>
					<a href="chitietdoan.php?id=<?php echo $row['maDoAn'];?>"><span class="btn">Xem chi tiết</span></a>       
				</div>
			<?php 
				}
			?>
		</div>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>