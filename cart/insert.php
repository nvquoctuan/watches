
<?php
if($action="insert")
{
	$hoten=$_POST['hoten'];
	$dienthoai=$_POST['dienthoai'];
	$diachi=$_POST['diachi'];
	$email=$_POST['email'];
	$phuongthuc=$_POST['phuongthuc'];
	$ngay=date('Y-m-d');
	if(isset($_SESSION['idnd'])){		
		$sql=mysqli_query($link,"select * from nguoidung where idnd='".$_SESSION['idnd']."'");
		$row=mysqli_fetch_array($sql);			
		$idnd=$row['idnd'];	
		$sql="INSERT INTO hoadon(idnd,hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES ('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
	}
	else $sql="INSERT INTO hoadon(hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES ('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
	mysqli_query($link,$sql);	
    $mahd=mysqli_insert_id($link);   //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
	//echo "mã hóa đơn: ".$mahd;
    
	//http://www.qhonline.info/php-can-ban/51/bai-19--viet-ung-dung-tao-gio-hang-shopping-cart-phan-1.html
	//foreach($_SESSION[‘cart'] as $k=>$v)
	//Với $k có ý nghĩa tương đương $id quyển sách và $v tương đương là số lượng của mặt hàng trong giỏ hàng. Vậy nếu tồn tại biến $k, thì tức có nghĩa là trong giỏ hàng có sách. Khi đó ta sử dụng một biến đã để báo hiệu rằng sách có tồn tại trong giỏ hàng hay không.
	//$stt tương đương với id $soluong tương đương với soluong cua id 
	foreach($_SESSION['cart'] as $stt => $soluong)  //lần lượt lấy các thông tin về mặt hàng trong giỏ thông qua idsp, dùng biến duyệt mảng $stt
            {
               echo $stt;
			   $sql="select * from sanpham where idsp=$stt";
               $rows=mysqli_query($link,$sql);//thực thi query 
               $row=mysqli_fetch_array($rows);//lấy về kết quả query lưu vào trong mảng $row
               //$mahd=$row['mahd'];
               $tensp=$row['tensp'];
        
               $gia=$row['gia']*((100-$row['khuyenmai1'])/100);
			  
               $sql1 ="insert into chitiethoadon(mahd,idsp,Soluong,gia,phuongthucthanhtoan) values('$mahd','$stt','$soluong','$gia','$phuongthuc')";
               mysqli_query($link,$sql1);          
            }
    foreach($_SESSION['cart'] as $stt => $soluong)
            {
               
               $sql="select * from sanpham where idsp=$stt";
               $rows=mysqli_query($link,$sql);
               $row=mysqli_fetch_array($rows);
               $ban=$row['daban']+$soluong;
			   $soluongcon=$row['soluong']- $soluong;
               $sql="UPDATE sanpham SET daban='$ban',soluong = '$soluongcon' WHERE idsp = $stt";
               
                mysqli_query($link,$sql);
            }

unset($_SESSION['cart']);
}
?>
<!--<font color="red" size="5"><center>Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất</center></font>
<center><a href="index.php">Trở về trang chủ</a></center> 
-->
<?php 
echo "
							<script language='javascript'>
								alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
								window.open('index.php','_self',3);
							</script>
						";
?>
