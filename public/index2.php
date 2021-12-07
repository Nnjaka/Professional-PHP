<?php
/*1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться?*/

class Product{
    public $id;

    public $title;

    public $price;

    public $description;

    public function __construct($id, $title, $price, $description){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }

    protected function setTitle($title){
        $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }

    protected function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    protected function setDescription($description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function renderProduct(){
        return '<div>
                    <div class=\"product-title\">' . $this->title . '</div>
                    <div class=\"product-price\">' . $this->price . '<span>$</span></div>
                </div>';
    }
}

class CartProduct extends Product{
    public $quantity;

    public function __construct($id, $title, $price, $description, $quantity = 1){
        parent::__construct($id, $title, $price, $description);
        $this->quantity = $quantity;
    }

    protected function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function renderProduct(){
        return '<div>
                    <div class=\"product-title\">' . $this->title . '</div>
                    <div class=\"product-price\">' . $this->price . '<span>$</span></div>
                    <div class=\"product-quantity\">' . $this->quantity . '</div>
                </div>';
    }

    public function addQuantity($quantity){
        return $this->quantity += $quantity;
    }

    public function removeQuantity($quantity){
        if($this->quantity < $quantity){
            return $this->quantity = 0;
        }
        else{
               return $this->quantity -= $quantity;
        }
    }
};

/*Класс CartProduct (продукт корзины) наследуется от класса Product. Новый класс отличается тем, что у него добавлено новое свойство - колличество и новые методы - измененение количесва товара, в большую и меньшую сторону. Также переопределены методы: конструктор и отрисовка товара.*/



/*5. Дан код:*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //Выведет 1
$a2->foo(); //Выведет 2
$a1->foo(); //Выведет 3
$a2->foo(); //Выведет 4. $x принадлежит не оъекту, а классу, поэтому переменная не переинициализируется и с каждым вызовом функции ей будет добавляться +1

/*Что он выведет на каждом шаге? Почему?*/



/*6.Немного изменим п.5:*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //Выведет 1 
$b1->foo(); //Выведет 1
$a1->foo(); //Выведет 2
$b1->foo(); //Выведет 2. В данном случае $a и $b - это 2 разных объекта 2-х разных классов и у каждого объекта 2 раза вызывается функция foo().

/*Объясните результаты в этом случае.*/



/*7. *Дан код:*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); //Выведет 1 
$b1->foo(); //Выведет 1
$a1->foo(); //Выведет 2
$b1->foo(); //Выведет 2. Разница с предыдущим примером в скобках при создании объекта. Их можно опустить, на результат это не повлияет 

/*Что он выведет на каждом шаге? Почему?*/