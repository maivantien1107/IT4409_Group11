<?php

require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Products.php';

class ProductsApplication extends  MySqlConnect {
    /**
     * The method support insert data to database
     * @param Products $product
     */
    public function insert($product) {
        // add to products table
        $query = "insert into products(model,size, price, weigh, color, number_of_product, supplier, p_description,feature, dis,overview,
                       des1,des2,des3,des4,des5,des6,des7,des8,des9,des10,des11)
                    value ('" . $product->getModel() . "' ,'" .
                    $product->getSize() . "'," .
                    $product->getPrice() . "," .
                    $product->getWeigh() . "," .
                    "'" . $product->getColor() . "' ," .
                    $product->getNumber() . "," .
                    "'" . $product->getSupplier() . "' ," .
                    "'" . $product->getDes() . "' ,'" .
                   $product->getFeature()."',".
                   $product->getDisable().",'".
                   $product->getOverview()."','".
                   $product->getDes1()."','".
                   $product->getDes2()."','".
                   $product->getDes3()."','".
                   $product->getDes4()."','".
                   $product->getDes5()."','".
                   $product->getDes6()."','".
                   $product->getDes7()."','".
                   $product->getDes8()."','".
                   $product->getDes9()."','".
                   $product->getDes10()."','".
                   $product->getDes11()."')";

        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * The method support delete row in database
     * @param int $product_id
     */
    public function delete($product_id){
        //  delete row with product_id in pc table
        // delete row with product_id in rate table
        $query = "delete from rate
                  where product_id = " . $product_id;
        parent::addQuerry($query);
        parent::updateQuery();


        // next, delete row with product_id in cart_products table
        $query = "delete from cart_products
                  where product_id = " . $product_id;
        parent::addQuerry($query);
        parent::updateQuery();

        $query = "delete from bill where product_id =$product_id";
        parent::addQuerry($query);
        parent::updateQuery();
        // next, delete row with product_id in products table
        $query = "delete from products
                  where product_id = " . $product_id;
        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * The method update data to database
     * @param Products $product
     */
    public function update($product) {
        // update to products table
        $query = "update products
                    set " .
                    "model = " . "'" . $product->getModel() . "' ," .
               
                    "price = " . $product->getPrice() . "," .
                    "size = '" . $product->getSize() . "'," .
                    "weigh = " . $product->getWeigh() . "," .
                    "color = " . "'" . $product->getColor() . "' ," .
                    "number_of_product = " . $product->getNumber() . "," .
                    "supplier = " . "'" . $product->getSupplier() . "' ," .
                    "p_description = " . "'" . $product->getDes() . "' ," .
                    "dis = " . $product->getDisable() . " " .
                    "overview= '".$product->getOverview()."',".
                    "des1= '".$product->getDes1(). "'," .
                    "des2= '".$product->getDes2(). "'," .
                    "des3= '".$product->getDes3(). "'," .
                    "des4= '".$product->getDes4(). "'," .
                    "des5= '".$product->getDes5(). "'," .
                    "des6= '".$product->getDes6(). "'," .
                    "des7= '".$product->getDes7(). "'," .
                    "des8= '".$product->getDes8(). "'," .
                    "des9= '".$product->getDes9()."',".
                    "des10= '".$product->getDes10()."',".
                    "des11= '".$product->getDes11()."'".
                    "where product_id = " . $product->getProductID()
                    . "";
        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * The method disable product
     * @param int $productID
     */
    public function disable($productID){
        $query = "update products set dis = 1 where product_id = $productID";

        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * The method enable product
     * @param int $productID
     */
    public function enable($productID){
        $query = "update products set dis = 0 where product_id = $productID";

        parent::addQuerry($query);
        parent::updateQuery();
    }
    public function getNewinsert(){
        $query=("select * from products where 1 order by product_id DESC LIMIT 1");
        parent::addQuerry($query);
        $result = parent::executeQuery();
        $row=mysqli_fetch_array($result);
        if ($row){
            return $row['product_id'];
        }
        else {
            return null;
        }
    }
}


