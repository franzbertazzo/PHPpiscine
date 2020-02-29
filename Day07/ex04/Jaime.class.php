<?php
	class Jaime extends Lannister
	{
		public function getPerson($person)
		{
			if (get_class($person) === 'Cersei')
				return ("With pleasure, but only in a tower in Winterfell, then.");
			else if (get_class($person) == 'Sansa')
				return ("Let's do this.");
			else
				return ("Not even if I'm drunk !");
		}
	}
?>