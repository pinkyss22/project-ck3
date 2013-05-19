<?php
	$name = $_POST['txtUser'];
	$pass = $_POST['txtPassWord'];
	$con = mysqli_connect("localhost","root","root","Choonline1");
	if(mysqli_connect_error($con))
	{
		echo "khong ket noi duoc"; 
	}
	else
	{
		echo" ket noi duoc";
	}
	$result = mysqli_query($con,"SELECT * FROM tai_khoan");
	while($row = mysqli_fetch_array($result))
	  {
		if(($name == $row['Ten_dang_nhap']) && ($pass == $row['Mat_khau']) && $row['Ma_tinh_trang'] == 1)
		{
			session_start();
			$_SESSION['name'] = $row['Ten_dang_nhap'];
			$_SESSION['count'] = 1;
			$_SESSION['type'] = $row ['Ma_loai_tai_khoan'];
			header('Location: index.php');
			break;
		}	
		else
		{
			echo "Error!";
			header('Location: Loi-dang-nhap.php');
		}
	  }
	mysqli_close($con);
?>
