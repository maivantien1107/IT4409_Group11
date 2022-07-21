<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'Memory.php';
class MemoryApplication extends MySqlConnect{
    public function getAll(){
        $listmemory=array();
        $query="SELECT * FROM `memory` where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        while ($row=mysqli_fetch_array($result)){
            $ram=$row['memory'];
            $supp=new Memory($ram);
            $listmemory[]=$supp;
        }
        return $listmemory;
    }
}