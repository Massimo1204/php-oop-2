<?php
    class CreditCard {
        protected $code;
        protected $expirationDate;
        protected $securityCode;

        function __construct(string $code, string $expirationDate, string $securityCode){
            $this->code = $this->setCode($code);
            $this->expirationDate = $this->setExpirationDate($expirationDate);
            $this->securityCode = $this->setSecurityCode($securityCode);
        }

        protected function setCode($code){
            if(ctype_digit($code) && strlen((string) $code) == 16){
                return $code;
            }
        }

        protected function setExpirationDate($expirationDate){
            $tempArray = explode('/', $expirationDate);
            $tempDate = $tempArray[0] . "/01/" . $tempArray[1];

            if (DateTime::createFromFormat('d/m/Y', $tempDate) !== false && date('Y-m-d', strtotime($tempDate)) != '1970-01-01') {
                return date('Y-m-d', strtotime($tempDate));
            }
        }

        protected function setSecurityCode($securityCode){
            if(ctype_digit($securityCode) && strlen($securityCode) == 3){
                return $securityCode;
            }
        }
    }