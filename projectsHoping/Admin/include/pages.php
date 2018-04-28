
<?php
$res="";
if(isset($_GET["page"]))
{
$page=$_GET["page"]; 
}  
else 
{
$page=1;
};
$start_from=($page-1)*$parpage;
$sql="SELECT COUNT(*) FROM $table";
$rs_result = mysql_query($sql);
$row = mysql_fetch_row($rs_result);
$total_records =$row[0];
$total_pages=ceil($total_records/$parpage);
function show($total_pages)
{
for ($i=1; $i<=$total_pages; $i++)
{
 $res=$res."<a href='$main_page?page=".$i."' style='color:black'>".$i."</a> ";
}
echo $res;
}
?>