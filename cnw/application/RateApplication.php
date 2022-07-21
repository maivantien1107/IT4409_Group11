<?php
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'Rate.php';

class RateApplication extends MySqlConnect {

    public function time($date1){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date2 =date("Y-m-d H:i:s");   
        $diff = abs(strtotime($date2) - strtotime($date1));     
        $years = floor($diff / (365*60*60*24));   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));   
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));   
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));   
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);     
      
        if ($years>0|| $months>0 || $days>7){
            $date1=new DateTime($date1);
         return date_format($date1,"d-m-Y");
        }
        elseif ($days>=1 && $days<=7) {
         return $days." ngày trước";
        }
        elseif ($hours>=1){
         return $hours." giờ trước";
        }
        elseif ($hours==0 && $minutes>0 ){
         return $minutes." phút trước";
        }
        else {
         return "Vừa đăng";
        }
    }
    /**
     * The method support insert data to database
     * @param Evaluate $evaluate
     */
    public function insert($evaluate) {
        // add to evaluate table
        $query = "insert into rate(user_name, product_id, star, content, date_cmt)
                    value (" .
                    "'" . $evaluate->getUsername() . "' ," .
                    $evaluate->getProductID() . "," .
                    $evaluate->getStar() . "," .
                    "'" . $evaluate->getContent() . "' ," .
                    "'" . $evaluate->getDate() . "'"
                        . ")";
        parent::addQuerry($query);
        parent::updateQuery();
    }

    /**
     * Return product have product_id = $product_id
     * @param int $product_id
     * @return array
     */
    public function getAll($product_id){
        $listRate = array();
        $query = "select * from rate
                    where product_id='" . $product_id . "'";
        parent::addQuerry($query);
        $result = parent::executeQuery();

        while($row = mysqli_fetch_array($result)){
            $username = $row["user_name"];
            $productID = $row["product_id"];
            $star = $row["star"];
            $comment = $row["content"];
            $date = $row["date_cmt"];
            $datetime=self::time($date);

            $rate = new Rate($username, $productID, $star, $comment, $datetime);
           $listRate[]=$rate;
        }

        return $listRate;
    }
    public function getCount($id,$star){
        $query = "SELECT count(rate_id) as count from rate
                    where product_id =$id and star =$star";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        $row=mysqli_fetch_array($result);
        if ($row){
            return $row['count'];
        }
        else return 0;
    }
    public function getAllCountStar($productID){
        $query = "SELECT count(rate_id) as count from rate
                   where product_id =$productID
                   and star!=0 ";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        $row=mysqli_fetch_array($result);
        if ($row){
            return $row['count'];
        }
        else return 0;

    }

        public function getContent($product_id){
            $query = "SELECT count(rate_id) as count from rate
                        where content != '' and product_id=$product_id";
            parent::addQuerry($query);
            $result = parent::executeQuery();
            $row=mysqli_fetch_array($result);
            if ($row){
                return $row['count'];
            }
            else return 0;
    
        }
        public function getStarMedium($product_id){
            $query = "SELECT sum(star) as sumstar from rate
                      where product_id =$product_id";
            parent::addQuerry($query);
            $result= parent::executeQuery();
            $row=mysqli_fetch_array($result);
            if ($row){
                $countStar=self::getAllCountStar($product_id);
                if ($countStar==0) {
                    return 0;
                }
                $point=$row["sumstar"]/$countStar;
                return $point;
            }
            else return 0;

    }
        public function getStarPercent($product_id,$star){
            $result=self::getAllCountStar($product_id);
            $result2=self::getCount($product_id,$star);
            if ($result==0) { return 0; }
            else {
                $result3=$result2/$result *100.00;
                return $result3;
            }
        }
        public function getName($name){
            $name1=explode(" ",$name);
            $result='';
            if (count($name1)>1) 
            {
                foreach($name as $tmp){
                    $result=$result."".$tmp[0];
                }
                return $result;
            }
            else {
                return $name;
            }
        }
    

}
