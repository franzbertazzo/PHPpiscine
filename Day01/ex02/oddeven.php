#!/usr/bin/php
<?php
	while(true)
	{
		print("Enter a number: ");
		$file = fopen("php://stdin","r");
		$line = fgets($file);
		$number = trim($line);
		if (is_numeric($number))
		{
			if ($number % 2 == 0)
				print("the number {$number} is even\n");
			else
				print("the number {$number} is odd\n");
		}
		else
			print("'{$number}' is not a number\n");
	}
?>