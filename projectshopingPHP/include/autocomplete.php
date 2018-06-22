<?php
include '../config_dbase.php';
include '../config.php';
# Perform the query
$query="(SELECT name from product WHERE name like '%".$_GET['term']."%' ORDER BY name ASC )";
//$query = sprintf("SELECT id, name from bluedevil_subject_category order by sort ASC ");
$arr = array();
$rs = mysql_query($query);
$num = mysql_num_rows($rs);
if($num == 0)
{
$arr[]="No search result found";
}
else{
	# Collect the results
	while($obj = mysql_fetch_array($rs)){
		$arr[] = $obj["name"];
	}
}
# JSON-encode the response
sort($arr);
$json_response = json_encode($arr);
//print_r($json_response);
# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;
?>