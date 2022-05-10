<?php
    class CreditCard {
        protected $code;
        protected $expirationDate;
        protected $securityCode;

        function __construct(int $code, string $expirationDate, int $securityCode){
            $this->code = $code;
            $this->expirationDate = $expirationDate;
            $this->securityCode = $securityCode;
        }
    }