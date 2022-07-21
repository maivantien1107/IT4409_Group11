<?php

require_once ROOT . DS . 'application' . DS . 'products' . DS . 'ProductsApplication.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'MouseProducts.php';

class MouseProductsApplication extends ProductsApplication {
    /**
     * The method support insert data to database
     * @param ComputerMouseProducts $mouse
     */
    public function insert($mouse) {
        // add to products table
        parent::insert($mouse);
        
        // add to computer_mouse_products table
        $query = "insert into mouse_products(product_id, connection, protocol, is_led)
                    values (" .
                    $mouse->getProductID() . "," .
                    $mouse->getStandardConnection() . ", " .
                    "'" . $mouse->getConnectionProtocon() . "' ," .
                    $mouse->getIsLed() . ")";
        
        parent::addQuerry($query);
        parent::updateQuery();
    }
    
    /**
     * Return all product in products table
     * @return array
     */
    public function getAll(){
        $listMouse = array();
        $query = "select * from
                    products p inner join mouse_products cmp on p.product_id = cmp.product_id";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        
        while($row = mysqli_fetch_array($result)){
            $productID = $row["product_id"];
            $model = $row["model"];
            $image = $row["image"];
            $price = $row["price"];
            $size = $row["size"];
            $weigh = $row["weigh"];
            $color = $row["color"];
            $numberOfProducts = $row["number_of_product"];
            $supplier = $row["supplier"];
            $description = $row["p_description"];
            $connection = $row["connection"];
            $protocal = $row["protocol"];
            $isLed = $row["is_led"];
            $disable = $row["dis"];

            $mouse = new MouseProducts($productID, $model, $image, $price,$size, $weigh, $color, $numberOfProducts, 
                $supplier, $connection, $protocal, $isLed, $description);
            $mouse->setDisable($disable);

            array_push($listMouse, $mouse);
        }
        
        return $listMouse;
    }
    
    /**
     * Return product have product_id = $product_id
     * @param int $product_id
     * @return ComputerMouseProducts
     */
    public function get($product_id){
        $query = "select * from
                    products p inner join mouse_products cmp on p.product_id = cmp.product_id 
                    where p.product_id=" . $product_id;
        
        parent::addQuerry($query);
        $result = parent::executeQuery();
        
        if($row = mysqli_fetch_array($result)){
            $productID = $row["product_id"];
            $model = $row["model"];
            $image = $row["image"];
            $price = $row["price"];
            $size = $row["size"];
            $weigh = $row["weigh"];
            $color = $row["color"];
            $numberOfProducts = $row["number_of_product"];
            $supplier = $row["supplier"];
            $description = $row["p_description"];
            $connection = $row["connection"];
            $protocal = $row["protocol"];
            $isLed = $row["is_led"];
            $disable = $row["dis"];

            $mouse = new MouseProducts($productID, $model, $image, $price,$size, $weigh, $color, $numberOfProducts,
                $supplier, $connection, $protocal, $isLed, $description);
            $mouse->setDisable($disable);

            return $mouse;
        }
        
        return null;
    }
    
    /**
     * The method update data to database
     * @param MouseProducts $mouse
     */
    public function update($mouse) {
        // update to products table
        parent::update($mouse);
        
        // update computer_mouse_products table
        $query = "update mouse_products
                    set " .
                    "connection = " . $mouse->getConnection() . ", " . 
                    "protocol = " . "'" . $mouse->getProtocon() . "' ," . 
                    "is_led = " . $mouse->getIsLed() . ", " .
                    "where product_id = " . $mouse->getProductID()
                    . "";
        
        parent::addQuerry($query);
        parent::updateQuery();
    }
}
