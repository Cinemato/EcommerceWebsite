<?php
    include('Partial-Files/header.php');
?>
<div class="container">
    <div class="title">
        <h2>All Products</h2>
    </div>

    <div class="row">
        <?php
            foreach($allProducts as $product){
        ?>
        <div class="col-4">
            <a href="<?php echo 'product.php?product_id=' . $product['product_id']?>">
                <img src="<?php echo $product['product_image']?>">
                <h4><?php echo $product['product_name']?></h4>
                <p><?php echo $product['product_price']?> KWD</p>
            </a>

        </div>
        <?php } ?>
    </div>
</div>



<?php
    include('Partial-Files/footer.php');
?>
