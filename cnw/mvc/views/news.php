<?php session_start();
require_once ROOT . DS . 'application'. DS . 'NewsApplication.php';
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <meta charset="UTF-8">
      <meta name = "viewport" content="width = device-width, initial-sacale = 1.0">
      <link rel="stylesheet" href="public/css/footer_container.css" type="text/css">
	
      <link rel="stylesheet" href="public/css/news_home_style.css">
      <link rel="stylesheet" href="public/css/nav_bar.css" >
      <link rel="stylesheet" href="public/fonts/themify-icons/themify-icons.css">
      <script src="https://kit.fontawesome.com/daab9b5831.js" crossorigin="anonymous"></script>
      <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
   </head>
   <body>
   <?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
      <div id="root" bis_skin_checked="1">
         <div class="news" bis_skin_checked="1">
            <div class="container" bis_skin_checked="1">
               <h1 class="news-h1">Tin Mới</h1>
            </div>
         </div>
         <section class="news-section">
            <div class="container" bis_skin_checked="1">
               <div class="row no-gutters" bis_skin_checked="1">
                  <div class="col-9" bis_skin_checked="1">
                     <div class="news-col news-main" bis_skin_checked="1">
                        <div class="news-section" bis_skin_checked="1">
                           <div class="card card-news news-top" bis_skin_checked="1">
                              <div class="news-top__left" bis_skin_checked="1">
                              <?php $newss=new NewsApplication();
                                           $news_top=$newss->getButtom();
                                           $path=$news_top->getTitle();
                                           $path = str_replace(' ', '-', $path);
                                         
                                      ?>
                              <div class="news-top__item" bis_skin_checked="1" id="<?php echo $news_top->getNews_id(); ?>">
                                   
                                    <a href="<?php echo "newsdetail/".$news_top->getNews_id()."/".$path ?>" class="news-top__item__img">
                                    <img src="public/img/news/<?php echo $news_top->getNews_id(); ?>_image1.png" alt="" width="490" height="326">
                                    </a>
                                    <a href="<?php echo "newsdetail/".$news_top->getNews_id()."/".$path ?>">
                                       <h3 class="news-top__item__tit"><?php echo $news_top->getTitle();?></h3>
                                    </a>
                                    <p class="news-top__item__time">
                                       <i class="fa-regular fa-comments"></i>
                                       </i> 1 - <time datetime="1656986889930"><?php echo $news_top->getTime(); ?></time>
                                    </p>
                                 </div>
                              </div>
                              <div class="news-top__right" bis_skin_checked="1">
                                 <div id="news-hor" bis_skin_checked="1">
                                    <?php 
                                       $news=$newss->getAll(1,4);
                                       $cnt=1;
                                       foreach($news as $new){
                                          $path1= $new->getTitle();
                                          $path1=str_replace(' ','-',$path1);

                                        if ($cnt<=4){ 
                                            ?>
                                    <div class="news-hor__item" bis_skin_checked="1" id="<?php echo $new->getNews_id(); ?>">
                                       <a href="<?php echo "newsdetail/".$new->getNews_id()."/".$path1 ?>" class="news-hor__item__img">
                                       <img src="public/img/news/<?php echo $new->getNews_id(); ?>_image1.png" alt="" width="120" height="80">
                                       </a>
                                       <div class="news-hor__item__info" bis_skin_checked="1">
                                          <a href="<?php echo "newsdetail/".$new->getNews_id()."/".$path1 ?>">
                                             <h3 class="news-hor__item__title"><?php echo $new->getTitle(); ?></h3>
                                          </a>
                                          <p class="news-hor__item__time">
                                             <i class="fa-regular fa-comments"></i>16947 - <time datetime="1656664454000"><?php echo $new->getTime();?></time>
                                          </p>
                                       </div>
                                    </div>
                                        <?php }
                                        $cnt++;
                                       }
                                     ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="news-section norPost" bis_skin_checked="1">
                           <div class="card" bis_skin_checked="1">
                              <div class="p20" bis_skin_checked="1">
                                 <?php 
                                    $news_tmp=$newss->getAll(5,14);
                                    foreach($news_tmp as $new_tmp){
                                       $path2=$new_tmp->getTitle();
                                       $path2=str_replace(' ', '-', $path2);
 
                                       ?>
                                  <div class="news__item" bis_skin_checked="1" id="<?php echo $new_tmp->getNews_id(); ?>">
                                    <a href="<?php echo "newsdetail/".$new_tmp->getNews_id()."/".$path2 ?>" class="news__item__img"><img src="public/img/news/<?php echo $new_tmp->getNews_id(); ?>_image1.png" 
                                                alt="AirPods Pro 2 và AirPods Max 2 sắp ra mắt có gì hấp dẫn?" width="300" height="200"></a>
                                    <div class="news-item__info" bis_skin_checked="1">
                                       <a class="news__item__cate" href="/tin-tuc/danh-gia"><?php echo $new_tmp->getCategory(); ?></a>
                                       <a href="<?php echo "newsdetail/".$new_tmp->getNews_id()."/".$path2 ?>">
                                          <h3 class="news__item__tit"><?php echo $new_tmp->getTitle(); ?></h3>
                                       </a>
                                       <div class="news__item__text" bis_skin_checked="1"><?php echo $new_tmp->getOverview(); ?></div>
                                    </div>
                                 </div>
                                 <?php   }
                                 
                                 ?>
                              </div>
   
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-3" bis_skin_checked="1">
                     <div class="news-col news-hor" bis_skin_checked="1">
                        <div class="card news-section" bis_skin_checked="1">
                           <div class="card-header" bis_skin_checked="1">
                              <h2 class="card-title">Xem nhiều</h2>
                           </div>
                           <div class="card-body" bis_skin_checked="1">
                              <ul class="news-mostView">
                                 <li>
                                    <span>1</span>
                                    <a href="/tin-tuc/tin-moi/nguyen-mau-iphone-dau-tien-duoc-ban-voi-gia-500-000-usd-147247">
                                       <h3>Màn hình MSI MD241P Utramarine: Thiết kế đỉnh cao, lựa chọn tinh tế!</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <span>2</span>
                                    <a href="/tin-tuc/tin-moi/apple-bat-ngo-tang-gia-iphone-tai-nhat-ban-147324">
                                       <h3>Đập hộp dàn Mainboard Z490 siêu khủng của ASUS - Phổ cập Thunderbolt 3 đến mọi nhà</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <span>3</span>
                                    <a href="/tin-tuc/tin-moi/ios-15-6-va-ipados-15-6-beta-4-duoc-phat-hanh-147155">
                                       <h3>G.SKILL Trident Z Royal đạt kỷ lục thế giới DDR4-6666Mhz với ASUS ROG</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <span>4</span>
                                    <a href="/tin-tuc/tin-moi/xiaomi-mi-band-7-pro-bat-ngo-lo-dien-voi-man-hinh-sieu-lon-147276">
                                       <h3>Cấu Hình PC Chơi Liên Minh Huyền Thoại "10 NĂM KHÔNG HỎNG" Của Nữ MC-Streamer Minh Nghi</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <span>5</span>
                                    <a href="/tin-tuc/tin-moi/brazil-buoc-apple-su-dung-cong-usb-c-cho-iphone-147301">
                                       <h3>Khi Độ Mixi Đi Lượn Phố Vớ Được Hàng Khủng... Màn Hình Cực Nét Thì Stream Đến Bao Giờ??</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <span>6</span>
                                    <a href="/tin-tuc/danh-gia/tren-tay-oppo-a57-147296">
                                       <h3>Cooler Master Làm Tai Nghe Chơi Game Có NGON NHƯ LỜI ĐỒN? | Đánh Giá Tai Nghe Gaming Cooler Master</h3>
                                    </a>
                                 </li>
                              </ul>
                              <style>					       .news-mostView li a{					                  color:#3d3d3d;					                }			                </style>
                           </div>
                        </div>
                        <div class="card news-section" bis_skin_checked="1">
                           <div class="card-header" bis_skin_checked="1">
                              <h2 class="card-title">Sản phẩm mới</h2>
                           </div>
                           <div class="card-body" bis_skin_checked="1">
                              <ul class="new-product">
                                 <li class="new-product__item">
                                    <a class="new-product__item__img" href="/tin-tuc/san-pham/oppo-reno7-5g-39510"><img src="https://www.tncstore.vn/image/cache/catalog/M%C3%A0n%20H%C3%ACnh%20BenQ/xl2546k/man-hinh-benq-zowie-xl2546k-01-500x500.png" width="80" height="80"></a>
                                    <div class="new-product__item__info" bis_skin_checked="1">
                                       <a href="/tin-tuc/san-pham/oppo-reno7-5g-39510">
                                          <h3 class="new-product__title">Màn Hình Gaming BenQ ZOWIE XL2546K TN /Full HD/ 240Hz</h3>
                                       </a>
                                       <p><a class="new-product__post" href="/tin-tuc/san-pham/oppo-reno7-5g-39510">46 bài viết</a></p>
                                    </div>
                                 </li>
                                 <li class="new-product__item">
                                    <a class="new-product__item__img" href="/tin-tuc/san-pham/samsung-galaxy-a53-128gb-39901"><img src="https://www.tncstore.vn/image/cache/catalog/laptop/laptop%20acer/Triton%20500%20SE%20PT516/laptop-acer-gaming-predator-triton-500-se-pt516-52s-91xh-1-228x228.jpg" width="80" height="80"></a>
                                    <div class="new-product__item__info" bis_skin_checked="1">
                                       <a href="/tin-tuc/san-pham/samsung-galaxy-a53-128gb-39901">
                                          <h3 class="new-product__title">Laptop Acer Gaming Predator Triton 500 SE PT516-52s-91XH i9</h3>
                                       </a>
                                       <p><a class="new-product__post" href="/tin-tuc/san-pham/samsung-galaxy-a53-128gb-39901">52 bài viết</a></p>
                                    </div>
                                 </li>
                                 <li class="new-product__item">
                                    <a class="new-product__item__img" href="/tin-tuc/san-pham/samsung-galaxy-z-fold3-5g-256gb-36495"><img src="https://www.tncstore.vn/image/cache/catalog/laptop/asus/G15%20GA503QM-HQ097T/laptop-asus-rog-zephyrus-g15-g503qm-hq097t-1-228x228.jpg"  width="80" height="80"></a>
                                    <div class="new-product__item__info" bis_skin_checked="1">
                                       <a href="/tin-tuc/san-pham/samsung-galaxy-z-fold3-5g-256gb-36495">
                                          <h3 class="new-product__title">Laptop Asus ROG Zephyrus G15 GA503RW-LN100W Ryzen™ 7-</h3>
                                       </a>
                                       <p><a class="new-product__post" href="/tin-tuc/san-pham/samsung-galaxy-z-fold3-5g-256gb-36495">117 bài viết</a></p>
                                    </div>
                                 </li>
                                 <li class="new-product__item">
                                    <a class="new-product__item__img" href="/tin-tuc/san-pham/samsung-galaxy-z-flip3-5g-128gb-35874"><img src="https://www.tncstore.vn/image/cache/catalog/laptop/asus/SCAR%2017%20G733ZX-LL016W/asus%20strix-228x228.jpg" width="80" height="80"></a>
                                    <div class="new-product__item__info" bis_skin_checked="1">
                                       <a href="/tin-tuc/san-pham/samsung-galaxy-z-flip3-5g-128gb-35874">
                                          <h3 class="new-product__title">Laptop Asus ROG Strix SCAR 17 G733ZX-LL016W i9-12900H /</h3>
                                       </a>
                                       <p><a class="new-product__post" href="/tin-tuc/san-pham/samsung-galaxy-z-flip3-5g-128gb-35874">76 bài viết</a></p>
                                    </div>
                                 </li>
                              </ul>
                           
                           </div>
                        </div>
                        <div class="card news-section" bis_skin_checked="1">
                           <div class="card-header" bis_skin_checked="1">
                              <h2 class="card-title">Khuyến mãi</h2>
                           </div>
                           <ul class="promo__list">
                              <?php
                                  $listPromotion=$newss->getPromotion();
                                  foreach($listPromotion as $promotion){
                                    $path3=$promotion->getTitle();
                                    $path3=str_replace(' ','-',$path3);
                              ?> 
                                 <li class="promo__item" id="<?php echo $promotion->getNews_id(); ?>">
                                 <a href="<?php echo "newsdetail/".$promotion->getNews_id()."/".$path3 ?>" class="promo__link">
                                    <span><img style="width:300px; height:200px;" src="public/img/news/<?php echo $promotion->getNews_id(); ?>_image1.png"></span>
                                    <h3 class="promo__title"><?php echo $promotion->getTitle(); ?></h3>
                                 </a>
                              </li>

                              <?php      
                                  }
                              
                              ?>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </body>
</html>