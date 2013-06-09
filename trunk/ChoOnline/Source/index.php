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
		<title>Tools Shop</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/iecss.css" />
		<![endif]-->
		<script type="text/javascript" src="js/boxOver.js"></script>
	</head>
	<body>
<div id="main_container">
  <?php
	include ('header.php');
  ?>
  <div id="main_content">
    <?php
		include ('menutab.html');
	?>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Trang chủ</span> </div>
    <?php
		include ('left_content.php');
	?>
    <!-- end of left content -->
    <div class="center_content">
      <div class="oferta"> <img src="images/p1.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">Power Tools BST18XN Cordless</div>
          <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
          <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">details</a> </div>
      </div>
      <div class="center_title_bar">Latest Products</div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Makita 156 MX-VL</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p1.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Bosch XC</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p2.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Lotus PP4</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p4.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Makita 156 MX-VL</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p3.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Bosch XC</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p5.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Lotus PP4</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p6.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="center_title_bar">Recomended Products</div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Makita 156 MX-VL</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p7.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Bosch XC</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p1.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="http://all-free-download.com/free-website-templates/">Lotus PP4</a></div>
          <div class="product_img"><a href="http://all-free-download.com/free-website-templates/"><img src="images/p3.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">Add to Cart</a> <a href="http://all-free-download.com/free-website-templates/" class="prod_details">Details</a> </div>
      </div>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
        <a href="http://all-free-download.com/free-website-templates/" class="join">search</a> </div>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> 3 items <br />
          <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href="http://all-free-download.com/free-website-templates/"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">Đăng nhập</div>
      <div class="border_box">
			<table style="font-size: 11px;">
			<?php
				if($count ==1)
				{
					echo "<tr>";
						echo "<td>";
							echo "<div class='product_title'>";
							echo $name;
							echo "</div>";
						echo "</td>";			
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
						echo "<a href='logout.php'>";
						echo "Đăng xuất";
						echo "</a>";
				}
				else
				{
					?>
					<tr>
					<td>
						<div class="product_title">Tên đăng nhập</div>
					</td>			
				</tr>
				<tr>
				<form action ='login.php' method='post'>
					<td>
						<input type="text" width="90%" name="ten_dang_nhap"/>
					</td>			
				</tr>
				<tr>
					<td>
						<div class="product_title">Password</div>
					</td>			
				</tr>
				<tr>
					<td>
						<input type="password" width="90%" name="mat_khau"/>
					</td>			
				</tr>
				<tr>
					<td style="text-align:right;">
						<input type="submit" width="30%" value="Đăng nhập"/>
					</td>
				</form>					
				</tr>
				<?php
				}
			?>
				
			</table>
      </div>
	  <?php
		if($$count ==1)
		{
			
		}
	  ?>
      <div class="title_box">Manufacturers</div>
      <ul class="left_menu">
        <li class="odd"><a href="http://all-free-download.com/free-website-templates/">Bosch</a></li>
        <li class="even"><a href="http://all-free-download.com/free-website-templates/">Samsung</a></li>
        <li class="odd"><a href="http://all-free-download.com/free-website-templates/">Makita</a></li>
        <li class="even"><a href="http://all-free-download.com/free-website-templates/">LG</a></li>
        <li class="odd"><a href="http://all-free-download.com/free-website-templates/">Fujitsu Siemens</a></li>
        <li class="even"><a href="http://all-free-download.com/free-website-templates/">Motorola</a></li>
        <li class="odd"><a href="http://all-free-download.com/free-website-templates/">Phillips</a></li>
        <li class="even"><a href="http://all-free-download.com/free-website-templates/">Beko</a></li>
      </ul>
      <div class="banner_adds"> <a href="http://all-free-download.com/free-website-templates/"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="http://all-free-download.com/free-website-templates/">home</a> <a href="http://all-free-download.com/free-website-templates/">about</a> <a href="http://all-free-download.com/free-website-templates/">sitemap</a> <a href="http://all-free-download.com/free-website-templates/">rss</a> <a href="http://all-free-download.com/free-website-templates/">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
