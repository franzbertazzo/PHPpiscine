#!/usr/bin/php
<?php
	array_shift($argv);
	if ($argc == 4)
	{
		$ops = array();
		foreach ($argv as $param)
			foreach (preg_split('/\s+/', trim($param)) as $op)
				array_push($ops, $op);
		if ($ops[1] == '+')
			echo $ops[0] + $ops[2] . "\n";
		else if ($ops[1] == '-')
			echo $ops[0] - $ops[2] . "\n";
		else if ($ops[1] == '*')
			echo $ops[0] * $ops[2] . "\n";
		else if ($ops[1] == '/')
			echo $ops[0] / $ops[2] . "\n";
		else if ($ops[1] == '%')
			echo $ops[0] % $ops[2] . "\n";
	}
	else
		print("Incorrect Parameters\n");
?>