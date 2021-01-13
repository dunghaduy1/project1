<?php
session_start();
if (isset($_GET["id"])) {	
	$idp = $_GET["id"];	
	

	if (isset($_SESSION["cart"][$idp])) {
		unset($_SESSION["cart"][$idp]);
	}

	header("Location: giohang.php");
}
?>