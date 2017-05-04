<!DOCTYPE html>
<html>
<head>
<title>php ajax project</title>
</head>
<body>

<?php
	
require 'connect.php';

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="text" name="title" id="title" required>
    <input type="file" name="image" id="image" required>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php 

require 'upload.php';
?>
<div class="tutorial_list">

<?php

$sql = "SELECT id,title,img_path FROM images ORDER BY id DESC LIMIT 5";
$sqlq = mysqli_query($con, $sql) or die(mysqli_error($con)); 
$rowCount = mysqli_num_rows($sqlq);  

if($rowCount > 0){ 
	while($row = mysqli_fetch_array($sqlq, MYSQLI_BOTH)){

	$id = $row['id'];
 
?>

<div class="list_item">
<h1><?php echo $row["title"]; ?></h1>
<img src="<?php echo $row["img_path"]; ?>" alt="">
</div>

<?php 

}

?>

<div class="show_more_main" id="show_more_main<?php echo $id; ?>">
    <span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
    <span class="loding" style="display: none;"><span class="loding_txt">Loading....</span></span>
</div>

<?php } ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'fetchimg.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});	
</script>

</body>
</html>
