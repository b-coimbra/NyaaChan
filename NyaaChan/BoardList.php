<!DOCTYPE html>
<html>
<head>
	<title>NyaaChan</title>
</head>
	<body>
		<div id="BoardList">
			<?php 
				include 'SQL_Connection.php';

				$BoardListQuery = "SELECT * FROM boards";
				$BoardListResault = $Connection->query($BoardListQuery);

				while($Row = $BoardListResault->fetch_array())
				{
					echo "
					<a href='ThreadList.php?BoardID=$Row[ID]' id='BoardItem'>
						<img src='Thumb/$Row[ID].png' id='BoardThumb'>
						<div id='BoardText'>$Row[ID]</div>
					</a>
					";
				}
			?>
		</div>
	</body>
</html>