<?php
    include('Partial-Files/header.php');

    if(!isset($_SESSION['user_id']))
    {
        header("Location: index.php?sqlerror");
    }
    else if(isset($_SESSION['user_id']))
    {
        if(count($cart->getCart($_SESSION['user_id'])) <= 0)
        {
            header("Location: index.php?sqlerror");
        }
    }

    $cartProducts = $cart->getCart($_SESSION['user_id']);
    $user_data = $user->getUser($_SESSION['user_id']);
?>
<div class="checkoutPage">
    <div class="checkoutContainer">
        <form action="">
            <div class="delivery">
                <h2>Delivery Details</h2>
                <div class="oneInput">
                    <input type="email" placeholder="Email" value="<?php echo $user_data['email'] ?? "" ?>">
                </div>
                <div class="twoInput">
                    <input type="text" placeholder="First Name" value="<?php echo $user_data['first_name'] ?? "" ?>">
                    <input type="text" placeholder="Last Name" value="<?php echo $user_data['last_name'] ?? "" ?>">
                </div>
                <div class="oneInput">
                    <input type="text" placeholder="Address" value="<?php echo $user_data['address'] ?? "" ?>">
                </div>
                <div class="twoInput">
                    <input type="number" placeholder="Phone" value="<?php echo $user_data['phone'] ?? "" ?>">
                    <input type="text" placeholder="City" value="<?php echo $user_data['city'] ?? "" ?>">
                </div>
            </div>

            <div class="payment" style="margin-top:50px;">
                <h2>Payment Details</h2>
                <select reuired id="paymentOptions" onchange="changeMethod();">
                    <option value="" disabled selected hidden>Choose Method...</option>
                    <option value="creditCard">Credit Card</option>
                    <option value="paypal">Paypal</option>
                    <option value="cash">Cash</option>
                </select>
                <br>

                <div id="creditCard" style="display: none">
                    <div class="oneInput">
                        <input type="text" placeholder="Card Number">
                    </div>
                    <div class="twoInput">
                        <input type="text" placeholder="MM/YY">
                        <input type="text" placeholder="CVV">
                    </div>
                    <div class="oneInput">
                        <input type="text" placeholder="Name On Card">
                    </div>
                </div>
                <div id="paypal" style="display: none">
                    <div class="oneInput">
                        <input type="text" placeholder="Paypal">
                    </div>
                </div>
                <div id="cash" style="display: none">
                    <h4 style="color:#555; text-align:center;">Your Order Will Be Paid in Cash</h4>
                </div>
            </div>
        </form>
    </div>

    <div class="container cart checkoutCart">
        <h2 style="padding-bottom:5px; margin: 7px 3px; font-size: 24px;">Your Cart</h2>
        <table class="products-table">
            <tr style="border: none;">
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
            foreach($cartProducts as $cartProduct){
                $product = $products->getProduct($cartProduct['product_id']);
            ?>
            <tr>
                <td>
                    <div class="cart-product">
                        <img src="<?php echo $product['product_image']?>">
                        <div style="margin-top: 15px;">
                            <h3><?php echo $product['product_name']?></h3>
                            <p>Price: <?php echo $product['product_price']?> KWD</p>
                        </div>
                    </div>
                </td>
                <td style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;x<?php echo $cartProduct['product_quantity']?></td>
                <td style="font-size: 18px;"><?php echo $product['product_price'] * $cartProduct['product_quantity']?> KWD</td>

            </tr>
            <?php
            }

            ?>
        </table>

        <div class="total-price">
            <table style="width:100%">
                <tr style="font-size: 20px;">
                    <td>Total</td>
                    <td><?php echo isset($product) ? $cart->getTotal($_SESSION['user_id']) : 0 ?> KWD</td>
                </tr>
            </table>
        </div>

        <div class="checkout" style="display:flex; justify-content:center;">
            <a href="checkout.php" class="btn">Check Out</a>
        </div>

    </div>
</div>



<script src="Scripts/paymentMethodChange.js"></script>

<br>
<?php
    include('Partial-Files/footer.php');
?>
