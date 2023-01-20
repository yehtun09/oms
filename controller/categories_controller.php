<?php
 include_once __DIR__."/../model/categories_model.php";

class categoriesController extends Categories{

    public function Categories()
    {
       $categories=$this->getCategories();
       return $categories;
    }
    public function addCategories($name,$parent)
    {
        $result=$this->createCategories($name,$parent);

        return $result;
    }
    public function editCategory($id)
    {
     $result=$this->getCatInfo($id);
     return $result;
    }
    public function updateCategory($id,$name,$parents)
    {
        $result=$this->updateCate($id,$name,$parents);
        return $result;
    }
    public function deleteCategory($id)
   {
    $result=$this->deleteCat($id);
    return $result;
   }
   public function getCategoiesPage($page)
   {
    $result=parent::getCategoiesPage($page);
    return $result;
   }
}
?>