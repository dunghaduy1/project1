<?php 

$conn=mysqli_connect('localhost','root','','banh_food');
 
 function formatCurrency($curr){
	$fmt = numfmt_create("vi_VN", NumberFormatter::CURRENCY);
	return numfmt_format_currency($fmt, $curr, "VND");
}


function formatNumber($num, $decimal){
	return number_format($num, $decimal, ',', '.'); // Định dạng kiểu thập phân là dấu <,>
}
 ?>