<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'supplier.php';
class SupplierApplication extends MySqlConnect{
    public function getAll(){
        $listsupplier=array();
        $query="SELECT * FROM supplier where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        while ($row=mysqli_fetch_array($result)){
            $supplier_id=$row['supplier_id'];
            $supplier=$row['supplier'];
            $supp=new Supplier($supplier_id,$supplier);
            $listsupplier[]=$supp;
        }
        return $listsupplier;
    }
}