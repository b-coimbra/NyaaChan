<?php
	$UploadStats = "";

	$target_dir = "Threads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
    	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    	if($check !== false) 
    	{
        	$UploadStats = "File is an image - " . $check["mime"] . ".";
        	$uploadOk = 1;
    	}
    	else 
    	{
        	$UploadStats = "File is not an image.";
        	$uploadOk = 0;
    	}
	}
	// Check if file already exists
	if (file_exists($target_file)) 
	{
    	$UploadStats = "Sorry, file already exists.";
    	$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) 
	{
    	$UploadStats = "Sorry, your file is too large.";
    	$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
	{
    	$UploadStats = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
    	$UploadStats = "Sorry, your file was not uploaded.";
    	//header("Location: /NyaaChan/Boards/Anime/");
		// if everything is ok, try to upload file
	} 
	else 
	{
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    	{
        	$UploadStats = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        	header("Location: /NyaaChan/Boards/Anime/Threads/Example/"); 
    	} 
    	else 
    	{
        	$UploadStats = "Sorry, there was an error uploading your file.";
    	}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Thread Creation!</title>
		<link rel="stylesheet" type="text/css" href="../../NyaaChan.css">
	</head>
	<body>
		<center>
			<img src="../.././Images/Nyaa.png" style="margin-top: 10%;">
			<div style="color: red;"><?php echo $UploadStats; ?></div>
		</center>
	</body>
</html>