<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'products'.DS.'cpu.php';
class CPUApplication extends MySqlConnect{
    public function getAll(){
        $listcpu=array();
        $query="SELECT * FROM cpu where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        while ($row=mysqli_fetch_array($result)){
            $cpu_id=$row['cpu_id'];
            $cpu=$row['cpu'];
            $supp=new CPU($cpu_id,$cpu);
            $listcpu[]=$supp;
        }
        return $listcpu;
    }
}