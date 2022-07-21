<?php session_start();
	require_once ROOT . DS . 'application' . DS . 'products' . DS . 'MouseProductsApplication.php';
  require_once ROOT . DS . 'application' . DS .'products' . DS . 'SupplierApplication.php';
  require_once ROOT . DS . 'application' . DS .'products' . DS . 'RamApplication.php';
  require_once ROOT . DS . 'application' . DS .'products' . DS . 'CardApplication.php';
  require_once ROOT . DS . 'application' . DS . 'products' . DS . 'MemoryApplication.php';
  require_once ROOT . DS . 'application' . DS .'FilterApplication.php';
  require_once ROOT . DS . 'application' . DS . 'products' . DS . 'CPUApplication.php';
  require_once ROOT . DS . 'application'. DS . 'NewsApplication.php';
  $app=new FilterApplication();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/main_header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/main_banner.css">
    <link rel="stylesheet" href="public/css/main_product.css">
    <link rel="stylesheet" href="public/css/footer_container.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="public/css/nav_bar.css" >
   
    <!-- <link rel="stylesheet" href="public/fonts/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/daab9b5831.js" crossorigin="anonymous"></script> -->

</head>
<body>
    <div class="app">
        <?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
        <div class="container">
            <main>
           

                    <div class="cdt-banner m-b-20">
                        <div class="img-slider" >
                        <?php $newss=new NewsApplication();
                                           $news_discounts=$newss->getPromotion();
                                           $cnt_newsdis=1;
                                           foreach($news_discounts as $news_discount){  
                                            if ($cnt_newsdis<=10){                                    
                                           $path=$news_discount->getTitle();
                                           $path = str_replace(' ', '-', $path);?>
                              <div class="slide" style="height:100%;">
                              <a href="<?php echo "newsdetail/".$news_discount->getNews_id()."/".$path ?>">
                              <img style="height:100%; object-fit:inherit;" src="public/img/news/<?php echo $news_discount->getNews_id(); ?>_image1.png" alt="">
                              </a>                                                       
                            </div>
                                         <?php
                                           }
                                           $cnt_newsdis++;}?>
                            
                            <div class="navigation">
                              <div class="btn active"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                              <div class="btn"></div>
                            </div>
                          </div>
                      
                          <script type="text/javascript">
                          var slides = document.querySelectorAll('.slide');
                          var btns = document.querySelectorAll('.btn');
                          let currentSlide = 1;
                          slides[0].classList.add('active');
                      
                          // Javascript for image slider manual navigation
                          var manualNav = function(manual){
                            slides.forEach((slide) => {
                              slide.classList.remove('active');
                      
                              btns.forEach((btn) => {
                                btn.classList.remove('active');
                              });
                            });
                      
                            slides[manual].classList.add('active');
                            btns[manual].classList.add('active');
                          }
                      
                          btns.forEach((btn, i) => {
                            btn.addEventListener("click", () => {
                              manualNav(i);
                              currentSlide = i;
                            });
                          });
                      
                          // Javascript for image slider autoplay navigation
                          var repeat = function(activeClass){
                            let active = document.getElementsByClassName('active');
                            let i = 1;
                      
                            var repeater = () => {
                              setTimeout(function(){
                                [...active].forEach((activeSlide) => {
                                  activeSlide.classList.remove('active');
                                });
                      
                              slides[i].classList.add('active');
                              btns[i].classList.add('active');
                              i++;
                      
                              if(slides.length == i){
                                i = 0;
                              }
                              if(i >= slides.length){
                                return;
                              }
                              repeater();
                            }, 10000);
                            }
                            repeater();
                          }
                          repeat();
                          </script>

                    </div>

                    <div class="row fspdbox">

                      <div class="col-3 p-8 p-r-3=">
                      <div class="cdt-filter">
                            <!-- left menu supplier -->
                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >Hãng sản xuất

                            </div>

                            <div class="cdt-filter__checklist listfilterv4 filterBrand">
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('nha-san-xuat','all') ||$app->checkAll('nha-san-xuat')) : ?>active <?php endif;?>">
                                <a href="<?php echo $app->getHrefAll('nha-san-xuat');?>" title="Tất cả">
                                <i class="fa-thin fa-square"></i> Tất cả</a>
                              </div>
                              <?php 
                                 
                                 $data_url=$app->getUrl();
                                 $sup= new SupplierApplication();
                                 $listsupplier=$sup->getAll();
                                
                                 foreach($listsupplier as $supplier){
                                  $supplier1=$supplier->getSupplier();
                                  $result=$app->getHref('nha-san-xuat',$supplier1);
                              ?> 
                              <div class="checkbox frowitem <?php if ($app->check('nha-san-xuat',$supplier1)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $result?>" title="<?php echo $supplier->getSupplier(); ?>">
                                  <i class="fa-thin fa-square"></i>                                  
                                  <label for=""> <?php echo $supplier->getSupplier(); ?></label>
                                  
                                </a>
                              </div>

                              <?php
                                 }
                              ?>                             

                            </div>
                          </div>

                          <div class="cdt-filter__block">
                            <div class="cdt-filter__title">Mức giá</div>

                            <div class="cdt-filter__checklist listfilterv4  filterPrice">
                              
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('muc-gia','all') ||$app->checkAll('muc-gia')) : ?>active <?php endif;?> ">
                                <a href="<?php echo $app->getHrefAll('muc-gia');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('muc-gia',1)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('muc-gia',1);?>" title="Dưới 10 triệu">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Dưới 10 triệu</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('muc-gia',2)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('muc-gia',2);?>" title="Từ 10-15 triệu">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Từ 10-15 triệu</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('muc-gia',3)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('muc-gia',3);?>" title="Từ 15-20 triệu">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Từ 15-20 triệu</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('muc-gia',4)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('muc-gia',4);?>" title="Từ 20-25 triệu">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Từ 20-25 triệu</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('muc-gia',5)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('muc-gia',5);?>" title="Trên 25 triệu">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Trên 25 triệu</label>
                                  
                                </a>
                              </div>
                            </div>


                          </div>

                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >Màn hình

                            </div>

                            <div class="cdt-filter__checklist listfilterv4 ">
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('man-hinh','all') ||$app->checkAll('man-hinh')) : ?>active <?php endif;?>">
                                <a href="<?php echo $app->getHrefAll('man-hinh');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('man-hinh','13 inch')) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('man-hinh','13 inch');?>" title="Khoảng 13 inch">

                                  <i class="fa-thin fa-square"></i>
                                  <label>Khoảng 13 inch</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('man-hinh','14 inch')) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('man-hinh','14 inch');?>" title="Khoảng 14 inch">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Khoảng 14 inch</label>
                                  
                                </a>
                              </div>

                              <div class="checkbox frowitem <?php if ($app->check('man-hinh','15 inch')) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('man-hinh','15 inch');?>" title="Trên 15 inch">

                                  <i class="fa-thin fa-square"></i>
                                  <label for="">Trên 15 inch</label>
                                  
                                </a>
                              </div>

                              

                            </div>




                          </div>

                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >RAM
                            </div>

                            <div class="cdt-filter__checklist listfilterv4 ">
                              
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('RAM','all') ||$app->checkAll('RAM')) : ?>active <?php endif;?>"> 
                                <a href="<?php echo $app->getHrefAll('RAM');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>
                              <?php  
                                 $ram_app=new RamApplication();
                                 $listram=$ram_app->getAll();
                                 foreach($listram as $ram){
                                  $href_ram=$app->getHref('RAM',$ram->getRam());
                                  $ram_tmp=$ram->getRam();
                                  ?>
                                  <div class="checkbox frowitem <?php if ($app->check('RAM',$ram_tmp)) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $href_ram; ?>" title="<?php echo $ram->getRam(); ?>">

                                  <i class="fa-thin fa-square"></i>
                                  <label><?php echo $ram->getRam(); ?></label>
                                  
                                </a>
                              </div>
                              <?php    
                                 }
                              ?>                              
                            </div>
                          </div>

                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >CPU

                            </div>

                            <div class="cdt-filter__checklist listfilterv4 ">
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('CPU','all') ||$app->checkAll('CPU')) : ?>active <?php endif;?>">
                                <a href="<?php echo $app->getHrefAll('CPU');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>
                              <?php 
                                 $cpu_tmp=new CPUApplication();
                                 $listcpu=$cpu_tmp->getAll();
                                 foreach($listcpu as $cpu){
                                  $href_cpu=$app->getHref('CPU',$cpu->getCPU());

                              ?>
                               <div class="checkbox frowitem <?php if ($app->check('CPU',$cpu->getCPU())) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $href_cpu; ?>" title="<?php echo $cpu->getCPU(); ?>">

                                  <i class="fa-thin fa-square"></i>
                                  <label><?php echo $cpu->getCPU();?></label>
                                  
                                </a>
                              </div>
                              <?php    
                                 }
                              ?>
                            </div>
                          </div>

                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >Card Đồ Hoạ</div>

                            <div class="cdt-filter__checklist listfilterv4 ">
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('Card-do-hoa','all') ||$app->checkAll('Card-do-hoa')) : ?>active <?php endif;?>">
                                <a href="<?php echo $app->getHrefAll('Card-do-hoa');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>
                               <?php 
                                  $app_card=new CardApplication();
                                  $listcard=$app_card->getAll();
                                  foreach($listcard as $card){
                                ?>
                                  <div class="checkbox frowitem <?php if ($app->check('Card-do-hoa',$card->getCard())) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('Card-do-hoa',$card->getCard()); ?>" title="<?php echo $card->getCard(); ?>">

                                  <i class="fa-thin fa-square"></i>
                                  <label><?php echo $card->getCard(); ?></label>
                                  
                                </a>
                              </div>
                                <?php
                                  }
                               ?>                                                                 
                            </div>
                          </div>

                          <div class="cdt-filter__block">
                            
                            <div class="cdt-filter__title" >Ổ cứng</div>

                            <div class="cdt-filter__checklist listfilterv4 ">
                              <div class="checkbox checkboxAll frowitem <?php if ($app->check('o-cung','all') ||$app->checkAll('o-cung')) : ?>active <?php endif;?>">
                                <a href="<?php echo $app->getHrefAll('o-cung');?>" title="Tất cả">
                                  <i class="fa-thin fa-square"></i>Tất cả</a>
                              </div>
                              <?php 
                                $app_memory=new MemoryApplication();
                                $listmemory=$app_memory->getAll();
                                foreach($listmemory as $memory){
                              ?>
                              <div class="checkbox frowitem <?php if ($app->check('o-cung',$memory->getMemory())) : ?>active <?php endif;?>" >
                                <a href="filter&<?php echo $app->getHref('o-cung',$memory->getMemory());?>" title="<?php echo $memory->getMemory(); ?>">

                                  <i class="fa-thin fa-square"></i>
                                  <label><?php echo $memory->getMemory(); ?></label>
                                   
                                </a>
                              </div>
                              
                              <?php
                                }
                               ?>                                                                               
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="col-9 p-0">
                        <div class="card fplistbox">
                          
                         <!-- // Sản phẩm -->
                            <div class="cdt-product-wrapper m-b-20">
                              <?php
                                  //get all laptop 
                                  $apps=new LaptopApplication();
                                  $listLaptop=$apps->getAll();
                                  foreach($listLaptop as $laptop){
                                    $path = $laptop->getModel();
					                          $path = str_replace(' ', '-', $path);
                              ?>
                                  <div class="cdt-product prd-lap product-sale">
                                <div class="cdt-product__img" style="background-image: url(public/img/Img_product/backgroundproduct.webp); background-position: center center;
                                background-repeat: no-repeat;">
                                  <a href="<?php echo "details/".$laptop->getProductID()."/".$path; ?>" title="<?php  echo $laptop->getModel(); ?> ">
                                    <img src="public/img/products/<?php echo $laptop->getProductID(); ?>_image1.webp" alt="" height="215">
                                  </a>

                                  <div class="cdt-product__label">
                                    <span class="badge badge-warning">Trả góp 0%</span>
                                    <span class="badge badge-primary">Giảm 3.500.000đ</span>
                                  </div>

                                </div>

                                <div class="cdt-product-info">
                                  <h3><a href="<?php echo "details/".$laptop->getProductID()."/".$path; ?>" title="<?php echo $laptop->getModel(); ?>"
                                   class="cdt-product__name"><?php echo $laptop->getModel(); ?></a>
                                  </h3>

                                  <div class="cdt-product__show-promo">
                                    <div class="progress pdiscount2"><?php echo $laptop->getPrice(); ?> ₫
                                      <div class="progress-bar" style="width: 87%;"></div>
                                    </div>
                                    <div class="strike-price"><strike><?php echo $laptop->getPrice()+2000000 ;?>₫</strike></div>
                                  </div>

                                  <div class="cdt-product__config">
                                    <div class="cdt-product__config__param">
                                      <span data-title="Màn hình">
                                        <i class="fa-thin fa-laptop"></i><?php echo $laptop->getScreen(); ?></span>
                                        <span data-title="CPU"><i class="fa-solid fa-microchip"></i><?php echo $laptop->getCpu(); ?></span>
                                        <span data-title="RAM"><i class="fa-solid fa-memory"></i><?php echo $laptop->getRam(); ?></span>
                                        <span data-title="Ổ cứng"><i class="fa-solid fa-hard-drive"></i><?php echo $laptop->getMemory();?> GB</span>
                                        <span data-title="Đồ họa"><i class="fa-brands fa-fantasy-flight-games"></i><?php echo $laptop->getCard(); ?></span>
                                        <span data-title="Trọng lượng"><i class="fa-solid fa-weight-hanging"></i><?php echo $laptop->getWeigh(); ?> kg</span>
                                    </div>

                                  </div>

                                  <div class="cdt-product__btn">
                                    <a href="" class="btn btn-primary btn-sm btn-main">MUA NGAY</a>
                                    <a href="" class="btn btn-secondary btn-sm btn-sub">SO SÁNH</a>
                                  </div>
                                </div>

                              </div>
                              
                        
                             <?php 
                             }
                             ?>

                            </div>

                            <div class="cdt-product--loadmore">
                              <a class="btn btn-light">Xem thêm</a>
                            </div>



                          </div>


                        </div>
                
                      </div>


                    </div>

                </div>

            </main>

        </div>
    </div>
    <script type="text/javascript" src="public/javascript/product.js"></script>

