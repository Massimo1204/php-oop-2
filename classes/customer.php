<?php
    include_once __DIR__ . "/creditCard.php";
    include_once __DIR__ . "/idable.php";

    class Customer{
        use Idable;

        protected $firstName;
        protected $lastName;
        protected $email;
        protected $birthDate;
        protected $isRegistered;
        protected $creditCards = [];
        protected $cart = [];

        function __construct(string $firstName, string $lastName, string $email, string $birthDate, $isRegistered, CreditCard $card = NULL){

            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setEmail($email);
            $this->setBirthDate($birthDate);
            $this->setIsRegistered($isRegistered);
            $this->setCreditCard($card);
        }

        public function setFirstName($firstName){
            if(ctype_alpha($firstName)){
                $this->firstName = $firstName;
            }
        }

        public function setLastName($lastName){
            if(ctype_alpha($lastName)){
                $this->lastName = $lastName;
            }
        }

        public function setEmail($email){
            if(strpos($email, '@') !== false && strpos($email, '.') > strpos($email, '@') + 1)
            {
                $this->email = $email;
            }
        }

        public function setBirthDate($birthDate){
            if(DateTime::createFromFormat('d/m/Y', $birthDate) !== false && date('Y-m-d', strtotime($this->dateConverter($birthDate))) != '1970-01-01' && date('Y-m-d', strtotime($this->dateConverter($birthDate))) < date('Y-m-d')) {
                $this->birthDate = date('Y-m-d', strtotime($this->dateConverter($birthDate)));
            }
        }

        protected function dateConverter($date){
            $tempArray = explode('/', $date);
            return $tempArray[1] . "/" . $tempArray[0] . "/". $tempArray[2];
        }

        public function setIsRegistered($isRegistered){
            if(is_bool($isRegistered) === true){
                $this->isRegistered =  $isRegistered;
            }
        }

        public function setCreditCard($card){
            $this->creditCards[] = $card;
        }

        public function removeCreditCard($card){
            foreach ($this->creditCards as $key => $value) {
                if($value->getCode() == $card->getCode() && $value->getSecurityCode() == $card->getSecurityCode() && $value->getExpirationDate() == $card->getExpirationDate()){
                    unset($this->creditCards[$key]);
                }
            }
        }

        public function addToCart($item){
            $period = $item->getAvailabilityPeriod();
            if($period){
                if($period[0] < date('Y-m-d') && $period[1] > date('Y-m-d')){
                    $this->cart[] = $item;
                }
            }else{
                $this->cart[] = $item;
            }
        }

        public function removeFromCart($item){
            foreach ($this->cart as $key => $value) {
                if($value->getId() == $item->getId()){
                    unset($this->cart[$key]);
                }
            }
        }

        public function calcTotalPrice(){
            $totalPrice = 0;
            foreach ($this->cart as $key => $value) {
                $totalPrice += $value->getPrice($this->isRegistered);
            }
            return $totalPrice;
        }

        public function proceedBuy($card){
            if($card->getBalance() > $this->calcTotalPrice() && $card->getExpirationDate() >= date('Y-m-d')){
                $newBalance = $card->getBalance() - $this->calcTotalPrice();
                $card->setBalance($newBalance);
                $this->cart = [];
            }
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getIsRegistered(){
            return $this->isRegistered;
        }

        public function getCreditCards(){
            return $this->creditCards;
        }

        public function getCart(){
            return $this->cart;
        }
    }