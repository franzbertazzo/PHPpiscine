#!/usr/bin/php
<?php
	function	ft_my_sorting($s1, $s2)
	{
		$a1 = str_split($s1);
		$a2 = str_split($s2);
		$i = 0;
		$r = 0;
		while ($i < sizeof($a1) && $i < sizeof($a2) && 0 == ($r = strcasecmp($a1[$i], $a2[$i])))
			$i++;
		if ($r != 0)
		{
			$c1 = ft_char_type($a1[$i]);
			$c2 = ft_char_type($a2[$i]);
			if ($c1 != $c2)
				return ($c1 > $c2 ? 1 : -1);
			return ($r);
		}
		else
			return (sizeof($a1) == $i ? -1 : 1);
	}
	function	ft_char_type($c)
	{
		if (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z'))
			return (0);
		if ($c >= '0' && $c <= '9')
			return (1);
		return (2);
	}
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
		usort($array, "ft_my_sorting");
		foreach($array as $word)
			echo "$word\n";
	}	
?>