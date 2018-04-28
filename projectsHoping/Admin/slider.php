<?php
include 'config_db.php';
$sql="SELECT * FROM slider ";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);



?>



<!DOCTYPE html>
<title>Elegant Press | Home</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="CSS/style.css" type="text/css"/>
<link rel="stylesheet" href="CSS/prettyphoto.css" type="text/css"/>
<link rel="stylesheet" href="CSS/totop.css" type="text/css"/>

<!--[if IE]>
<style>#header h1 a:hover {
    font-size: 75px;
}</style><![endif]-->
</head>
<body>
<div class="main-container">
 
</div>
<div class="main-container">
   
</div>
<div class="main-container">
    <div id="nav-container">
        <nav>
            <ul class="nav">
                <li class="active"><a href="index.html">Homepage</a></li>
                <li><a href="typo.html">Typography</a></li>
                <li><a href="#">Layouts</a>
                    <ul>
                        <li><a href="#">Sidebar</a>
                            <ul>
                                <li><a href="right_sidebar.html">Right Sidebar</a>
                                </li>
                            </ul>
                        <li><a href="full_width.html">Full Width</a></li>
                    </ul>
                </li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li class="last"><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </div>
</div>
<div class="main-container">
    <div class="container1">
        <div id="mySlides">
         <?php $i=0;
      if($num==0){
     echo '<div style="width: 235px;font-weight: bold;padding-top: 9px;padding-left: 300px;float: left;font-size: 14px;color: #333;"> No request found </div>';
    }
    else{
		$i=0;
     while($fetch = mysql_fetch_assoc($exec)){
		 $val2=$fetch;?>
            <div id="slide<?php echo $i;?>">
        <img src="<?php if($val2['image'] <> ""){echo '../pics/'.$val2['image'];}?>" alt="Slide 1 jFlow Plus"/>
                <span><b class="slideheading">First Featured Slide</b><br/><?php echo $val2['textarea']?><a href="#"
                                                                                                title="Coolness"
                                                                                                class="readmore">
                    <?php echo $val2['title']?></a></span>
            </div>
            
              <?php $i++;}}?>
        </div>

        <div id="myController">
            <span class="jFlowControl"></span>
            <span class="jFlowControl"></span>
            <span class="jFlowControl"></span>
        </div>

        <section class="jFlowPrev">
            <div></div>
        </section>
        <section class="jFlowNext">
            <div></div>
        </section>
        <br/>
        <br/>

       

    </div>

    
    <br/><br/>

    <div class="container2">
        
    </div>
</div>
<div class="main-container">

</div>


<footer>

   
    
</footer>

<br/>
<br/>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/prettyphoto.js" type="text/javascript"></script>
<script src="js/jflow.js" type="text/javascript"></script>
<script src="js/easing.js" type="text/javascript"></script>
<script src="js/totop.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
</body>
</html>
