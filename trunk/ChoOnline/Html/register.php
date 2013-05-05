<?php
	$nameuser = $_POST['fUsername'];
	$pass = $_POST['fPassword'];
	$pass2 = $_POST['fRepassword'];
	$name = $_POST['fName'];
	$phone = $_POST['fPhone'];
	//connect database
	$con = mysqli_connect("localhost", "root", "root", "ChoOnline");
	if(mysqli_connect_error($con))
	{
		echo "khong ket noi duoc";
	}
	else
	{
		echo "ket noi duoc";
	}
	// insert to database - user table
	$sql = "INSERT INTO user (UserName, PassWord, Ho_ten, SDT ) VALUES ($nameuser, $pass, $name, $phone))";
	if(!mysqli_query($con,$sql))
	{
		echo "Error!";
	}
	else
	{
		echo "1 record added";
	}
	
	mysqli_close($con);
?>