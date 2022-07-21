<?php  
$path_project = 'cnw';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'application'.DS.'products'.DS.'LaptopApplication.php';
$app=new LaptopApplication();
/**
 * Thêm sản phẩm
 */
if(!isset($_POST['btn-submit'])){
    var_dump(1);die;
}
if (isset($_POST['btn-submit'])){
    $model=isset($_POST['model'])?addslashes($_POST['model']):'';
    $price=isset($_POST['price'])?intval(addslashes($_POST['price'])):'';
    $size=isset($_POST['size'])?addslashes($_POST['size']):'';
    $weight=isset($_POST['weigh'])?addslashes($_POST['weigh']):'';
    $color=isset($_POST['color'])?addslashes($_POST['color']):'';
    $number=isset($_POST['number'])?intval(addslashes($_POST['number'])):'';
    $info1=isset($_POST['info1'])?addslashes($_POST['info1']):'';
    $info2=isset($_POST['info2'])?addslashes($_POST['info2']):'';
    $info3=isset($_POST['info3'])?addslashes($_POST['info3']):'';
    $feature=isset($_POST['feature'])?addslashes($_POST['feature']):'';
    $description=isset($_POST['description'])?addslashes($_POST['description']):'';
    $overview=isset($_POST['overview'])?addslashes($_POST['overview']):'';
    $info1=explode("__",$info1);
    $cpu=isset($info1[0])? $info1[0]:'';
    trim($cpu);
    $ram=isset($info1[1])? $info1[1]:'';
    trim($ram);
    $memory=isset($info1[2])? $info1[2]:'';
    trim($memory);
    $info2=explode("__",$info2);
    $screen=isset($info2[0])? $info2[0]:'';
    trim($screen);
    $card=isset($info2[1])? $info2[1]:'';
    trim($card);
    $info3=explode("__",$info3);
    $os=isset($info3[0])? $info3[0]:'';
    trim($os);
    $pin=isset($info3[1])? $info3[1]:'';
    trim($pin);
    $supp=explode(" ",$model);
    $supplier=$supp[0];
    $des=explode("__",$description);
    $laptop =new Laptop(1,$model,$price,$size,$weight,$color,$number,$supplier,$description,$feature,1,$overview,$description,$des[1],$des[2],$des[3],$des[4],$des[5]
    ,'a','a','a','a','a',$cpu,$ram,$memory, $screen, $card, $os,$pin);
    $app->insert($laptop);
    header('Location: admin-product');
    exit();
}
if (isset($_POST['btn-submit-update'])){
    $model=isset($_POST['model'])?addslashes($_POST['model']):'';
    $price=isset($_POST['price'])?intval(addslashes($_POST['price'])):'';
    $size=isset($_POST['size'])?addslashes($_POST['size']):'';
    $weight=isset($_POST['weigh'])?addslashes($_POST['weigh']):'';
    $color=isset($_POST['color'])?addslashes($_POST['color']):'';
    $number=isset($_POST['number'])?intval(addslashes($_POST['number'])):'';
    $info1=isset($_POST['info1'])?addslashes($_POST['info1']):'';
    $info2=isset($_POST['info2'])?addslashes($_POST['info2']):'';
    $info3=isset($_POST['info3'])?addslashes($_POST['info3']):'';
    $feature=isset($_POST['feature'])?addslashes($_POST['feature']):'';
    $description=isset($_POST['description'])?addslashes($_POST['description']):'';
    $overview=isset($_POST['overview'])?addslashes($_POST['overview']):'';
    $info1=explode("__",$info1);
    $cpu=isset($info1[0])? $info1[0]:'';
    trim($cpu);
    $ram=isset($info1[1])? $info1[1]:'';
    trim($ram);
    $memory=isset($info1[2])? $info1[2]:'';
    trim($memory);
    $info2=explode("__",$info2);
    $screen=isset($info2[0])? $info2[0]:'';
    trim($screen);
    $card=isset($info2[1])? $info2[1]:'';
    trim($card);
    $info3=explode("__",$info3);
    $os=isset($info3[0])? $info3[0]:'';
    trim($os);
    $pin=isset($info3[1])? $info3[1]:'';
    trim($pin);
    $supp=explode(" ",$model);
    $supplier=$supp[0];
    $des=explode("\n",$description);
    $product_id=isset($_POST['btn-submit-update']);
    $laptop =new Laptop($product_id,$model,$price,$size,$weight,$color,$number,$supplier,$description,$feature,1,$overview,$description,$des[1],$des[2],$des[3],$des[4],$des[5]
    ,'a','a','a','a','a',$cpu,$ram,$memory, $screen, $card, $os,$pin);
   $app->update($laptop);
   header('Location: ../../admin-product');
   exit();

}
if (isset($_POST['btn-delete'])){
    $product_id=intval($_POST['btn-delete']);
 
    $app->delete($product_id);
}
header('Location: ../admin-product');
exit();