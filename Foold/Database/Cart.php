<?php


class Cart{

    public $db = null;
    public $products = null;

    public function __construct(DBController $db, Products $products){
        if(!$db->con) return null;

        $this->db = $db;
        $this->products = $products;
    }


    public function addToCart($userid, $productid, $quantity){
        if($this->db->con){
            if($userid != null && $productid != null){
                $query = $this->db->con->query("INSERT INTO cart(user_id, product_id, product_quantity) VALUES ({$userid}, {$productid}, {$quantity})");
                header("Location: cart.php");
                return $query;
            }
        }
    }

    public function getTotal($user_id){
        $sum = 0;

        $cart = $this->getCart($user_id);

        foreach($cart as $cartProduct){
            $product = $this->products->getProduct($cartProduct['product_id']);
            $sum += $product['product_price'] * $cartProduct['product_quantity'];
        }

        return $sum;
    }

    public function removeProduct($product_id, $user_id){
        if($product_id != null){
            $query = $this->db->con->query("DELETE FROM cart WHERE product_id = {$product_id} AND user_id = {$user_id}");
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }

    public function getProductIdArray($cartArray){
        $productIdArray = array();

        foreach($cartArray as $product){
            $productIdArray[] = $product['product_id'];
        }

        return $productIdArray;
    }

    public function getCart($user_id)
    {
        $query = "SELECT * FROM cart WHERE user_id = ?";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $query))
        {
            header("Location: index.php?sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $cartArray = array();

            while($row = mysqli_fetch_assoc($result))
            {
                $cartArray[] = $row;
            }

            return $cartArray;
        }
    }



}



?>
