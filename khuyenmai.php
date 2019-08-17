<?php
	include("include/connect.php");
?>
<div class="khuyenmai">
	<table cellpadding = "0" cellspacing = "0">
	<tr style="height:40px; font-weight:bold; font-size:20px; color:green;">
		<td colspan="6" align="center">SẢN PHẨM KHUYẾN MÃI</td>
	</tr>
	<tr style="background:green; height:30px; color:white;text-align: center">
		<td style= "width:50px;">STT</td>
		<td>Tên SP</td>
		<td>Giảm giá</td>
		<td>Khuyến mãi</td>
		<td style = "width: 70px;">Giá KM</td>
	</tr>
	
	<?php

		$sql=  "select * from sanpham";
		$query=mysqli_query($link,$sql);
		$total=mysqli_num_rows($query);
		$idsp=1;
		while($row=mysqli_fetch_array($query))
		{
			
			if($row['khuyenmai2']!="")
			{
				?><tr>
					<td><?php echo $idsp++; ?></td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp'] ?></a></p></td>
					<td><?php echo $row['khuyenmai1'] ?> %</td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><?php echo $row['khuyenmai2'] ?></p></td>
					<td><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></</td>
				
				</tr>
				<?php 
			}
			else if($row['khuyenmai1']>0)
			{
				?><tr>
					<td><?php echo $idsp++; ?></td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp'] ?></a></p></td>
					<td><?php echo $row['khuyenmai1'] ?> %</td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><?php echo $row['khuyenmai2'] ?></p></td>
					<td><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></</td>
				
				</tr>
				<?php 
			}
				else echo "";		
		}
?>

</table>
		</div>
