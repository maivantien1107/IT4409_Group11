<?php

require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Laptop.php';
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'ComputerProductsApplication.php';

class LaptopApplication extends ComputerProductsApplication {
    /**
     * The method support insert data to database
     * @param Laptop $laptop
     */
    public function insert($laptop) {
        // add to products table and computer_products table
        parent::insert($laptop);
       $produ_id= parent::getNewinsert();
        // add to pc table
        $query = "insert into laptop(product_id, pin)
                    values (" .
                    $produ_id . "," .
                    $laptop->getPin()
                        . ");";
        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * Return all product in products table
     * @return array
     */
    public function getAll(){
        $listLaptop = array();
        $query = "select * from
                    products p inner join computer_products cp on p.product_id = cp.product_id
                    inner join laptop l on p.product_id = l.product_id order by p.product_id desc";
        parent::addQuerry($query);
        $result = parent::executeQuery();

        while($row = mysqli_fetch_array($result)){
            $productID = $row["product_id"];
            $model = $row["model"];
            $price = $row["price"];
            $size= $row["size"];
            $weigh = $row["weigh"];
            $color = $row["color"];
            $numberOfProducts = $row["number_of_product"];
            $supplier = $row["supplier"];
            $description = $row["p_description"];
            $feature= $row["feature"];
            $cpu = $row["s_cpu"];
            $ram = $row["s_ram"];
            $memory = $row["s_memory"];
            $screen = $row["screen"];
            $card = $row["s_card"];
            $os = $row["os"];
            $pin = $row["pin"];
            $disable = $row["dis"];
            $overview = $row["overview"];
            $des1 = $row["des1"];
            $des2 = $row["des2"];
            $des3 = $row["des3"];
            $des4 = $row["des4"];
            $des5 = $row["des5"];
            $des6 = $row["des6"];
            $des7 = $row["des7"];
            $des8 = $row["des8"];
            $image1= $row["des9"];
            $image2= $row["des10"];
            $image3= $row["des11"];
            $laptop = new Laptop($productID, $model, $price,$size, $weigh, $color, $numberOfProducts, $supplier, $description,$feature,
                $disable,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$des8,$image1,$image2,$image3, $cpu, $ram, $memory, $screen, $card, $os, $pin);
            $laptop->setDisable($disable);

            array_push($listLaptop, $laptop);
        }

        return $listLaptop;
    }

    /**
     * Return product have product_id = $product_id
     * @param int $product_id
     * @return Laptop
     */
    public function get($product_id){
        $query = "select * from
                    products p inner join computer_products cp on p.product_id = cp.product_id
                    inner join laptop l on p.product_id = l.product_id
                    where p.product_id=" . $product_id;
        parent::addQuerry($query);
        $result = parent::executeQuery();

        if($row = mysqli_fetch_array($result)){
            $productID = $row["product_id"];
            $model = $row["model"];
            $price = $row["price"];
            $size= $row["size"];
            $weigh = $row["weigh"];
            $color = $row["color"];
            $numberOfProducts = $row["number_of_product"];
            $supplier = $row["supplier"];
            $description = $row["p_description"];
            $feature= $row["feature"];
            $cpu = $row["s_cpu"];
            $ram = $row["s_ram"];
            $memory = $row["s_memory"];
            $screen = $row["screen"];
            $card = $row["s_card"];
            $os = $row["os"];
            $pin = $row["pin"];
            $disable = $row["dis"];
            $overview = $row["overview"];
            $des1 = $row["des1"];
            $des2 = $row["des2"];
            $des3 = $row["des3"];
            $des4 = $row["des4"];
            $des5 = $row["des5"];
            $des6 = $row["des6"];
            $des7 = $row["des7"];
            $des8 = $row["des8"];
            $image1= $row["des9"];
            $image2= $row["des10"];
            $image3= $row["des11"];

            $laptop = new Laptop($productID, $model, $price,$size, $weigh, $color, $numberOfProducts, $supplier, $description,$feature,$disable,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$des8,$image1,$image2,$image3, $cpu, $ram, $memory, $screen, $card, $os, $pin);
            $laptop->setDisable($disable);

            return $laptop;
        }

        return null;
    }

    /**
     * The method update data to database
     * @param Laptop $laptop
     */
    public function update($laptop) {
        // update to products table and computer_products table
        parent::update($laptop);

        // update pc table
        $query = "update laptop
                    set " .
                    "pin = " . $laptop->getPin() . " " .
                    "where product_id = " . $laptop->getProductID()
                    . "";

        parent::addQuerry($query);
        parent::updateQuery();
    }
    public function delete($lap_id){
       
        $query = "delete from laptop where product_id = $lap_id";
        parent::addQuerry($query);
        parent::updateQuery();
        parent::delete($lap_id);
    }
    public function getCountAll(){
        $query="select count(product_id) as count from products where 1 ";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        $row=mysqli_fetch_array($result);
        if ($row){
            return $row['count'];
        }
        else {
            return 0;
        }

    }
}
