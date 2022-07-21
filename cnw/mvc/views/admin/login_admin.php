
<?php
ob_start(); 
session_start();

if(array_key_exists("username", $_POST)){
		$username = isset($_POST["username"]) ? addslashes($_POST["username"]) :'';
		$password = isset($_POST["password"]) ? addslashes($_POST["password"]): '';
		require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
        // require_once ROOT . DS . 'database' . DS . 'MySqlConnect.php';
		$service = new UsersApplication();
        $checker = $service->checkAccountAdmin($username, $password);
		if($checker == True){
            $_SESSION['admin'] = $username;
        } else {
            echo "<script>alert('FALSE')</script>";
        }
    }
    
    if(isset($_SESSION['admin']) ){
            if($_SESSION['admin'] != '') {
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=...>");
                }
                else{
                    exit(header("Location: admin"));
                }
            }
    }
    ob_end_flush();
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
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="username" placeholder="Tài khoản" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name="password" placeholder="Mật khẩu của bạn" required>
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="cnw/forgot-password" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu ?</a>
                        </div>
                    </div>
                
                    <div class="auth-form__controls">
                        <button type="submit" class="btn btn--primaryy" name="btn-submit">ĐĂNG NHẬP</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
		</div>