<?php
    require('DBController.php');

    //Creating Object To Control The Database Everywhere
    $db = new DBController();


    require('Products.php');

    $products = new Products($db);

    //Products Table In Array
    $allProducts = $products->getData();

    require('Cart.php');

    $cart = new Cart($db, $products);

    require('User.php');

    $user = new User($db);
?>
