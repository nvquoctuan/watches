<?php
    if(isset($_GET['action']))// ham isset kiem tra su ton tai
    {   $action=$_GET['action'];  }
    else $action="";
    if(isset($_GET["content"]))
    {
        switch($_GET['content'])
        {
            case "gioithieu":
                include('gioithieu.php');
                break;
            case "timkiem":
                include('timkiem.php');
                break;
            case "dangky":
                include('dangky.php');
                break;
            case "dangnhap":
                include('dangnhap.php');
                break;
            case "chitietsp":
                include('chitietsp.php');
                break;
            case "cart":
                include('cart/index.php');
                break;
            case "sanpham":
                include('sanpham.php');
                break;
            case "phukien":
                include('phukien.php');
                break;
            case "hethang":
                include('hethang.php');
                break;
            case "khuyenmai":
                include('khuyenmai.php');
                break;
        }
    }
    else if(isset($_GET['madm']))
    {
        $sql="Select * from sanpham where madm='{$_GET['madm']}'";
        /*------------phan trang ------------*/
        if(!isset($_GET['page'])){
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $max_results = 6;
        $from = (($page * $max_results) - $max_results);
        $sql.= "LIMIT $from, $max_results";
        $query=mysqli_query($link,$sql);
        $total=mysqli_num_rows($query);
        if($total>0)
        {
?>
            <!-- Begin: sanpham -->
            <div class="sanpham">
                <?php
                $sql1="Select tendm from danhmuc where madm='{$_GET['madm']}'";
                $query1=mysqli_query($link,$sql1);
                $row=mysqli_fetch_array($query1);
                ?>
                <h2><?php echo $row['tendm']?></h2>
                
                <!-- Begin: sanphamcon -->
                <div class="sanphamcon">
                    <?php
                    while($result=mysqli_fetch_array($query))
                    {?>
                    <!-- Begin : dienthoai -->
                    <div class="dienthoai">
                        <?php
                        if($result['khuyenmai1']>0)
                        {
                        ?>
                        <div class="moi"><h3><?php echo $result['khuyenmai1']; ?></h3></div>
                        <?php } ?>
                        <a href=""><img src="img/uploads/<?php echo $result['hinhanh'];?>"/></a>
                        <p><a href="#"><?php echo $result['tensp'];?></a></p>
                        <h4><?php echo number_format(($result['gia']*((100-$result['khuyenmai1'])/100)),0,",",".");?></h4>
                        
                        <!-- Begin:button -->
                        <div class="button">
                            <ul>
                                <li>
                                    <h1><a href="index.php?content=chitietsp&idsp=<?php echo $result['idsp']?>" class="chitiet">
                                        <button>Chi tiết</button>
                                    </a></h1>
                                </li>
                                <li>
                                    <h5><a href="index.php?content=cart&action=add&idsp=<?php echo $result['idsp']?>">
                                        <button>Cho vào giỏ</button>
                                    </a></h5>
                                </li>
                            </ul>
                        
                        </div>
                        <!-- End: Button -->
                        
                     </div>
                     <!-- End : dien thoai -->
                     
                      <?php } ?>
                    
                </div>
                <!--End : San pham con -->   
                         
            </div>  
            <!--End: San pham -->
              
			 <!-- Begin : phantrang -->          
            <div class="phantrang">
                <?php
                    $total_results = mysqli_num_rows(mysqli_query($link,"SELECT * FROM sanpham where madm='{$_GET['madm']}'"));
                    $total_pages = ceil($total_results / $max_results);
                    if($page > 1){
                        $prev = $page - 1;
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?madm=".$_GET['madm']."&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";
                    }
                    for($i = 1;$i<=$total_pages;$i++){
                        if($page==$i){
                            echo "$i&nbsp;";
                        }else {
                            echo "<a href=\"".$_SERVER['PHP_SELF']."?madm=".$_GET['madm']."&page=$i\"><button class='so'>$i</button></a>&nbsp;";
                        }
                    }
                    if($page < $total_pages){
                        $next = $page + 1;
                        echo "<a href=\"".$_GET['madm']."&page=&next\"><button class='trang'>Trang sau</button></a>";
                    }
                    echo "</center>";
                ?>
            </div> 
                    
              
        <?php
            }// dóng if (total)
            else{echo "Không có sản phẩm nào";}
        } //dóng if (isset($_GET(['madm'])
        else{
        ?> 
        
        <!-- Begin : San pham -->
        <div class="sanpham">
            <h2>ĐỒNG HỒ BÁN CHẠY</h2>
            
            <!-- Begin : San pham con -->
            <div class="sanphamcon">
                <?php
                $sql1="Select * from sanpham inner join danhmuc on sanpham.madm=danhmuc.madm where dequi=1 order by daban DESC limit 6";//Tương đương liên kết = where
                $result1=mysqli_query($link,$sql1);
                ?>
                <?php
                    while ($row=mysqli_fetch_array($result1))
                    { ?>
                    
                    <!-- Begin : dienthoai -->
                    <div class="dienthoai">
                        <?php
                        if($row['khuyenmai1']>0)
                        {
                        ?>
                        <div class="moi"><h3><?php echo $row['khuyenmai1']; ?></h3></div>
                        <?php } ?>
                        <a href=""><img src="img/uploads/<?php echo $row['hinhanh'];?>"/></a>
                        <p><a href="#"><?php echo $row['tensp'];?></a></p>
                        <h4><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></h4>
                        
                        <!-- Begin:button -->
                        <div class="button">
                            <ul>
                                <li>
                                    <h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp']?>" class="chitiet">
                                        <button>Chi tiết</button>
                                    </a></h1>
                                </li>
                                <li>
                                    <h5><a href="index.php?content=cart&action=add&idsp=<?php echo $row['idsp']?>">
                                        <button>Cho vào giỏ</button>
                                    </a></h5>
                                </li>
                            </ul>
                        
                        </div>
                        <!-- End: Button -->
                        
                     </div>
                     <!-- End : dien thoai -->
                     
                     <?php } ?>
            </div>
            <!-- End : San pham con -->
            
        </div>   
        <!-- End : san pham -->
        
         <!-- Begin : San pham mới -->
        <div class="sanpham">
            <h2>ĐỒNG HỒ MỚI</h2>
            
            <!-- Begin : San pham con -->
            <div class="sanphamcon">
                <?php
                $sql1="Select * from sanpham inner join danhmuc on sanpham.madm=danhmuc.madm where dequi=1 order by idsp DESC limit 6";//Tương đương liên kết = where
                $result1=mysqli_query($link,$sql1);
                ?>
                <?php
                    while ($row=mysqli_fetch_array($result1))
                    { ?>
                    
                    <!-- Begin : dienthoai -->
                    <div class="dienthoai">
                        <?php
                        if($row['khuyenmai1']>0)
                        {
                        ?>
                        <div class="moi"><h3><?php echo $row['khuyenmai1']; ?></h3></div>
                        <?php } ?>
                        <a href=""><img src="img/uploads/<?php echo $row['hinhanh'];?>"/></a>
                        <p><a href="#"><?php echo $row['tensp'];?></a></p>
                        <h4><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></h4>
                        
                        <!-- Begin:button -->
                        <div class="button">
                            <ul>
                                <li>
                                    <h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp']?>" class="chitiet">
                                        <button>Chi tiết</button>
                                    </a></h1>
                                </li>
                                <li>
                                    <h5><a href="index.php?content=cart&action=add&idsp=<?php echo $row['idsp']?>">
                                        <button>Cho vào giỏ</button>
                                    </a></h5>
                                </li>
                            </ul>
                        
                        </div>
                        <!-- End: Button -->
                        
                     </div>
                     <!-- End : dien thoai -->
                     
                     <?php } ?>
            </div>
            <!-- End : San pham con -->
            
        </div>   
        <!-- End : sản phẩm mới-->
        <?php } ?>    
           
    
