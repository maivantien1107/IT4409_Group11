<?php 
if (isset($_POST['submit-form'])){
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
          echo "Hello". $user ."<br/>";
          echo "You are studing at $class, $university <br/>";
         foreach($hobby as $val){
                 echo "- ".$val."<br/>";
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
</head>
<body>
        <style>
                table, th, tr, td {  
        
                   padding-left: 5px;
                   font-size:18px;
                }
               
                table {
            border-collapse: collapse;
       }
               th {
                   height:200px;
               }
               .container {
                       text-align: center;
               }
               .done{
                       display: none;
               }
               
               
            </style>
    <div class="container">
      <form method="POST" action="exercise.php">
         <table border="1" align="center">
                 <tr>
                         <td>Yourname</td>
                         <td>
                                 <input type="text" name="yourname " value=""/>
                         </td>
                 </tr>
                 <tr>
                         <td>Class</td>
                         <td>
                                 <input type="text" name="class" value="" />
                         </td>
                 </tr>
                 <tr>
                         <td>University</td>
                         <td>
                                 <input type="text" name="university" value="" />
                         </td>
                 </tr>
                 <tr>
                         <td>Hobby</td>
                         <td>
                                 <table border="1" align="center" >
                                     <tr>
                                             <td>Hobby1</td>
                                             <td>
                                                     <input type="radio" name="hobby1" value="Yes" />
                                                     <input type="radio" name="hobby1" value="No" />
                                             </td>
                                     </tr>
                                     <tr>
                                             <td>Hobby2</td>
                                        <td>
                                                <input type="radio" name="hobby2" value="Yes" />
                                                <input type="radio" name="hobby2" value="No" />
                                        </td></tr>
                                     <tr>
                                        <td>Hobby3</td>
                                        <td>
                                                <input type="radio" name="hobby3" value="Yes" />
                                                <input type="radio" name="hobby3" value="No" />
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>Hobby4</td>
                                        <td>
                                                <input type="radio" name="hobby4" value="Yes" />
                                                <input type="radio" name="hobby4" value="No" />
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>Hobby5</td>
                                        <td>
                                                <input type="radio" name="hobby5" value="Yes" />
                                                <input type="radio" name="hobby5" value="No" />
                                        </td>
                                     </tr> 
                                 </table>
                         </td>
                 </tr>
                 <tr>
                         <td>
                         <input type="submit" name="submit-form" value="Submit"/>
                        </td>
                        <td>
                         <input type="reset" name="reset" value="Reset" />
                        </td>
                 </tr>
         </table>
      </form>  
</div>
</body>
</html>