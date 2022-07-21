<?php  
$path_project = 'cnw';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'application'.DS.'UsersApplication.php';
$app=new UsersApplication();
if (isset($_POST['btn-submit'])){
    $product_id=isset($_POST['product_id'])?intval(addslashes($_POST['product_id'])):'';
    $username=isset($_POST['username'])?addslashes($_POST['username']):'';
    $status=isset($_POST['bill_status'])?addslashes($_POST['bill_status']):'';
    $quantity=isset($_POST['quantity'])?intval(addslashes($_POST['quantity'])):'';
    $total_money=isset($_POST['total-money'])?intval(addslashes($_POST['total-money'])):'';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date2 =date("Y-m-d H:i:s");   
    $bill=new Bill(1,$product_id,$username,$date2,$total_money,$quantity,$status);

    $app->submitBill($bill);
    header("Location: ../admin-bill");
    exit();
 
   
}

if(isset($_POST['btn-delete'])){
    $status=isset($_POST['bill-select'])?addslashes($_POST['bill-select']):'';
    $bill_id=intval(addslashes($_POST['btn-delete']));
    var_dump($status);
    var_dump($bill_id); 
    $app->updateStatusBill($bill_id,$status);
    header("Location: ../admin-bill");
    exit();
}
header("Location: ../admin-bill");
exit();