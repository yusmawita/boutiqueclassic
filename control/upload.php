<?php
define ("MAX_SIZE","400");
function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
function uploading($fname,$nametypefile){
	$out="";
	// mulai query untuk upload foto
	$potoname=$_FILES[$nametypefile]['name'];
	$potosize=$_FILES[$nametypefile]['size'];
	$potoalamat=$_FILES[$nametypefile]['tmp_name'];
	$pototype=$_FILES[$nametypefile]['type'];
  	$extension = getExtension($potoname);
 	$extension = strtolower($extension);
	echo $potoname;
	$filename = "themes\images\products/". $fname.".".$extension;
	move_uploaded_file($potoalamat, $filename);
	
	$out=$fname.".".$extension;
	return $out;
}

?>