
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>Izwebz.com - Demo Page</title>

     <style type="text/css">
           float: left;
            table#user_info {
            	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            	font-size: 13px;text-align: left; line-height: 1.6em;
            	background: #fff;
            	width: 100px;
            	border-collapse: collapse;	
            }
            th {padding: 10px 8px;border-bottom: 2px solid #6678b1;}
            th a {font-size: 15px;font-weight: bold;color: #039; text-decoration: none; }
            td {color: #669; padding: 9px 8px 0px 8px;}
            tbody tr:hover td { color: #009; }
            ul.nav {overflow: hidden; padding: 0px;}
            ul.nav li { display: inline; float: left;margin: 0px 5px;background: #8AB1FE;}
            ul.nav li a {color: white;text-decoration: none;display: block; padding: 3px 8px;}
            ul.nav li:hover {background: #3A7ABE;}
            ul.nav li.current {font-weight: bold; padding: 3px 8px; }
     </style>
	 <div id="content">
        <table id="user_info">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
                    <th>Giá bán</th>
					<th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
			<?php $connection = mysqli_connect('localhost','root','root','choonline1') or die('Could not connect to DB');?>
            <?php 
            //xac dinh bao nhieu dong
            $display = 10;
            // tinh tong so trang can hien thi
            if(isset($_GET['page']) && (int)$_GET['page']) {
                $page = $_GET['page'];
            } else { //neu chua xac dinh, thi tim so trang
                $query = "SELECT COUNT(Ma_san_pham) FROM san_pham";
                $res = mysqli_query($connection,$query) or die('Could not select users '.mysqli_error($connection));
                $rows = mysqli_fetch_array($res, MYSQLI_NUM);
                $record = $rows[0];
                if($record > $display) {
                    $page = ceil($record/$display);
                } else {
                    $page = 1;
                }
            }
            
            $start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;
            $sql = "SELECT * FROM san_pham LIMIT $start, $display";
            $result = mysqli_query($connection,$sql) or die('Could not select email '.mysqli_error($connection));
            while($set = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $name = $set['Ten_san_pham'];
				$hinhanh = $set['Hinh_dai_dien']; 
				$gia = $set['Gia_ban'];
				$soluong = $set['So_luong_ton'];
				$i = $set['Ma_san_pham'];
				$so = $set['So_luong_ton'];
                echo "<tr>
                        <td>$name</td>
						<td><img src='$hinhanh' width ='80px' height='60px'></td>
						<td>$gia</td>
						<td>
							<form action ='quan-li-san-pham-edit.php?id=$i' method='post'>
								<input type = 'number' name = 'so_luong' value ='$so' size ='8'>
								<input type = 'submit' value = 'Sữa'>
							</form>
						</td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
        <ul class="nav">
        <?php 
            if($page > 1) { //neu can hien thi so trang
                
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display)+1;
                
                //Hien thi trang Previous
                if($current !=1) {
                echo "<li><a href='quan-li-san-pham.php?start=$prev&page=$page'>Previous</a></li>";
                }
                //Hien thi so link
                for($i=1;$i<=$page;$i++) {
                    if($current != $i) {
                    echo "<li><a href='quan-li-san-pham.php?start=".($display*($i-1))."&page=$page'>$i</a></li>";
                } else {
                    echo "<li class='current'>$i</li>";
                }
                } //End: FOR
                
                //Hien thi trang Next
                
                if($current != $page) {
                    echo "<li><a href='quan-li-san-pham.php?start=$next&page=$page'>Next</a></li>";
                }
                
            }//End: $page > 1 IF
			mysqli_close($con);
        ?>
        </ul>

    </div>
</body>

</html>
