<?php


class Animal
{
	public $sSound;
	public $sMethodOfReproduction = "";
	
	public function Animal($sinSound = "")
	{
		$this->sSound = $sinSound;
		
	}
	
	public function speak()
	{
		echo $this->sSound;
	}
	
}


class Sheep extends Animal
{
	public $sMethodOfReproduction = "live birth";
	public function Sheep()
	{
		$this->sSound = "baah";
	}
}


$oAnimal = new Animal();

echo json_encode($oAnimal);

echo " was oAnimal \n";

$oDifferent = new Animal("Hey"); 

echo json_encode($oDifferent);

echo " was oDifferent \n";

$oDolly = new Sheep();

echo json_encode($oDolly);

echo " was oDolly \n";
