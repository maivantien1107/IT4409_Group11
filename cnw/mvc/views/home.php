<?php session_start();
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'LaptopApplication.php';
require_once ROOT . DS . 'application' . DS . 'NewsApplication.php';
require_once ROOT . DS . 'application'.DS.'RateApplication.php';
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="public/css/home.css" type="text/css">
		<link rel="stylesheet" href="public/css/footer_container.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="public/css/nav_bar.css" >
		<link rel="stylesheet" href="public/css/news_home_style.css">
		<link rel="stylesheet" href="public/css/productdetail.css">
		<link rel="stylesheet" href="public/html/assets/fonts/fontawesome-free-6.1.1-web/css/all.css">
		<script>
			var cnt = 1;
			function convert(){
					cnt++; if(cnt == 100) cnt = 0;
					var col_1 = document.getElementById("col-2-1");
					var col_2 = document.getElementById("col-2-2");
					var img_1 = document.getElementById("img-1");
					var img_2 = document.getElementById("img-2");

					if(cnt % 2 == 0){
							col_2.style.display = "";
							img_2.style.display = "";
							col_1.style.display = "none";
							img_1.style.display = "none";

					} else {
							col_1.style.display = "";
							img_1.style.display = "";
							col_2.style.display = "none";
							img_2.style.display = "none";
					}

					// console.log(col_2.style.display);
					// console.log(col_1.style.display)
			}
		</script>
		<title>Home | Group 11</title>
	</head>
	<body>
		<!-- includes nav bar -->
		<?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
		
        <div class="root">
		<div class="slideshow-container">
			<div class="slides" id="home">
				<div class="row-img">
					<div class="col-2" id="col-2-1" style="padding-left:10%;">
						<h1>Hãy đến với chúng tôi để tìm ra sản phẩm phù hợp với bạn nhất</h1><br>
						<q>Khai thông sức mạnh, dẫn đâu xu hướng</q><br>
						<a href="products" class = "btn">Sản phẩm&#8594;</a>
					</div>
					<div class="col-2" id="col-2-2" style="padding-left:10%; display : none">
						<h1>Hiểu biết hơn về chính sách và khuyến mãi của chúng tôi</h1><br>
						<q>Group 11</q><br>
						<a href="news" class = "btn">Xem tin tức&#8594;</a>
					</div>
					<div class="col-2" style="min-height : 648px;">
						<img id="img-1" >
						<img id="img-2"  style="display:none">
					</div>
					<a class="prev" onclick="convert()">&#10094;</a>
			    <a class="next" onclick="convert()">&#10095;</a>
				</div>
				<div class="about-list">
					<a href="products"><img id="about1" src="public/images/logo/about1.png"></a>
					<a href="news"><img id="about2" src="public/images/logo/about2.png"></a>
					<div class="news-info">
						<div class="news-header">
						<h3>Thông tin nổi bật</h3>
						<a href="news" class="news-header-list">Xem tất cả</a>
						</div>
						<div class="news-top__right" bis_skin_checked="1">
                                 <div id="news-hor" bis_skin_checked="1">
                                    <?php 
									$newss=new NewsApplication();
                                       $news=$newss->getAll(1,3);
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
			</div>			
		</div>

		<div class="categories">
			<div class="small-container">
				<h1 class = "title">Danh mục sản phẩm</h1>
				<div class="box-list">
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Asus">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/asus.png">
								</picture>
								<div class="box-product-item-text">Laptop Asus</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Acer">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/acer.png">
								</picture>
								<div class="box-product-item-text">Laptop Acer</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Apple">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/apple.png">
								</picture>
								<div class="box-product-item-text">Laptop Apple</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Avita">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/avita.png">
								</picture>
								<div class="box-product-item-text">Laptop Avita</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Chuwi">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/chuwi.png">
								</picture>
								<div class="box-product-item-text">Laptop Chuwi</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Dell">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/dell.png">
								</picture>
								<div class="box-product-item-text">Laptop Dell</div>
							</div>
						</a>
					</div>
					
				</div>
				<div class="box-list">
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Lenovo">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/lenovo.png">
								</picture>
								<div class="box-product-item-text">Laptop Lenovo</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=HP">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/hp.png">
								</picture>
								<div class="box-product-item-text">Laptop HP</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=MSI">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/msi.png">
								</picture>
								<div class="box-product-item-text">Laptop MSI</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Gigabyte">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/gigabyte.png">
								</picture>
								<div class="box-product-item-text">Laptop Gigabyte</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="filter&nha-san-xuat=Microsoft">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/microsoft.png">
								</picture>
								<div class="box-product-item-text">Laptop Microsoft</div>
							</div>
						</a>
					</div>
					<div class="col6-no box-product">
						<a href="products">
							<div class="box-product-item">
								<picture class="picture">
								<img src="public/images/logo/laptop.png">
								</picture>
								<div class="box-product-item-text">Laptop cũ</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="featured_products">
			<div class="small-container">
				<h1 class = "title">Sản phẩm mới nhất</h1>
				<div class="row">
					<!-- insert new products -->
					<?php $service = new LaptopApplication();
					$listLaptop = $service->getAll();
					$cnt = 0;
					foreach ($listLaptop as $laptop){
					$path = $laptop->getModel();
					$path = str_replace(' ', '-', $path);
					$cnt++;
					?>
					<div class="col-3">
						<a href="<?php echo "details/" . $laptop->getProductID() . "/" . $path ?>"><img src="public/img/products/<?php echo $laptop->getProductID(); ?>_image1.png"></a>
						<h3> <a href="<?php echo "details/".$laptop->getProductID()."/".$path; ?>"
						 title="<?php echo $laptop->getModel(); ?>" class="cdt-product__name"><?php echo $laptop->getModel(); ?></a></h3>
				
				<div class="group_price-value">
				 <p><?php echo $laptop->getPrice() . " VNĐ" ?></p>
				 </div>
				 <div class="st-rating">
					<?php 
					$app_rate=new RateApplication();
					$proid_rate=$laptop->getProductID();
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
					
				</div>
			</div>
			<?php
			if($cnt > 2) break;
			}
			?>
				</div>
			</div>
		</div>
		<!-- still not used -->
		<div class="special_offer">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<!-- <img src=""> -->
					</div>
					<div class="col-2">
						<h1></h1>
						<p></p>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="advertising">
			<img src=<?php echo "/" . $path_project . "/" . "images/background/discount.jpg"?> height="500rem"><br /><br /><br /><br />
		</div> -->
		<!-- Js for slide show -->
		<script type="text/javascript" src="public/javascript/home.js"></script>
