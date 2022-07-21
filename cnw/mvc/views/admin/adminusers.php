<?php 
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login-admin');
  exit();
}
require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
$app_news= new UsersApplication();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="public/css/admin_news_index.css">
    <link rel="stylesheet" href="public/css/admin_user_index.css">

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Group 11</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin-product">
            <i class="bx bx-box"></i>
            <span class="links_name">Quản lý sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="admin-bill">
            <i class="bx bx-cart-alt cart"></i>
            <span class="links_name">Quản lý đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="admin" >
            <i class="bx bx-news"></i>
            <span class="links_name">Tin Tức</span>
          </a>
        </li>
        <li>
          <a href="admin-user" class="active">
            <i class="bx bx-user"></i>
            <span class="links_name">Quản lý tài khoản</span>
          </a>
        </li>
        <li class="log_out">
          <a href="validate/logoutadmin.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
<section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Tìm kiếm...." />
          <i class="bx bx-search"></i>
        </div>
      </nav>
      <div class="home-content">
        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="row">
              <div class="title">Danh sách khách hàng</div>
              <div class="button-add" style="display:none;">
                <a href="#">+ Thêm mới</a>
              </div>
            </div>
            <table>
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Loại</th>
        <th>Tác vụ</th>

    </tr>
    <?php  
    $page=isset($_GET["page"])?intval($_GET["page"]):1;
    if ($page==1){
      $start=0;
      $limit=10;
    }
    else {
      $start=($page-1)*10;
      $limit=$start+10;

    }   
      $listnews=$app_news->getListUsser($start,$limit);
      foreach($listnews as $news){
      ?>
          <tr>
        <td><a href="#"><?php echo $news->getUsername(); ?></a></td>
        <td><a href="#"><?php echo $news->getAddress(); ?></a></td> 
        <td>
            <a href="#"><?php echo $news->getTelephone(); ?></a>
         </td>
        <td>
         <li class="btn-action">
         
                  <button class="btn" name="btn-delete1" value="<?php echo $news->getUsername(); ?>">
                    
                    <i class='bx bx-user-plus' style="font-size: 25px"></i>
                  </button>
                  
                  <form action="validate/admin_user.php" method="post">   
                    <div class="delete-modal">
                    <div class="delete-modal-content">
                      <img
                        class="aleart-image"
                        src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png"
                        style="width: 100px; height: 100px"
                      />
                      <span> Bạn có chắc chắn muốn thêm người này làm admin? </span>
                      <div class="bottom-modal-button">
                        <button class="modal-button-close close-delete-modal">Không</button>
                        <button class="modal-button-accept accept-delete-modal"  value="<?php echo $news->getUsername(); ?>" name="btn-delete">Có</button>
                      </div>
                    </div>
                    </div>
                  </form>
   
                </li>
        </td>
    </tr>
      <?php }
    ?>
    
    
  </table>
  <div class="pagination">
                  <?php 
                  $total_page=intval($app_news->getCountAllUser()/10)+1;
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($page > 1 && $total_page > 1){
                        echo '<a href="admin-user&page='.($page-1).'">Prev</a> | ';
                    }
        
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $page){
                            echo '<span>'.$i.'</span> | ';
                        }
                        else{
                            echo '<a href="admin-user&page='.$i.'">'.$i.'</a> | ';
                        }
                    }
        
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($page < $total_page && $total_page > 1){
                        echo '<a href="admin-user&page='.($page+1).'">Next</a> | ';
                    }
                  ?>
        </div>
           
          </div>
        </div>
      </div>
</section>
    <!-- <div class="bg-modal">
      <div class="modal-content">
        <span class="modal-title">Thêm mới</span>
        <form action="validate/admin_insertnews.php" method="post">
          <label class="news-title">Tiêu đề</label>
          <input name="news_title" type="text" value="" placeholder="Tiêu đề tin tức"/>
          <label class="news-title">Thể loại</label>
         <select class="news_category" name="news_category" value="">
            <option value="Tin tức">Tin tức</option>
            <option value="Khuyến mãi">Khuyến mãi</option>
            <option value="Thông tin">Thông tin</option>
         </select>
          <label class="news-title">Tổng quan</label>
          <input type="text" placeholder="Thông tin tổng quan tin tức" name="news_overview" value=""/>
          <label class="news-title">Miêu tả</label>
          <textarea rows="8" name="news_description" value="" ></textarea>

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
            <button class="modal-button-close  close-add-modal">Đóng</button>
            <button class="modal-button-accept accept-add-modal" type="submit" name="btn-submit">Xác nhận</button>
          </div>
        </form>
      </div>
    </div> -->
    

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      // button show add modal
      let btnAdd = document.querySelector(".button-add");
      // button close add modal
     

      //btn show delete modal
      let btnDeletes = document.querySelectorAll(".bxs-trash");
      let btndel= document.querySelector(".delete-modal")
      // btn close Delete modal
      let btnCloseDeleteModal = document.querySelector(".close-delete-modal");

      // btn accept Delete news
      let btnAcceptDelete = document.querySelector(".accept-delete-modal");

      
    

      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
     
      // show delete modal
      for(const deleteButton of btnDeletes){
        let tm=deleteButton.parentElement.getAttribute("value");
        deleteButton.addEventListener('click', function(){
          document.querySelector(".delete-modal").style.display = "flex";
        })
      };
      btnCloseDeleteModal.addEventListener("click", function () {
        document.querySelector(".delete-modal").style.display = "none";
      });
      btnAcceptDelete.addEventListener("click", function () {
        // delete news 
        document.querySelector(".delete-modal").style.display = "none";
      });
      
    </script>
  </body>
</html>
