<?php 
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

		<form id="FormContainer" action="Create-Thread.php?BoardID=<?php echo $BoardID; ?>" method="post" enctype="multipart/form-data">
			<table align="center">
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

		<hr noshade id="Split" style="margin-bottom: 10px;">

		<?php
		include 'SQL_Connection.php';

		$ThreadQuery = "SELECT * FROM threads WHERE BoardID='$BoardID'";
		$ThreadResault = $Connection->query($ThreadQuery);

		while($Row = $ThreadResault->fetch_array())
		{
			echo "
			<div id='Thread'>
				<img src='$Row[ThreadFile]' id='ThreadIMG'>
				<div id='ThreadText'>
					<div id='ThreadTextContent'>[Anonymous] [$Row[CreationDate]] [$Row[CreationTime]] <a href='Thread.php?BoardID=$BoardID&ThreadID=$Row[ThreadID]'>[Open Thread]</a></div>
					<br
					<div id='ThreadTextContent'>$Row[ThreadComment]</div>
				</div>
			</div>
			<br>";
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