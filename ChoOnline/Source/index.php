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
		<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-1.5.1.js" type="text/javascript"></script>
		<script src="js/jquery.cycle.all.latest.js" type="text/javascript"></script>
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="js/nivo.js" type="text/javascript"></script>
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
    <div class="crumb_navigation"> <span class="current">Trang chủ</span> </div>
    <?php
		include ('left_content.php');
	?>
    <!-- end of left content -->
    <div class="center_content">
      <div class="oferta"> <img src="images/p1.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">Galaxy S3 I9300</div>
          <div class="oferta_text"> Galaxy S3 I9300 là sản p </div>
          <a href="http://all-free-download.com/free-website-templates/" class="prod_buy">details</a> </div>
      </div>
      <div class="center_title_bar">Latest Products</div>
	  <?php
		$con = mysqli_connect('localhost','root','root','choonline1');
		$res = mysqli_query($con, "select * from san_pham");
		$dem =1;
		while($row=mysqli_fetch_array($res))
		{
		if($dem<=12)
		{
			echo "<div class='prod_box'>";
			echo "<div class='center_prod_box'>";
			echo "<div class='product_title'>";
			echo "<a href=''>";
			echo $row['Ten_san_pham'];
			echo "</a>";
			echo "</div>";
			 echo "<div class='product_img'>";
			 $ma_sp = $row['Ma_san_pham'];
			  echo "<a href='chi-tiet.php?id=$ma_sp'>";
			  echo "<img src='$row[Hinh_dai_dien]' alt='' border='0' width ='173' height='80'/>";
			  echo "</a>";
			  echo "</div>";
			  echo "<div class='prod_price'>";
			  echo "<span class='price'>";
			  echo $row['Gia_ban'];
			  echo " VNĐ";
			  echo "</span>";
			  echo "</div>";
			  echo "</div>";
			   echo "<div class='prod_details_tab'>";
			echo "<a href='' class='prod_buy'>";
			echo "Add to Cart";
			echo "</a>"; 
			echo "<a href='' class='prod_details'>";
			echo "Details";
			echo "</a>";
			echo "</div>";
			echo "</div>";
			$dem++;
			}
		}
	  ?>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <?php
		include "timkiem.php";
	  ?>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> 3 items <br />
          <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href="http://all-free-download.com/free-website-templates/"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">Đăng nhập</div>
      <?php
		include ('dangnhap.php');
	  ?>
	  <?php
		include ('thongtin-dangnhap.php');
	  ?>
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
