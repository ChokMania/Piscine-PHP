<?php
Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	function __construct( $palette ) {
		if ($palette['rgb'] != "") {
			$number = intval($palette['rgb']);
			$this->blue = $number & 0xff;
			$this->green = $number >> 8 & 0xff;
			$this->red = ($number >> 16) & 0xff;
		}
		else {
			if ($palette['red'] != "")
				$this->red = intval($palette['red']);
			if ($palette['blue'] != "")
				$this->blue = intval($palette['blue']);
			if ($palette['green'] != "")
				$this->green = intval($palette['green']);
		}
		if (Color::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __destruct () {
		if (self::$verbose)
			return (printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue));
	}

	public function __toString() {
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )",
			array ($this->red, $this->green, $this->blue)));
	}

	public static function doc() { return (file_get_contents('Color.doc.txt')); }

	public function add($new_color)
	{
		return (new Color(array ('red' => $this->red + $newcolor,
		'green' => $this->green + $newcolor,
		'blue' => $this->blue + $newcolor)));
	}

	public function sub($new_color)
	{
		return (new Color(array ('red' => $this->red - $newcolor,
		'green' => $this->green - $newcolor, 
		'blue' => $this->blue - $newcolor)));
	}

	public function mult($new_color)
	{
		return (new Color(array ('red' => $this->red * $newcolor,
		'green' => $this->green * $newcolor, 
		'blue' => $this->blue * $newcolor)));
	}
}
?>
