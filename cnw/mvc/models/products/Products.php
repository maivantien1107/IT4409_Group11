<?php

require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'Supplier.php';
class Products {
    private $productID;         // int
    private $model;             // String
    private $image;             // String : path of image
    private $price;             //double
    private $size;                   // string
    private $weigh;             // double
    private $color;             // String
    private $number;  // int
    private $supplier;             //sting
    private $des;       // String
    private $feature;
    private $disable;           // 0 or 1, 0 : no disable, 1 : disable
    private $overview;             //string
    private $des1;             //string
    private $des2;
    private $des3;
    private $des4;
    private $des5;
    private $des6;
    private $des7;
    private $des8;
    private $des9;
    private $des10;
    private $des11;

    public $type = Type::NONE;

    public function __construct($productID, $model, $price,$size, $weigh, $color, $number, $supplier, $des,$feature,$disable,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$des8,$des9,$des10,$des11) {
        // new products is no disable
        self::setProductID($productID);
        self::setModel($model);
        self::setPrice($price);
        self::setSize($size);
        self::setWeigh($weigh);
        self::setColor($color);
        self::setNumber($number);
        self::setSupplier($supplier);
        self::setDes($des);
        self::setFeature($feature);
        self::setDisable($disable);
        self::setOverview($overview);
        self::setDes1($des1);
        self::setDes2($des2);
        self::setDes3($des3);
        self::setDes4($des4);
        self::setDes5($des5);
        self::setDes6($des6);
        self::setDes7($des7);
        self::setDes8($des8);
        self::setDes9($des9);
        self::setDes10($des10);
        self::setDes11($des11);
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
    public function getSupplier(){

    return $this->supplier;
    }
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

   
    public function getPrice()
    {
        return $this->price;
    }
    public function getSize()
    {
        return $this->size;
    }

    public function getWeigh()
    {
        return $this->weigh;
    }

    
    public function getColor()
    {
        return $this->color;
    }

   
    public function getNumber()
    {
        return $this->number;
    }

    public function getDisable()
    {
        return $this->disable;
    }
    public function getOverview(){
        return $this->overview;
    }
    public function getDes1(){
        return $this->des1;
    }
    public function getDes2(){
        return $this->des2;
    }
    public function getDes3(){
        return  $this->des3;
    }
    public function getDes4(){
        return $this->des4;
    }
    public function getDes5(){
        return  $this->des5;
    }
    public function getDes6(){
        return  $this->des6;
    }
    public function getDes7(){
        return $this->des7;
    }
    public function getDes8(){
        return  $this->des8;}
    public function getDes9(){
        return  $this->des9;
    }
    public function getDes10(){
        return $this->des10;
    }
    public function getDes11(){
        return  $this->des11;
    }
    
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

   
    public function setModel($model)
    {
        $this->model = $model;
    }

    
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }
   
    public function setWeigh($weigh)
    {
        $this->weigh = $weigh;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    
    public function setNumber($number)
    {
        $this->number = $number;
    }
    public function setSupplier($supplier){
        $this->supplier = $supplier;
    }
    public function getDes()
    {
        return $this->des;
    }

    
    public function setDes($des)
    {
        $this->desc = $des;
    }

    
    public function setDisable($disable)
    {
        $this->disable = $disable;
    }
    public function setOverview($overview){
        $this->overview = $overview;
    }
    public function setDes1($des1){
        $this->des1 = $des1;
    }
    public function setDes2($des2){
        $this->des2 = $des2;
    }
    public function setDes3($des3){
        $this->des3 = $des3;
    }
    public function setDes4($des4){
        $this->des4 = $des4;
    }
    public function setDes5($des5){
        $this->des5 = $des5;
    }
    public function setDes6($des6){
        $this->des6 = $des6;
    }
    public function setDes7($des7){
        $this->des7 = $des7;
    }
    public function setDes8($des8){
        $this->des8 = $des8;
    }
    public function setDes9($des9){
        $this->des9 = $des9;
    }
    public function setDes10($des10){
        $this->des10 = $des10;
    }
    public function setDes11($des11){
        $this->des11 = $des11;
    }
    public function getFeature(){
        return $this->feature;
    }
    public function setFeature($feature){
        $this->feature = $feature;
    }
}
