<?php 
require_once ROOT . DS . 'mvc'.DS.'models'.DS.'NewsDescription.php';
require_once ROOT . DS . 'application'. DS . 'NewsApplication.php';
class NewsDescriptionApplication extends NewsApplication{
    public function insert( $newsdes){
        parent::insert($newsdes);
        $newstop=parent::getButtom();
        $query="INSERT INTO news_description(news_id,des1,des2,des3,des4,des5,des6,des7,des8,des9,des10) VALUES(
            ".$newstop->getNews_id().",'".
            $newsdes->getDes1()."','".
            $newsdes->getDes2()."','".
            $newsdes->getDes3()."','".
            $newsdes->getDes4()."','".
            $newsdes->getDes5()."','".
            $newsdes->getDes6()."','".
            $newsdes->getDes7()."','".
            $newsdes->getDes8()."','".
            $newsdes->getDes9()."','".
            $newsdes->getDes10() ."');";
        parent::addQuerry($query);
        parent::updateQuery();
    }
    public function delete($news_id){
        $query="delete from news_description where news_id = $news_id";
        parent::addQuerry($query);
        parent::updateQuery();
        parent::delete($news_id);

    }
    public function update($newsdes){
        parent::update($newsdes);
        $query="Update news_description set des1='".
        $newsdes->getDes1()."',".
        "des2='".$newsdes->getDes2()."',".
        "des3='".$newsdes->getDes3()."',".
        "des4='".$newsdes->getDes4()."',".
        "des5='".$newsdes->getDes5()."',".
        "des6='".$newsdes->getDes6()."'
        where news_id=".$newsdes->getNews_id();
        // "des7='".$newsdes->getDes7()."',".
        // "des8='".$newsdes->getDes8()."',".
        // "des9='".$newsdes->getDes9()."',".
        // "des10='".$newsdes->getDes10()."');";
    parent::addQuerry($query);
    parent::updateQuery();


    }
    public function get($news_id){
        $query = "select * from
                    news n inner join news_description nd on n.news_id=nd.news_id
                    where n.news_id=$news_id  ";
        parent::addQuerry($query);
        $result = parent::executeQuery();
        if($row = mysqli_fetch_array($result)){
            $news_id=$row['news_id'];
            $des1=$row['des1'];
            $des2=$row['des2'];
            $des3=$row['des3'];
            $des4=$row['des4'];
            $des5=$row['des5'];
            $des6=$row['des6'];
            $des7=$row['des7'];
            $image1=$row['des8'];
            $image2=$row['des9'];
            $image3=$row['des10'];
            $title=$row['title'];
            $description=$row['description'];
            $category=$row['category'];
            $time=$row['time'];
            $img=$row['img'];
            $overview=$row['overview'];
            $new=new NewsDescription($news_id,$title,$category,$description,$time,$img,$overview,$des1,$des2,$des3,$des4,$des5,$des6,$des7,$image1,$image2,$image3);
            return $new;
        }
        return null;

    }

}

?>