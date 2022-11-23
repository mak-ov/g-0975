<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;
  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }

  function sayHi($name)
  {
    return "Hi $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp >= 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }
  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }
  function getInfo()
  {
    return "
    <h2> О моей семье </h2><br>" . "Меня зовут: " . $this->getName() . "<br> Мой отец: " . $this->getFather()->getName() . "<br> Моя мать: " . $this->getMother()->getName() . "<br> Мой дедушка по линии матери: " . $this->getMother()->getFather()->getName() . "<br> Моя бабушка по линии матери: " . $this->getMother()->getMother()->getName() . "<br> Мой дедушка по линии отца: " . $this->getFather()->getFather()->getName() . "<br> Моя бабушка по линии отца: " . $this->getFather()->getMother()->getName(); 
  }
}
//! Здоровье человека не может быть более 100
$igor = new Person("Igor", "Petrov", 78);
$valentina = new Person("Valentina", "Petrova", 78);

$irina = new Person("Irina", "Ivanova", 75);
$vasiliy = new Person("Vasiliy", "Ivanov", 72);


$alex = new Person("Alex", "Ivanov", 42, $irina, $vasiliy);
$olga = new Person("Olga", "Ivanova", 42, $valentina, $igor);
$valera = new Person("Valera", "Ivanov", 15, $olga, $alex);

echo $valera->getInfo();

// echo $valera->getMother()->getFather()
// $medKit = 50;
// // $alex->hp = $alex->hp - 30; //упал
// $alex->setHp(-30);
// echo $alex->getHp() . "<br>";
// // $alex->hp = $alex->hp + $medKit; //нашел аптечку
// $alex->setHp($medKit);
// echo $alex->getHp() . "<br>";
// // $alex->name = "Alex";