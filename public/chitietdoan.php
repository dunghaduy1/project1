<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết đồ ăn</title>
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
			$id=$_GET['id']; 
			$sql='select * from tbldoan where maDoAn='.$id;
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
			?>
			
				<div style="width: 500px " style="float: left;">
					<img style="width: 500px;height: 500px;" src="../upload/doan/<?php echo $row['anhDoAn']; ?> "/>
				</div>

				<div style="float:right;">
					<h1 style="color: red;"><?php echo $row['tenDoAn']; ?></h1>
					<p class=""><?php echo $row['thongTin']?></p>
					<h2 style="color: red;"><?php echo formatCurrency($row['giaDoAn']); ?></h2>					
					<a onClick = "alert('Thêm thành công');" href="themhang.php?id=<?php echo $row['maDoAn'];?>"><span class="btn">Thêm vào giỏ</span></a>
				</div>
			
		</div>
		<div class="comment">
			<hr>
			<h3 style="color: black;">Bình luận</h3>
			<?php 
				$sqlm='SELECT tblkhachhang.name,tblkhachhang.maKH,tblbinhluan.noiDung FROM tblbinhluan INNER JOIN tblkhachhang ON tblbinhluan.maKH = tblkhachhang.maKH where maDoAn='.$id;
				$resultm = mysqli_query($conn,$sqlm);
				while ($rowm=mysqli_fetch_array($resultm)) {
			?>
				<div class="comment-con">
					<p><b><?php echo $rowm['name'] ?></b></p><p><?php echo $rowm['noiDung'] ?></p>
					

				</div>
			<?php
				}
			 ?>
			<?php 
				if (isset($_SESSION['name'])) {
					echo '<div class="" style="padding: 10px;">
							<form action="xlbinhluan.php" method="POST">
								<input type="hidden" name="maDoAn" value="'.$id.'">
								<textarea name="comment" cols="160" rows="10"></textarea>
								<input type="submit" value="Bình luận">
							</form>

						</div>';
				}
			 ?>	
		</div>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>