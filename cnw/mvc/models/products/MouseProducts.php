<?php

require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Products.php';

class MouseProducts extends Products{
    private $connection;        // boolean
    private $protocol;        // String 
    private $isLed;                     // boolean                  

   
    public function __construct($productID, $model, $image, $price, $size,$weigh, $color, $number, 
        $supplier, $connection, $protocal, $isLed, $description) {
        parent::__construct($productID, $model, $image, $price, $size,$weigh, $color, $number, $supplier, $description);
        self::setConnection($connection);
        self::setProtocon($protocal);
        self::setIsLed($isLed);
        
        $this->type = Type::MOUSE;
    }
    
   
    public function getConnection()
    {
        return $this->connection;
    }

   
    public function getProtocon()
    {
        return $this->protocol;
    }

    public function getIsLed()
    {
        return $this->isLed;
    }

    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    public function setProtocon($protocon)
    {
        $this->protocol = $protocon;
    }

    public function setIsLed($isLed)
    {
        $this->isLed = $isLed;
    }

    
}
