<?php
include_once __DIR__."/../include/db.php";

class Categories{
    private  $pdo;
    public function getCategories()
{

    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from categories";
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $categories=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $categories;
}
public function createCategories($name,$parent)
{
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="insert into categories(name,parent) values (:name,:parent)";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':parent',$parent);
    return $statement->execute();
    
}
public function getCatInfo($id)
{
    
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from categories where id=:id";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result=$statement->fetch(pdo::FETCH_ASSOC);
    return $result;
}
public function updateCate($id,$name,$parents)
{
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="update categories set name=:name,parent=:parents where id=:id";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':parents',$parents);
    $result=$statement->execute();
    return $result;
}
public function deleteCate($id)
{
    
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="delete from categories where id=:id";
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $result=$statement->fetch(pdo::FETCH_ASSOC);
    return $result;

}
public function  getCategoiesPage($page)
{   
    $items_per_page=5;
    $offset= ($page-1) * $items_per_page;
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from categories limit $offset,$items_per_page";
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

}
?>