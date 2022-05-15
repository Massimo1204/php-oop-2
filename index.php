<?php
    include_once __DIR__ . "/classes/customer.php";
    include_once __DIR__ . "/classes/creditCard.php";
    include_once __DIR__ . "/classes/product.php";
    include_once __DIR__ . "/classes/food.php";

    $product = new Product('prodotto', 12.99, 'ciacoa', array('13/04', '13/08'));
    $product->setId();
    $cuccia = new Product('cuccia', 13.50, 'cuccia molto bella', array('04/01', '04/05'));
    $cuccia->setId();
    $rosa = new Product('rosa', 20.99, 'rosa bella');
    $rosa->setId();
    $biscotti = new Food('biscotti','latte, uova, burro, zucchero', 400, '15/08/2023', 500, 3.50, 'biscotti molto buoni');
    $biscotti->setId();

    $newCard = new CreditCard('2222333344445555', '12/2010', '121', 122.12);
    $sec = new CreditCard('2222333344425555', '10/2023', 113, 1500.00);
    $karenCard = new CreditCard('1111222233334444', '09/2026', 118, 2000.00);
    
    $guest = new Customer('ciao', 'pino', 'marcopino@alive.com', '30/12/1999', false, $newCard);
    $guest->setId();
    $guest->setCreditCard($sec);
    
    $guest->addToCart($product);
    $guest->addToCart($cuccia);
    $guest->addToCart($rosa);
    $guest->addToCart($biscotti);

    $karen = new Customer ('karen' , 'caren', 'carenkaren@ckaren.kca', '19/01/1987', true, $karenCard);
    $karen->setId();

    $karen->addToCart($product);
    $karen->addToCart($cuccia);
    $karen->addToCart($rosa);
    $karen->addToCart($biscotti);

    $guest->removeCreditCard($newCard);
    // $guest->removeFromCart($cuccia);
    var_dump($guest);
    var_dump($karen);

    $guest->proceedBuy($sec);
    $karen->proceedBuy($karenCard);

    var_dump($guest);
    var_dump($karen);
?>