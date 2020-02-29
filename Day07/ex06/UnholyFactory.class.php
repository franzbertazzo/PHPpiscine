<?php
	class UnholyFactory 
	{
		private $absorbed = array();
		private $type_formatted;

		public function absorb($soldier)
		{
			if ($soldier instanceof Fighter)
			{
				if (in_array($soldier, $this->absorbed)) // If it's already inside
					printf("(Factory already absorbed a fighter of type %s)\n", $soldier->getType());
				else
				{
					$this->absorbed[] = $soldier;
					printf("(Factory absorbed a fighter of type %s)\n", $soldier->getType());
				}
			}
			else
				printf("(Factory can't absorb this, it's not a fighter)\n");
		}

		private function formatType($type_soldier)
		{
			if ($type_soldier === "llama")
				return "Llama";
			else if ($type_soldier === "archer")
				return "Archer";
			else if ($type_soldier === "foot soldier")
				return "Footsoldier";
			else if ($type_soldier === "assassin")
				return "Assassin";
		}

		public function fabricate($type)
		{
			$this->type_formatted = $this->formatType($type);
			foreach ($this->absorbed as $key => $value) {
				if (get_class($value) === $this->type_formatted)
				{
					$fabricated = clone $this->absorbed[$key];
					printf("(Factory fabricates a fighter of type %s)" . PHP_EOL, $type);
					return ($fabricated);
				}
			}
			printf("(Factory hasn't absorbed any fighter of type %s)" . PHP_EOL, $type);
		}
	}
?>