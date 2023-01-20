<?php
include_once __DIR__."/../model/stock_model.php";
class StockController extends Stock{
    public function stock()
    {
        $stock=$this->getStock();
        return $stock;
    }
    
    public function productName()
    {
        $products=$this->getProductName();
        return $products;
    }
    public function product($product_id)
    {
        $product_id=getProductId($product_id);
        return $product_id;
    }
    public function SellingPrice()
    {
        $price=$this->getSellingPrice();
        return $price;
    }
    public function addStock($productName,$quantity,$price,$date)
    {
        $result=$this->updateStock($productName,$quantity,$price,$date);
        return $result;
    }
}


?>