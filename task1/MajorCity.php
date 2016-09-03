<?php

class MajorCity extends City
{
	
	private $residents;
	
	public function __construct($name, $code, $index, $min, $max, $residents){
		parent::__construct($name, $code, $index, $min, $max);
		$this->residents = $residents;
	}
	
	public function __get($field){
		//echo "Magic __get in Major" . PHP_EOL;
		return parent::__get($field);
	}
	
	public function __set($field, $value){
		parent::__set($field, $value);
	}
	
	public function __toString(){
		return parent::__toString() . "residents => " . $this->residents . PHP_EOL;
	}
	
	public function isMajorCity(){
		return true;
	}
}