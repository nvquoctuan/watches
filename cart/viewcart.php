
 <div class="cart">

 <h3>Giỏ hàng của bạn</h3>

 <?php
  
    if(isset($_SESSION['cart']))//nếu tồn tại biến session có tên là cart
		$count=count($_SESSION['cart']);
    else $count=0;
    $tongtien=0;
    if($count==0){
      echo "Giỏ hàng của bạn chưa có sản phẩm nào </div>";
      return;
    }
?>
<form action="index.php?content=cart&action=check" method="POST" name="form_update">  
<table>
<tr class="tieudecart">
<td><b>Tên sản phẩm</b></td>
<td><b>Giá</b></td>
<td><b>Số lượng</b></td>
<td><b>Thành tiền</b></td>
<td><b>Tùy chọn</b></td></tr>
<?php

   $sql ="select * from sanpham where idsp in(";
        foreach($_SESSION['cart'] as $stt => $soluong)
            {
              if($soluong>0)
                $sql .= $stt.",";
            }
            if (substr($sql,-1,1)==',')
            {
                $sql = substr($sql,0,-1);
            }
      $sql .=' )order by idsp DESC';
      $rows=mysqli_query($link,$sql);
      $i = 0;
?>

<?php


while($row=mysqli_fetch_array($rows))
{
  $quantity = "sl_$i";
  $id_product = $row['idsp'];
?>

  <tr class="sanphamcart">
    <td><p class="carta"><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp']?></a></p></td>
    <td><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></td>
    <td>
      <input type="text" name="data[<?php echo $i;?>][sl]" value="<?php echo $_SESSION['cart'][$row['idsp']]; ?>" style="width:30px;"/>
      <input type = 'hidden' name = 'data[<?php echo $i; ?>][idsp]' value = "<?php echo $id_product; ?>"/>
    </td>
    <td><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100))*$_SESSION['cart'][$row['idsp']],0,",",".") ?></td>
    <td>
      <p class="xoa"><input type="button" onClick = "check_submit(<?php echo $row['idsp']?>)" name="huy" value="Xóa"/></p>
    </td>
  </tr>
  <?php $tongtien+=$_SESSION['cart'][$row['idsp']]*($row['gia']*((100-$row['khuyenmai1'])/100)); ?>
  <?php
  $i++;
}
?>

</table>
<div class="xoatoanbo">
	<a href="index.php?content=cart&action=xoa"><button type = 'button'>Xóa toàn bộ</button></a>
	<p>Tổng cộng: <span><?php  echo number_format($tongtien,0,",",".") ?></span>VNĐ</p>
</div>
<div class="tieptucmuahang">
	<p class="tieptucmuahangcon"><a href="index.php">Tiếp tục mua hàng  </a></p><p class="thanhtoancon" > <button> Thanh toán </button> </p>
</div>
</div>
</form>
<script type = 'text/javascript'>
  function check_submit(id_sp){
    var href = window.location.href="index.php?content=cart&action=update&idsp="+id_sp;
    document.form_update.action = href;
    document.form_update.submit();
  }
</script>