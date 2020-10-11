<?php
    include('Partial-Files/header.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_SESSION['user_id']))
        {
            $cart->addToCart($_SESSION['user_id'], $_POST['product_id'], $_POST['product_quantity']);
        }
        else
        {
            header("Location: login.php");
        }

    }
?>
    <div class="container" id="productContainer">
        <div class="row">
           <?php
                $product_id = $_GET['product_id'] ?? 1;
                foreach($allProducts as $product){
                    if($product['product_id'] == $product_id){
            ?>
            <div class="col-2">
                <img src="<?php echo $product['product_image']?>" width="100%" id="product-img">
                    <div class="img-row">
                      <div class="img-col">
                          <img src="https://via.placeholder.com/1000" width="100%" class="small-img">
                      </div>
                      <div class="img-col">
                          <img src="https://via.placeholder.com/1000" width="100%" class="small-img">
                      </div>
                      <div class="img-col">
                          <img src="https://via.placeholder.com/1000" width="100%" class="small-img">
                      </div>
                      <div class="img-col">
                          <img src="https://via.placeholder.com/1000" width="100%" class="small-img">
                      </div>
                    </div>
            </div>

            <div class="col-2 productInfo">
                <h1><?php echo $product['product_name']?></h1>
                <h4><?php echo $product['product_price']?> KWD</h4>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                    <?php
                        if(isset($_SESSION['user_id']))
                        {
                            if(in_array($product['product_id'], $cart->getProductIdArray($cart->getCart($_SESSION['user_id']))))
                            {
                                echo '<button type="submit" style="margin:0px;" disabled class="btn disabled-btn">In The Cart</button>';
                            }
                            else
                            {
                                echo '<div class="productInput">
                                        <div>
                                            <h5 style="text-align:center;">QTY</h5>
                                            <input type="number" name="product_quantity" style="text-align:center;" value="1" min="1" max="50">
                                        </div>
                                        <div style="margin-top: 28px;">
                                            <button type="submit" class="btn">Add To Cart</button>
                                        </div>

                                    </div>';
                            }
                        }

                        else
                        {
                            echo '<div class="productInput">
                                        <div>
                                            <h5 style="text-align: center; font-size:12px;">QTY</h5>
                                            <input type="number" name="product_quantity" style="text-align:center;" value="1" min="1" max="50">
                                        </div>
                                        <div style="margin-top: 25.5px;">
                                            <button type="submit" class="btn">Add To Cart</button>
                                        </div>

                                    </div>';
                        }


                    ?>

                </form>
                <h3 style="text-align: left;">Product Details</h3>
                <hr class="bottomLine">
                <p class="desc"><?php echo $product['product_desc']?></p>

            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>



    <script src="Scripts/imageChange.js"></script>

<?php
    include('Partial-Files/footer.php');
?>
