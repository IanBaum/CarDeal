<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car_form.php";

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
      $_SESSION['list_of_cars'] = array();
    };

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use($app) {
        return $app['twig']->render('cars.html.twig');
    });

// NOTE: this is similar to frontsies
    $app->get("/view_cars", function() use($app){
      $maxPrice = $_GET['price'];
      $maxMiles = $_GET['miles'];
      $float_price = (float) $maxPrice;
      $float_miles = (float) $maxMiles;
      $tesla = new Car("2016 Tesla",10000,12000000000000,"/img/tesla.jpeg");
      $tonka = new Car("2016 Tonka",25000,12324,"/img/tonka.jpg");
      $bat = new Car("2016 Batmobile",50000,14111,"/img/bat.jpg");
      $boat = new Car("It's a boat",100000,2,"/img/boat.jpg");
      $cars = [$tesla, $tonka, $bat, $boat];

        $cars_matching_search = [];
        foreach ($cars as $car) {
            if ($car->isWorthBuying($float_price) && $car->isUnderMiles($float_miles)) {
                array_push($cars_matching_search, $car);
            }
        }
      return $app['twig']->render('viewcars.html.twig', array('cars'=>$cars_matching_search));
    });

    return $app;
 ?>
