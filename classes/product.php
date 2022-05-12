<?php
    include_once __DIR__ . "/idable.php";

    class Product {
        use Idable;

        protected $name;
        protected $price;
        protected $description;
        protected $discount = 0.2;
        protected $availabilityPeriod = [];

        function __construct(string $name, float $price, string $description, array $availabilityPeriod = null){
            
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

        public function setAvailabilityPeriod(string $from, string $to){
            if(DateTime::createFromFormat('d/m/Y', $from) !== false && date('Y-m-d', strtotime($from)) != '1970-01-01' && (DateTime::createFromFormat('d/m/Y', $to) !== false && date('Y-m-d', strtotime($to)) != '1970-01-01')){
                $this->availabilityPeriod = [ date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to)) ];
            }
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getDescription(){
            return $this->description;
        }

        public function calcDiscount($isRegistered){
            if($isRegistered){
                $this->price = $this->price * (1 - $this->discount);
            }
        }


    }