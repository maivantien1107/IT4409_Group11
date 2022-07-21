<?php 
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
 function Search($arrays){
            $list_search=array();
            $list_model=array();
            $list_featue=array();
         foreach($arrays as $array){
            $query1="SELECT * FROM products where model like '%$array%' limit 5";
            $query2="SELECT * FROM products where featue like '%$array%' limit 5";
                                            
            parent::addQuerry($query1);
            $result_model=parent::executeQuery();
            parent::addQuerry($query2);
            $result_featue=parent::executeQuery();
            while ($row=mysqli_fetch_array($result_featue)){
                $featue=$row['featue'];
                $list_featue[]=$featue;
            }
            while ($row=mysqli_fetch_array($result_model)){
                $model=$row['model'];
                $list_model[]=$model;
            }
            $cnt1=0;
            $cnt2=0;
            foreach($list_featue as $featue1){
                if ($cnt1>=4){
                    $list_search[]=$featue1;
                    $cnt1++;
                }
                else break;
            }
            foreach($list_model as $model1){
                if ($cnt2>=4){
                    $list_search[]=$model1;
                    $cnt2++;
                }
                else break;
            }
        
         }
         return $list_search;
}
?>