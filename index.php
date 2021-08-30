<?php

use Behavioral\Observer\GeneralDisplay;
use Behavioral\Observer\StatisticsDisplay;
use Behavioral\Observer\Weather;

require_once __DIR__ . '/vendor/autoload.php';



$weather = new Weather();
$observer1 = new GeneralDisplay($weather);
$observer2 = new StatisticsDisplay($weather);
$weather->setMeasurements(10, 20, 30);