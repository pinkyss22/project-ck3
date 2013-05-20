<?php 
	session_start();
	$count="";	
?>
<?php
	if(isset ($_SESSION['name']))
	{
		$count = 1;
		$name = $_SESSION['name'];
	}
	else
	(
		header('Location: index.php')
	)
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Chợ Online</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<a href="index.php">
					<img src="img/logo.gif" width="900" height="60">
				</a>
				<div id="login">
					<?php
						if($count != 1 )
						{?>
								<form name="flogin" action="Login.php" method="post">
								Tài khoản: <input name="txtUser" type="txt" size="15" maxlength="20" width="15">
								Mật khẩu: <input name="txtPassWord" type="password" size="15" maxlength="20" width="15">
								<input type="submit" value="Đăng nhập">
								<a href="register.php"><input type="button" value="Đăng ký"></a>
							</form>
						<?php
						}
						else
						{
							echo "<div>";
							echo "Chào: "; echo "<a href='thong-tin-tai-khoan.php'>$name</a>";
							echo "</div>";
							echo "<div>";
							echo "<a href='logout.php'>Thoát</a>";
							echo "</div>";
						}
					?>
				</div>
				<!-- auto slide-->
				<div id="gallery">
					<a href="#" class="show">
						<img src="images/flowing-rock.jpg" alt="Flowing Rock" width="580" height="360" title="" alt="" rel="<h3>Flowing Rock</h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "/>
					</a>	
					<a href="#">
						<img src="images/grass-blades.jpg" alt="Grass Blades" width="580" height="360" title="" alt="" rel="<h3>Grass Blades</h3>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "/>
					</a>				
					<a href="#">
						<img src="images/ladybug.jpg" alt="Ladybug" width="580" height="360" title="" alt="" rel="<h3>Ladybug</h3>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."/>
					</a>
					<a href="#">
						<img src="images/lightning.jpg" alt="Lightning" width="580" height="360" title="" alt="" rel="<h3>Lightning</h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."/>
					</a>			
					<a href="#">
						<img src="images/lotus.jpg" alt="Lotus" width="580" height="360" title="" alt="" rel="<h3>Lotus</h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."/>
					</a>				
					<a href="#">
						<img src="images/mojave.jpg" alt="Mojave" width="580" height="360" title="" alt="" rel="<h3>Mojave</h3>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt."/>
					</a>		
					<a href="#">
						<img src="images/pier.jpg" alt="Pier" width="580" height="360" title="" alt="" rel="<h3>Pier</h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."/>
					</a>	
					<a href="#">
						<img src="images/sea-mist.jpg" alt="Sea Mist" width="580" height="360" title="" alt="" rel="<h3>Sea Mist</h3>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."/>
					</a>
					<a href="#">
						<img src="images/stones.jpg" alt="Stone" width="580" height="360" title="" alt="" rel="<h3>Stone</h3>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."/>
					</a>
					<div class="caption"><div class="content"></div></div>
				</div>
				<div class="clear"></div>
				<!-- -->
				<img src="img/header_2.png" width="900">
			</div>
			<div id="siderbar">
				<dl>
					<dt>Quản lí tài khoản</dt>
					<dd><a href="thong-tin-tai-khoan.php">Thông tin tài khoản</a></dd>
					<?php
						if($_SESSION['type'] == 1)
						{
							echo	"<dd><a href='don-hang.php'>Đơn hàng</a></dd>";
							echo 	"<dd><a href='treo-san-pham.php'>Treo sản phẩm</a></dd>";
							echo 	"<dd><a href='quan-li-san-pham.php'>Quản lí sản phẩm</a></dd>";
						}
						else if($_SESSION['type'] == 2)
						{
							echo 	"<dd><a href='gio-hang.php'>Giỏ hàng</a></dd>";
						}
					?>
				</dl>
			</div>
			<div id="content">
				<form action="edit-submit.php" method="post">
					<?php
						$con = mysqli_connect('localhost','root','root','choonline1');
						$result = mysqli_query ($con, "SELECT * FROM tai_khoan WHERE Ten_dang_nhap = '$name'");
						$row = mysqli_fetch_array($result);
						echo "Tên tài khoản: ";
						echo $row['Ten_dang_nhap'];;
						echo "</br>";
						echo "Nhập mật khẩu củ: <input type='password' name = 'mat_khau_cu'  placeholder= 'Nhập mật khẩu củ' size ='14'>";
						echo "</br>";
						echo "Nhập mật khẩu mới: <input type = 'password' name = 'mat_khau_moi' placeholder = 'Nhập mật khẩu mới' size= '14' >";
						echo "</br>";
						echo "Họ tên: ";
						echo $row['Ho_ten'];
						echo "</br>";
						echo "Cập nhật họ tên: <input type = 'text' name = 'ho_ten' placeholder ='Nhập họ tên'>";
						echo "</br>";
						echo "Địa chỉ: ";
						echo $row['Dia_chi'];
						echo "</br>";
						echo "Cập nhật lại địa chỉ: <input type = 'text' name = 'dia_chi' placeholder ='Nhập địa chỉ'>";
						echo "</br>";
						echo "Số điện thoại: ";
						echo $row['So_dien_thoai'];
						echo "</br>";
						echo "Cập nhật lại số diện thoại: <input type = 'text' name = 'so_dien_thoai' placeholder ='Nhập Số diện thoại'>";
						echo "</br>";
						echo "<input type='submit' value='Xác nhận'>";
					?>
				</form>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>