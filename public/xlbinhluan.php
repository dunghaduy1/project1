<?php 
		session_start();
				include_once'connect.php';
				$comment= $_POST['comment'];
				$maKH= $_SESSION['maKH'];
				$maDoAn= $_POST['maDoAn'];
				if (empty($comment)) {
					header("location:javascript://history.go(-1)");
				}else{
					echo $sql="INSERT INTO `tblbinhluan` (`maDoAn`, `maKH`, `noiDung`) VALUES ('".$maDoAn."', '".$maKH."', '".$comment."'); ";
					mysqli_query($conn,$sql);
					header("location:javascript://history.go(-1)");
				}
			 ?>