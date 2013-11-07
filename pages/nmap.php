<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="refresh" content="600"> <!-- Refresco de iframe -->
</head>
<body>
		<?php
		// /tmp/ipScan.txt
		$file = fopen("/tmp/ipScanLite.txt", 'r');
		while (!feof($file)) {
		$data = fgets($file);
				echo $data."<br />";
		}
		fclose($file);
		?>
</body>