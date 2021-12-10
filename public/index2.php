<?php
/*1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?*/

abstract class Good
{
    static public $price = 50;

    public $quantity;

    abstract function calculationOfCost();

    public function __construct($quantity)
    {
        $this->quantity = $quantity;
    }
}

class DigitalGood extends Good
{
    function calculationOfCost()
    {
        return self::$price / 2 * $this->quantity;
    }
}

class PiecePhysicalGood extends Good
{
    function calculationOfCost()
    {
        return self::$price * $this->quantity;
    }
}

class WeightGood extends Good
{
    function calculationOfCost()
    {
        return self::$price * $this->quantity;
    }
}

$itemDigitalGood = new DigitalGood(10);
$itemPiecePhysicalGood = new PiecePhysicalGood(10);
$itemWeightGood = new WeightGood(0.5);

echo $itemDigitalGood->calculationOfCost() . PHP_EOL;
echo $itemPiecePhysicalGood->calculationOfCost() . PHP_EOL;
echo $itemWeightGood->calculationOfCost() . PHP_EOL;


/*2. *Реализовать паттерн Singleton при помощи traits. */
trait Singleton
{
    static protected $instance;
    static public function getInstance()
    {
        static $instanse = null;
        if ($instanse === null) {
            $instanse = new static();
        }
        return $instanse;
    }
}

class Single
{
    use Singleton;
}

var_dump(Single::getInstance());
