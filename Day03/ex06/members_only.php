<?php
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittleponey")
	{
		$file = base64_encode(file_get_contents("img/42.png"));
	?>
	<html><body>Hello Zaz<br />
	<?php
		echo "<img src='data:image/png;base64, $file'>";
	?>
	</body></html>
	<?php
	}
	else
	{
		?><html><body>That area is accessible for members only</body></html>
		<?php
		header('HTTP/1.0 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Member area"');
	}
	?>