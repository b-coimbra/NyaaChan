<?php 
	$URLThreadID = $_GET["ThreadID"];
	$BoardID = $_GET["BoardID"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>NyaaChan - Anime</title>
		<link rel="icon" href="Favicon.png">
		<link rel="stylesheet" type="text/css" href="CSS/NyaaChan.css">
	</head>
	<body>
		<div id="ThreadHeader">
			<a href="Home" id="Title" style="margin: 0px;">NyaaChan</a>
			<a href="ThreadList.php?BoardID=<?php echo $BoardID; ?>" id="GroupTitle">/<?php echo $BoardID; ?>/</a>
			<br>
		</div>

		<form id="FormContainer" action="Create-Post.php?BoardID=<?php echo $BoardID; ?>&ThreadID=<?php echo $URLThreadID; ?>" method="post" enctype="multipart/form-data">
			<table align="center">
				<tr>
					<td><label><b>File</b></label></td>
					<td><input type="file" name="PostFile" accept="image/x-png,image/gif,image/jpeg"></td>
				</tr>
				<tr>
					<td><label><b>Comment</b></label></td>
					<td><textarea cols="30" rows="5" name="PostComment" required></textarea></td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="submit" name="submit" value="Reply"></td>
				</tr>
			</table>
		</form>

		<div id="Split"></div>

		<?php
		include 'SQL_Connection.php';

		$ThreadQuery = "SELECT * FROM threads WHERE ThreadID='$URLThreadID'";
		$ThreadResault = $Connection->query($ThreadQuery);

		while($Row = $ThreadResault->fetch_array())
		{
			echo "
			<div id='Thread'>
				<img src='$Row[ThreadFile]' id='ThreadIMG'>
				<div id='ThreadText'>
					<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]]</div>
					<br
					<div id='ThreadTextContent'>$Row[ThreadComment]</div>
				</div>
			</div>
			<br>";
		}

		$PostQuery = "SELECT * FROM posts WHERE ThreadID='$URLThreadID'";
		$PostResult = $Connection->query($PostQuery);

		while ($Row = $PostResult->fetch_array()) 
		{
			if ($Row['PostFile'] == "")
			{
				echo "
					<div id='Comment'>
						<div id='PostText'>
							<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]]</div>
							<br>
							<div id='ThreadTextContent'>$Row[PostComment]</div>
						</div>
					</div>";

			}
			else
			{
				echo "
					<div id='Comment'>
						<img src='$Row[PostFile]' id='PostIMG'>
						<div id='ThreadText'>
							<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]]</div>
							<br>
							<div id='ThreadTextContent'>$Row[PostComment]</div>
						</div>
					</div>";
			}
		}
		?>

		<?php include 'Footer.php'; ?>
	</body>
</html>

<style type="text/css">
#FooterContainer
{
	width: 100%;
}	
</style>