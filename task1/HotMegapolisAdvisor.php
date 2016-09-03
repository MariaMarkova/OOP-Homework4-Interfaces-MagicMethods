<?php

class HotMegapolisAdvisor implements ITripAdvisor
{

	public function rate(City $city){
		if($city->isMajorCity()){
			return $city->climateData->maxTemperature * 1.5;
		}else {
			return $city->climateData->maxTemperature;
		}
		
	}
}