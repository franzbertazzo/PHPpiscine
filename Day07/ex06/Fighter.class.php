<?php
	abstract class Fighter
	{
		public $type_soldier;

		abstract function fight($target);

		public function __construct($type)
		{
			$this->type_soldier = $type;
		}

		public function getType()
		{
			return ($this->type_soldier);
		}
	}
?>