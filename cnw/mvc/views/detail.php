
<?php session_start();
require_once ROOT . DS . 'application'. DS .'products'.DS. 'LaptopApplication.php';
require_once ROOT . DS . 'application'.DS.'RateApplication.php';
require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
$service = new UsersApplication();

// if (isset($_POST['mua-ngay'])){
//    var_dump(22);
//     $product_id1=intval(addslashes($_POST['buy_now']));
//     $service->insertProduct($username,$product_id1,1);
//     header("Location: ../cart");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <meta charset="UTF-8">
      <meta name = "viewport" content="width = device-width, initial-sacale = 1.0">
      <link rel="stylesheet" href="../../../public/css/home.css" type="text/css">
		  <link rel="stylesheet" href="../../../public/css/footer_container.css" type="text/css">
      <link rel="stylesheet" href="../../../public/css/productdetail.css">
      <link rel="stylesheet" href="../../../public/fonts/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="../../../public/css/nav_bar.css" >
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
      
      <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
   </head>
  <body>
  <?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php';?>
  <div class="container">
    <div class="son-main">
      <div class="son-top">
        <h1 class="st-name">
         <?php echo $product->getModel(); ?>
          
        </h1>

        <div class="st-rating">
          <?php 
          $app_rate=new RateApplication();
          $proid_rate=$product->getProductID();
           ?>
           <ul class="st-rating__star">
                  <?php 
                   $points = $app_rate->getStarMedium($proid_rate);
                   $point=intval($points);
                   for ($cntpoint=1;$cntpoint<=$point;$cntpoint++){
                    ?>
                    <li data-index="<?php echo $cntpoint ?>">
                    <i data-index="<?php echo $cntpoint ?>" class="demo-icon  ye-star fa fa-star" ></i>
                  </li>
                  <?php 
                  }
                  ?>
                  <li class="rate_icon">
                    <div class="rate_icon__lit" style="width:<?php echo ($points-$point)*100; ?>%;">
                    <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="svg-icon rating-stars__primary-star icon-rating-solid">
                      <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" 
                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                  </div>
                  <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="svg-icon rating-stars__hollow-star icon-rating">
                    <polygon fill="none" points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" 
                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                  </li>
                  <?php
                  for ($cntpoint=$point+2;$cntpoint<=5;$cntpoint++){
                    ?>
                    <li data-index="<?php echo $cntpoint ?>">
                    <i data-index="<?php echo $cntpoint ?>" class="demo-icon  ye-star2 fa fa-star"></i>
                  </li>
                  <?php
                  }
                  ?>
             </ul>
          
          <div class="st-rating__link">
            <a id="re-rate" class="re-link"><?php echo $app_rate->getAllCountStar($proid_rate); ?> đánh giá</a><span>|</span
            ><a class="re-link"><?php echo $app_rate->getContent($proid_rate); ?>  Hỏi &amp; đáp</a>
          </div>
        </div>
      </div>

      <div class="son-middle">
        <div class="left">
          <img src="../../../public/img/products/<?php echo $product->getProductID(); ?>_image1.webp" alt="637639340541330187_msi-gaming-gf63-den-1" class="" />
        </div>

        <div class="right">
          <div class="card re-card st-card">
            <h2 class="card-title">Thông số kỹ thuật</h2>
            <div class="card-body">
              <table class="st-pd-table">
                <tbody>
                  <tr>
                    <td>Màn hình </td>
                    <td><?php echo $product->getScreen(); ?></td>
                  </tr>
                  <tr>
                    <td>CPU </td>
                    <td><?php echo $product->getCpu(); ?></td>
                  </tr>
                  <tr>
                    <td>RAM </td>
                    <td><?php echo $product->getRAM(); ?></td>
                  </tr>
                  <tr>
                    <td>Ổ cứng </td>
                    <td> <?php echo $product->getMemory(); ?></td>
                  </tr>
                  <tr>
                    <td>Đồ họa </td>
                    <td>
                     <?php echo $product->getCard(); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hệ điều hành </td>
                    <td><?php echo $product->getOs(); ?></td>
                  </tr>
                  <tr>
                    <td>Trọng lượng </td>
                    <td><?php echo $product->getWeigh(); ?> kg</td>
                  </tr>
                  <tr>
                    <td>Kích thước </td>
                    <td><?php echo $product->getSize(); ?></td>
                  </tr>
                  <tr>
                    <td>Xuất xứ </td>
                    <td>Trung Quốc</td>
                  </tr>
                  <tr>
                    <td>Năm ra mắt </td>
                    <td>2021</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="st-price-main" style="color: rgb(245, 18, 6);"><?php echo $product->getPrice(); ?>₫</div>
           <?php if (isset($_SESSION['username'])){ ?>
          <form action="../../../validate/insert_cart.php" class="form-button_cart" method="post">
          <input type="text" name="buy_now" value="<?php echo $product->getProductID();?>" style="display:none;">
          <button class="btn btn-primary btn-xl btn-full " type="submit" id="btn_buy_now" name="mua-ngay"style="background: rgb(245, 18, 6); color: #fff;">
           
            <div><strong>MUA NGAY</strong></div>
          </button>
          <input type="text" name="add_now" value="<?php echo $product->getProductID();?>" style="display:none;">
          <button class="btn btn-primary btn-xl btn-full" type="submit" id="btn_add_cart" name="add-cart" style="background: rgb(245, 18, 6); color:#fff;">
            <div><strong>THÊM VÀO GIỎ</strong></div>
          </button>
          </form>
          <?php } 
          else {
            ?>
            <div class="no_session_text" style="font-size:20px;">Bạn cần đăng nhập để mua hàng&
              <a href=<?php echo "/" . $path_project . "/" . "login" ?> style="color:red;font-size:22px;">Đăng nhập</a>
            </div>

          <?php }
          ?>

        </div>
      </div>

      <div class="card re-card st-card st-card--article js--st-card--article expand">
        <h2 class="card-title">
          Đặc điểm nổi bật của <?php echo $product->getModel(); ?>
        </h2>
        <div class="card-body">
          <div class="st-pd-content">
          <p style="text-align: justify">
               <b><?php echo $product->getOverview(); ?></b>
            </p>
            <p style="text-align: center">
              <b><img alt="<?php echo $product->getModel(); ?> (ảnh 1)" src="../../../public/img/products/<?php echo $product->getProductID(); ?>_image1.png"/></b>
            </p>
            <!-- hàm xử lý in thông tin chi tiết sản phẩm -->
            <?php 
            $listFeature=$product->getFeature();
              $features=explode("__",$listFeature);
              $listdescription=$product->getDes1();
              $description=explode("__",$listdescription);
              $i=0;
              foreach($features as $feature){
                trim($feature);
                trim($description[$i]);
                ?>
                 <h3 style="text-align: justify">
                  <b><?php echo $feature; ?></b>
                </h3>
                <p style="text-align: justify">
              <?php echo $description[$i];?>
              </p>              
              <?php
              $i++;
                if ($i%2==0){
                  ?>
                  <p style="text-align: center">
                    <b><img alt="<?php echo $product->getModel(); ?> (ảnh <?php echo $i+1; ?>)" 
                    src="../../../public/img/products/<?php echo $product->getProductID(); ?>_image<?php echo $i/2 +1;?>.png"/></b>
                  </p>

                <?php
                }
            }
            ?>
           
          </div>
        </div>
      </div>
     <div class="detail_rate">
      <?php
        $rate_all=$app_rate->getAll($proid_rate);
      
      ?>
     <h2 class="card-title card-title--badge">Đánh giá &amp; Nhận xét
        
        <span class="badge text-white" ><?php echo $app_rate->getAllCountStar($proid_rate)+ $app_rate->getContent($proid_rate);?></span>
      </h2>

      <div class="c-rate-star">
        <div class="cmt_row">
          <div class="col">
            <div class="c-rate__left text-center">
              <p>Đánh Giá Trung Bình</p>
              <div class="point"><?php echo $app_rate->getStarMedium($proid_rate);?>/5</div>
              <div class="list-star">
                <ul>
                  <?php 
                   $points = $app_rate->getStarMedium($proid_rate);
                   $point=intval($points);
                   for ($cntpoint=1;$cntpoint<=$point;$cntpoint++){
                    ?>
                    <li data-index="<?php echo $cntpoint ?>">
                    <i data-index="<?php echo $cntpoint ?>" class="demo-icon  ye-star fa fa-star" ></i>
                  </li>
                  <?php 
                  }
                  ?>
                  <li class="rate_icon">
                    <div class="rate_icon__lit" style="width:<?php echo ($points-$point)*100; ?>%;">
                    <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="svg-icon rating-stars__primary-star icon-rating-solid">
                      <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" 
                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                  </div>
                  <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="svg-icon rating-stars__hollow-star icon-rating">
                    <polygon fill="none" points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" 
                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon></svg>
                  </li>
                  <?php
                  for ($cntpoint=$point+2;$cntpoint<=5;$cntpoint++){
                    ?>
                    <li data-index="<?php echo $cntpoint ?>">
                    <i data-index="<?php echo $cntpoint ?>" class="demo-icon  ye-star2 fa fa-star"></i>
                  </li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
              <span><?php echo $app_rate->getAllCountStar($proid_rate); ?> đánh giá &amp; 
                    <?php echo $app_rate->getContent($proid_rate);?> nhận xét</span>
            </div>
          </div>
          <div class="col-5">
            <div class="c-rate__center">
              <div class="c-progress-list">
                <div class="c-progress-item">
                  <label>5<i class="demo-icon ye-star small fa fa-star"></i>
                  </label>
                  <div class="c-progress-bar">
                    <span class="c-progress-value" style="width:<?php echo $app_rate->getStarPercent($proid_rate,5);?>%;"></span>
                  </div>
                  <span><?php echo $app_rate->getCount($proid_rate,5); ?></span>
                </div>
                <div class="c-progress-item">
                  <label>4<i class="demo-icon ye-star small fa fa-star"></i>
                  </label>
                  <div class="c-progress-bar">
                    <span class="c-progress-value"
                       style="width: <?php echo $app_rate->getStarPercent($proid_rate,4);?>%;"></span>
                  </div>
                  <span><?php echo $app_rate->getCount($proid_rate,4); ?></span>
                </div>
                <div class="c-progress-item">
                  <label>3<i class="demo-icon ye-star small fa fa-star"></i>
                  </label>
                  <div class="c-progress-bar">
                    <span class="c-progress-value"
                       style="width: <?php echo $app_rate->getStarPercent($proid_rate,3);?>%;"></span>
                  </div>
                  <span><?php echo $app_rate->getCount($proid_rate,3); ?></span>
                </div>
                <div class="c-progress-item">
                  <label>2<i class="demo-icon ye-star small fa fa-star"></i>
                  </label>
                  <div class="c-progress-bar">
                    <span class="c-progress-value"
                        style="width: <?php echo $app_rate->getStarPercent($proid_rate,2);?>%;"></span>
                  </div>
                  <span><?php echo $app_rate->getCount($proid_rate,2); ?></span>
                </div>
                <div class="c-progress-item">
                  <label>1<i class="demo-icon ye-star small fa fa-star"></i>
                  </label>
                  <div class="c-progress-bar">
                    <span class="c-progress-value" 
                       style="width: <?php echo $app_rate->getStarPercent($proid_rate,1);?>%;"></span>
                  </div>
                  <span><?php echo $app_rate->getCount($proid_rate,1); ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="c-rate__right text-center">
              <p class="small-para">Bạn đã dùng sản phẩm này?</p>
              <form class="form-rate" action="" method="post">
                <a href="#user">
              <button type="submit" name="submit_rate" class="btn detail_btn-primary">Gửi đánh giá của bạn</button>
              </a>
              </form>
             

             
            </div>
          </div>
        </div>
      </div>
      <?php  
              if (isset($_REQUEST['submit_rate'])){
                if (!isset($_SESSION['username'])){?>
                  <script type='text/javascript'>
                        alert("Bạn cần đăng nhập để đánh giá sản phẩm");
                  </script>
               <?php   
                }
                else {
                  ?>
                  <div class="c-user-rate" id="user">
        <form class="c-user-rate-form" method="post" action="">
                    <div class="c-user-list_star">
                      <div class="c-user-star">
                        <p style="font-size:24px; font-weight:900; color:#989a9c;">Bạn hãy đánh giá cho sản phẩm</p>
                        <div class="list-star">
                      
                        <input type="radio" name="rate" id="rate-5" value="5" style="display: none;">
                        <label for="rate-5" class="fa fa-star"></label>
                        <input type="radio" name="rate" id="rate-4" value="4" style="display: none;">
                        <label for="rate-4" class=" fa fa-star"></label>
                        <input type="radio" name="rate" id="rate-3" value="3" style="display: none;">
                        <label for="rate-3" class=" fa fa-star"></label>
                        <input type="radio" name="rate" id="rate-2" value="2" style="display: none;">
                        <label for="rate-2" class=" fa fa-star"></label>
                        <input type="radio" name="rate" id="rate-1" value="1" style="display: none;">
                        <label for="rate-1" class=" fa fa-star"></label>
                       </div>
                       <!-- <p class="f-err" style="display: none;">Vui lòng chọn đánh giá của bạn về sản phẩm này</p> -->
                        
                      </div>
                    </div>
                    <div class="c-user-comment">
                    <div class="c-user-rate-form">
                      <textarea name="submit_comment" id="txtReview" rows="4" placeholder="Hãy đóng góp ý kiến của bạn về sản phẩm của chúng tôi."></textarea>
                      <!-- <p class="f-err" style="display: none;">
                      Mời bạn viết bình luận.(Tối thiểu 3 ký tự)</p> -->
                      <button name='user-submit-rate' id="submit-button-user-rate" class="btn btn-primary">Gửi đánh giá</button></div>
                    </div>
                  </div>
                  </form>
     </div>

              <?php  }
              }
              
              ?>
      
    
     <?php
        if (isset($_POST['user-submit-rate'])){
          $user_rate=isset($_POST["rate"])?addslashes($_POST['rate']):'';
          $user_comment=isset($_POST["submit_comment"])?addslashes($_POST["submit_comment"]):'';
          if ($user_rate=='' && $user_comment==''){
            ?>
          <?php 
          }
          else{
            $username=$_SESSION['username'];
           date_default_timezone_set('Asia/Ho_Chi_Minh');
           $datetime =date("Y-m-d H:i:s");
            $rates_user=new Rate($username,$product->getProductID(),intval($user_rate),$user_comment,$datetime);
            $app_rate->insert($rates_user);
          }
        }     
      ?>
     
      <div class="c-comment">
        <?php 
          foreach($rate_all as $rate){
            ?>
            <div class="c-comment-box">
          <div class="c-comment-box__avatar"><?php echo $app_rate->getName($rate->getUsername()); ?></div>
          <div class="c-comment-box__content">
            <div class="c-comment-name"><?php echo $rate->getUsername(); ?></div>
            <div class="list-star">
              <ul>
                <ul>
                  <?php  for($cntstar=1;$cntstar<=$rate->getStar();$cntstar++){ ?>
                    <li data-index="<?php echo $cntstar;?>"><i data-index="<?php echo $cntstar;?>" class="demo-icon small ye-star fa fa-star"></i></li>

                <?php
                  }
                  for($cntstar=$rate->getStar()+1;$cntstar<=5;$cntstar++){ ?>
                     <li data-index="<?php echo $cntstar;?>"><i data-index="<?php echo $cntstar;?>" class="demo-icon small ye-star2 fa fa-star"></i></li>
                  <?php 
                  }
                  ?>
                </ul>
                <span><?php echo $rate->getDate(); ?></span>
              </ul>
            </div>
            <div class="c-comment-text"><?php echo $rate->getContent(); ?></div>
          </div>
        </div>
         <?php }
        ?>
      </div>
      
     </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../../../public/javascript/detail.js"></script>

