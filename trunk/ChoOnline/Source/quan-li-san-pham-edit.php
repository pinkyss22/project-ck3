<?php
	if(is_numeric($_GET['id']) && isset($_GET['id']))
		{
			$ma_san_pham = $_GET['id'];
		}
	$so_luong = $_POST['so_luong'];
	$con = mysqli_connect('localhost','root','root','choonline1');
	mysqli_query($con, "UPDATE san_pham SET So_luong_ton ='$so_luong' WHERE Ma_san_pham = '$ma_san_pham'");
	mysqli_close($con);
	header('Location: quan-li-san-pham.php');
?>