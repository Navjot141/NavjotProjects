<?php







?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/loginn.css" rel="stylesheet" type="text/css" />
<script>
function startTime()
{
var today=new Date();
 months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
var d=today.getDate();
 var month=today.getMonth();
 var day = today.getDay();
 days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
var year = today.getFullYear();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);

document.getElementById('txt').innerHTML=' '+days[day]+' '+d+' '+months[month]+' '+year+'   '+h+':'+m+':'+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>
<body onload="startTime()">
<div align="center">
<div class="outerdiv">
<div class="innerdiv">
<div class="header">
<div class="header1">
<div class="headera"><a href="images/image_11.png"></a></div>
<div class="headerb"> ADMIN PANEL</div>
</div>

<div class="header2">
<div class="header2a">
<div class="header2a1"><a href= "#" style="color:#000;">Update profile</a></div>
<div class="header2a2"><a href= "#" style="color:#000;">Logout</a></div>
</div>
<div class="header2a3" id="txt"> </div>
</div>
<div class="content" >
<div class="content1a">
            <ul >
              <li><a href="#">Home</a>
                <ul>
                  <li><a href="managecategory.php"><span style="width:120px; height:40px; font-size:21px;">Manage category</span> </a></li>
                  <li><a href="managesubcategory.php"><span style=" font-size:19px;">Manage Sucategory</span></a></li>
                  <li><a href="manageproduct.php"><span style=" font-size:21px;">Manage Products</span></a></li>
                </ul>
              </li>
              <li><a href="#">SLider</a>
                <ul>
                  <li><a href="manage_slider.php">Manage slider</a></li>
                </ul>
              </li>
              <li><a href="#">Blogs</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
<div class="content1b"><span style="padding-top:20;">Welcome to e-commerce ADMIN PANEL</span></div>
</div>
</div>



</div>
</div>
</div> 
</body>
</html>