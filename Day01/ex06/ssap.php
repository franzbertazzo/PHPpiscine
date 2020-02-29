#!/usr/bin/php
<?php
	array_shift($argv);
	if ($argc > 1)
	{
		$array = array();
		foreach ($argv as $param)
		{
			foreach (preg_split('/\s+/', trim($param)) as $word)
			{
				array_push($array, $word);
			}
		}
		sort($array);
		foreach($array as $word)
			echo "$word\n";
	}	
?>