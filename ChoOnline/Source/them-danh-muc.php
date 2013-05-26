<?php
	$con = mysqli_connect('localhost','root','root','choonline1');
	mysqli_query($con, "INSERT INTO danh_muc (Ten_danh_muc) VALUES('$_POST[ten_danh_muc]')");
	mysqli_close($con);
	header('Location: quan-ly-danh-muc.php');
?>