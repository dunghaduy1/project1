<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Combo</title>
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
		<div class="grid-container">
			<?php 
				$timkiem=$_GET['txtTimKiem'];
				$sql="select * from tbldoan where tenDoAn like '%$timkiem%'";
				$result=mysqli_query($conn,$sql);
				while ($row= mysqli_fetch_assoc($result)) {
			?>
				<div style="width: 250px  " class="con grid-item">
					<img src="../upload/doan/<?php echo $row['anhDoAn']; ?>" width="250"/>
					<p class="tt"><?php echo $row['tenDoAn']; ?></p>
					<p class=" gia tt" ><?php echo formatCurrency($row['giaDoAn']); ?></p>
					<a href="themhang.php?id=<?php echo $row['maDoAn'];?>"><span class="btn">Thêm vào giỏ</span></a>
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