<?php
    class CreditCard {
        protected $code;
        protected $expirationDate;
        protected $securityCode;
        protected $balance;

        function __construct(string $code, string $expirationDate, string $securityCode, float $balance){
            $this->setCode($code);
            $this->setExpirationDate($expirationDate);
            $this->setSecurityCode($securityCode);
            $this->setBalance($balance);
        }

        protected function setCode($code){
            if(ctype_digit($code) && strlen((string) $code) == 16){
                $this->code = $code;
            }
        }

        protected function setExpirationDate($expirationDate){
            $tempArray = explode('/', $expirationDate);
            $tempDate = $tempArray[0] . "/01/" . $tempArray[1];

            if (DateTime::createFromFormat('d/m/Y', $tempDate) !== false && date('Y-m-d', strtotime($tempDate)) != '1970-01-01') {
                $this->expirationDate = date('Y-m-d', strtotime($tempDate));
            }
        }

        protected function setSecurityCode($securityCode){
            if(ctype_digit($securityCode) && strlen($securityCode) == 3){
                $this->securityCode = $securityCode;
            }
        }

        public function setBalance($balance){
            if(is_numeric($balance)){
                $this->balance = number_format($balance, 2, '.', '');
            }
        }

        public function getCode(){
            return $this->code;
        }

        public function getExpirationDate(){
            return $this->expirationDate;
        }

        public function getSecurityCode(){
            return $this->securityCode;
        }

        public function getBalance(){
            return $this->balance;
        }
    }