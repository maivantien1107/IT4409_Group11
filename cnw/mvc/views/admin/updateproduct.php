<?php 
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login-admin');
  exit();
}
require_once ROOT . DS . 'application'.DS.'products' . DS . 'LaptopApplication.php';
$app= new LaptopApplication();
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
  $des=explode("__",$description);
  $product_id=intval($_POST['btn-submit-update']);
  $laptop =new Laptop($product_id,$model,$price,$size,$weight,$color,$number,$supplier,$description,$feature,1,$overview,$description,$des[1],$des[2],$des[3],$des[4],$des[5]
  ,'a','a','a','a','a',$cpu,$ram,$memory, $screen, $card, $os,$pin);

 $app->update($laptop);
 header('Location: ../../admin-product');
 exit();

}
$id=intval($_GET['id']);
$news=$app->get($id);
$info1=$news->getCpu()."__".$news->getRam()."__".$news->getMemory();
        $info2=$news->getScreen()."__".$news->getCard();
        $info3=$news->getOs()."__".$news->getPin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link rel="stylesheet" href="public/css/admin_news_index.css"> -->
     <link rel="stylesheet" href="public/css/admin_user_index.css">

<link
  href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
  rel="stylesheet"
/>
    <title>Document</title>
</head>
<body>
<div class="bg-modal1" style="display:flex;">
                    <form action="" method="post" style="width:70%;"> 
                    
                        <div class="modal-content">
                          <span class="modal-title">Cập nhật thông tin</span>
                          <div class="class-form-update">
                            <label class="news-title">Tên sản phẩm</label>
                            <input name="model" type="text" value="<?php echo $news->getModel(); ?>" placeholder="Tiêu đề tin tức"/>
                            <label class="news-title">Mức giá</label>
                            <input type="text" placeholder="" name="price" value="<?php echo $news->getPrice(); ?>"/>
                            <label class="news-title">Kích thước</label>
                            <input type="text" placeholder="" name="size" value="<?php echo $news->getSize(); ?>"/>
                            <label class="news-title">Trọng lượng</label>
                            <input type="text" placeholder="" name="weigh" value="<?php echo $news->getWeigh(); ?>"/>
                            <label class="news-title">Màu sắc</label>
                            <input type="text" placeholder="" name="color" value="<?php echo $news->getColor(); ?>"/>
                          
                            <label class="news-title">Số lượng sản phẩm</label>
                            <input type="text" placeholder="" name="number" value="<?php echo $news->getNumber(); ?>"/>
                            <label class="news-title">Thông tin</label>
                            <input type="text" placeholder="" name="info1" value="<?php echo $info1 ?>"/>
                            <label class="news-title">Màn hình, Card đồ họa</label>
                            <input type="text" placeholder="" name="info2" value="<?php echo $info2 ?>"/>
                            <label class="news-title">Hệ điều hành, Pin</label>
                            <input type="text" placeholder="" name="info3" value="<?php echo $info3 ?>"/>
                            <label class="news-title">Tổng quan</label>
                            <textarea rows="4" name="overview" value="" ></textarea>
                            <label class="news-title">Tính năng</label>
                            <textarea rows="4" name="feature" value="<?php echo $news->getFeature(); ?>" ></textarea>
                            <label class="news-title">Thông tin chi tiết</label>
                            <textarea rows="8" name="description" value="<?php echo $news->getDes1(); ?>" ></textarea>

                            <label class="news-title">Hình ảnh</label>
                            <div class="image-container">
                              <div
                                class="image"
                                style="
                                  background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                  border: none;
                                "
                              >
                                <button>
                                  <i class="bx bx-x"></i>
                                </button>
                              </div>
                              <div
                                class="image"
                                style="
                                  background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                  border: none;
                                "
                              >
                                <button>
                                  <i class="bx bx-x"></i>
                                </button>
                              </div>
                              <div
                                class="image"
                                style="
                                  background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                  border: none;
                                "
                              >
                                <button>
                                  <i class="bx bx-x"></i>
                                </button>
                              </div>
                              <div class="add-image">
                                <i class="bx bx-image-add" style="font-size: 50px"></i>
                              </div>
                            </div>

                            <div class="bottom-modal-button">
                              <button class="modal-button-close  close-add-modal1">Đóng</button>
                              <button class="modal-button-accept accept-add-modal1" type="submit" name="btn-submit-update" value="<?php echo $news->getProductID(); ?>">Cập nhật</button>
                            </div>
                          </div>                         
                        </div>
                    </form>
                </div>
    
</body>
</html>