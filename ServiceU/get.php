<?php
	mysql_connect("localhost","root","Tanmay1!") or die (mysql_error());
	mysql_select_db("serviceu") or die (mysql_error());
	
	$id = -1;
	$id = addslashes($_REQUEST['id']);
	if ($id != -1){
	$image = mysql_query("SELECT  * FROM store 	WHERE id=$id");
	$image = mysql_fetch_assoc($image);
	$image = $image['image'];
	
	//header ("Content-type: image/jpeg");
	
	echo $image;
	}
	
?>