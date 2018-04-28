 <?php 
//include 'config_dbase.php';
$sql="select * from category";
$exec=mysql_query($sql);
?>
<div class="box">
          <div class="box-heading">Categories</div>
          
          <div class="box-content box-category">
         
          
          <ul id="cat_accordion">
           <?php $i=0; while($fetch=mysql_fetch_assoc($exec)){ 
		  $sql_subcat="select * from subcategory where category='".$fetch['id']."'";
		  $exec_subcat=mysql_query($sql_subcat);
		  ?> 
        
              <li class="custom_id20"><a class="active" href="category.php?main_id=<?php echo $fetch['id'];?>"><?php echo $fetch['name'];  ?></a><span class="down"> </span>
<?php while($fetch_subcat=mysql_fetch_assoc($exec_subcat)){
	
	 ?>
                              

                <ul>
                                    <li class="custom_id26"><a class="" href="category.php?main_id=<?php echo $fetch['id'];?>&sub_id=<?php echo $fetch_subcat['id']; ?>"><?php echo $fetch_subcat['name']; ?></a></li>
                    
                 
               <!--<li class="custom_id27"><a class="" href="category.html">Desktops</a></li>
                  <li class="custom_id60"><a class="" href="category.html">Components</a></li>
                  <li class="custom_id61"><a class="" href="category.html">Software</a></li>
                  <li class="custom_id62"><a class="" href="category.html">Phones &amp; PDAs</a></li>
                  <li class="custom_id63"><a class="" href="category.html">Cameras</a></li>-->
                </ul>

                             <?Php }?> 
                </li>
             
            
            <!--<li class="custom_id18"><a class="" href="category.html">Jewellery</a> <span class="down"></span>
                <ul>
                  <li class="custom_id65"> <a class="" href="category.html">Children's Jewellery</a></li>
                  <li class="custom_id46"><a class="" href="category.html">Men's Jewellery</a></li>
                  <li class="custom_id45"><a class="" href="category.html">Women's Jewellery</a></li>
                  <li class="custom_id51"><a class="" href="category.html">Sample Test</a></li>
                  <li class="custom_id74"><a class="" href="category.html">Sample Test11</a></li>
                  <li class="custom_id75"><a class="" href="category.html">Sample Test12</a></li>
                </ul>
              </li>
              <li class="custom_id17"><a class="" href="category.html">Shoes</a> <span class="down"></span>
                <ul>
                  <li class="custom_id66"><a class="" href="category.html">Children's Shoes</a></li>
                  <li class="custom_id67"><a class="" href="category.html">Men's Shoes</a></li>
                  <li class="custom_id68"><a class="" href="category.html">Women's Shoes</a></li>
                  <li class="custom_id76"><a class="" href="category.html">Test Sample</a></li>
                  <li class="custom_id77"><a class="" href="category.html">Test Sample1</a></li>
                </ul>
              </li>
              <li class="custom_id25"><a class="" href="category.html">Clothing</a> <span class="down"></span>
                <ul>
                  <li class="custom_id29"><a class="" href="category.html">Men</a></li>
                  <li class="custom_id28"><a class="" href="category.html">Women</a> <span class="down"></span>
                    <ul>
                      <li class="custom_id35"><a class="" href="category.html">test 1</a></li>
                      <li class="custom_id36"><a class="" href="category.html">test 2</a></li>
                    </ul>
                  </li>
                  <li class="custom_id30"><a class="" href="category.html">Boys</a></li>
                  <li class="custom_id31"><a class="" href="category.html">Girls</a></li>
                  <li class="custom_id32"><a class="" href="category.html">Accessories</a></li>
                  <li class="custom_id78"><a class="" href="category.html">Sample Test21</a></li>
                </ul>
              </li>
              <li class="custom_id24"><a class="" href="category.html">Kids</a> <span class="down"></span>
                <ul>
                  <li class="custom_id73"><a class="" href="category.html">Toys Kids</a></li>
                  <li class="custom_id72"><a class="" href="category.html">Games</a></li>
                  <li class="custom_id38"><a class="" href="category.html">Sample Test22</a></li>
                  <li class="custom_id37"><a class="" href="category.html">Sample Test15</a></li>
                  <li class="custom_id79"><a class="" href="category.html">Sample Kids</a></li>
                  <li class="custom_id39"><a class="" href="category.html">Sample Test6</a></li>
                </ul>
              </li>
              <li class="custom_id33"><a class="" href="category.html">Watches</a> <span class="down"></span>
                <ul>
                  <li class="custom_id44"><a class="" href="category.html">Women's Watches</a></li>
                  <li class="custom_id43"><a class="" href="category.html">Men's Watches</a></li>
                  <li class="custom_id47"><a class="" href="category.html">Children's Watches</a></li>
                  <li class="custom_id48"><a class="" href="category.html">Sample16</a></li>
                  <li class="custom_id49"><a class="" href="category.html">Sample17</a></li>
                  <li class="custom_id50"><a class="" href="category.html">test 18</a></li>
                </ul>
              </li>
              <li class="custom_id34"><a class="" href="category.html">Sports</a> <span class="down"></span>
                <ul>
                  <li class="custom_id71"><a class="" href="category.html">Women's Sports</a></li>
                  <li class="custom_id69"><a class="" href="category.html">Children's Sports</a></li>
                  <li class="custom_id70"><a class="" href="category.html">Men's Sports</a></li>
                  <li class="custom_id40"><a class="" href="category.html">test 7</a></li>
                  <li class="custom_id41"><a class="" href="category.html">Sample 8</a></li>
                  <li class="custom_id42"><a class="" href="category.html">test 9</a></li>
                </ul>
              </li>
              <li class="custom_id59"><a class="" href="category.html">Health</a> <span class="down"></span>
                <ul>
                  <li class="custom_id55"><a class="" href="category.html">Sample Test1</a></li>
                  <li class="custom_id56"><a class="" href="category.html">Sample Test2</a></li>
                  <li class="custom_id52"><a class="" href="category.html">test 20</a> <span class="down"></span>
                    <ul>
                      <li class="custom_id58"><a class="" href="category.html">test 25</a></li>
                    </ul>
                  </li>
                  <li class="custom_id53"><a class="" href="category.html">test 21</a></li>
                  <li class="custom_id54"><a class="" href="category.html">test 22</a></li>
                </ul>
              </li>
              <li class="custom_id80"><a class="" href="category.html">Furniture</a> <span class="down"></span>
                <ul>
                  <li class="custom_id89"><a class="" href="category.html">Bedrooms Furniture</a></li>
                  <li class="custom_id90"><a class="" href="http://localhost/polishop/index.php?route=product/category&amp;path">Kidsrooms furniture</a></li>
                  <li class="custom_id88"><a class="" href="category.html">Kitchen Furniture</a></li>
                  <li class="custom_id92"><a class="" href="category.html">Showcase Furniture</a></li>
                  <li class="custom_id93"><a class="" href="category.html">Table Furniture</a></li>
                  <li class="custom_id91"><a class="" href="category.html">Wall Furniture</a></li>
                </ul>
              </li>
              <li class="custom_id81"><a class="" href="category.html">Books</a> <span class="down"></span>
                <ul>
                  <li class="custom_id82"><a class="" href="category.html">Audio Books</a></li>
                  <li class="custom_id83"><a class="" href="category.html">Comedy Book</a></li>
                  <li class="custom_id84"><a class="" href="category.html">Comics Books</a></li>
                  <li class="custom_id85"><a class="" href="category.html">Computer Book</a></li>
                  <li class="custom_id86"><a class="" href="category.html">Cookies Books</a></li>
                  <li class="custom_id87"><a class="" href="category.html">English Books</a></li>
                </ul>
              </li>-->
              <?Php $i++; } ?>
            </ul>
             
          </div>
        </div>