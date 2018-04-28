<?php     
function re_size_file($uploadedfile,$filename)
{
//$uploadedfile='image/Desert.jpg';	
$size=getimagesize($uploadedfile);
$type = $size['mime'];
$width=$size[0];
$height = $size[1];
//echo $height;
//echo $width;
if($height >'600' || $width>'800')
{ 
//$newwidth=800;
//$newheight=($height/$width)*800;
$newwidth=500;
$newheight=500;
$tmp=imagecreatetruecolor($newwidth,$newheight);
//$filename="upload/Desert3.jpg";
if($size[2] ==IMAGETYPE_GIF)
{
$src=imagecreatefromgif($uploadedfile);                                                                                           imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); imagegif($tmp,$filename,100);
}
elseif($size[2]==IMAGETYPE_JPEG)
{
$src = imagecreatefromjpeg($uploadedfile);                                                                                     imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
 imagejpeg($tmp,$filename,100);
}
elseif($size[2] == IMAGETYPE_PNG) 
{
$src = imagecreatefrompng($uploadedfile);
 imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);  
imagepng($tmp,$filename,9);
}
imagedestroy($src);
imagedestroy($tmp); 
}
else
{
move_uploaded_file($uploadedfile);
}
}
//re_size_file("image/Lighthouse.jpg","upload/abc.jpg");
?>