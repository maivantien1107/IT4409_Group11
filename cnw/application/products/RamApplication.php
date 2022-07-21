<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'Ram.php';
class RamApplication extends MySqlConnect{
    public function getAll(){
        $listram=array();
        $query="SELECT * FROM ram where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        while ($row=mysqli_fetch_array($result)){
            $ram=$row['ram'];
            $supp=new Ram($ram);
            $listram[]=$supp;
        }
        return $listram;
    }
}