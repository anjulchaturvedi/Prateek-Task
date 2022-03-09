<?php

if(isset($_POST['submitbtn'])){
    addData();
}
if(isset($_POST['updatebtn'])){
    updateData();
}

if(isset($_POST['deletebtn'])){
   
  $servername = "mysql-server";
  $username = "root";
  $password = "secret";   
  $dbname = "store";
  
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $deleteid =  $_POST['myVal'];
    $sql = "DELETE FROM mytable WHERE id = ".$deleteid." ";
    $conn->exec($sql);  
    // echo $sql;
    header('location: index.php');    
}

function addData(){    
        $servername = "mysql-server";
        $username = "root";
        $password = "secret";   
        $dbname = "store";    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        // echo $id." <br> ".$name." <br>".$price; 
        $sql = "INSERT INTO mytable (id, name, price)
        VALUES ('".$id."', '".$name."', '".$price."')";
        $conn->exec($sql);   
        header('location: index.php');
    }




function updateData(){
         // db();
        $servername = "mysql-server";
        $username = "root";
        $password = "secret";   
        $dbname = "store";    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['uid'];
        $name = $_POST['uname'];
        $price = $_POST['uprice'];       
        // print_r($_POST);
        // echo $id." <br> ".$name." <br>".$price; 
        $sql = "UPDATE mytable SET name = '$name' , price = '$price'
        WHERE id = '$id' ";
        $conn->exec($sql); 
        // echo $sql;
        // print_r($sql);
        header('location: index.php');
    
 
}

?>