<?php
include_once "controller/categories_controller.php";
$categoriesController=new categoriesController();
$id=$_POST['id'];
$result=$categoriesController->deleteCategory($id);

echo "success";