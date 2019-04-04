<?php
	abstract class Fighter {
		abstract function fight($a);
		public $name;
		public function __construct ($t){
			$this->name = $t;
	}
}
?>