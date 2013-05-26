<?php
	if(is_numeric($_GET['i']) && isset($_GET['i']))
	{
		$id = $_GET['i'];
	}
	$loai_tai_khoan = $_POST['type'];
	$con = mysqli_connect('localhost','root','root','choonline1');
	#$result = mysqli_query($con, "SELECT * FROM tai_khoan WHERE Ten_dang_nhap = '$name'");
	#$row = mysqli_fetch_array($result);
	mysqli_query ($con, "UPDATE tai_khoan SET Ma_loai_tai_khoan = $loai_tai_khoan WHERE Ma_tai_khoan = '$id'");		
	mysqli_close($con);
	#header('Location: quan-ly-tai-khoan-nguoi-dung.php');
?>