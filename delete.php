<?php

require 'connect.php';

$query = "SELECT * FROM images  WHERE id";
$res = mysqli_query($con, $query);
while($delete = mysqli_fetch_array($res, MYSQLI_BOTH){

//echo $delete['img_path'];

	    	$image = $delete['img_path'];
	    	 $file = '/uploads/'.$image;
             unlink($file);
             //echo $file;
    }    

mysqli_query($con, "DELETE FROM images WHERE id");

mysqli_close($con);

?>

