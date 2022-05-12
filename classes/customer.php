<?php
    include_once __DIR__ . ("/creditCard.php");
    include_once __DIR__ . "/idable.php";

    class Customer{
        use Idable;

        protected $firstName;
        protected $lastName;
        protected $email;
        protected $birthDate;
        protected $isRegistered;
        protected $creditCards = [];

        function __construct(string $firstName, string $lastName, string $email, string $birthDate, $isRegistered, CreditCard $card = NULL){

            $this->id = $this->setId();

            $this->firstName = $this->setFirstName($firstName);
            $this->lastName = $this->setLastName($lastName);
            $this->email = $this->setEmail($email);
            $this->birthDate = $this->setBirthDate($birthDate);
            $this->isRegistered = $this->setIsRegistered($isRegistered);
            $this->creditCards[] = $this->setCreditCard($card);
        }

        public function setFirstName($firstName){
            if(ctype_alpha($firstName)){
                return $firstName;
            }
        }

        public function setLastName(string $lastName){
            if(ctype_alpha($lastName)){
                return $lastName;
            }
        }

        public function setEmail(string $email){
            if(strpos($email, '@') !== false && strpos($email, '.') > strpos($email, '@') + 1)
            {
                return $email;
            }
        }

        protected function setBirthDate(string $birthDate){
            $tempArray = explode('/', $birthDate);
            $tempDate = $tempArray[1] . "/" . $tempArray[0] . "/". $tempArray[2];

            if(DateTime::createFromFormat('d/m/Y', $birthDate) !== false && date('Y-m-d', strtotime($tempDate)) != '1970-01-01') {
                return date('Y-m-d', strtotime($tempDate));
            }
        }

        protected function setIsRegistered($isRegistered){
            if(is_bool($isRegistered) === true){
                return $isRegistered;
            }
        }

        public function setCreditCard(CreditCard $card){
            return $card;
        }

        public function addCreditCard(CreditCard $card){
            $this->creditCards[] = $card;
        }
    }