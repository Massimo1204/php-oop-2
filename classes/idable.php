<?php 
    trait Idable{
        protected $id;

        public function setId(){
            $numbers = '0123456789';
            $letters = 'abcdefghijklmnopqrstuvwxyz';
            $capLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charArray = str_split($numbers . $letters . $capLetters);

            for($i=0; $i<16; $i++){
                $randNum = rand(0, count($charArray) - 1);
                $tempId[] = $charArray[$randNum];
            }

            $this->id = implode($tempId);
        }

        public function getId(){
            return $this->id;
        }
    }
?>