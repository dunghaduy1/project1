<?php
session_start();
if (isset($_GET["id"])) {	
	$idp = $_GET["id"];

	if (isset($_SESSION["cart"][$idp])) {
		$_SESSION["cart"][$idp] += 1;
	} else {
		$_SESSION["cart"][$idp] = 1;
	}
	header("location:javascript://history.go(-1)");
	
}
?>