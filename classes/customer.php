<?php
    @include_once __DIR__ . ("/creditCard.php");

    class Customer{
        private $id = 0;
        protected $firstName;
        protected $lastName;
        protected $email;
        protected $birthDate;
        protected $creditCards = [];

        function __construct(int $id, string $firstName, string $lastName, string $email, string $birthDate, CreditCard $card){
            $this->id = $this->setId();
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->birtDate = $birthDate;
            $this->$creditCards[] = $card;
        }

        private function setId(){
            return $this->id++;
        }
    }