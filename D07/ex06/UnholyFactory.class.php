<?php
Class UnholyFactory {
	private $armee = array();
	public function absorb($people) {
		$doublons = 0;
		if ($people instanceof Fighter) {
			foreach ($this->armee as $test) {
				if ($test->name === $people->name) {
					$doublons = 1;
					echo "(Factory already absorbed a fighter of type " . $people->name . ")" . PHP_EOL;
				}
			}
			if ($doublons == 0) {
				$this->armee[] = $people;
				echo "(Factory absorbed a fighter of type " . $people->name . ")" . PHP_EOL;
			}
		}
		else {
			echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
		}
	}
	public function fabricate($soldier) {
		foreach ($this->armee as $army) {
			if ($army->name == $soldier)
			{
				echo "(Factory fabricates a fighter of type " . $soldier . ")". PHP_EOL;
				return $army;
			}
		}
		echo "(Factory hasn't absorbed any fighter of type " . $soldier . ")". PHP_EOL;
		return null;
	}
}
?>