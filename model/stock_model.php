<?php
include_once __DIR__."/../include/db.php";
class Stock{
    private  $pdo;
    public function getStock()
{

    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from stock ";
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $stock=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $stock;
}
public function getProductName()
{
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="SELECT SUM(stock.qty) as total_qty , products.name,stock.product_id,stock.id
    FROM stock JOIN products 
    WHERE products.id=stock.product_id
    GROUP by products.name";
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $productName=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $productName;
}
public function getSellingPrice()
{
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="SELECT selling_price
    FROM price_table 
    WHERE product_id IN(
        SELECT product_id 
        FROM stock 
        )";
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $price=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $price;
}
public function updateStock($productName,$quantity,$price,$date)
{
    
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO  stock(product_id,unit_price,qty,date) values (:productName,:price,:quantity,:date)";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(":productName",$productName);
    $statement->bindParam(":price",$price);
    $statement->bindParam(":quantity",$quantity);
    $statement->bindparam(":date",$date);
    if($statement->execute())
  {
     return true;
  } else
  {
    return false;
  }
}

}
?>