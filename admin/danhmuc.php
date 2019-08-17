<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Mục</title>
<link rel="stylesheet" href="css/hienthi_sp.css" />
</head>
<?php
	include '../include/connect.php';
	$hienthi = mysqli_query($link,"SELECT * FROM danhmuc");
			 $dem = mysqli_num_rows($hienthi);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ DANH MỤC</h3>
<a href='?admin=themdm' >Thêm danh mục</a><br>
	
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> danh mục</p>
</div>
<form action="" method="post" name="frmTest" >
	<table align="center" border="0">
        <tr class="tieude_hienthi_sp">
        	<td>Mã DM</td>
           <td> Tên DM</td>
            <td>Thuộc </td>
            <td colspan=2>Active</td>
        </tr>
               
        <?php
			
			if($dem !="")
			{
				while($bien=mysqli_fetch_array($hienthi))
				{
				
		?>
                   <tr>
                   <td class="masp_hienthi_sp">
                    <?php echo $bien['madm'] ?>
                   </td>
                   <td class="tensp_hienthi_sp">
                    <b><?php echo $bien['tendm'] ?></b>
                    </td>
                    <td class="masp_hienthi_sp">
					
                    <?php
						if($bien['dequi'] ==0) {
							echo "Danh mục chính";
						}
						else {
							if($bien['dequi']==1) {
								echo "Đồng hồ";
							}
							else {
								echo "Phụ kiện";
							}
							
						}
						
					?>
                    </td>
					
                    <td class="active_hienthi_sp"><a href="?admin=suadm&madm=<?php echo $bien['madm']?>" > <img src="img/sua.png" title="Sửa" /></a>
					<?php echo "<p onclick = 'checkdel({$bien['madm'] })' ><img src='img/xoa.png' title='Xóa' class='delete'></p>" ?>
                   </td>
           
           
        <?php  
				}
			}
			else
				{
					echo "<tr><td colspan='5'>Không có danh mục nào </td></tr>";
				}
			
		?>
    </table>
</form>
<body>
</body>
</html>
<script language="JavaScript">
    function checkdel(madm)
    {
        var	madm=madm;
        var link="xoa_danhmuc.php?madm="+madm;
        if(confirm("Bạn có chắc chắn muốn xóa danh mục này?")==true)
            window.open(link,"_self",1);
    }
</script>