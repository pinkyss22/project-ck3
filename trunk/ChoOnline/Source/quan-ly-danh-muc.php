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
								Tài khoản: <input name="txtUser" type="txt" size="12" maxlength="20" width="10">
								Mật khẩu: <input name="txtPassWord" type="password" size="12" maxlength="20" width="10">
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
						mysqli_close($con);
					?>
				</dl>
				<dl>
				<?php						
					if($count == 1 )
					{						
						$con1 = mysqli_connect('localhost','root','root','choonline1');
						$a = mysqli_query($con1, "SELECT * FROM tai_khoan WHERE Ten_dang_nhap = '$name'"); 
						$row1 = mysqli_fetch_array($a);
						$ma_loai_tai_khoan = $row1['Ma_loai_tai_khoan'];
						echo "<dt>Tài khoản</dt>";
						echo "<dd><a href='thong-tin-tai-khoan.php'>quản lý tài khoản</a></dd>";
						if($ma_loai_tai_khoan == 3)
						{							
							echo "<dd>";
								echo "<a href='quan-ly-tai-khoan-nguoi-dung.php'>";
									echo "Quản lý tài khoản người dùng";
								echo "</a>";
							echo "</dd>";
							echo "<dd>";
								echo "<a href=''>";
									echo "Quản lý danh mục";
								echo "</a>";
							echo "</dd>";
							echo "<dd>";
								echo "<a href=''>";
									echo "Quản lý giao diện";
								echo "</a>";
							echo "</dd>";
						}
					}
					
				?>	
				</dl>
			</div>
			<div id="content">
			<h2>Quản lí danh mục</h2>
				<table border ="1">
					<tr>
						<td><b>STT</b></td>
						<td><b>Tên danh mục</b></td>
						<td><b>Sữa</b></td>
						<td><b>Xoá</b></td>
					<tr>
					<?php
						$con = mysqli_connect('localhost','root','root','choonline1');
						$result = mysqli_query($con, "SELECT * FROM danh_muc");
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
								echo "<td>";
									echo $row['Ma_danh_muc'];
								echo "</td>";
								echo "<td>";
									echo $row['Ten_danh_muc'];
								echo "</td>";
								echo "<td>";
								$ma_danh_muc = $row['Ma_danh_muc'];
									echo "<form action = 'chinh-sua-ten-danh-muc.php?id=$ma_danh_muc' method='post'>" ;
										echo "Tên mới:";
										echo "<input type ='text' name = 'ten_moi'>";
										echo "<input type='submit' value ='Xác nhận'>";
									echo '</form>';
								echo "</td>";
								echo "<td>";
									echo "<form action = 'Xoa-danh-muc.php?id=$ma_danh_muc' method='post'>";	
										echo "<input type='submit' value='Xóa'>";
									echo "</form>";
								echo "</td>";
								echo "</tr>";
						}
					?>
				</table>		
									<h3><b>Thêm danh mục:</b></h3>
									<form action = "them-danh-muc.php" method="post">
									<input type ="text" name = "ten_danh_muc">
									<input type="submit" value="Thêm">
									</form>		
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>