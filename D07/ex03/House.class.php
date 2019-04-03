<?php

abstract Class House {

	abstract public function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();

	public function introduce() {
		echo "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : ";
		echo '"' . $this->getHouseMotto() . '"' . PHP_EOL;
	}
}

?>