<?php
require 'database/_init.php';
 if(isset($_POST['sub']))
 {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    query::make(query::updata('prod',[
    'name'=>$name,
    'price'=>$price
 
    ],$id));
    header('location: main.php');
   
 }
?>