<?php
	if(is_numeric($_GET['id']) && isset($_GET['id']))
					{
						$Ma_danh_muc = $_GET['id'];
					}
	$k = $_POST['ten_moi']; 
	$con = mysqli_connect('localhost','root','root','choonline1');
		mysqli_query($con,"UPDATE danh_muc SET Ten_danh_muc ='$k' WHERE Ma_danh_muc =$Ma_danh_muc");
	mysqli_close($con);
	header('Location: quan-ly-danh-muc.php');
?>