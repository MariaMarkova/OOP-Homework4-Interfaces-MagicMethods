<?php

require_once 'autoload.php';

//$ci = new ClimateInfo(15, 35);
//echo $ci;
//echo $ci->max . PHP_EOL;;

$plovdiv = new City('Plovdiv', 'ABC', 0.5, 12, 15);
$sinemoretz = new City('Sinemoretz', 'FSF', 0.6, 16, 36);

$majorCitySofia = new MajorCity('Sofia', 'AFE', 1, 10, 29, 1000000);

//echo $majorCitySofia;

//echo $plovdiv;

$touristGuide = new TouristsGuide(15);

$touristGuide->addTown($plovdiv);
$touristGuide->addTown($sinemoretz);
$touristGuide->addTown($majorCitySofia);
//var_dump($touristGuide);

$touristGuide->isFahrenheit();

$hotMegapolisAdvisor = new HotMegapolisAdvisor();

echo PHP_EOL;

echo $touristGuide->getBest($hotMegapolisAdvisor);

