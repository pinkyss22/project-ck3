<?php
	$con = mysqli_connect('localhost','root','root','ChoOnline');
	$result = mysqli_query($con, "SELECT * FROM User");
	
	$name = $_POST['fUsername'];
	$pass = $_POST['fPassword'];
	$fullname = $_POST['fName'];
	$address = $_POST['fAddress'];
	$phone = $_POST['fPhone'];
	$mail = $_POST['mail'];
	$type = $_POST['type'];
?>
<?php
	if(dem ==7)
	{
		$con = mysqli_connect('localhost','root','root','choonline1');
		mysqli_query($con, "INSERT INTO tai_khoan ()");
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
				<a href="home.html">
					<img src="img/logo.gif" width="900" height="60">
				</a>
				<div id="login">
					<form name="flogin" action="Login.php" method="post">
						Tài khoẻn: <input name="txtUser" type="txt" size="15" maxlength="20" width="15">
						Mật khẩu: <input name="txtPassWord" type="password" size="15" maxlength="20" width="15">
						<input type="submit" value="Đăng nhập">
						<input type="button" value="Đăng ký" onclick="Register.php">
					</form>
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
			</div>
			<div id="content">
				<form action="register-submit.php" method="post">
				<?php
					$dem=0;
				?>
					<h3>.:Thông tin người dùng:.</h3>
					<div>Tên đăng nhập:	<div class="iput"><input type="textbox" name="fUsername" width="800"></div></div>
					<?php
						if(strlen($name) < 6)
							{
								echo "Tên đăng nhập phải có ít nhất 6 kí tự.";
							}
						else
						{
							while($row = mysqli_fetch_array($result))
							{
								if($name == $row['Ten_dang_nhap'])
								{
									echo "Tên đăng nhập đã tồn tại";
									break;
								}
							}
							$dem++;
						}
						echo $dem;
					?>
					</br>
					<div>Mật khẩu:	<div class="iput"><input type="password" name="fPassword">
					</div></div>
					<?php
							if(strlen($pass<6))
							{
								echo "Mật khẩu phải có ít nhất 6 kí tự.";
							}
							else
							{
								$dem++;
							}
							echo $dem;
						?>
					</br>
					</br>
					<div>Thông tin cá nhân:
					</br>
					<div>Họ và tên:<div class="iput"><input type="textbox" name="fName"></div></div>
					<?php
						if(strlen($fullname) ==0)
						{
							echo "Nhập lại họ tên";
						}
						else
						{
							$dem++;
						}
						echo $dem;
					?>
					</br>
					<div>Email: <div class="iput"><input type="text" name="mail"></div></div>
					<?php
						if(strlen($mail) == 0)
						{
							echo "Nhập lại Email.";
						}
						else
						{
							$dem++;
						}
						echo $dem;
					?>
					</br>
					<div>Địa chỉ:<div class="iput"><input type ="textbox" name="fAddress"></div></div>
					<?php
						if(strlen($address) == 0)
						{
							echo "Nhập lại địa chỉ.";
						}
						else
						{
							$dem++;
						}
						echo $dem;
					?>
					</br>
					<div>Số điện thoại:<div class="iput"><input type="text" name="fPhone"></div> </div>
					<?php
						if(strlen($phone) ==0)
						{
							echo "Nhập lại số điện thoại.";
						}
						else
						{
							$dem++;
						}
						echo $dem;
					?>
					</br>
					<h3>.:Phân loại người dùng:.</h3>
					<input type="radio" name="type" value="seller"> Bán hàng</br>
					<input type="radio" name="type" value="buyer"> Mua hàng</br>
					<?
						if(strlen($type)==0)
						(
							echo "chọn lai loại tài khoản";
						)
						else
						{
							$dem++;
						}
					?>
					<div id="submit"><input type="submit" value="Đăng kí"></div>
			</form>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>