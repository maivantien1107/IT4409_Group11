<?php
global $path_project;
?>

<div class="nav_bar">
	<div class="logo">
		<a href=<?php echo "/" . $path_project . "/" ?> style="font-weight:900; font-size:20px"> Group 11</a>
	</div>
	<div class="fs-search">
                            <form action="" method="get" autocomplete="off">
                                <label for="key" class="mf-vhiditem">Nhập tên điện thoại, máy tính, phụ kiện... cần tìm</label>
                                <input class="fs-stxt" type="text" id="key" name="" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" autocomplete="off" maxlength="50">
                                <span class="icon-cance" id="icon-cance" style="display:none" title="Xóa">✕</span>
                                <button type="submit" aria-label="Tìm kiếm" class="search-button" title="Tìm kiếm">
                                <i class="fa-light fa-magnifying-glass"></i>
                                </button>
                                <div class="fs-sresult" id="result" style="display : none !important;">
                                    <div class="fs-sremain">
                                        <ul></ul>
                                    </div>
                                </div>
                                
                                <div class="fs-result suggest-box sugg-his" style="display: none;">
                                    <div class="suggest-title">Lịch sử tìm kiếm
                                        <span class="ic-clear">Xóa</span>
                                    </div>
                                    <ul>
                                    </ul>
                                </div>
                                <div class="fs-result suggest-box suggest-box-propensity" style="display: none;">
                                    <div class="suggest-title">Xu hướng tìm kiếm
                                    </div>
                                    <ul>
                                    </ul>
                                </div>
                                <div class="fs-result suggest suggest-box" style="display: none;">
                                    <div class="suggest-left">
                                    <div class="fs-result-box fs-suggest-page" style="display: none;">
                                                
                                        </div>
                                        <div class="fs-result-box fs-suggest-text">
                                            <ul></ul>
                                        </div>
                                        <!--<div class="line"></div> -->
                                        <div class="fs-result-box fs-suggest-cate">
                                            <ul></ul>
                                        </div>
                                    </div>
                                    <div class="suggest-right">
                                        <div class="fs-result-box fs-suggest-product">
                                            <div class="suggest-title">Sản phẩm được tìm nhiều
                                            </div>
                                            <ul></ul>
                                            <div class="suggest-title suggest-news">Bài viết được tìm nhiều
                                            </div>
                                            <ul class="news-list"></ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end new -->
                            </form>
                        </div>
	<nav id = "nav">
			<ul id = "menuitem">
				<li><a href=<?php echo "/" . $path_project . "/"?>><span>Trang chủ</span></a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "news" ?>>Tin tức</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "products" ?>>Sản phẩm</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "contact" ?>>Liên hệ</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "login" ?>>
				<?php  
				   if (isset($_SESSION['username'])!=''){
					echo $_SESSION['username'];
				   }
				   else {
					echo 'Đăng nhập';
				   }

				?>
			
			</a></li>
			    <?php 
				    if (isset($_SESSION['username'])!=''){
						?>
					<li><a href="validate/logout.php">Logout</a></li>
					<?php 
					}
				?>
			</ul>

	</nav>
	<div class="cart-logo">
		<a href=<?php echo "/" . $path_project . "/" . "cart" ?>><img src=<?php echo "/" . $path_project . "/" . "images/logo1/cart.png" ?> width="30px"> &nbsp;</a>
		
		<!-- <div class="menu"> -->
		<img src=<?php echo "/" . $path_project . "/" . "images/logo/menu.png" ?> alt="" class = "menu" onclick="menuToggle()" />
		<!-- </div> -->
	</div>
</div>
<script type="text/javascript" src = <?php echo "/" . $path_project . "/" . "public/javascript/nav_bar.js" ?>></script>
