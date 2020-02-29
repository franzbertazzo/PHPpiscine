#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$array = preg_split('/\s+/', $argv[1]);
		$first_word = $array[0];
		array_shift($array);
		array_push($array,$first_word);
		foreach($array as $word)
			echo "{$word} ";
		print("\n");
	}	
?>