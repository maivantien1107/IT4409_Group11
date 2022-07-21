<?php 

   class Supplier{
    private $supplier;
    private $supplier_id;
    public function __construct($supplier_id,$supplier){
        self::setSupplier($supplier);
        self::setSupplier_id($supplier_id);

    }
    public function getSupplier(){
       return  $this->supplier;
    }
    public function getSupplier_id(){
        return  $this->supplier_id;
     }
    public function setSupplier($supplier){
        return $this->supplier = $supplier;
    }
    public function setSupplier_id($supplier_id){
        return $this->supplier_id = $supplier_id;
    }
   }
