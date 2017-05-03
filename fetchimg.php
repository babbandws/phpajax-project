<?php


$sql = "SELECT img_path,title FROM images ORDER BY id DESC";
$sqlq = mysqli_query($con, $sql) or die(mysqli_error($con));   
while($row = mysqli_fetch_array($sqlq, MYSQLI_BOTH)){
 
?>

<h1><?php echo $row["title"]; ?></h1>
<img src="<?php echo $row["img_path"]; ?>" alt="">

<?php 

}

mysqli_close($con);
 
?>
