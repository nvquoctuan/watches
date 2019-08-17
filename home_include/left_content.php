<div id="danhmucsp">
    <div class="center">
        <h4>SẢN PHẨM</h4>
        <?php
            $sql="select * from danhmuc where dequi=1";
            $result=mysqli_query($link,$sql);
        ?>
        <ul>
        <?php
            while($row=mysqli_fetch_array($result))
            {
        ?>
        <li><a href="index.php?madm=<?php echo $row["madm"]?>"><?php echo $row["tendm"];?></a></li>
        <?php } ?>
        </ul>
    </div>
    <!-- End : center -->
    
</div>
<!--End : danh muc sp -->

<div id="phukien">
    <div class="center">
        <h4>PHỤ KIỆN</h4>
        <?php
            $sql="select * from danhmuc where dequi=2";
            $result=mysqli_query($link,$sql);
        ?>
        <ul>
        <?php
            while($row=mysqli_fetch_array($result))
            {
        ?>
        <li><a href="index.php?madm=<?php echo $row["madm"]?>"><?php echo $row["tendm"];?></a></li>
        <?php } ?>
        </ul>    
    </div>
    <!-- End : center -->
    
</div>
<!--End : phu kien -->

<div id="quangcao1">
    <div id="center">
        <a href="#"><img src="img/3-5.jpg" alt="quangcao" title="quangcao" style = "width:190px;height:300px; border-radius : 15px; margin-bottom:10px;margin-left:5px;"/></a>
        <a href="#"><img src="img/3-2.jpg" alt="quangcao2" title="quangcao2"  style = "width:190px;height:300px; border-radius : 15px;margin-left:5px;" /></a> 
    </div>
    <!-- End : center -->
    
</div>
<!--End : phu kien -->