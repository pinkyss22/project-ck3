<?php
	session_start(); 

	if(isset ($_SESSION['name']))
	{
		header ('Location: index.php');
		$temp=1;
	}
	session_destroy();
	header('Location: index.php');
?>