<?php 
	$URLThreadID = $_GET["ThreadID"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>NyaaChan - Anime</title>
		<link rel="icon" href="Favicon.png">
		<link rel="stylesheet" type="text/css" href="../../NyaaChan.css">
	</head>
	<body>
		<a href="../../Home" id="Title">NyaaChan</a>
		<a href="../Anime/" id="GroupTitle">/Anime/</a>

		<br>

		<center>
			<form action="Create-Post.php?ThreadID=<?php echo $URLThreadID; ?>" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><label><b>File</b></label></td>
						<td><input type="file" name="PostFile" accept="image/x-png,image/gif,image/jpeg" required></td>
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
		</center>

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
			echo "
			<div id='Comment'>
				<img src='$Row[PostFile]' id='PostIMG'>
				<div id='ThreadText'>
					<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]]</div>
					<div id='ThreadTextContent'>$Row[PostComment]</div>
				</div>
			</div>";
		}
		?>

		<?php include '../../Footer.php'; ?>
	</body>
</html>

<style type="text/css">
#Split
{
	width: 100%;
}
</style>