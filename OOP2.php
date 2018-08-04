<?php
/*1) Наследование - если говоить своими словами, то идет деление на Родителей и детей. В Родителе(основном классе) мы определяем какие либо свойства и методы. В детях (производных основного класса) у нас включены все свойства и методы родителя + мы можем дописывать свои свойства и методы. Также мы к производным классам можем присваивать производные этих классов. В котором будут все свойства родителя и производной родителя.

Полиморфизм - это создание абстрактных классах, где используется абстрактные методы. Абстрктный метод, этот тот метод который не имеет никакого функцонала. Но создается для тех целей чтобы в производных абстрактного класса была создана логика под этот абстрактный метод. То есть мы его создаем, изначально не знав какую логику будет создавать предположим другой программист(ы), который(е) работают над одним проектом, но мы сразу договариваемся что будет абстрактный метод, который через какое то время понадобиться. Возникает конечно вопрос, почему метод не создать, когда дойдет его время в какой либо произвдной. Я думаю, что полиморфизм помогает избежать лишнего печатание метода. Так как к абстрактному классу можно привязать множоство производных, и каждая производная будет использовать этот метод и задавать свою логику. 



2) Отличие Интерфейсов и Абстрактных классах. В Интерфейсах используются только методы и константы, причем в методах всегда должны быть какие-либо обязательные входные параметры без которых метод не будет раотать. Это можно сказать как бы заготовка для будущих классов, в которых будут использоваться данные методы. Но также интерфейсы могут быть нереалзованы. Лучше использовать когда мы уже знаем какую логику зададим и какие обязательные параметры будут нужны

В абстрактных классах, могут быть свойства и методы, абстрактные и нет. Абстрактные методы без каких либо параметров, все параметры будут задаваться в производных класса. Но также могут быть нереализованы. Лучше использовать, когда мы еще не знаем какая будет будущая логика.*/




class MegaCenter
{
	public $name;
}

interface CarAndProduct
{
	public function ForCarAndProduct($price);
}

interface forTV
{
	public function ForTv($price, $diagonal);
}

interface forDuck
{
	public function ForDuck($color, $weight);
}

interface forPen
{
	public function ForPen($country, $name);
}



class Car extends MegaCenter implements CarAndProduct
{
	public $color;
	public $maxspeed;
	public $power;
		
		public function __construct($name, $maxspeed, $power, $color)
		{
			$this->name=$name;
			$this->maxspeed=$maxspeed;
			$this->power=$power;
			$this->color=$color;
		}
		public function  ForCarAndProduct($price)
		{
			echo $price;
		}
}

/**
 * 
 */
class Product extends MegaCenter implements CarAndProduct
{
	public $price;
	public $currency;
	
	function __construct($name, $currency)
	{
		$this->name=$name;
		$this->currency=$currency;
	}

	public function  ForCarAndProduct($price)
		{
			if ($this->currency=='$') {
				echo $price*63;
			} else {
				echo $price;
			}
			
		}
}


/**
 * 
 */
class Tv extends MegaCenter implements forTV
{
	
	function __construct($name)
	{
		$this->name=$name;
	}

	public function ForTv($price, $diagonal)
	{
		echo $price, $diagonal;
	}
}

/**
 * 
 */
class Duck extends Tv implements forDuck
{
	public function ForDuck($color, $weight)
	{
		echo $color, $weight;
	}	
}

/**
 * 
 */
class Pen extends MegaCenter implements forPen

{
	
	public function ForPen($country, $name)
	{
		echo $country, $name;
	}
}

$mers=new Car('Mercedes', '250km/h', '250hp', 'White');
	echo $mers->name;
	echo $mers->maxspeed;
	echo $mers->power;
	echo $mers->color;
		$mers->ForCarAndProduct(1000000);


$phone=new Product('IphoneX', '$');
	echo $phone->name;
		$phone->ForCarAndProduct(30000);


$samsung=new Tv('Samsung');
	echo $samsung->name;
		$samsung->ForTv(20000, '30in');  


$krya=new Duck('Kryakva');
	echo $krya->name;
		$krya->ForDuck('White', '20kg');


$parker=new Pen;
	$parker->ForPen('USA', 'Parker');
/*class Car implements MainAndAdd
{
	
	public function forCar($price, $name, $power, $color){
		echo $this -> forCar(100000, 'Mercedes', '350hp', 'white');
	}
}*/
