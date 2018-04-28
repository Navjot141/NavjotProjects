
<?Php
include 'config_dbase.php';
$cid=$_REQUEST['cid'];
$qr=mysql_query("select * from subregions where region_id='$cid'");
while($fetch=mysql_fetch_assoc($qr))
{
?>
<option value="<?Php echo $fetch['id']?>"><?Php echo $fetch['name']?></option>
<?php
}
?>	
