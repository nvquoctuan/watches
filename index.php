<base href="http://localhost:81/dongho/"/>
<?php session_start();include("include/connect.php");    ?>
<!DOCTYPE HTML>
<head>	
    <meta http-equiv= "content-type" content="text/html; charset=utf-8" /> 
    <title>Bán đồng hồ</title>    
    <link rel="stylesheet" style="style/sheet" href="css/index.css" />
    <link rel="stylesheet" href="css/style-footer.css">

    <!-------------------------------------slide-------------------------------->
    <link rel="stylesheet" style="style/sheet" href="css/style1.css">
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script lang="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
    <script lang="javascript" type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
     $(document).ready( function(){	
    		var buttons = { previous:$('#lofslidecontent45 .lof-previous') ,
    						next:$('#lofslidecontent45 .lof-next') };
    						
    		$obj = $('#lofslidecontent45').lofJSidernews( { interval : 4000,
    												direction		: 'opacitys',	
    											 	easing			: 'easeInOutExpo',
    												duration		: 2000,
    												auto		 	: true,
    												maxItemDisplay  : 4,
    												navPosition     : 'horizontal', // horizontal
    												navigatorHeight : 32,
    												navigatorWidth  : 80,
    												mainWidth:1000,
    												buttons			: buttons} );	
    	});
    </script>


</head>
<body>    
    
    <!-- Begin : wrapper -->   
    <div id="wrapper">  
                  
        <!-- Begin : header -->        
        <div id="header">            
            <div id="lg-header">                
                <h1><img src="./img/Logo-header3.png" /></h1>            
            </div>            
            <div id="bg-header"> </div>           
            <div id="menu-header">                
                <?php include("home_include/menu_ngang.php");?>                
            <!-- End: menu -->            
            </div>
                   
        </div>        
        <!-- End : header -->   
        
        <!-- Begin : content -->
        <div id="content">
        
            <div id="lofslidecontent45" class="lof-slidecontent" style="width:1000px; height:350px;">
				<div class="preload"><div></div></div>
				<div id="lof-main-outer">
					<ul class="lof-main-wapper">
						<li><img src="img/slide/slide1.jpg" width="1000" height="350"></li>
						<li><img src="img/slide/slide.jpg" width="1000" height="350"></li>
						<li><img src="img/slide/slide2.jpg" width="1000" height="350"></li>
						<li><img src="img/slide/slide3.png" width="1000" height="350"></li>
						<li><img src="img/slide/slide4.jpg" width="1000" height="350"></li>
					</ul>
				</div>
				<div class="lof-navigator-wapper">
						<div onClick="return false" href="" class="lof-next">Next</div>
						<div class="lof-navigator-outer">
							<ul class="lof-navigator">
							   <li><img src="img/slide/slide1.jpg" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide.jpg" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide2.jpg" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide3.png" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide4.jpg" width="70" height="25" /></li>       		
							</ul>
						</div>
						<div onClick="return false" href="" class="lof-previous">Previous</div>
				</div> 
            </div>
            
            <div id="main-content">
                <div id="left-content">
                    <?php include("home_include/left_content.php");?>
                </div>
                <!-- End : Left-Content -->
                
                <div id="center-content">
                    <?php include("content_page.php"); ?>
                </div>
                <!-- End: Center-content -->
                
                <div id="right-content">
                    <?php include("home_include/right_content.php"); ?>
                </div>
                <!-- End: Right -content -->
                
            </div>
            <!-- End : Main-content -->
                    
        </div>
        <!-- End: content -->
		
		<!--Begin: footer-->
		<div id= "footer">
			
			<div id ="footer1">
			<div id="footer1_1"></div>
				<div class="box5">			
					<h1> 
					Đăng Quang Watch
					</h1>
					</div>
			</div>
			
			<div id ="footer2">
				<div class= "box7">
					
					
					<div class= "box7_2">
						<div class= "title">
						Địa Chỉ
						</div>
						<div class="box7_2_1">
							<div id="map">
							<iframe src=" https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5421.9589222282875!2d108.21546501443164!3d16.0704789123621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1527069095773">
							</iframe>
							</div>
						</div>
					</div>
					
					
					
					<div class= "box7_4">
						<div class= "title">
							Liên Hệ
							</div>
							<div class="box7_2_1">
								<ul>
									<li class="title1">
										<div class="icon">
										<img src="img/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>
										71 Xuân Thủy, Quận Cẩm Lệ, Thành Phố Đà Nẵng
									</li>
									
									<li class="title1">
										<div class="icon">
										<img src="img/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>
									 +84 88 8886666
									</li>
									
									<li class="title1">
									<div class="icon">
										<img src="img/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>
										info@orient.com.vn
									</li>
									
								
									
									
									
								</ul>
							</div>
					</div>
					
				</div>
			
			</div>	
			<div id="footer3">
				|||<span>   © Copyright 2018, Orient.  </span>|||
				
			</div> 
		</div>
		<!--End footer-->
             
    </div>    
    <!-- End : wrapper -->

</body>
</html>