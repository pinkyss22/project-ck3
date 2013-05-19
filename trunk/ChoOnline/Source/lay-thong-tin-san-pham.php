<?php
	//$ten_san_pham = $_GET['ten_san_pham'];
	//$gia = $_GET['gia_ban'];
	//$thong_tin_san_pham = $_GET['thong_tin_san_pham'];
	//$so_luong = $_GET['so_luong'];
	$con = mysqli_connect('localhost','root','root','choonline1');
	$result = mysqli_query($con, "SELECT * FROM san_pham");
	$so_dong = mysqli_num_rows($result);
	echo $so_dong;
	$row = mysqli_fetch_array($result);
	$sql = "INSERT INTO san_pham (Ma_san_pham, Ten_san_pham, Gia_ban, Dac_ta, Ma_tinh_trang, So_luong_ton, So_luong_ban, So_luot_xem, Ma_nguoi_ban) VALUE (99,'$_GET[ten_san_pham]', '$_GET[gia_ban]', '$_GET[thong_tin_san_pham]', 1,'$_GET[so_luong]', 0, 0 )";
	if (!mysqli_query($con,$sql))
		{
		  die('Error: ' . mysqli_error($con));
		 }
		echo "1 record added";
?>