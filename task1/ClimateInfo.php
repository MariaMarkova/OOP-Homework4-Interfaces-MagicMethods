<?php

class ClimateInfo
{
	
	private $minTemperature;
	private $maxTemperature;
	
	public function __construct($min, $max){
		$this->maxTemperature = $max;
		$this->minTemperature = $min;
	}
	
	public function __get($field){
		return isset($this->$field) ? $this->$field : null;
	}
	
	public function __set($field, $value){
		$this->$field = $value;
	}
	
	public function __toString(){
		return 'MinTemperature:' . $this->minTemperature . 'C '
				. ' MaxTemperature:' . $this->maxTemperature .'C'
				. PHP_EOL;
	}
}