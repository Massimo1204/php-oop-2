<?php
    include_once __DIR__ . "/classes/customer.php";
    include_once __DIR__ . "/classes/creditCard.php";
    include_once __DIR__ . "/classes/product.php";


    $newCard = new CreditCard('2222333344445555', '11/2010', '121');
    $sec = new CreditCard('2222333344425555', '10/2010', 113);
    $guest = new Customer('ciao', 'pino', 'marcopino@a.com', '30/12/2013', false, $newCard);
    $product = new Product('cuai', 12, 'ciacoa');
    $ciccio = new Product('ciao', 13, 'ciaociao');
    $rosa = new Product('ciuu', 14, 'ciuuciuu');

    $guest->addCreditCard($sec);
    $guest->setId();
    $product->setId();
    $ciccio->setId();
    $rosa->setId();
    $guest->addToCart($product);
    $guest->addToCart($ciccio);
    $guest->addToCart($rosa);

    var_dump($guest);


    $guest->removeFromCart($ciccio);
    var_dump($guest);

    // echo $product->getId();
    // echo $product->getId();

?>