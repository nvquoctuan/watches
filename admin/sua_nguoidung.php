<link rel="stylesheet" href="css/them_sanpham.css">
<?php
		$idnd=$_GET['idnd'];
        $sql="select * from nguoidung where idnd='".$_GET['idnd']."'";
         $rows=mysqli_query($link,$sql);
         $row =mysqli_fetch_array($rows);

?>
<form action="update_nguoidung.php?idnd=<?php echo $idnd;?>" method="post" name="frm" onsubmit="return kiemtra()" enctype="multipart/form-data">
	<table>
			<tr class="tieude_themsp">
				<td colspan=2>Sửa Người Dùng </td>
			</tr>
    		<tr>
            	<td>Tên ND</td><td><input type="text" name="tennd" value="<?php echo $row['tennd'] ?>"/></td>
            </tr>
			<tr>
            	<td>Username</td><td><input type="text" name="user"  value="<?php echo $row['username'] ?>"/></td>
            </tr>
			<tr>
            	<td>Email</td><td><input type="text" name="email"  value="<?php echo $row['email'] ?>"/></td>
            </tr>
			<tr>
            	<td>Điện thoại</td><td><input type="text" name="dienthoai"  value="<?php echo $row['dienthoai'] ?>"/></td>
            </tr>
			<tr>
            	<td>Quyền</td><td>
					<select name="phanquyen">
						<option value="0" >  Adminstrator </option>
						<option value="1" selected="selected"> Người dùng</option>
					</select>
				</td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<script language="javascript">
 	function  kiemtra()
	{
	    if(frm.tennd.value=="")
		{
			alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại");
			frm.tennd.focus();
			return false;	
		}
		if(frm.tennd.value.length<6)
		{
			alert("Tên quá ngắn. Vui lòng điền đầy đủ tên");
			frm.tennd.focus();
			return false;	
		}
		if(frm.user.value=="")
	 	{
			alert("Bạn chưa nhập tên đăng nhập . Vui lòng kiểm tra lại");
			frm.user.focus();
			return false;	
		}
		if(frm.user.value.length<5)
	 	{
			alert("Tên đăng nhập phải lớn hơn 5 ký tự");
			frm.user.focus();
			return false;	
		}
		if(frm.pass.value=="")
		{
			alert("Bạn chưa nhập password");	
			frm.pass.focus();
			return false;
		}
		if(frm.pass.value.length<6)
		{
			alert("Mật khẩu phải lớn hơn 6 ký tự");	
			frm.pass.focus();
			return false;
		}
	   dt=/^[0-9]+$/;
	   dienthoai=frm.dienthoai.value;
	   if(!dt.test(dienthoai))
	   {
		    alert("Bạn chưa nhập điện thoại. Vui lòng kiểm tra lại.");
		    frm.dienthoai.focus();
		    return false;
	   }
	   	dd=frm.dienthoai.value;
		if(10>dd.length || dd.length>11)
		{
			alert("Số điện thoại không đủ độ dài. Vui lòng nhập lại");
			frm.dienthoai.focus();
			return false;	
		}
		if(frm.email.value=="")
		{
			alert("Bạn chưa nhập email");	
			frm.email.focus();
			return false;
		}
		mail=frm.email.value;
		m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
		if(!m.test(mail))
		{
			alert("Bạn nhập sai email");	
			frm.email.focus();
			return false;
		}
		
		if(frm.pass1.value=="")
		{
			alert("Bạn chưa nhập lại password");	
			frm.pass1.focus();
			return false;
		}
		mk=frm.pass.value;
		mk1=frm.pass1.value;
		if(pass!=pass1)
		{
			alert("Password chưa đúng");	
			frm.pass1.focus();
			return false;
		}
	}
 </script>