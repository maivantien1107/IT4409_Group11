<?php
require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'News.php';
class NewsApplication extends MySqlConnect{
    public function insert($news){
        $query="INSERT INTO news(title,category,description,time,img,overview) VALUES('"
        .$news->getTitle()."','"
        .$news->getCategory()."','"
        .$news->getDescription()."','"
        .$news->getTime()."','"
        .$news->getImg()."','"
        .$news->getOverview()."')";
        parent::addQuerry($query);
        parent::updateQuery();
    }
    public function update($news){
        $query="UPDATE news SET title='".
        $news->getTitle()."',category='".
        $news->getCategory()."',description='".
        $news->getDescription()."',time='".
        $news->getTime()."',img='".
        $news->getImg()."',overview='".
        $news->getOverview()."' where news_id=".
        $news->getNews_id().";";
        parent::addQuerry($query);
        parent::updateQuery();
        
    }
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
    public function delete($news_id){
        $query="DELETE FROM news WHERE news_id='$news_id'";
        parent::addQuerry($query);
        parent::updateQuery();
    }
    public function getAll($start,$limit){
        $listNews=array(); 
        $query="SELECT * FROM news order by news_id DESC limit $start,$limit";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        while ($row = mysqli_fetch_array($result)){
            $title=$row['title'];
            $news_id=$row['news_id'];
            $category=$row['category'];
            $description=$row['description'];
            $time1=$row['time'];
            $time=self::time($time1);
            $img=$row['img'];
            $overview=$row['overview'];
            $news= new News($news_id,$title,$category,$description,$time,$img,$overview) ;
            $listNews[]=$news;
        }
         return $listNews;
    }
    public function getButtom(){
        $query = "SELECT * FROM news order by news_id DESC limit 1";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        while ($row = mysqli_fetch_array($result)){
            $title=$row['title'];
            $news_id=$row['news_id'];
            $category=$row['category'];
            $description=$row['description'];
            $time1=$row['time'];
            $time=self::time($time1);
            $img=$row['img'];
            $overview=$row['overview'];
            $news= new News($news_id,$title,$category,$description,$time,$img,$overview) ;
            return $news;
        }

    }
    public function getPromotion(){
        $listPromotion=array();
        $query="SELECT * FROM news where category like 'Khuyến%' order by news_id DESC limit 6 ";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        while($row = mysqli_fetch_array($result)){
            $title=$row['title'];
            $news_id=$row['news_id'];
            $category=$row['category'];
            $description=$row['description'];
            $time1=$row['time'];
            $time=self::time($time1);
            $img=$row['img'];
            $overview=$row['overview'];
            $news= new News($news_id,$title,$category,$description,$time,$img,$overview) ;
            $listPromotion[]=$news;
        }
        return $listPromotion;
    }
    public function getNewsdetail($new_id){
        $query = "select * from news n
                    where n.news_id= $new_id ";
        parent::addQuerry($query);
        $result = parent::executeQuery();

        if($row = mysqli_fetch_array($result)){
            $title=$row['title'];
            $news_id=$row['news_id'];
            $category=$row['category'];
            $description=$row['description'];
            $time=$row['time'];
            $img=$row['img'];
            $overview=$row['overview'];
            $news= new News($news_id,$title,$category,$description,$time,$img,$overview) ;
            return $news;
        }

        return null;
    }
    
    public function getCountAll(){
        $query="select count(news_id) as count from news where 1";
        parent::addQuerry($query);
        $result=parent::executeQuery();
        $row=mysqli_fetch_array($result);
        if ($row){
            return $row['count'];
        }
        else return 0;
    }
}

?>