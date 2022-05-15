<?php
    class Food extends Product{
        protected $ingrediants;
        protected $calories;
        protected $expiringDate;
        protected $weight;

        function __construct(string $name, string $ingrediants, int $calories, string $expiringDate, int $weight, float $price, string $description, array $availabilityPeriod = null){
            parent::__construct($name, $price, $description, $availabilityPeriod);
            $this->setIngrediants($ingrediants);
            $this->setCalories($calories);
            $this->setExpiringDate($expiringDate);
            $this->setWeight($weight);
        }

        public function setIngrediants($ingrediants){
            $this->ingrediants = $ingrediants;
        }

        public function setCalories($calories){
            if(is_numeric($calories)){
                $this->calories =  $calories;
            }
        }

        public function setExpiringDate($expiringDate){
            if(DateTime::createFromFormat('d/m/Y', $expiringDate) !== false && date('Y-m-d', strtotime($this->dateConverter($expiringDate))) != '1970-01-01') {
                $this->expiringDate = date('Y-m-d', strtotime($this->dateConverter($expiringDate)));
            }
        }

        protected function dateConverter($date){
            $tempArray = explode('/', $date);
            return $tempArray[1] . "/" . $tempArray[0] . "/". $tempArray[2];
        }

        protected function setWeight($weight){
            if(is_numeric($weight)){
                $this->weight =  $weight;
            }
        }

        public function getName(){
            return $this->name;
        }

        public function getIngrediants(){
            return $this->ingrediants;
        }

        public function getCalories(){
            return $this->calories;
        }

        public function getExpiringDate(){
            return $this->expiringDate;
        }

        public function getWeight(){
            return $this->weight;
        }
    }
?>