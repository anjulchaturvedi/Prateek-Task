<?php
  include_once('./DB.php');
  include_once('./functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TEST</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<form action="./functions.php" method="post">
    ID :  <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Price: <input type="text" name="price"><br>
    <input type="submit" name="submitbtn">
</form>


<?php

// function db(){
    $servername = "mysql-server";
    $username = "root";
    $password = "secret";   
    $dbname = "store";    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM mytable");
    $stmt->execute();
    $arr = $stmt->fetchAll();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo '<table>  <tr> <th> ID </th> <th> Name </th> <th> Price </th> <th> Actions </th> </tr>';
    foreach ($arr as $key => $value) {
        echo ' <form method = "POST" action="./functions.php"> 
        <tr> <td>'.$value['id'].'</td> 
        <td>'.$value['name'].'</td> 
        <td>'.$value['price'].'</td> 
        <td> <a href="edit.php?id='.$value['id'].'" target="_blank"> Edit </a> 
        <input type="submit" name="deletebtn" value = "Delete" > </td>         
        <input type = "hidden" name = "myVal" value = "'.$value['id'].'">  </tr> </form> ';
    }
    echo '  </table>';
//  }




// updateData();
?>




    
</body>
</html>