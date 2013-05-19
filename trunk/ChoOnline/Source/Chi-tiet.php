<?php 
	session_start();
	$count="";	
?>
<?php
	if(isset ($_SESSION['name']))
	{
		$count = 1;
		$name = $_SESSION['name'];
		//$data =  $_SESSION['data'];
	}
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Chợ Online</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css">
		<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		 <script type="text/javascript" src="2.js"></script>
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
								Tài khoản: <input name="txtUser" type="txt" size="12" maxlength="20" width="15">
								Mật khẩu: <input name="txtPassWord" type="password" size="12" maxlength="20" width="15">
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
			<div id="siderbar">
				<dl>
					<dt>Danh mục sản phẩm</dt>
					<?php
						$con = mysqli_connect('localhost','root','root','Choonline1');
						$result = mysqli_query($con, 'SELECT * FROM danh_muc');
						$i=1;
						while($row = mysqli_fetch_array($result))
						{
							?><dd><a href="danh-muc.php?id=<?php echo $i?>"><?php echo $row['Ten_danh_muc']?></a></dd>
						<?php
							$i++;
						}
					?>
				</dl>
				<dl>
					<dt></dt>
				</dl>
			</div>
			<div id="content">
				<div id="chitietsp">
				<?php
					if(is_numeric($_GET['k']) && isset($_GET['k']) && is_numeric($_GET['count']) && isset($_GET['count']))
					{
						$k = $_GET['k'];
						$count = $_GET['count'];
					}
					$con = mysqli_connect('localhost','root','root','choonline1');
					echo $count;
					$result = mysqli_query($con, "SELECT * FROM san_pham WHERE Ma_danh_muc = '$k'");
					$chay =1; 
					while($row = mysqli_fetch_array($result))
					{
						if($chay == $count)
						{
							echo "<div>";
							
							echo "</div>";
							echo "<div id='chitietleft'>";
							echo "<div id='container'>";
							echo "<div id='chitietright'>";
							echo "<span class='label'>";
								echo "Tên sản phẩm:";
							echo "</span>";
							echo "<span class='productname'>";
								echo $row['Ten_san_pham'];
							echo "</span>";
							echo "</div>";
							echo "<div id='information'>";
								echo "<span class='label'>";
								echo "Số lượt xem: ";
								echo "</span>";
								echo "<span class='factory'>";
								echo $row['So_luot_xem'];
								echo "</span>";
							echo "</div>";
							echo "<div id='information'>";							
								echo "<span class='label'>";
								echo "Số lượng bán: ";
								echo "</span>";
								echo "<span class='data'>";
								echo $row['So_luong_ban'];
								echo "</span>";
							echo "</div>";
							echo "<div id='information'>";
								echo "<span class='label'>";
								echo "Số lượng tồn:";
								echo "</span>";
								echo "<span class='data'>";
								echo $row['So_luong_ton'];
								echo "</span>";
							echo "</div>";
							echo "<div id='information'>";
								?><a href='them-vao.php?d=<?php echo $row['Ma_san_pham']?>'>
								<?php echo "<img src='img/shopping_cart.png' width='32'>"; echo "</a>";
							echo "</div>";
							echo "<div id='mota'>";
							echo "</br>";
							echo "Mô tả:";
								echo $row['Dac_ta'];
							echo "</div>";
							echo "<div id='Mota'>";
							echo "Bình luận:";
							echo "</div>";
							
							mysqli_query($con, "INSERT INTO  gio_hang (ma_gio_hang, ma_san_pham) VALUE (1, 2')");
							//while($row = mysqli_fetch_array($result))
							//	{
							//		//----------COMMENT
							//		echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
							//		while($row = mysql_fetch_array($result))
							//		{
								//	echo"<tr>";
								//		echo "<td>";
								//			echo "<strong>";
								//			echo $row['Ten_tai_khoan'];
								//			echo "</strong>";
								//	echo "<br />";
								//	echo $row['Binh_luan'];;
								//		echo "</td>";
								//	echo "</tr>";
								//	 }
								//	echo "</table>";
									//-----------
								//}	
								break;
						}
						else
							$chay++;
					}
				?>
				</div>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>