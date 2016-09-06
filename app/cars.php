<?php
class Car{
      public $make_model;
      public $price;
      public $miles;

      function isWorthBuying($max_price){
            return $this->price < $max_price;
    }
}

$tesla = new Car();
$telsa->make_model = "The Newest One 1492";
$telsa->price = "2";
$tesla->miles = "1";

$tonka = new Car();
$tonka->make_model = "1999 toy truck";
$tonka->price = "7";
$tonka->miles = "0.2";

$oscar = new Car();
$oscar->make_model = "1992 hotdog truck";
$oscar->price = "1000000";
$oscar->miles = "1000001";

$bat = new Car();
$bat->make_model = "1941 Batmobile";
$bat->price = "0.45";
$bat->miles = "122345";

$cars = array($tesla, $tonka, $oscar, $bat);

$cars_matching_search = array();
foreach ($cars as $car) {
  if ($car->isWorthBuying($_GET['price']) {
    array_push($cars_matching_search, $car);
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>This is the dealership homepage.</title>
  </head>
  <body>
      <h1>Kyle and Ians Lukewarm Wheels</h1>
      <ul>
          <?php
              foreach ($cars as $car) {
                  echo "<li> $car->make_model </li>"
                  echo "<ul>";
                  echo "<li> $$car->price </li>";
                  echo "<li> Miles: $car->miles </li>";
                  echo "</ul>";
              }
          ?>
      </ul>
  </body>
</html>
