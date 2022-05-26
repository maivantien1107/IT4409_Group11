<?php  
     $conn=mysqli_connect('localhost','root','maivantien1107','business_service') or die("không thế kết nối");
     $sql ="select * from categories";
     $result = mysqli_query($conn,$sql);
     $resultarr=array();
     if (mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_array($result)){
             $resultarr[]=$row;
         }
     }
     $html='<div class="title">';
           foreach($resultarr as $key => $value){
              $html.='
               <span>'.$value['Title'].'</span>  </br>';
                          
           }
      $html.='</div>';

?>
<?php 
if (isset($_POST['add_business'])){
    $name=isset($_POST['buss_name'])?addslashes($_POST['buss_name']):'';
    $address=isset($_POST['address'])?addslashes($_POST['address']):'';
    $city=isset($_POST['city'])?addslashes($_POST['city']):'';
    $telephone=isset($_POST['telephone'])?addslashes($_POST['telephone']):'';
    $url=isset($_POST['url'])?addslashes($_POST['url']):'';
    $error=array();
    if (!$name){
        $error['buss_name']="Bạn chưa nhập tên công ty";

    }
    if (!$address){
        $error['address']="Bạn chưa nhập địa chỉ";
    }
    if (!$city){
        $error['city']="Bạn chưa nhập thành phố";
    }
    if (!$telephone){
        $error['telephone']="Bạn chưa nhập số điện thoại";
    }
    if (!$url){
        $error['url']="Bạn chưa nhập URL";
    }
    if (empty($error)){
        $sql1="insert into businesses(Name,Address,City,Telephone,URL) values('$name','$address','$city','$telephone','$url');";
        $conn->query($sql1);
		$list_category_str = explode(" ", $_POST['category']);
		$list_category = array();
		for($i=0; $i<sizeof($list_category_str); $i++){
			$tmp = $list_category_str[$i];
            echo $tmp;
            print sizeof($list_category_str);
            $list_category[]=$tmp;
		}
        $sql="select BusinessID from businesses where Name='$name' and Address='$address'";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($result);
        $id = $row["BusinessID"];

		foreach($list_category as $value){
            echo $value;

			$query = "insert into biz_category(BusinessID, cateID)
					values('$id', '$value');
				";
            if ( $conn->query($query)){
                echo '<script language="javascript">alert("Thêm thành công"); window.location="add_biz.php";</script>';
            }
            else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="add_biz.php";</script>';
            }
		}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .container {
            display: inline-block;
            width: 40%;
            margin-left: 5%;
        }
        .td{
            width: 300px;
        }
        .title{
            height: 100px;
            width: 300px;
            overflow-y:auto;
            border:solid 2px #111111;
        }
        .gridview .selected, .gridview tbody .selected {
		    background-color: black;
		    color: #fff;
		}
        </style>
        <script type="text/javascript">
		function toggleClass(el, className) {
			let id = el.id.toString();
		    if (el.className.indexOf(className) >= 0) {
		        el.className = el.className.replace(className,"");

		        let arr = document.getElementById("category").value.split(" ");

		        const se = new Set(arr);
		        se.delete(id);
		        document.getElementById("category").value = "";
		        for(const x of se){
		        	document.getElementById("category").value += " " + x.toString();
		        	console.log(x);
		        }
		    }
		    else {
		        el.className  += className;
		        document.getElementById("category").value += " " + id;
		        let arr = document.getElementById("category").value.split(" ");

		        const se = new Set(arr);
		        document.getElementById("category").value = "";
		        for(const x of se){
		        	document.getElementById("category").value += " " + x.toString();
		        	console.log(x);
		        }

		    }
		}
	</script>
</head>
<body>
    <h1>Bussiness Registration</h1>
    <div class="container">
        <h3>Click on one, or control-click on multiple categories</h3>
        <div style="overflow: scroll; width: 80%; height:100px;">
		<table width="100%" class="gridview">
			<?php 
				$query = "select * from categories";
				
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_array($result)){
					$name_category = $row["Title"];
					$id_category = $row["cateID"];
					
			?>
				<tr onclick="toggleClass(this,'selected');" id=<?php echo '"' . strval($id_category) . '"' ?>>
					<td><?php echo $name_category ?></td>
                   
				</tr>
			<?php 
				}
			?>
		</table>		
	</div>
    </div>
    <div class="container">
        <form method="post" action="add_biz.php">
        <table>
            <tr>
                <td>Bussiness Name</td>
                <td>
                     <input type="text" name="buss_name" value="">
                     <?php if (isset($_POST['add_business'])){
                        if (!empty($error['buss_name'])){
                        echo $error['buss_name'];}}  ?>
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" value="">
                    <?php if (isset($_POST['add_business'])){
                        if (!empty($error['address'])){
                        echo $error['address'];}}  ?>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    <input type="text" name="city" value="">
                    <?php if (isset($_POST['add_business'])){
                        if (!empty($error['city'])){
                        echo $error['city'];}}  ?>
                </td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td>
                    <input type="text" name="telephone" value="">
                    <?php if (isset($_POST['add_business'])){
                        if (!empty($error['telephone'])){
                        echo $error['telephone'];}}  ?>
                </td>
            </tr>
            <tr>
                <td>URL</td>
                <td>
                    <input type="text" name="url" value="">
                    <?php if (isset($_POST['add_business'])){
                        if (!empty($error['url'])){
                        echo $error['url'];}}  ?>
                </td>
            </tr>
        </table>
        <br /><br />
        <input type="text" name="category" id="category" style="display: none;">
	<input type="submit" name="add_business" value="Add Business">
        </form>
    </div>
  
</body>

</html>