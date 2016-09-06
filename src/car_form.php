<?php
// NOTE: this is similar to backsies

class Car{
    private $make_model;
    private $price;
    private $miles;

    function __construct($carModel,$carPrice,$carMiles){
      $this->make_model = $carModel;
      $this->price = $carPrice;
      $this->miles = $carMiles;
    }

    function isWorthBuying($max_price){
          return $this->price <= $max_price;
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
}
