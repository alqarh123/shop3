<?php
require 'database/_init.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $data=query::get('varieties',$id);
    foreach($data as $va)
{
    $name1=$va['name'];
    if(isset($_POST['submit']))
 {
    $name=squr::squr_add($_POST['name']);
    query::make(query::updata('varieties',[
    'name'=>$name
    ],$id));
    header('location: varieties.php');
 }
}
}
else
{
    $name1="";
 if(isset($_POST['submit']))
 {
    $name=squr::squr_add($_POST['name']);
    query::make(query::INSERT('varieties',[
    'name'=>$name
    ]));
    header('location: varieties.php');
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> الاصناف</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="card.css">
<style>
    *{
    font-weight: bold ;
    font-size: ;
    }
    .nav1{
   background-color: rgb(37, 36, 36);
   width: 100%;
   height: 5%;
}
.nav1 a{
    color: #f0f0f0;
    text-decoration: none;
    margin: 5%;
    font-size:2em ;
}
</style>
</head>
<body>
<nav class="nav1">
    <a href="main.php">المنتجات</a>
    <a href="<?
header('location:login.php');
    ?>" >تسجيل الخروج</a>
  </nav>
    <center>
     <h3>الاصناف</h3>
        <div class="main">
           <form  method="post">
                 <input type="submit" name="submit" value="اضافة الصنف" >
                <input type="text" name="name" class="input" value='<?php echo  $name1;?>'>
                <label id="hid">:اسم الصنف</label>
           </form>
        </div>
    </center>
    <center>
    <main>
    <table>
           <thead>
               <tr>
                   <th class='col'>اسم الصنف</th>
                   <th class='col'> تعديل الصنف</th>
                   <th class='col'>حذف الصنف</th>
               </tr>
           </thead>
    <?php
$row =query::get('varieties');
foreach($row as $va1){
    $va=squr::squr_del($va1['name']);
    echo "
           <tbodr>
               <tr>
                   <td>$va</td>
                   <td><a href='varieties_1.php? id=$va1[id] ' class='btn'>حذف الصنف</a></td>
                   <td><a href='varieties.php? id=$va1[id] ' class='btn'>تعديل الصنف</a></td>
               </tr>
           </tbodr>
    ";}
    ?>
     </table>
 </main>
<center>
</body>
</html>