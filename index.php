<?php
    include_once __DIR__ . "/classes/customer.php";
    include_once __DIR__ . "/classes/creditCard.php";
    include_once __DIR__ . "/classes/product.php";


    $newCard = new CreditCard('2222333344445555', '11/2010', '121');
    $sec = new CreditCard('2222333344425555', '10/2010', 113);
    $guest = new Customer('ciao', 'pino', 'marcopino@a.com', '30/12/2013', false, $newCard);
    $product = new Product('cuai', 12, 'ciacoa');

    $guest->addCreditCard($sec);
    var_dump($guest);
    var_dump($newCard);
    $product->setId();
    var_dump($product->getName());
    echo $product->getId();
    echo $product->getId();


?>