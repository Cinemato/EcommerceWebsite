<?php
    include('Partial-Files/header.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['deleteButton'])){
            $removedProduct = $cart->removeProduct($_POST['product_id'], $_SESSION['user_id']);
        }

    }

    if(!isset($_SESSION['user_id']))
    {
        header("Location: index.php?sqlerror");
    }

    $cartProducts = $cart->getCart($_SESSION['user_id']);

    if(count($cartProducts) > 0) {

?>
    <div class="container cart">
        <table class="products-table">
            <tr>
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
                       <div>
                           <h3><?php echo $product['product_name']?></h3>
                           <p>Price: <?php echo $product['product_price']?> KWD</p>
                           <form method="post">
                               <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                               <button type="submit" class="cart-delete" style="background:white; border:none; cursor:pointer; color:#DC3636; outline:none;" name="deleteButton">Remove</button>
                           </form>

                       </div>
                   </div>
                </td>
                <td style="font-size: 20px;">&nbsp;&nbsp;&nbsp;x<?php echo $cartProduct['product_quantity']?></td>
                <td style="font-size: 18px;"><?php echo $product['product_price'] * $cartProduct['product_quantity']?> KWD</td>

            </tr>
            <?php
            }

            ?>
        </table>

        <div class="total-price">
            <table>
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

<?php
    }
    else{
        echo '<h1 style="text-align: center; color: rgba(0, 0, 0, 0.7)">Oops.. The Cart is Empty <br><br> :(</h1>';
    }
?>
   <br>
<?php
    include('Partial-Files/footer.php');
?>


