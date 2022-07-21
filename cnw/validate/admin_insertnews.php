<?php  
$path_project = 'cnw';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'application'.DS.'NewsDescriptionApplication.php';
$app_news= new NewsDescriptionApplication();
if (isset($_POST['btn-submit'])){
    $news_id=1;
    $title =isset($_POST['news_title']) ? addslashes($_POST['news_title']):'';
    $category =isset($_POST['news_category']) ? addslashes($_POST['news_category']):'';
    $overview = isset($_POST['news_overview']) ? addslashes($_POST['news_overview']):'';
    $description = isset($_POST['news_description']) ? addslashes($_POST['news_description']):'';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date2 =date("Y-m-d H:i:s"); 
    $des=explode("\n",$description);
    $news= new NewsDescription($news_id,$title,$category,'a1a',$date2,'a12',$overview,$des[0],$des[1],$des[2],$des[3],$des[4],$des[5]);
    $app_news->insert($news);
}
if (isset($_POST['btn-delete'])){
    $news_id=intval($_POST['btn-delete']);
    $app_news->delete($news_id);
}
if (isset($_POST['btn-submit-update'])){
    $news_id=intval($_POST['btn-submit-update']);
    $title=isset($_POST['news_title'])?addslashes($_POST['news_title']):'';
    $category=isset($_POST['news_category'])? addslashes($_POST['news_category']):'';
    $overview=isset($_POST['news_overview'])? addslashes($_POST['news_overview']):'';
    $description=isset($_POST['news_description'])? addslashes($_POST['news_description']):'';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time =date("Y-m-d H:i:s"); 
    $des=explode("\n",$description);
    $news=new NewsDescription($news_id,$title,$category,'1a2',$time,'a12',$overview,$des[0],$des[1],$des[2],$des[3],$des[4],$des[5]);
   
    $app_news->update($news);
}
header('Location: ../admin');
exit();