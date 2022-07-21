<?php

require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'ComputerProducts.php';
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'ProductsApplication.php';

class ComputerProductsApplication extends ProductsApplication {
    /**
     * The method support insert data to database
     * @param ComputerProducts $computerProducts
     */
    public function insert($computerProducts) {
        // add to products table
        parent::insert($computerProducts);
        $pro_id= parent::getNewinsert();
                        
        // add to computer_products table
        $query = "insert into computer_products(product_id, s_cpu, s_ram, s_memory, screen, s_card, os)
                    value (" .
                   $pro_id . "," .
                    "'" . $computerProducts->getCpu() . "' ," .
                    "'" . $computerProducts->getRam() . "' ,'" .
                    $computerProducts->getMemory() . "'," .
                    "'" . $computerProducts->getScreen() . "' ," .
                    "'" . $computerProducts->getCard() . "' ," .
                    "'" . $computerProducts->getOs() . "'"
                        . ")";
        parent::addQuerry($query);
        parent::updateQuery();
    }
    
    /**
     * The method update data to database
     * @param ComputerProducts $computerProducts
     */
    public function update($computerProducts) {
        // update to products table
        parent::update($computerProducts);
        
        // update to computer_products table
        $query = "update computer_products
                    set " .
                    "s_cpu = " . "'" . $computerProducts->getCpu() . "' ," .
                    "s_ram = " . "'" . $computerProducts->getRam() . "' ," .
                    "s_memory = '" . $computerProducts->getMemory() . "'," .
                    "screen = " . "'" . $computerProducts->getScreen() . "' ," .
                    "s_card = " . "'" . $computerProducts->getCard() . "' ," .
                    "os = " . "'" . $computerProducts->getOs() . "'" .
                    "where product_id = " . $computerProducts->getProductID()
                    . "";

        parent::addQuerry($query);
        parent::updateQuery();             
    }
    public function delete($product_id){
        $query="DELETE FROM computer_products WHERE product_id=$product_id";
        parent::addQuerry($query);
        parent::updateQuery();
        parent::delete($product_id);
    }
}



