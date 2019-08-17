<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	
    $select = "select * from sanpham inner join danhmuc on sanpham.madm=danhmuc.madm";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
	
?>
<div class="quanlysp">
	<h3>QUẢN LÝ SẢN PHẨM</h3>
	<form action= "admin.php?admin=hienthisp" method = "POST" style = "float:left; margin-top:36px; ">
		<div style = "float:left">
			<input type ="text" name ="search" style = "border: 1px solid green; height:33px" />
		</div>
		<button type = "submit" style ="cusor:pointer; width:40px; background-color: green;border: 1px solid green"><img src = "img/search.png" /></button>
	</form>
<a href='?admin=themsp' >Thêm sản phẩm</a><br>
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> sản phẩm</p><br/>
	<form action="admin.php?admin=xulysp" method="post" style = "float:right; margin-bottom:15px;">
		<div id="check">
			<div style = "float:left; margin-top: 5px">
				
			</div>
			<p>
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>IDSP</td>
        <td>HÌnh ảnh và Tên SP</td>
        <td>Số lượng</td>
        <td>Đã bán</td>
        <td>Giá</td>
        <td>Danh mục</td>
        <td>Active</td>
    </tr>

    <?php
	
	/*------------Phan trang------------- */
		// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
		// nếu chưa có, đặt mặc định là 1!   

		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

		// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
		$max_results = 10;  

		// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
		$from = (($page * $max_results) - $max_results);  

		// Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

		$sql = mysqli_query($link,"SELECT * FROM sanpham inner join danhmuc on sanpham.madm=danhmuc.madm ORDER by idsp DESC  LIMIT $from, $max_results"); 
		
		
		if(isset($_POST['search']))
		{
			$search = $_POST['search'];		
			$sql = mysqli_query($link,"select * from sanpham inner join danhmuc on sanpham.madm=danhmuc.madm and tensp like '%$search%' ORDER by idsp DESC  LIMIT $from, $max_results");
			//print_r($sql);
		}
	


								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['idsp']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['idsp'] ?></td>
                <td class="img_hienthi_sp">
                    <img src="../img/uploads/<?php echo $bien['hinhanh'] ?>"  width='60' height='60'><br>
                    <h4><?php echo $bien['tensp'] ?></h4>
                </td>
				<td class="sl_hienthi_sp"><?php echo $bien['soluong'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['daban'] ?></td>
                <td class="gia_hienthi_sp"><?php echo number_format($bien['gia']).' VNÐ' ?></td>
                <td  class="madm_hienthi_sp">
					 
									<?=$bien['tendm'] ?>
				</td>
                <td class="active_hienthi_sp">
                    <a href='admin.php?admin=suasp&idsp=<?php echo $bien['idsp']  ?>'><img src="img/sua.png" title="Sửa"></a>
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
        
			// Tính tổng kết quả trong toàn DB:
            //$sql="SELECT  * FROM sanpham  order by madm DESC";
            //$run= mysqli_query($link,$sql);
			$total_results = mysqli_num_rows(mysqli_query($link,"SElect * from sanpham"));  

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
				if($i>1) {
						echo "$i&nbsp;";  } 
				
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>