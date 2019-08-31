 
  <?php
  /*BEGIN: SAVE SESSION PRODUCT (ID_PRODUCT => QUANTITY)*/
	if(isset($_POST['data'])){
		$arr_product = $_POST['data'];
		foreach($arr_product as $k => $v) $_SESSION['cart'][$v['idsp']] = $v['sl'];
	}
  /*END: SAVE SESSION PRODUCT (ID_PRODUCT => QUANTITY)*/
  
    $loi=0;
     foreach($_SESSION['cart'] as $stt => $soluong)
            {
               
               $sql="select soluong,tensp,daban from sanpham where idsp=$stt";
               
               $rows=mysqli_query($link,$sql);
               $row=mysqli_fetch_array($rows);
               $sl= $_SESSION['cart'][$stt]; 
               
               if($row['soluong']==0 or $row['soluong'] < 1)
               {
                
                 unset($_SESSION['cart'][$stt]);
                ECHO '<META HTTP-EQUIV="REFRESH" CONTENT="2;INDEX.PHP?CONTENT=CART">';
                ECHO "SẢN PHẨM <FONT COLOR='RED'><B>". $row['tensp']."</B></FONT> ĐÃ HẾT HOẶC KHÔNG ĐỦ HÀNG TRONG KHO<BR><BR>";
                $loi+=1;
               }
            }
     if($loi==0)
      echo '<meta http-equiv="refresh" content="0;index.php?content=cart&action=thanhtoan">';
   
            ?>