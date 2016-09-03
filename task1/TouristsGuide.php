<?php

class TouristsGuide
{
	private $max_number_of_towns;
	private $towns;
	const ABSOLUTE_ZERO_C = -273.15;
	
	public function __construct($maxNumbOfTowns){
		$this->towns = [];
		$this->max_number_of_towns = $maxNumbOfTowns;
	}
	
	private static function convertToFahrenheit($degrees){
		return ( $degrees*(9/5) + 32);
	}
	
	public function isFahrenheit($isFahrenheit = false){
		for($i = 0; $i < count($this->towns); $i++){
			if ( !$isFahrenheit){
				echo $this->towns[$i]->name . ' - '
					. ' Temperature in Celsius : '
					. $this->towns[$i]->climateData 
					. PHP_EOL;
			} else{
				echo $this->towns[$i]->name . ' - '
					. ' Temperature in Fahrenheit: '
					. ' min:'
					.static::convertToFahrenheit($this->towns[$i]->climateData->minTemperature)
					. 'F max:'
				    .static::convertToFahrenheit($this->towns[$i]->climateData->maxTemperature)
				    .'F'
					. PHP_EOL;
			}
			
		}
	}
	
// 	public function printInfoTemperatureTowns(){
// 		for($i = 0; $i < count($this->towns); $i++){
// 			return $this->towns[$i]->name 
// 			. ' ' . $this->towns[$i]->climateData 
// 			. PHP_EOL;
// 		}
// 	}
	
	public function getBest(ITripAdvisor $advisor){
		$getBestRate = TouristsGuide::ABSOLUTE_ZERO_C;
		$townName = '';
		for($i = 0; $i < count($this->towns); $i++){
			if( $advisor->rate($this->towns[$i]) > $getBestRate){
				$getBestRate = $advisor->rate($this->towns[$i]);
				$townName = $this->towns[$i]->name;
			}
		}		
		return $townName . '-rate: ' . $getBestRate;
	}
	
	public function addTown(City $town){
		if(count($this->towns) < $this->max_number_of_towns ){
			$this->towns[] = $town;
		}else {
			echo 'No space.' . PHP_EOL;
		}
		
	}
}