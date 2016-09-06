<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car_form.php";

    $app = new Silex\Application();
    $app->get("/", function() {
        return "
            <!DOCTYPE html>
            <html>
              <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
                <title>BUY OUR CARS</title>
              </head>
              <body>
                <div class='container'>
                  <h1>Buy a car!</h1>
                  <form action='/view_cars'>
                    <div class='form-group'>
                      <label for='price'>Maximum Price:</label>
                      <input id='price' name='price' class='form-control' type='number>'
                    </div>
                    <button type='submit class=btn-success'>Submit</button>
                  </form>
                </div>
              </body>
            </html>
        ";
    });
// NOTE: this is similar to frontsies
    $app->get("/view_cars", function(){
      $maxPrice = $_GET['price'];
      $float_price = (float) $maxPrice;
      $cars = [];
      $tesla = new Car("2016 Tesla",10000,1);
      $tonka = new Car("2016 Tonka",25000,1);
      $bat = new Car("2016 Batmobile",50000,1);
      $boat = new Car("It's a boat",100000,2);
      array_push($cars, $tesla);
      array_push($cars, $tonka);
      array_push($cars, $bat);
      array_push($cars, $boat);
      $inventory = "";

        $cars_matching_search = [];
        foreach ($cars as $car) {
            if ($car->isWorthBuying($float_price)) {
                array_push($cars_matching_search, $car);
            }
        }

      foreach ($cars as $car) {
          $inventory .= "<li>" . $car->getModel() . "</li>";
          $inventory .= "<ul>";
          $inventory .= "<li>$" . $car->getPrice() . "</li>";
          $inventory .= "<li>Miles: " . $car->getMiles() . "</li>";
          $inventory .= "</ul>";
      }
      return $inventory;
    });

    return $app;
 ?>
