<?php
include_once __DIR__."/../model/customer_model.php";
class CustomerController extends Customers{

    public function getCustomer()
    {
        $customers=$this->getCustometList();
        return $customers;
    }
    public function addCustomer($name,$phone,$address,$email)
    {
        $result=$this->createCustomer($name,$phone,$address,$email);
        return $result;
    }
    public function editCustomer($id)
    {
        $result=$this->editCustomerModel($id);
        return $result;
    }
    public function updateCustomer($id,$name,$phone,$address,$email)
    {
        $result=$this->updateCustomers($id,$name,$phone,$address,$email);
        return $result;
    }
}


?>