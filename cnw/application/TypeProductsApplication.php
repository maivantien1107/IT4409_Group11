<?php

require_once ROOT . DS . 'config' . DS . 'db_config.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'LaptopApplication.php';
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'MouseProductsApplication.php';

class TypeProductsApplication {
    /**
     * Method check type of product is LAPTOP, PC or MOUSE
     * @param int $product_id
     * @return int
     */
    public static function checkType($product_id){
        
            $service = new LaptopApplication();
            $product = $service->get($product_id);

            if($product != null){
                return Type::LAP;
            } else {
                $service = new MouseProductsApplication();
                $product = $service->get($product_id);

                if($product != null){
                    return Type::MOUSE;
                }
            }
        

        return Type::NONE;
    }
}
