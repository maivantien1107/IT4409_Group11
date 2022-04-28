<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Document</title>
</head>
<body>
<?php
  $user=isset($_POST["yourname"])? addslashes($_POST["yourname"]):false;
  $class=isset($_POST["class"])? addslashes($_POST["class"]):false;
  $university=isset($_POST["university"])? addslashes($_POST["university"]):false;
  $error=array();
  $hobby=array();
  if (!$user){
          $error['user']='Bạn chưa nhập tên';
  }
  if (!$class){
          $error['class']='Bạn chưa nhập tên lớp';
  }
  if (!$university){
          $error['university']='Bạn chưa nhập tên trường';
  }
  if (empty($error)){
          $hobby1=$_POST['hobby1'];
          if ($hobby1=='Yes'){
                  $hobby[]='Hobby1';
          }
          $hobby2=$_POST['hobby2'];
          if ($hobby2=='Yes'){
                  $hobby[]='Hobby2';
          }
          $hobby3=$_POST['hobby3'];
          if ($hobby3=='Yes'){
                  $hobby[]='Hobby3';
          }
          $hobby4=$_POST['hobby4'];
          if ($hobby4=='Yes'){
                  $hobby[]='Hobby4';
          }
          $hobby5=$_POST['hobby5'];
          if ($hobby5=='Yes'){
                  $hobby[]='Hobby5';
          }
          print "Hello". $user ."<br/>";
          print "You are studing at $class, $university <br/>";
          print "Your hobbies is: <br/>";
         foreach($hobby as $val){
                 print "- ".$val."<br/>";
         }
  }
?>  
</body>
</html>   