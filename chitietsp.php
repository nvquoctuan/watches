<?php
    $idsp=$_GET['idsp'];
    $rows=mysqli_query($link,"Select * from sanpham where idsp=$idsp");
    while($row=mysqli_fetch_array($rows))
    {
?>
    <div class="chitietsp">
        <div class="chitietsp-in">
            <div class="content">
                <div class="zoom-small-image">
                    <a href = 'img/uploads/<?php echo $row['hinhanh']; ?>' width = "300" height = "300" class='cloud-zoom' id='zoom1'
                    rel="adjustX: 10, adjustY: -4">
                        <img  src="img/uploads/<?php echo $row['hinhanh'] ?>" width="250" height="250" title="Optional title display" />
                    </a>
                    
                </div>
                <!-- End : zoom -->
                
                <div class="giasp">
                    <ul>
                        <p><?php echo $row['tensp']; ?></p>
                        <li><span><b>Giá: 
                            <font color="red">
                                <?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?>
                            
                        </b></font></span></li>
                        <li>Tình Trạng
                            <?php
                                $soluong = $row['soluong'];
                                if($soluong>0)
                                    echo "Số sản phẩm còn (".$soluong.")";
                                else
                                    echo "Hết hàng";
                            ?>
                        </li>
                        <form action="index.php?content=cart&action=add&idsp=<?php echo$row['idsp']; ?>" method="post">
                            <?php 
                                if($soluong > 1)
                                    echo '<li>Số lượng mua: 
                                            <input type="number" name="sl" value="1" value="1" min = "1" max = "'.$soluong.'" /    >
                                        </li>';
                            ?>
                            <li>
                                <?php
                                if($soluong <=0)
                                    echo "<a href='index.php?content=hethang'></a>";
                                else
                                {
                                ?>
                                <input type="submit" value="Cho vào giỏ" name="chovaogio" class="inputmuahang" />
                                <?php } ?>
                            </li>
                        </form>
                    </ul>
                </div>
                <!-- End : Giá sản phẩm -->
                
            </div>
            <!--End: Content -->
            
            <div class="tinhnang">
                <div class="tieudetinhnang">
                    <ul class="tabs">
                        <li><a href="#tab1">Tính năng</a></li>
                        <li><a href="#tab2">Bình luận</a></li>
                    </ul>
                </div>
                <!-- End : Tiêu đề tính năng -->
                
                <div id="tab1">
                    <?php echo $row['chitiet']; ?>
                </div>  
                
            </div>
        </div>
        <!-- End : Chi tiết sản phẩm -in -->
        
    </div>
    <!-- End: Chi tiết sản phẩm -->
    
    <?php } ?>