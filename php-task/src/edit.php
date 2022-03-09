<?
include_once('./functions.php');

$rowid = $_GET['id'];
// echo $rowid;

$servername = "mysql-server";
  $username = "root";
  $password = "secret";   
  $dbname = "store";
  
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM mytable where id = ".$rowid."   ");
  $stmt->execute();
  $arr = $stmt->fetchAll();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   print_r($arr);

  foreach ($arr as $key => $value){
     $newid = $value['id'];
     $newname = $value['name'];
     $newprice = $value['price'];
  }

//   echo $newid." ".$newname." ".$newprice;

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form action="./functions.php" method="POST">
    ID: <input type="text" name="uid"  value="<?php echo $newid;?>"><br>
    Name: <input type="text" name="uname"  value="<?php echo $newname;?>"><br>
    Price: <input type="text" name="uprice"  value="<?php echo $newprice;?>"><br>
    <input type="submit" name="updatebtn" value="Update">

</form>


</body>
</html>