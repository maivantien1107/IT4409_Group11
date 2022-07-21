<?php
ob_start();
session_start();
$path_project = 'cnw';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'application' . DS . 'UsersApplication.php';
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'Bill.php';

$service = new UsersApplication();
$listProducts = $service->getListCartProducts($_SESSION['username']);
$text = $_POST['list_quantity'];
$list_text = explode(" ", $text);

$list_quantity = array();
foreach ($list_text as $text) {
    array_push($list_quantity, intval($text));
}

$lens = count($listProducts);
for($i=0; $i<$lens; $i++){
    $product = $listProducts[$i];
    $quantity = $list_quantity[$i];
    $total_money = $product->getPrice() * $quantity;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
           $date2 =date("Y-m-d H:i:s");   
    $bill = new Bill(1,$product->getProductID(), $_SESSION['username'], $date2, $total_money, $quantity,'Đang chuẩn bị hàng');

    $service->submitBill($bill);
    $service->removeProduct($product->getProductID(), $_SESSION['username']);
}
?>
<script type="text/javascript">
    alert('Đặt hàng thành công');
</script>
<?php
header("Location: ../cart");
exit();
