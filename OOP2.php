<?php
/*1) Наследование - если говоить своими словами, то идет деление на Родителей и детей. В Родителе(основном классе) мы определяем какие либо свойства и методы. В детях (производных основного класса) у нас включены все свойства и методы родителя + мы можем дописывать свои свойства и методы. Также мы к производным классам можем присваивать производные этих классов. В котором будут все свойства родителя и производной родителя.

Полиморфизм - это создание абстрактных классах, где используется абстрактные методы. Абстрктный метод, этот тот метод который не имеет никакого функцонала. Но создается для тех целей чтобы в производных абстрактного класса была создана логика под этот абстрактный метод. То есть мы его создаем, изначально не знав какую логику будет создавать предположим другой программист(ы), который(е) работают над одним проектом, но мы сразу договариваемся что будет абстрактный метод, который через какое то время понадобиться. Возникает конечно вопрос, почему метод не создать, когда дойдет его время в какой либо произвдной. Я думаю, что полиморфизм помогает избежать лишнего печатание метода. Так как к абстрактному классу можно привязать множоство производных, и каждая производная будет использовать этот метод и задавать свою логику. 



2) Отличие Интерфейсов и Абстрактных классах. В Интерфейсах используются только методы и константы, причем в методах всегда должны быть какие-либо обязательные входные параметры без которых метод не будет раотать. Это можно сказать как бы заготовка для будущих классов, в которых будут использоваться данные методы. Но также интерфейсы могут быть нереалзованы. Лучше использовать когда мы уже знаем какую логику зададим и какие обязательные параметры будут нужны

В абстрактных классах, могут быть свойства и методы, абстрактные и нет. Абстрактные методы без каких либо параметров, все параметры будут задаваться в производных класса. Но также могут быть нереализованы. Лучше использовать, когда мы еще не знаем какая будет будущая логика.*/




class MegaCenter
{
    public $name;
    public $price; 
    public $sale;
    public function GetPrice()
    {
        return $this->price = $this->price * (1 - ($this->sale / 100));
    }
}

interface forCar
{
    public function ForCar($powerhp);
}

interface forProduct
{
    public function ForProduct($currency);
}

interface forTV
{
    public function ForTv($name);
}

interface forDuck
{
    public function ForDuck($weight);
}

interface forPen
{
    public function ForPen($type);
}



class Car extends MegaCenter implements forCar
{
    public $color;
    public $maxspeed;

    public function __construct($name, $maxspeed, $color, $price, $sale)
    { 
	$this->name = $name;
	$this->maxspeed = $maxspeed;
	$this->color = $color;
	$this->price = $price;
	$this->sale = $sale;
    }
    public function forCar($powerhp)
    {
	echo $this->powerhp = $powerhp * 0.73 . 'КВт';
    }
}

/**
* 
*/
class Product extends MegaCenter implements forProduct
{

    public function __construct($name, $price, $sale)
    {
    $this->name = $name;
    $this->price = $price;
    $this->sale = $sale;
    }

    public function ForProduct($currency)
    {
	if ($currency == '$') {
	    echo $this->GetPrice() * 63 . '$';
	} else {
	    echo $this->GetPrice();
	}

    }
}


/**
 * 
 */
class Tv extends MegaCenter implements forTV
{
	
    public function __construct($name, $price, $sale)
    {
        $this->price = $price;
        $this->sale = $sale;
        $this->name = $name;
    }

    public function ForTv($name)
    {
	if ($name == 'LG' || $name == 'Samsung') {
	    echo 'Корейский телик';
	} else {
	    echo 'Не знаю его происхождения, возможно япония или китай';
        }
    }
}

/**
 * 
 */
class Duck extends MegaCenter implements forDuck
{
    public $country;
    public function __construct($name, $country, $price, $sale)
    {
	$this->price = $price;
	$this->sale = $sale;
	$this->name = $name;
    }
    public function ForDuck($weight)
    {
	if ($weight <= 10) {
	    echo 'Ваша утка небольшая';
	} elseif ($weight > 10 && $weight <=20) {
	    echo 'Ваша утка прилиных размеров';
	} else {
	    echo 'Ну и жирная же она у вас';
	}
    }	
}

/**
 * 
 */
class Pen extends MegaCenter implements forPen
{
    public function __construct($name, $price, $sale)
    {
	$this->name = $name;
	$this->price = $price;
	$this->sale = $sale;
    }	
    public function ForPen($type)
    {?>
	<p>Хотите узнать больше о вашей ручке, то вам <a href = URL"https://ru.wikipedia.org/wiki/%D0%A0%D1%83%D1%87%D0%BA%D0%B0_(%D0%BA%D0%B0%D0%BD%D1%86%D0%B5%D0%BB%D1%8F%D1%80%D0%B8%D1%8F)>сюда</a> </p>

<?php }
}

$mers = new Car('Mercedes', '250km/h', 'black', 100000, 5);
echo $mers->name;
echo $mers->maxspeed;
echo $mers->color;
echo $mers->GetPrice();
$mers->forCar(250);


$phone = new Product('IphoneX', 1000, 10);
echo $phone->name;
$phone->ForProduct('$');


$samsung = new Tv('Samsung', 20000, 5);
echo $samsung->name;
echo $samsung->GetPrice();
$samsung->ForTv($samsung->name);  


$krya = new Duck('Kryakva', 'Russian', 10000, 0);
echo $krya->name;
echo $krya->GetPrice();
$krya->ForDuck(20);


$parker = new Pen('Parker', 1000, 10);
echo $parker->name;
echo $parker->GetPrice();
$parker->ForPen('Parker');
