<?php
	if(isset($_POST['id']))    //nếu được check vào checkbox (vì checkbox được đặt tên là id[] và mỗi checkbox giá trị là mahd
	{
	
	foreach($_POST['id'] as $mahd)
	{
		$_SESSION['id'][$mahd]=1;   //gán giá trị cho tất cả phần tử của mảng id là 1, nghĩa là các checkbox được chọn sẽ có giá trị 1
	}
	
    //trangthai=1: đang xử lý; trangthai=2: đã giao hàng; trangthai=3: đã hủy
		if(isset($_POST['giaohang']))    //nếu nút giao hàng được nhấn 
		{
			foreach($_SESSION['id'] as $mahd=>$value)    //duyệt qua biến mảng session id, nếu các phần từ có giá trị 1 thì cập nhật trạng thái hoadon
			{
				if ($value==1) 
				$sql="update hoadon set trangthai=2 where mahd='$mahd'";
				mysqli_query($link,$sql);
				unset($_SESSION['id']);
				echo "
							<script language='javascript'>
								alert('Đã giao hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
			}
		}
		else if(isset($_POST['huy']))
			{ 
				$sql_idsp = mysqli_query($link,"SELECT idsp FROM chitiethoadon where chitiethoadon.mahd='$mahd'");
				if (mysqli_num_rows($sql_idsp)>0){
					$bien = mysqli_fetch_array($sql_idsp);
				} 
				foreach($_SESSION['id'] as $mahd=>$value)
				{
					if ($value==1){
					$sql1="update hoadon set trangthai=3 where mahd='$mahd'";//cập nhật lại trạng thái hóa đơn
				    $sql2="update sanpham set daban=daban-1 where idsp={$bien['idsp']}";
					}
					mysqli_query($link,$sql1);mysqli_query($link,$sql2);
					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
				}
				
			}
			else
					{
						foreach($_SESSION['id'] as $mahd=>$value)
						{
							if ($value==1)
							$sql="delete from hoadon where mahd='$mahd'";
							mysqli_query($link,$sql);
							$sql1="delete from chitiethoadon where mahd='$mahd'";
							mysqli_query($link,$sql1);
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
						}
			
					}

			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
		
?>