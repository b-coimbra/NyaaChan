<?php
    include 'SQL_Connection.php';

    $BoardID = $_GET["BoardID"];
    $ThreadID = uniqid();
    $ThreadComment = $_REQUEST['ThreadComment'];
    $ThreadCreationDate = date("Y/m/d");
    $ThreadCreationTime = date("h:i:a");

    $UploadStats = "";
    $target_dir = "Data/";
    // create Data folder if it doesn't exist
    is_dir($target_dir) || mkdir($target_dir, 0777, true);

    $target_file = $target_dir . uniqid() . "." . pathinfo($_FILES["ThreadFile"]["name"], PATHINFO_EXTENSION);
    //echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"]))
    {
        $check = getimagesize($_FILES["ThreadFile"]["tmp_name"]);

        if ($check !== false) 
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
    if ($_FILES["ThreadFile"]["size"] > 5000000) 
    {
        $UploadStats = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (!(preg_match('/(jpg|png|jpeg|gif)/i', $imageFileType, $matches)))
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
        if (move_uploaded_file($_FILES["ThreadFile"]["tmp_name"], $target_file)) 
        {
            $sql = "INSERT INTO threads (ThreadID, ThreadFile, ThreadComment, BoardID, CreationDate, CreationTime) VALUES ('$ThreadID','$target_file','$ThreadComment','$BoardID', '$ThreadCreationDate', '$ThreadCreationTime')";

            if ($Connection->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $Connection->error;
            }
            $UploadStats = "The file ". basename( $_FILES["ThreadFile"]["name"]). " has been uploaded.";
            $Connection->close();
            header("Location: Thread.php?BoardID=$BoardID&ThreadID=$ThreadID"); 
        }
        else 
        {
            $UploadStats = "Sorry, there was an error uploading your file.";
        }
    }
?>