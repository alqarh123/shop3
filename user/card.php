<?php
session_start();
$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="card.css">
    
</head>
<body>
     <center>
     <h2>المشتريات</h2>
   <center>
     <?php
require 'database/_init.php';
 $row =query::get('insert_cart');
 foreach($row as $va){
    if($user_id==$va['user_id'])
    {
        echo "
        <center>
        <main>
        <table>
               <thead>
                   <tr>
                       <th class='col'>اسم المنتج</th>
                       <th class='col'>سعر المنتج</th>
                       <th class='col'>حذف المنتج</th>
                   </tr>
               </thead>
               <tbodr>
                   <tr>
                       <td>$va[name]</td>
                       <td>$va[price]</td>
                       <td><a href='del_card.php? id=$va[id] ' class='btn'>ازالة</a></td>
                   </tr>
               </tbodr>
   
           </table>
   
           </main>
        <center>
        ";
    }
    }
     ?>
    <center>
        <a href="shop.php" id="bak" >الرجوع الى صفحة المنتجات</a>
    </center>
</body>
</html>
