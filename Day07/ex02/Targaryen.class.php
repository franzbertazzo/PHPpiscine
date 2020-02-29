<?php
	class Targaryen
	{
		public function resistsFire() 
		{
			return false;
		}

		public function GetBurned()
		{
			$fireProof = $this->resistsFire();
			if ($fireProof)
			{
				return "emerges naked but unharmed";
			}
			else
			{
				return "burns alive";
			}
		}
	}
?>