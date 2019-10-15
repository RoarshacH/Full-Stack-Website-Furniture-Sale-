<?php
 //the following function returns the filename
 //when the property id is passed in
 function getPictureName($pid){

   global $mysqli;
   $sql = "select picture from tbl_products where proID=$pid";
   $rs  = $mysqli->query($sql);
   $row = mysqli_fetch_assoc($rs);
   return $row['picture'];
 }
 // end of getPicture name

 /* image resize function starts here */
 function resizeThumbPicture($path, $image_name)	{
   $uploadedfile = $path.$image_name;//actual path of the image

   // Capture the original size of the uploaded image
   list($width,$height,$type)=getimagesize($uploadedfile);

   $ratio = @$height/@$width;

   @$newwidth=480;
   @$newheight=$ratio * @$newwidth;
   @$newheight = round(@$newheight);

   $src = imagecreatefromjpeg(@$uploadedfile);

   @$tmp=imagecreatetruecolor(@$newwidth,@$newheight);
   imagecopyresampled($tmp,$src,0,0,0,0,@$newwidth,@$newheight,@$width,@$height);
   @$filename = $path.$image_name;
   imagejpeg($tmp,$filename,100);//100 means full 100% quality
   imagedestroy($src);
   imagedestroy($tmp); // NOTE: PHP will clean up the temp

   }/* image resize function ends   here */

 //************ file resize code with PHP end


 ?>
