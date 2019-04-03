<?php

require_once("Color.class.php");

class Vector
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	public static $verbose = FALSE;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('dest', $kwargs) && $kwargs['dest'] instanceof Vertex) {
			$dest = $kwargs['dest'];
		}
		if (array_key_exists('orig', $kwargs) && $kwargs['orig'] instanceof Vertex) {
			$orig = $kwargs['orig'];
		} else {
			$orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
		}
		if (isset($dest)) {
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
		}
		if (self::$verbose === TRUE) {
			echo $this->__toString(). " constructed". PHP_EOL;
		}
	}

	public function __destruct()
	{
		if (self::$verbose === TRUE) {
			echo $this->__toString() . " destructed". PHP_EOL;
		}
	}

	public function __toString()
	{
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
	}

	static function doc() { echo file_get_contents("./Vector.doc.txt"); }

	public function magnitude() {
		return sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2));
	}

	public function normalize() {
		$l = $this->magnitude();
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $l,
		'y' => $this->_y / $l, 'z' => $this->_z / $l))));
	}
	
	public function add(Vector $rhs) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->getX(),
		'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ()))));
	}
	
	public function sub(Vector $rhs) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->getX(),
		'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ()))));
	}
	
	public function opposite() {
		return new Vector(array('dest' => new Vertex(array('x' => -$this->_x,
		'y' => -$this->_y, 'z' => -$this->_z))));
	}

	public function scalarProduct($k) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k,
		'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}

	public function dotProduct(Vector $rhs) {
		return $this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ();
	}
	
	public function cos(Vector $rhs) {
		return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
	}
	
	public function crossProduct(Vector $rhs) {
		return new Vector(array('dest' => new Vertex(array(
		'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
		'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
		'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))));
	}

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
}

?>
