<?php
	session_start();
?>
<?php
	if(is_numeric($_GET['d']) && isset($_GET['d']))
					{
						$ma_san_pham = $_GET['d'];
					}
	$con = mysqli_connect('localhost', 'root', 'root','choonline1');
	$result= mysqli_query($con, "SELECT * FROM san_pham WHERE Ma_san_pham = 'ma_san_pham'");
	mysqli_query($con, "INSERT INTO  gio_hang (ma_gio_hang, ma_san_pham) VALUE (1, 2')");
	header('location: chi-tiet.php');
?>