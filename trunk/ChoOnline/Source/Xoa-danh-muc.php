<?php
	if(is_numeric($_GET['id']) && isset($_GET['id']))
	{
		$ma_danh_muc = $_GET['id'];
	}
	$con = mysqli_connect('localhost','root','root','choonline1');	
	mysqli_query($con, "DELETE FROM danh_muc WHERE Ma_danh_muc = $ma_danh_muc");
	$a = mysqli_query($con, "SELECT * FROM danh_muc");
	mysqli_close($con);
	#header('Location: quan-ly-danh-muc.php');
?>