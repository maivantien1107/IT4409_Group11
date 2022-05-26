<html>
    <head>
        <title>Create table</title>
    </head>
    <body>
        <?php 
          $server='localhost';
          $user='root';
          $password='maivantien1107';
          $mydb='IT4409_group11';
          $table='Products';
          $conn=mysqli_connect($server,$user,$password);
          if(!$conn){
              die("Không thể kết nối $server sử dụng $user");
          }
          else{
              $sql="Create Table $table(
                ProductID INT UNSIGNED NOT NULL
                AUTO_INCREMENT PRIMARY KEY,
                Product_desc VARCHAR(50),
                Cost INT,
                Weight INT,
                Numb INT)";
                $conn->select_db($mydb);
                if ($conn->query($sql)){
                    print '<font size="4" color="blue" >Created Table';
                    print "<i>$table</i> in database<i>$mydb</i><br></font>";
                     print "<br>SQLcmd=$sql";
                 } else {
                             die ("Table Create Creation Failed SQLcmd=$sql");
                         }
                 mysqli_close($conn);

                }
          

        ?>
    </body>
</html>