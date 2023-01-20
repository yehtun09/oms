<?php
include_once __DIR__."/../include/db.php";
class Customers{
private $pdo;
public  function getCustometList()
{
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("select * from customers");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $Customer=$statement->fetchAll(pdo::FETCH_ASSOC);
    return $Customer;
  }

  public function createCustomer($name,$phone,$address,$email)
 {
  $this->pdo=Database::connection();
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql="insert into customers(name,phone,address,email) values (:name,:phone,:address,:email)";
  $statement=$this->pdo->prepare($sql);
  $statement->bindParam(':name',$name);
  $statement->bindParam(':phone',$phone);
  $statement->bindParam(':address',$address);
  $statement->bindParam(':email',$email);
  if($statement->execute())
  {
     return true;
  } else
  {
    return false;
  }
 }

 public function editCustomerModel($id)
 {
  $this->pdo=Database::connection();
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql=("select * from customers where id=:id");
  $statement=$this->pdo->prepare($sql);
  $statement->bindParam(":id",$id);
  $statement->execute();
  $result=$statement->fetch(pdo::FETCH_ASSOC);
  return $result;
 }

 public function updateCustomers($id,$name,$phone,$address,$email)
 {
  
  $this->pdo=Database::connection();
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql="update customers set name=:name,phone=:phone,address=:address,email=:email where id=:id";
  $statement=$this->pdo->prepare($sql);
  $statement->bindParam(":id",$id);
  $statement->bindParam(":name",$name);
  $statement->bindParam(":phone",$phone);
  $statement->bindParam(":address",$address);
  $statement->bindParam(":email",$email);
 return  $statement->execute();

 }
}
?>