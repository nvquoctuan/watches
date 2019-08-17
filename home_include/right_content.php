<div id="dangnhap">
    <div class="center1">
        <h4>ĐĂNG NHẬP</h4>
            <?php if(isset($_SESSION['username'])){ ?>
            <div id="dangnhap-in">
                <span id="xinchao"><p>Xin chào:<span>
                <?php echo $_SESSION['username']; ?>
            </span></p></span>
            <p><span id="logout"><a href="logout.php">Log out</a></span></p>
            </div>
            <?php 
            }
                else
                {
            ?>
            <div id="dangnhap-in">
                <form action="dangnhap.php" method="POST">
                    <span><p>User Name: <input type="text" size="10" name="user"/></p><br />
                        <p>Password: <input type="password" size="10" name="pass" style="margin-left: 7px;"/></p><br/>
                    </span>
                    <a href="index.php?content=dangnhap">
                        <button name="login">Đăng nhập</button>
                    </a><br />
                </form>
                <ul>
                    <li> <a href="index.php?content=dangky">Đăng ký</a></li>
                </ul>
            </div>
            <!--End: Đăng nhập -in -->
            <?php } ?>
    </div>
    <!-- End : Center1-->
    
</div>
<!-- End : Đăng nhập -->

<!-- Begin : Giỏ hàng -->
<div id="giohang">
    <div class="center1">
        <h4>GIỎ HÀNG</h4>
        <a href="index.php?content=cart"><img src="img/images.jpg" title="Vào giỏ hàng" width="150" height="100"/></a>
        <?php
            $tongtien=0;
            if(isset($_SESSION['cart']))
                $count=count($_SESSION['cart']);
            else $count=0;
            if($count==0){
        ?>
            <p>Không có sản phẩm</p>
            <?php }//đóng if $count==0
            else {
            ?>
            <p id="soluonggiohang">Có <span><?=$count?></span>sản phẩm trong giỏ</p>    
            <p id="tiengiohang">
                <?php 
                $sql="Select * from sanpham where idsp in(";
                    foreach($_SESSION['cart']as $id => $soluong)
                    {
                        if($soluong>0)
                        //nối vào chuỗi sql
                        $sql .=$id. ",";
                    }
                    //-1 lấy ngược từ cuối bên phải .tham số thứ 2 là số kí tự bỏ đi
                    if(substr($sql,-1,1)==",")//lấy về 1 ký tự cuối cùng trong chuỗi của $sql
                    {
                        $sql = substr($sql,0,-1); // bỏ dấu "," ra khỏi chuỗi của $sql
                    }
                    $sql .= ')order by idsp';
                    $rows = mysqli_query($link,$sql);
                    
                    //duyệt từng dòng của mảng $rows
                    while($row=mysqli_fetch_array($rows))
                    {
                        //$_SESSION['cart'] thông qua idsp lấy giá trị(số lượng) của idsp tương đương số lượng chọn thông qua idsp 
                        $tongtien+=$_SESSION['cart'][$row['idsp']]*$row['gia'];
                    }    
                ?> <?php echo number_format($tongtien,"0",",","."); ?> VNĐ
                </p>
                <?php }//đóng else ?>
    </div>
    <!-- End: center1 -->
     
</div>
<!-- End: Giỏ hàng

<!-- Begin : Tìm kiếm -->
<div id="timkiem">

    <!-- Begin : Center 1 -->
    <div class="center1">
        <h4>Tìm kiếm</h4>
        <div id="select">
            <form action="index.php?content=timkiem" method="GET">
                <input type="hidden" name="content" value="timkiem"/>
                <input type="text" name="timkiem" />
                <div id="select2">
                    <select name="gia">
                        <option value="0">- Chọn giá -</option>
                        <option value="1"> < 100.000</option>
                        <option value="2"> 100.000 - 300.000</option>
                        <option value="3"> 300.000 - 500.000</option>
                        <option value="4"> 500.000 - 1.000.000</option>
                        <option value="5"> 1.000.000 - 5.000.000</option>
						<option value="6"> > 5.000.000</option>
                    </select>
                    <input type="submit" name="btntk" value="Tìm kiếm" />
                </div>
            </form>
        </div>
    </div>
    <!-- End : Center1 -->

</div>
<!-- End : Tìm kiếm -->