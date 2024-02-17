<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="products.css">
</head>
<body>
  <nav class="nav1">
    <a href="card.php">السله</a>
    <a href="http://localhost:88/new/login.php" >تسجيل الخروج</a>
  </nav>
  <center>
    <h2>المنتجات المتوفره</h2>
  <center>
    <?php
require 'database/_init.php';
$row =query::get('prod');
foreach($row as $va1){
  $name1=squr::squr_del($va1['name']);
  $price1=squr::squr_del($va1['price']);
    echo "
    <center>
    <main>
   <div class='card' >
      <img src='$va1[image]'>
       <div class='card-contet'>
         <p class='card-text'>$price1</p>
         <h5 class='card-title'>$name1</h5>
         <a href='val.php? id=$va1[id]' class='btn '>اضافة المنتج الى السله   </a>  
      </div>
   </div>
  </main>
    <center>
    ";
}
    ?>
</body>
</html>