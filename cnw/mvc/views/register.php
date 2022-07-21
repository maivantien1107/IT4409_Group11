<?php
		if(array_key_exists("name", $_POST)){
				$username = isset($_POST["name"]) ? addslashes($_POST["name"]) :'';
				$password = isset($_POST["password"]) ? addslashes($_POST['password']):'';
				$address = isset($_POST["address"]) ? addslashes($_POST['address']):'';
				$telephone = isset($_POST["telephone"]) ? addslashes($_POST['telephone']):'';
				require_once ROOT . DS .'application' . DS . 'UsersApplication.php';
				require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'Users.php';
				$guest = new Users($username, $password, $address, $telephone);
				$service = new UsersApplication();

				$listUsers = $service->getAll();
				$tmpUsers = $service->get($username);

				if(!in_array($tmpUsers, $listUsers)){
						$service->insert($guest);
						header("Location: login");
                        exit();
				} else {
                    echo 'Thêm không thanh công';
						echo "<script>alert('Tài khoản đã được sử dụng');</script>";
				}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">
	<link rel="stylesheet" href="./public/css/login.css" >
	<link rel="stylesheet" href="./public/css/footer_container.css" >
	<link rel="stylesheet"  href="public/css/nav_bar.css" >
    <link rel="stylesheet" href="/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Đăng kí</title>
</head>
<body>
<div class="modal">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <!-- Register form -->
        <form action="" style=" padding-right:10px;" method="POST" >
            <div class="auth-form auth-register">
                <div class="container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <a href="login" class="auth-form__switch auth-form__switch-login">Đăng nhập</a>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="name" placeholder="Username" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="address" placeholder="Address" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name="password" placeholder="Mật khẩu của bạn" required>
                        </div>
                        <!-- <% if (warning) { %> -->
                            <!-- <div class="alert-warning mt-3 p-1 pl-2"><%= warning %></d> -->
                        <!-- <% } %> -->
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng ký, bạn đã đồng ý với chúng tôi về
                            <a href="" class="auth-form__policy-link">Điều khoản dịch vụ</a> &
                            <a href="" class="auth-form__policy-link">Chính sách bảo mật</a>
                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <a href="/cnw-1/home" class="btn">TRỞ LẠI</a>
                        </a>
                        <button type="submit" class="btn btn--primaryy" name="btn-register">ĐĂNG KÝ</button>
                    </div>

                    <div class="auth-form__socials">
                        <a href="" class="btn btn--with-icon">
                            <i class="fab fa-facebook-square"></i> Kết nối với Facebook
                        </a>
                        <a href="" class="btn btn--with-icon">
                            <i class="fab fa-google"></i> Kết nối với Google
                        </a>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</div>
</body>
</html>