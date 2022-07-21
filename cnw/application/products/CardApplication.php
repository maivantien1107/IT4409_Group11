<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'Card.php';
class CardApplication extends MySqlConnect{
    public function getAll(){
        $listcard=array();
        $query="SELECT * FROM `card` where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        while ($row=mysqli_fetch_array($result)){
            $ram=$row['card'];
            $supp=new Card($ram);
            $listcard[]=$supp;
        }
        return $listcard;
    }
}