<?php
class Color {
	
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	function __construct( $kwargs ) {
		if (isset($kwargs['rgb'])) {
			$number = intval($kwargs['rgb']);
			$this->blue = $number & 0xff;
			$this->green = $number >> 8 & 0xff;
			$this->red = $number >> 16 & 0xff;
		}
		else {
			if (isset($kwargs['red']))
				$this->red = intval($kwargs['red']);
			if (isset($kwargs['blue']))
				$this->blue = intval($kwargs['blue']);
			if (isset($kwargs['green']))
				$this->green = intval($kwargs['green']);
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function __destruct() {
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	function __toString() {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	static function doc() { echo file_get_contents("./Color.doc.txt"); }

	function add($color) {
		$newred = $color->red + $this->red;
		if ($newred > 255)
			$newred = 255;
		else if ($newred < 0)
			$newred = 0;
		$newblue = $color->blue + $this->blue;
		if ($newblue > 255)
			$newblue = 255;
		else if ($newblue < 0)
			$newblue = 0;
		$newgreen = $color->green + $this->green;
		if ($newgreen > 255)
			$newgreen = 255;
		else if ($newgreen < 0)
			$newgreen = 0;
		return new Color(array("red" => $newred, "blue" => $newblue, "green" => $newgreen));
	}

	function mult($factor) {
		$newred = $factor * $this->red;
		if ($newred > 255)
			$newred = 255;
		else if ($newred < 0)
			$newred = 0;
		$newblue = $factor * $this->blue;
		if ($newblue > 255)
			$newblue = 255;
		else if ($newblue < 0)
			$newblue = 0;
		$newgreen = $factor * $this->green;
		if ($newgreen > 255)
			$newgreen = 255;
		else if ($newgreen < 0)
			$newgreen = 0;
		return new Color(array("red" => $newred, "blue" => $newblue, "green" => $newgreen));
	}

	function sub($color) {
		$newred = $this->red - $color->red;
		if ($newred > 255)
			$newred = 255;
		else if ($newred < 0)
			$newred = 0;
		$newblue = $this->blue - $color->blue;
		if ($newblue > 255)
			$newblue = 255;
		else if ($newblue < 0)
			$newblue = 0;
		$newgreen = $this->green - $color->green;
		if ($newgreen > 255)
			$newgreen = 255;
		else if ($newgreen < 0)
			$newgreen = 0;
		return new Color(array("red" => $newred, "blue" => $newblue, "green" => $newgreen));
	}
}
?>
