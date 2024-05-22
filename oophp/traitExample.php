<?php
trait AnimalActions {
    public function eat() {
        echo $this->name . " is eating. <br>";
    }

    public function sleep() {
        echo $this->name . " is sleeping. <br>";
    }
}


class Dog {
    use AnimalActions; // Using the trait in Dog class

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function bark() {
        echo $this->name . " is barking. <br>";
    }
}

class Cat {
    use AnimalActions; // Using the trait in Cat class

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function meow() {
        echo $this->name . " is meowing. <br>";
    }
}

// Create instances of Dog and Cat
$dog = new Dog("Buddy");
$cat = new Cat("Whiskers");

// Use the methods from the trait
$dog->eat();
$dog->sleep();
$dog->bark();

$cat->eat();
$cat->sleep();
$cat->meow();


?>
