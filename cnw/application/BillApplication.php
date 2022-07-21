<?php  
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'. DS . 'models' . DS . 'Bill.php';

class BillApplication extends MySqlConnect 
{
    public function getAll(){
        $query="SELECT * FROM bill order by bill_id DESC";
        $listbill=array();
        parent::addQuerry($query);
        $result = parent::executeQuery();
        while ($row= mysqli_fetch_array($result)){
            $bill_id = $row['bill_id'];
            $product_id = $row['product_id'];
            $username=$row['user_name'];
            $money=$row['total_money'];
            $date=$row['date_bill'];
            $quantity=$row['quantity'];
            $status=$row['bill_status'];
            $bill=new Bill($bill_id,$product_id,$username,$date,$money,$quantity,$status);
            $listbill[] = $bill;

        }
        return $listbill;
    }
}