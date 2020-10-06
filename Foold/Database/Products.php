<?php
class Products{

    public $db = null;

    public function __construct(DBController $db){
        if(!$db->con) return null;
        $this->db = $db;
    }

    public function getData($table = 'products'){
        $query = $this->db->con->query("SELECT * FROM {$table}");
        $rowArray = array();

        while($product = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $rowArray[] = $product;
        }

        return $rowArray;
    }

    public function getProduct($productid){
        $query = $this->db->con->query("SELECT * FROM products WHERE product_id = {$productid}");
        $product = mysqli_fetch_array($query, MYSQLI_ASSOC);

        return $product;
    }
}
?>
