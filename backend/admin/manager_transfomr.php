<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bảnh Food</title>
	<link rel="stylesheet" href="../css/main_style.css">
</head>
<body>
	<!-- Header -->
	<header><?php require_once 'header.php';?></header>

	<!-- Body -->
	<div class="content-center main-body">
		<!-- Danh mục -->
		<div style="width: 20%; float: left;">
			<?php include_once 'menu.php';?>
		</div>
		<!-- Nội dung -->
		<div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px; background: blue;">
			<h1>Phương thức vận chuyển</h1>
		</div>
	</div>

	<!-- Footer -->
	<footer><?php require_once 'footer.php';?></footer>
</body>
</html>