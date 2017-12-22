<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="Favicon.png">
		<link rel="stylesheet" type="text/css" href="NyaaChan.css">
		<?php include 'Config.php'; ?>
	</head>
	<body>
		<center>
			<?php
				if ($AcountSystem == "True")
				{
					echo "
					<div style='text-align: right; position: right;'>
						<a href='Login.html' id='MenuButtonText' style='padding: 10px 20px;'>Login</a>
						<a href='Register.html' id='MenuButtonText' style='padding: 10px 20px;'>Register</a>
					</div>";
				}
			?>

			<img src="Favicon.png" id="Header-Image">
			<a href="Home" id="Title"><?php echo $WebsiteName;?></a>

			<div id="Split" style="margin-bottom: 0px;"></div>

			<ul id="Menu">
				<li id="MenuButton"><a href="Home" id="MenuButtonText">Home</a></li>
				<li id="MenuButton"><a href="Rules" id="MenuButtonText">Rules</a></li>
				<li id="MenuButton" style="background-color: AliceBlue;"><a href="FAQ" id="MenuButtonText">FAQ</a></li>
  				<li id="MenuButton"><a href="Contact" id="MenuButtonText">Contact</a></li>
			</ul>

			<div id="Split" style="margin-top: 0px;"></div>
		</center>
	</body>
</html>
