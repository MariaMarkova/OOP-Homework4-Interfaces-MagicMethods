<?php

class City 
{
	
	private $name;
	private $code;
	private $index;
	private $climateData;
	
	public function __construct($name, $code, $index, /*ClimateInfo $climateData*/ $min, $max){
		$this->name = $name;
		$this->setCode($code);
		$this->setIndex($index);
		//$this->climateData[] = $climateData;
		$this->climateData = new ClimateInfo($min, $max);
	}
	
	public function setCode($code){
		if ($this->checkCode($code)){
			$this->code = $code;
		}
	}
	
	public function setIndex($index){
		if($this->checkIndex($index)){
			$this->index = $index;
		}
	}
	
	public function __get($field){
		//echo "Magic __get in City  $this->$field " . PHP_EOL;
		return isset($this->$field) ? $this->$field : null;
	}
	
	public function __set($field, $value){
		if($this->$field == 'code' && $this->checkCode($value)){
			$this->$field = $value;
		}else{ 
			echo 'error, code must be 3 letters' , PHP_EOL;
		}
		if($this->$field == 'index' && $this->checkIndex($value)){
			$this->$field = $value;
		}else{
			echo 'error, index must be between 0 and 1' , PHP_EOL;
		}
		if($this->$field != 'code' || $this->$field != 'index'){
			$this->$field = $value;
		}
		
	}
	
	public function __toString(){
		return PHP_EOL . $this->name 
		. ' Code: ' . $this->code 
		. " Index: " . $this->index 
		. " ClimateData: " . $this->climateData;
	}
	
	public function isMajorCity(){
		return false;	
	}
	
	private function checkCode($code){
		$re = "/^[A-Z]+$/";
		
		if(strlen($code) != 3 || !preg_match($re, $code, $matches)){
			return false;
		}
		return true;
	}
	
	private function checkIndex($index){
		if($index >= 0 && $index <=1){
			return true;
		}
		return false;
	}
}