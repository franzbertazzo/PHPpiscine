#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$array = preg_split('/\s+/', $argv[1]);
		$str = implode(" ",$array);
		print("{$str}\n");
	}
?>