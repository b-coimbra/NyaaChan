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
			<form action="Create-Thread.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><label><b>File</b></label></td>
						<td><input type="file" name="ThreadFile" accept="image/x-png,image/gif,image/jpeg" required></td>
					</tr>
					<tr>
						<td><label><b>Comment</b></label></td>
						<td><textarea cols="30" rows="5" name="ThreadComment" required></textarea></td>
					</tr>
					<tr align="center">
						<td colspan="2"><input type="submit" name="submit" value="Create Thread"></td>
					</tr>
				</table>
			</form>
		</center>

		<div id="Split"></div>

		<?php
		include 'SQL_Connection.php';

		$ThreadQuery = "SELECT * FROM threads";
		$ThreadResault = $Connection->query($ThreadQuery);

		while($Row = $ThreadResault->fetch_array())
		{
			echo "
			<div id='Thread'>
				<img src='$Row[ThreadFile]' id='ThreadIMG'>
				<div id='ThreadText'>
					<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]] <a href='Thread.php?ThreadID=$Row[ThreadID]'>[Open Thread]</a></div>
					<br
					<div id='ThreadTextContent'>$Row[ThreadComment]</div>
				</div>
			</div>
			<br>";
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