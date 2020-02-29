<?php
	abstract class House
	{
		abstract function getHouseName();
		abstract function getHouseMotto();
		abstract function getHouseSeat();

		public function introduce()
		{
			$name = $this->getHouseName();
			$motto = $this->getHouseMotto();
			$seat = $this->getHouseSeat();

			printf("House %s of %s : \"%s\"\n", $name, $seat, $motto);
		}
	}
?>