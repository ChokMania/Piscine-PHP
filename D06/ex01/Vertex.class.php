<?php

class Vertex {
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color;

	static $verbose = FALSE;

	function __construct( array $kwargs ) {
		if (isset($kwargs['color']))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color( array("rgb" => 0xffffff));
		if (isset($kwargs['x']))
			$this->_x = $kwargs['x'];
		if (isset($kwargs['y']))
			$this->_y = $kwargs['y'];
		if (isset($kwargs['z']))
			$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (Vertex::$verbose)
			echo $this . " constructed\n";
	}

	public function __destruct() {
			if (Vertex::$verbose)
				echo $this . " destructed\n";
	}

	public static function doc() { echo file_get_contents("./Vertex.doc.txt"); }

	public function __toString() {
		$value = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		if (Vertex::$verbose && $this->_color)
			$value = $value . ", " . $this->_color;
		return ($value." )");
	}

	public function __get($att) { exit (print ("Dont exist or not public. So dont call it.\n")); }

	public function __set($att, $value) { exit (print ("Dont exist or not public. So dont set it.\n")); }

	public function getColor() { return $this->_color; }

	public function getX() { return $this->_x; }

	public function getY() { return $this->_y; }

	public function getZ() { return $this->_z; }

	public function getW() { return $this->_w; }

	public function setX($x) { $this->_x = $x; }

	public function setY($y) { $this->_y = $y; }

	public function setZ($z) { $this->_z = $z; }

	public function setW($w) { $this->_w = $w; }

	public function setColor($color) { $this->_color = $color; }
}
?>