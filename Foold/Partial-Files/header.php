<?php
    require('Database/objects.php');

    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foold | Shop Online</title>
    <link rel="stylesheet" href="style.css">

    <div class="navbar">
       <div class="logo">
           <img src="Images/logo.png" width="150px" height="150px">
       </div>

       <nav>
           <ul>
               <li><a href="index.php">Products</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="contact.php">Contact</a></li>
               <?php
                if(isset($_SESSION['user_id']))
                {
                    echo '<li><a href="account.php">Account</a></li>';
                }

                else
                {
                    echo '<li><a href="login.php">Login</a></li>';
                }
           ?>

           </ul>

           <?php
                if(isset($_SESSION['user_id']))
                {
                    echo '<a href="cart.php"><img src="Images/cart.png" width="40px" height="40px"></a>';
                }

                else
                {
                    echo '<a href="login.php"><img src="Images/cart.png" width="40px" height="40px"></a>';
                }
           ?>

           <h4 class="count"><?php echo isset($_SESSION['user_id']) ? count($cart->getCart($_SESSION['user_id'])) : 0; ?></h4>
       </nav>
    </div>
</head>

<body>
