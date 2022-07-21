<?php

require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'ComputerProducts.php';

class PC extends ComputerProducts {
    private $case;  // string

    public function __construct($productID, $model, $image, $price,$size, $weigh, $color, $number, $supplier, $des,$feature,$disable,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$des8,$image1,$image2,$image3, 
        $cpu, $ram, $memory, $screen, $card,  $os, $case) {
        parent::__construct($productID, $model, $image, $price,$size, $weigh, $color, $number, $supplier, $des,$feature,$disable,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$des8,$image1,$image2,$image3, $cpu, $ram, $memory, $screen, $card, $os);
        self::setCase($case);
        
        $this->type = Type::PC;
    }
    
    public function getCase()
    {
        return $this->case;
    }

    public function setCase($case)
    {
        $this->case = $case;
    }

}
