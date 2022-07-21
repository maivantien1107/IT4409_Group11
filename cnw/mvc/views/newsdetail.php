<?php
require_once ROOT . DS . 'application'. DS . 'NewsDescriptionApplication.php';
require_once ROOT . DS . 'application'. DS . 'NewsApplication.php';
$path=$news_detail->getTitle();
$path = str_replace(' ', '-', $path);

?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <meta charset="UTF-8">
      <meta name = "viewport" content="width = device-width, initial-sacale = 1.0">
      <link rel="stylesheet" href="../../public/css/home.css" type="text/css">
		<link rel="stylesheet" href="../../public/css/footer_container.css" type="text/css">
      <link rel="stylesheet" href="../../public/css/news_detail_style.css">
      <link rel="stylesheet" href="../../public/fonts/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="../../public/css/nav_bar.css" >
      <script src="https://kit.fontawesome.com/daab9b5831.js" crossorigin="anonymous"></script>
      <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
   </head>
   <body>
      <?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php';?>
      <div id="root" bis_skin_checked="1">
    </div>
    <div class="container single-post" bis_skin_checked="1">
        <div class="breadcrumb" bis_skin_checked="1">
           <ul class="breadcrumb__list">
              <li><a href="/cnw-1/home"><i aria-hidden="true" class="fa fa-home"></i></a> <i aria-hidden="true" class="ti-angle-right"></i></li>
              <li><a href="/cnw-1/news">Tin Tức</a> <i aria-hidden="true" class="ti-angle-right"></i></li>
              <li><a href="<?php echo "/cnw/newsdetail/".$news_detail->getNews_id()."/".$path;?>"><?php echo $news_detail->getTitle(); ?></a></li>
           </ul>
        </div>
        <div class="content" bis_skin_checked="1">
           <h1 class="post_title"><?php echo $news_detail->getTitle(); ?></h1>
           <div class="post_meta" bis_skin_checked="1">
              <span><?php echo $news_detail->getTime(); ?></span> 
              <div class="share hidden-xs" bis_skin_checked="1">
                 <a href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM20.0172 15.9276C19.8136 16.8111 19.0908 17.4635 18.2208 17.5607C16.1613 17.7903 14.0762 17.7918 11.9992 17.7903C9.92297 17.7918 7.83782 17.7903 5.77772 17.5607C4.9075 17.4636 4.18481 16.8111 3.98221 15.9276C3.69231 14.6697 3.69231 13.2955 3.69231 11.9999C3.69231 10.7044 3.69574 9.33078 3.98537 8.07291C4.18797 7.18855 4.91093 6.53702 5.78004 6.43991C7.84035 6.20967 9.9264 6.20877 12.0026 6.20967C14.0786 6.20883 16.1639 6.20967 18.224 6.43991C19.0942 6.53702 19.8169 7.18855 20.0204 8.07291C20.3103 9.33078 20.3077 10.7044 20.3077 11.9999C20.3077 13.2955 20.3068 14.6697 20.0172 15.9276Z" fill="#F9495F"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.85547 14.5791C11.6208 13.6637 13.3704 12.7559 15.1375 11.8398C13.3653 10.9152 11.6159 10.0031 9.85547 9.08447V14.5791Z" fill="#F9495F"></path>
                    </svg>
                 </a>
                 <a href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM15.8771 6.60485H14.0012C13.6297 6.60485 13.2547 6.98885 13.2547 7.27453V9.18736H15.8734C15.768 10.6541 15.5515 11.9954 15.5515 11.9954H13.2413V20.3077H9.7987V11.9945H8.12287V9.19733H9.7987V6.91042C9.7987 6.49224 9.71399 3.69236 13.326 3.69236H15.8772V6.60485H15.8771Z" fill="#005EC4"></path>
                    </svg>
                 </a>
                 <a href="#" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 4C0 1.79086 1.79086 0 4 0H20C22.2091 0 24 1.79086 24 4V20C24 22.2091 22.2091 24 20 24H4C1.79086 24 0 22.2091 0 20V4Z" fill="white"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM18.6066 8.61146C18.6131 8.75773 18.6165 8.90479 18.6165 9.05243C18.6165 13.5572 15.1878 18.7514 8.91766 18.7514C6.9926 18.7514 5.20077 18.1871 3.69226 17.2198C3.95895 17.2515 4.23022 17.2676 4.50546 17.2676C6.10254 17.2676 7.57234 16.7227 8.73906 15.8082C7.24737 15.7808 5.9884 14.7952 5.55455 13.4409C5.7628 13.4808 5.97637 13.5022 6.19601 13.5022C6.5069 13.5022 6.80809 13.4604 7.09414 13.3826C5.53477 13.0693 4.35967 11.6917 4.35967 10.0401C4.35967 10.0257 4.35967 10.0114 4.35998 9.99719C4.81952 10.2525 5.34509 10.4059 5.90395 10.4236C4.9892 9.81231 4.38757 8.76886 4.38757 7.58632C4.38757 6.96153 4.55567 6.37604 4.84916 5.87246C6.53037 7.93493 9.0422 9.29196 11.8753 9.43427C11.8171 9.18467 11.7868 8.92447 11.7868 8.65735C11.7868 6.77491 13.3132 5.24867 15.1956 5.24867C16.1762 5.24867 17.0621 5.66258 17.6839 6.32503C18.4603 6.17233 19.1899 5.88849 19.8485 5.4979C19.5941 6.29396 19.0536 6.96185 18.3497 7.38382C19.0393 7.30138 19.6962 7.11808 20.3076 6.84696C19.8507 7.53051 19.2728 8.13094 18.6066 8.61146Z" fill="#68AEFA"></path>
                    </svg>
                 </a>
                 <a href="#" rel="me" class="ss-social-pinterest">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1164 5.50146H7.88475C6.57101 5.50146 5.50195 6.57045 5.50195 7.88426V16.1159C5.50195 17.4299 6.57101 18.4989 7.88475 18.4989H16.1164C17.4304 18.4989 18.4994 17.4299 18.4994 16.1159V7.88426C18.4994 6.57052 17.4304 5.50146 16.1164 5.50146ZM12.0004 16.2788C9.64136 16.2788 7.72182 14.3592 7.72182 11.9999C7.72182 9.64087 9.64136 7.72133 12.0004 7.72133C14.3597 7.72133 16.2793 9.64087 16.2793 11.9999C16.2793 14.3592 14.3597 16.2788 12.0004 16.2788ZM16.4169 8.6061C15.8584 8.6061 15.4043 8.15195 15.4043 7.59375C15.4043 7.03549 15.8584 6.58133 16.4169 6.58133C16.9751 6.58133 17.4293 7.03549 17.4293 7.59375C17.4293 8.15202 16.9751 8.6061 16.4169 8.6061Z" fill="#FF8F02"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM20.3066 16.1158C20.3066 18.427 18.427 20.3066 16.1159 20.3066H7.8842C5.57328 20.3066 3.69336 18.427 3.69336 16.1158V7.8842C3.69336 5.57328 5.57328 3.69336 7.8842 3.69336H16.1159C18.427 3.69336 20.3066 5.57328 20.3066 7.8842V16.1158Z" fill="#FF8F02"></path>
                    </svg>
                 </a>
              </div>
           </div>
           <div class="post_content" bis_skin_checked="1">
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><i style="font-family: &quot ; Chakra Petch&quot ; background-color: transparent; font-size: 18px; white-space: pre-wrap;"><?php echo $news_detail->getDescription(); ?></i><br></p>
              <p dir="ltr" style="text-align: center; line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><img src="../../public/img/news/<?php echo $news_detail->getNews_id();?>_image1.png" style="width: 730px;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><i><br></i></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php echo $news_detail->getDes1(); ?></font></span></p>
              <p dir="ltr" style="text-align: center; line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><img src="../../public/img/news/<?php echo $news_detail->getNews_id();?>_image2.png"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><br></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php $news_detail->getDes2(); ?></font></span></p>
              <p dir="ltr" style="text-align: center; line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><img src="../../public/img/news/<?php echo $news_detail->getNews_id();?>_image3.png" style="width: 730px;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><br></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php echo $news_detail->getDes3(); ?></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php echo $news_detail->getDes4(); ?></font></span></p>
              <p dir="ltr" style="text-align: center; line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><img src="../../public/img/news/<?php echo $news_detail->getNews_id();?>_image4.png" style="width: 730px;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><br></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php echo $news_detail->getDes5(); ?></font></span></p>
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><font face="Chakra Petch"><?php echo $news_detail->getDes6(); ?></font></span></p>
              
              <p dir="ltr" style="line-height: 1.38; margin-top: 12pt; margin-bottom: 12pt;"><font face="Chakra Petch"><span id="docs-internal-guid-60e9ba43-7fff-0ffb-08f0-3611e1660f49"></span></font></p>
              <p dir="ltr" style="line-height: 1.8; margin-top: 0pt; margin-bottom: 8pt;"><font face="Chakra Petch"><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Đừng quên ghé thăm </span><a href="/cnw/news" style="text-decoration: none;"><span style="font-size: 18px; color: rgb(17, 85, 204); background-color: transparent; font-weight: 700; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">News</span></a><span style="font-size: 18px; color: rgb(0, 0, 0); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> để cập nhật tin tức và những mẹo bổ ích về các sản phẩm công nghệ nhé!</span></font></p>
           </div>
           <div class="post_meta_bottom" bis_skin_checked="1">
              <div bis_skin_checked="1"></div>
              <div class="share hidden-xs" bis_skin_checked="1">
                 <span>Chia sẻ bài viết:</span> 
                 <a href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM20.0172 15.9276C19.8136 16.8111 19.0908 17.4635 18.2208 17.5607C16.1613 17.7903 14.0762 17.7918 11.9992 17.7903C9.92297 17.7918 7.83782 17.7903 5.77772 17.5607C4.9075 17.4636 4.18481 16.8111 3.98221 15.9276C3.69231 14.6697 3.69231 13.2955 3.69231 11.9999C3.69231 10.7044 3.69574 9.33078 3.98537 8.07291C4.18797 7.18855 4.91093 6.53702 5.78004 6.43991C7.84035 6.20967 9.9264 6.20877 12.0026 6.20967C14.0786 6.20883 16.1639 6.20967 18.224 6.43991C19.0942 6.53702 19.8169 7.18855 20.0204 8.07291C20.3103 9.33078 20.3077 10.7044 20.3077 11.9999C20.3077 13.2955 20.3068 14.6697 20.0172 15.9276Z" fill="#F9495F"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.85547 14.5791C11.6208 13.6637 13.3704 12.7559 15.1375 11.8398C13.3653 10.9152 11.6159 10.0031 9.85547 9.08447V14.5791Z" fill="#F9495F"></path>
                    </svg>
                 </a>
                 <a href="#" rel="me" class="ss-social-facebook">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM15.8771 6.60485H14.0012C13.6297 6.60485 13.2547 6.98885 13.2547 7.27453V9.18736H15.8734C15.768 10.6541 15.5515 11.9954 15.5515 11.9954H13.2413V20.3077H9.7987V11.9945H8.12287V9.19733H9.7987V6.91042C9.7987 6.49224 9.71399 3.69236 13.326 3.69236H15.8772V6.60485H15.8771Z" fill="#005EC4"></path>
                    </svg>
                 </a>
                 <a href="#" target="_blank">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M0 4C0 1.79086 1.79086 0 4 0H20C22.2091 0 24 1.79086 24 4V20C24 22.2091 22.2091 24 20 24H4C1.79086 24 0 22.2091 0 20V4Z" fill="white"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM18.6066 8.61146C18.6131 8.75773 18.6165 8.90479 18.6165 9.05243C18.6165 13.5572 15.1878 18.7514 8.91766 18.7514C6.9926 18.7514 5.20077 18.1871 3.69226 17.2198C3.95895 17.2515 4.23022 17.2676 4.50546 17.2676C6.10254 17.2676 7.57234 16.7227 8.73906 15.8082C7.24737 15.7808 5.9884 14.7952 5.55455 13.4409C5.7628 13.4808 5.97637 13.5022 6.19601 13.5022C6.5069 13.5022 6.80809 13.4604 7.09414 13.3826C5.53477 13.0693 4.35967 11.6917 4.35967 10.0401C4.35967 10.0257 4.35967 10.0114 4.35998 9.99719C4.81952 10.2525 5.34509 10.4059 5.90395 10.4236C4.9892 9.81231 4.38757 8.76886 4.38757 7.58632C4.38757 6.96153 4.55567 6.37604 4.84916 5.87246C6.53037 7.93493 9.0422 9.29196 11.8753 9.43427C11.8171 9.18467 11.7868 8.92447 11.7868 8.65735C11.7868 6.77491 13.3132 5.24867 15.1956 5.24867C16.1762 5.24867 17.0621 5.66258 17.6839 6.32503C18.4603 6.17233 19.1899 5.88849 19.8485 5.4979C19.5941 6.29396 19.0536 6.96185 18.3497 7.38382C19.0393 7.30138 19.6962 7.11808 20.3076 6.84696C19.8507 7.53051 19.2728 8.13094 18.6066 8.61146Z" fill="#68AEFA"></path>
                    </svg>
                 </a>
                 <a href="#" rel="me" class="ss-social-pinterest">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1164 5.50146H7.88475C6.57101 5.50146 5.50195 6.57045 5.50195 7.88426V16.1159C5.50195 17.4299 6.57101 18.4989 7.88475 18.4989H16.1164C17.4304 18.4989 18.4994 17.4299 18.4994 16.1159V7.88426C18.4994 6.57052 17.4304 5.50146 16.1164 5.50146ZM12.0004 16.2788C9.64136 16.2788 7.72182 14.3592 7.72182 11.9999C7.72182 9.64087 9.64136 7.72133 12.0004 7.72133C14.3597 7.72133 16.2793 9.64087 16.2793 11.9999C16.2793 14.3592 14.3597 16.2788 12.0004 16.2788ZM16.4169 8.6061C15.8584 8.6061 15.4043 8.15195 15.4043 7.59375C15.4043 7.03549 15.8584 6.58133 16.4169 6.58133C16.9751 6.58133 17.4293 7.03549 17.4293 7.59375C17.4293 8.15202 16.9751 8.6061 16.4169 8.6061Z" fill="#FF8F02"></path>
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM20.3066 16.1158C20.3066 18.427 18.427 20.3066 16.1159 20.3066H7.8842C5.57328 20.3066 3.69336 18.427 3.69336 16.1158V7.8842C3.69336 5.57328 5.57328 3.69336 7.8842 3.69336H16.1159C18.427 3.69336 20.3066 5.57328 20.3066 7.8842V16.1158Z" fill="#FF8F02"></path>
                    </svg>
                 </a>
              </div>
           </div>
        </div>
        <div class="block post_related" bis_skin_checked="1">
           <div class="block__header" bis_skin_checked="1"><span class="block__header__title">CÁC BÀI VIẾT KHÁC</span></div>
           <div class="block__content" bis_skin_checked="1">
            <?php 
               $new_top=new NewsApplication();
               $news_top=$new_top->getAll(1,3);
             foreach($news_top as $news_post){
               $path_post=$news_post->getTitle();
               $path_post=str_replace(' ','-',$path_post);
               ?>
               <div class="post" bis_skin_checked="1">
                 <div class="thumb" bis_skin_checked="1"><a href="<?php echo "/cnw-1/newsdetail/".$news_post->getNews_id()."/".$path_post ?>"><img src="../../public/img/news/<?php echo $news_post->getNews_id();?>_image1.png" width="350" height="199"></a></div>
                 <div class="title" bis_skin_checked="1"><a href="<?php echo "/cnw-1/newsdetail/".$news_post->getNews_id()."/".$path_post ?>"><?php echo $news_post->getTitle(); ?></a></div>
                 <div class="desc" bis_skin_checked="1"><?php echo $news_post->getDescription(); ?></div>
              </div>
             <?php  
             }

            ?>
              <!-- <div class="post" bis_skin_checked="1">
                 <div class="thumb" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html"><img src="https://www.tncstore.vn/image/catalog/Tin%20t%E1%BB%A9c%20website/Nvidia/1.png" width="350" height="199"></a></div>
                 <div class="title" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html">Nvidia cố “tháo chạy” khi thị trường crytpo sụp đổ, nhưng có lẽ đã quá muộn…</a></div>
                 <div class="desc" bis_skin_checked="1">Sự sụp đổ của thị trường crypto giống như một cơn mưa sau ngày nắng hạn đối với các tín đồ PC, nhưng đồng thời cũng là dấu hiệu cho sự đi xuống về doanh thu của các công ty công nghệ. Cả Nvidia hay AMD đều đang cố gắng tránh khỏi những hệ lụy của tiền điện tử, nhưng thực tế thì có vẻ không như họ mong muốn.</div>
              </div>
              <div class="post" bis_skin_checked="1">
                <div class="thumb" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html"><img src="https://www.tncstore.vn/image/catalog/Tin%20t%E1%BB%A9c%20website/Nvidia/1.png" width="350" height="199"></a></div>
                <div class="title" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html">Nvidia cố “tháo chạy” khi thị trường crytpo sụp đổ, nhưng có lẽ đã quá muộn…</a></div>
                <div class="desc" bis_skin_checked="1">Sự sụp đổ của thị trường crypto giống như một cơn mưa sau ngày nắng hạn đối với các tín đồ PC, nhưng đồng thời cũng là dấu hiệu cho sự đi xuống về doanh thu của các công ty công nghệ. Cả Nvidia hay AMD đều đang cố gắng tránh khỏi những hệ lụy của tiền điện tử, nhưng thực tế thì có vẻ không như họ mong muốn.</div>
             </div>
             <div class="post" bis_skin_checked="1">
                <div class="thumb" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html"><img src="https://www.tncstore.vn/image/catalog/Tin%20t%E1%BB%A9c%20website/Nvidia/1.png" width="350" height="199"></a></div>
                <div class="title" bis_skin_checked="1"><a href="https://www.tncstore.vn/noi-lo-website-lua-dao-khong-con-nho-vao-ung-dung-visafe.html">Nvidia cố “tháo chạy” khi thị trường crytpo sụp đổ, nhưng có lẽ đã quá muộn…</a></div>
                <div class="desc" bis_skin_checked="1">Sự sụp đổ của thị trường crypto giống như một cơn mưa sau ngày nắng hạn đối với các tín đồ PC, nhưng đồng thời cũng là dấu hiệu cho sự đi xuống về doanh thu của các công ty công nghệ. Cả Nvidia hay AMD đều đang cố gắng tránh khỏi những hệ lụy của tiền điện tử, nhưng thực tế thì có vẻ không như họ mong muốn.</div>
             </div> -->
           </div>
        </div>
     </div>
     