<?php
include_once __DIR__."/../include/db.php";

class Products{
    private $pdo;
  public function getproductsList()
  {
    $this->pdo=Database::connection();
    // var_dump($this->pdo);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("select * from products");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
  }

  public function createProducts($parent,$name,$model,$brand,$color)
  {
     $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO products(category_id,name,model,brand,color) VALUES (:parent,:name,:model,:brand,:color)";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(":parent",$parent);
    $statement->bindParam(":name",$name);
    $statement->bindParam(":model",$model);
    $statement->bindParam(":brand",$brand);
    $statement->bindParam(":color",$color);
    if($statement->execute())
  {
     return true;
  } else
  {
    return false;
  }
  }

  public function CategoriesParent()
  {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("SELECT * FROM categories");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $parents=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $parents;
  }
  public function editModel($id)
  {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=('select * from products where id=:id');
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result=$statement->fetch(pdo::FETCH_ASSOC);
    return $result;
    
  }
  public function updateModel($id,$list,$name,$model,$brand,$color)
  {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="update products set id=:id,category_id=:list,name=:name,model=:model,brand=:brand,color=:color where id = :id";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':list',$list);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':model',$model);
    $statement->bindParam(':brand',$brand);
    $statement->bindParam(':color',$color);
    return $statement->execute();
    // return $result;
  }
  public function getProductPage($page)
  {
    $items_per_page=5;
    $offset=($page-1) *$items_per_page;
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("select * from products limit $offset,$items_per_page");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
  }
}
?>