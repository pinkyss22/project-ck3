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
		
		<link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css">
		<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		 <script type="text/javascript" src="2.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<a href="#">
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
				<div id="chitietsp">
					<div id="chitietleft">
					<div id="container">
    <div id="gal" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
            <li>
              <a href="images/1.jpg">
                <img src="images/thumbs/t1.jpg" class="image0">
              </a>
            </li>
            <li>
              <a href="images/10.jpg">
                <img src="images/thumbs/t10.jpg" title="A title for 10.jpg" alt="This is a nice, and incredibly descriptive, description of the image 10.jpg" class="image1">
              </a>
            </li>
            <li>
              <a href="images/11.jpg">
                <img src="images/thumbs/t11.jpg" title="A title for 11.jpg" longdesc="http://coffeescripter.com" alt="This is a nice, and incredibly descriptive, description of the image 11.jpg" class="image2">
              </a>
            </li>
            <li>
              <a href="images/12.jpg">
                <img src="images/thumbs/t12.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image3">
              </a>
            </li>
            <li>
              <a href="images/13.jpg">
                <img src="images/thumbs/t13.jpg" title="A title for 13.jpg" alt="This is a nice, and incredibly descriptive, description of the image 13.jpg" class="image4">
              </a>
            </li>
            <li>
              <a href="images/14.jpg">
                <img src="images/thumbs/t14.jpg" title="A title for 14.jpg" alt="This is a nice, and incredibly descriptive, description of the image 14.jpg" class="image5">
              </a>
            </li>
            <li>
              <a href="images/2.jpg">
                <img src="images/thumbs/t2.jpg" title="A title for 2.jpg" alt="This is a nice, and incredibly descriptive, description of the image 2.jpg" class="image6">
              </a>
            </li>
            <li>
              <a href="images/3.jpg">
                <img src="images/thumbs/t3.jpg" title="A title for 3.jpg" alt="This is a nice, and incredibly descriptive, description of the image 3.jpg" class="image7">
              </a>
            </li>
            <li>
              <a href="images/4.jpg">
                <img src="images/thumbs/t4.jpg" title="A title for 4.jpg" alt="This is a nice, and incredibly descriptive, description of the image 4.jpg" class="image8">
              </a>
            </li>
            <li>
              <a href="images/5.jpg">
                <img src="images/thumbs/t5.jpg" title="A title for 5.jpg" alt="This is a nice, and incredibly descriptive, description of the image 5.jpg" class="image9">
              </a>
            </li>
            <li>
              <a href="images/6.jpg">
                <img src="images/thumbs/t6.jpg" title="A title for 6.jpg" alt="This is a nice, and incredibly descriptive, description of the image 6.jpg" class="image10">
              </a>
            </li>
            <li>
              <a href="images/7.jpg">
                <img src="images/thumbs/t7.jpg" title="A title for 7.jpg" alt="This is a nice, and incredibly descriptive, description of the image 7.jpg" class="image11">
              </a>
            </li>
            <li>
              <a href="images/8.jpg">
                <img src="images/thumbs/t8.jpg" title="A title for 8.jpg" alt="This is a nice, and incredibly descriptive, description of the image 8.jpg" class="image12">
              </a>
            </li>
            <li>
              <a href="images/9.jpg">
                <img src="images/thumbs/t9.jpg" title="A title for 9.jpg" alt="This is a nice, and incredibly descriptive, description of the image 9.jpg" class="image13">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
					</div>
					<div id="chitietright">
						<span class="label">Tên sản phẩm:</span>
						<span class="productname">City </span>
					</div>
					<div id="information">
						<span class="label">Hãng sản xuất: </span>
						<span class="factory">Việt Nam</span>
					</div>
					<div id="information"> 
						<span class="label">Loại sản phẩm: </span>
						<span class="data">Thú nồi bông</span>
					</div>
					<div id="information">
						<span class="label">Số lượng:</span>
						<span class="data">99</span>
					</div>
					<div id="information">
						<span class="label">Số lượt xem: </span>
						<span class="data">999</span>
					</div>
					<div id="information">
						<a href="Gio-hang.html">
						<img src="img/shopping_cart.png" width="32">
					</div>
					<div id="mota">
						
					</div>
				</div>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>