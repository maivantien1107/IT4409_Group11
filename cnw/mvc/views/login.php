
<?php
ob_start();
session_start();
if(array_key_exists("username", $_POST)){
		$username = isset($_POST["username"]) ? addslashes($_POST["username"]) :'';
		$password = isset($_POST["password"]) ? addslashes($_POST["password"]): '';
		require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
        require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
		$service = new UsersApplication();
        $checker = $service->checkAccount($username, $password);
		if($checker === True){
                $_SESSION['islogin']=true;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
                header("Location: home");
                exit();
		}
        else{
            ?>
            <script type="text/javascript">
            alert("Sai tên đăng nhập hoặc mật khẩu");
            </script>
<?php
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
    <title>Đăng nhập</title>
	</head>
	<body>
		<!-- includes nav bar -->
		<?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
		<?php  ?>
		<div class="container">
        <div class="modal">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <!-- Login form -->
        <form action="" method="POST" >
            <div class="auth-form auth-login">
                <div class="container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <a href="/cnw-1/account" class="auth-form__switch auth-form__switch-register">Đăng ký</a>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="username" placeholder="Tài khoản" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name="password" placeholder="Mật khẩu của bạn" required>
                        </div>
                        <!-- <% if (warning) { %>
                            <div class="alert-warning mt-3 p-1 pl-2"><%= warning %></d>
                        <% } %> -->
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="cnw-1/forgot-password" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu ?</a>
                        </div>
                    </div>
                
                    <div class="auth-form__controls">
                        <a href="home" class="btn">TRỞ LẠI</a>
                        <button type="submit" class="btn btn--primaryy" name="btn-submit">ĐĂNG NHẬP</button>
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
		</div>