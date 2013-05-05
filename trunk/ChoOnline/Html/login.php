<?php
	$name = $_POST['txtUser'];
	$pass = $_POST['txtPassWord'];
	$con = mysqli_connect("localhost","root","root","ChoOnline");
	if(mysqli_connect_error($con))
	{
		echo "khong ket noi duoc"; 
	}
	else
	{
		echo" ket noi duoc";
	}
	$result = mysqli_query($con,"SELECT * FROM user");
	while($row = mysqli_fetch_array($result))
	  {
		if(($name==$row['UserName']) && ($pass==$row['PassWord']))
		{
			session_start();
			$_SESSION['Name'] = $row['UserName'];
			header('Location: Home.php');
		}	
		else
		{
			header('Location: index.html');
		}
	  }
	mysqli_close($con);
?>