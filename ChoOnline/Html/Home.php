<?php 
	session_start(); 
?>
<?php
	if(isset ($_SESSION['name']))
	{
		header ('Location: Home.php');
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
				<a href="index.html">
					<img src="img/logo.gif" width="900" height="60">
				</a>
				<div id="login">
					<div>Chào: 
					<?php 
							if(isset($_SESSION['Name']))
							{
								echo "".$_SESSION ['Name'];
							}
					?></div>
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
					<dd><a href="#">Danh mục 1</a></dd>
					<dd><a href="#">Danh mục 2</a></dd>
					<dd><a href="#">Danh mục 3</a></dd>
					<dd><a href="#">Danh mục 4</a></dd>
					<dd><a href="#">Danh mục 5</a></dd>
					<dd><a href="#">Danh mục 6</a></dd>
				</dl>
				<dl>
					<dt></dt>
				</dl>
			</div>
			<div id="content">
				<h2>Sản phẩm</h2>
				<div class="box">
					<img src="images/Lego_City_Park_Cafe_3061.jpg" />
					<div class="pname">City Park Cafe 3061</div>
					<div class="pprice">Giá: 950000đ</div>
					<div class="action">
						<a href="Chi-tiet.php">Chi tiết</a>
					</div>
				</div>
				<div class="box">
					<img src="images/Lego_City_Park_Cafe_3061.jpg" />
					<div class="pname">City Park Cafe 3061</div>
					<div class="pprice">Giá: 950000đ</div>
					<div class="action">
						<a href="Chi-tiet.php">Chi tiết</a>
					</div>
				</div>
				<div class="box">
					<img src="images/Lego_City_Park_Cafe_3061.jpg" />
					<div class="pname">City Park Cafe 3061</div>
					<div class="pprice">Giá: 950000đ</div>
					<div class="action">
						<a href="Chi-tiet.php">Chi tiết</a>
					</div>
				</div>
				<div class="box">
					<img src="images/Lego_City_Park_Cafe_3061.jpg" />
					<div class="pname">City Park Cafe 3061</div>
					<div class="pprice">Giá: 950000đ</div>
					<div class="action">
						<a href="Chi-tiet.php">Chi tiết</a>
					</div>
				</div>
				
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>