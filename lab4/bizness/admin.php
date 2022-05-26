<?php
      $conn=mysqli_connect('localhost','root','maivantien1107','business_service') or die("không thế kết nối");
      if(isset($_POST['submit'])){
        $cateID=isset($_POST["cateid"])?addslashes($_POST["cateid"]):'';
        $title=isset($_POST["title"])?addslashes($_POST["title"]):'';
        $description=isset($_POST["description"])?addslashes($_POST["description"]):'';
        $error=array();
        if (!$cateID){
            $error['cateID']="Bạn chưa nhập ID";
        }
        if (!$title){
            $error['title']="Bạn chưa nhập tiêu đề";
        }
        if (!$description){
            $error['description']="Bạn chưa nhập mô tả";
        }
        if (empty($error)){
            $sql="Insert into categories (cateID,Title,Description) values('$cateID','$title','$description');";
            if (mysqli_query($conn, $sql)){
                echo '<script language="javascript">alert("Thêm thành công"); window.location="admin.php";</script>';
            }
            else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="admin.php";</script>';
            }
        }
    }
      $sql ="select * from categories";
      $result = mysqli_query($conn,$sql);
      $resultarr=array();
      if (mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_array($result)){
              $resultarr[]=$row;
          }
      }
      $html='';
            foreach($resultarr as $key => $value){
               $html.='<tr>
                <td>'.$value['cateID'].'</td>
                <td>'.$value['Title'].'</td>
                <td>'.$value['Description'].'</td>
               </tr>';
                           
            }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <style type="text/css">
		table, th, td{
                     border:1px solid black;
                     width: 300px;
                }
                table{
                    border-collapse:collapse;
                }
	</style>
</head>
<body>
    <h1>Category Administrator</h1>
    <form action="admin.php" method="POST">
        <table>
            <tr>
            <th>
                Cate ID
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
        </tr>
            <?php 
           echo $html;
?>
        <tr>
            <td>
                <input type="text" name="cateid" value="">
            </td>
            <td>
                <input type="text" name="title" value="">
            </td>
            <td>
                <input type="text" name="description" value="">
            </td>
        </tr>
        <tr>
                <td colspan="3" align="center"><input type="submit"  name="submit" value="Submit"></td>
        </tr>
        </table>
    </form>
</body>
</html>