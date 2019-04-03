<?php
Class NightsWatch {

	private $p = array();

	public function recruit($i) {
		$this->p[] = $i;
	}

	public function fight() {
		foreach ($this->p as $k) {
			if ($k instanceof IFighter)
				$k->fight();
		}
	}
}
?>