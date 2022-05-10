<?php
    class Product {
        protected $name;
        protected $price;
        protected $description;

        function __construct(string $name, float $price, string $description){
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
        }

        public function setName(string $name){
            $this->name = $name;
        }

        public function setPrice(float $price){
            $this->price = $price;
        }

        public function setDescription(string $description){
            $this->description = $description;
        }

        public function getName(string $name){
            return $this->name;
        }

        public function getPrice(float $price){
            return $this->price;
        }

        public function getDescription(string $description){
            return $this->description;
        }
    }