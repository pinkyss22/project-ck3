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
	<<body>
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
      <div class="center_title_bar">Thông tin tài khoản	  </div>
	  	  <?php
			$con = mysqli_connect('localhost','root','root','choonline1');
			$res = mysqli_query($con, "select * from tai_khoan where Ten_dang_nhap = '$name'");
			$row = mysqli_fetch_array($res);
?>
	<form action="edit-submit.php?id=<?php echo $row['Ma_tai_khoan']?>" method="post">
		<p>Họ tên: <p><input type ="text" name = "hoten" value="<?php echo $row['Ho_ten']?>">
		<p>Ngày/tháng/năm sinh: </p><input type="date" name="ngaysinh" value="<?php echo $row['Ngay_sinh']?>">
		<p>Địa chỉ: </p><input type ="text" name ="diachi" value="<?php echo $row['Dia_chi']?>">
		<p>Số điện thoại</p><input type = "text" name ="sdt" value="<?php echo $row['So_dien_thoai']?>">
		<p>Mật khẩu củ</p><input type ="password" name ="mkcu">
		<p>Mật khẩu mới: </p><input type ="password" name ="mkmoi">
		</br>
		<input type ="submit" value="Lưu thay đổi">
	</form>
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
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates<
</html>