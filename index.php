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
	require 'fetchimg.php';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function($){

	});	
</script>

</body>
</html>
