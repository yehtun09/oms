<?php
include_once __DIR__."/../model/products_model.php";
 class productsController extends Products{
   
     public function getProducts()
     {
     $products=$this->getProductsList();
     return $products;
     }

     public function addProducts($parent,$name,$model,$brand,$color)
     {
        $result=$this->createProducts($parent,$name,$model,$brand,$color);
        return $result;
     }

     public function getParents()
     {
     $parents=$this->CategoriesParent();
     return $parents;
     }
     public function editProducts($id){
        $result=$this->editModel($id);
        return $result;
     }
     public function updateProducts($id,$list,$name,$model,$brand,$color)
     {
        $result=$this->updateModel($id,$list,$name,$model,$brand,$color);
        return $result;
     }
     public function getProductPage($page)
     {
      $result=parent::getProductPage($page);
      return $result;
     }
 }
?>