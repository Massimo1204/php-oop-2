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
            
            $this->setName($name);
            $this->setPrice($price);
            $this->setDescription($description);
            $this->setAvailabilityPeriod($availabilityPeriod); 
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setPrice($price){
            if(is_float($price)){
                $this->price = number_format($price, 2, '.', '');
            }
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function setAvailabilityPeriod($availabilityPeriod){
            foreach ($availabilityPeriod as $key => $date) {
                $convertedDate =  $this->dateConverter($date);
                if(DateTime::createFromFormat('m/d/y', $convertedDate) !== false && date('Y-m-d', strtotime($convertedDate)) != '1970-01-01'){
                    $this->availabilityPeriod[] = date('Y-m-d', strtotime($convertedDate));
                }
            }
        }

        protected function dateConverter($date){
            $tempArray = explode('/', $date);
            return $tempArray[1] . "/" . $tempArray[0] . "/". date('y');
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice($isRegistered){
            if($isRegistered){
                return $this->price * (1 - $this->discount);
            }
            return $this->price;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getDiscount(){
            return $this->discount;
        }

        public function getAvailabilityPeriod(){
            return $this->availabilityPeriod;
        }

    }