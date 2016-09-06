<?php
// NOTE: this is similar to backsies

class Car{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

    function __construct($carModel,$carPrice,$carMiles,$carPicture){
      $this->make_model = $carModel;
      $this->price = $carPrice;
      $this->miles = $carMiles;
      $this->picture = $carPicture;
    }

    function isWorthBuying($max_price){
          return $this->price <= $max_price;
    }

    function isUnderMiles($max_miles){
          return $this->miles <= $max_miles;
    }

    function getModel(){
      return $this->make_model;
    }

    function getPrice(){
      return $this->price;
    }

    function getMiles(){
      return $this->miles;
    }

    function getPicture(){
      return $this->picture;
    }
}
